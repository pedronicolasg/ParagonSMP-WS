<?php
require_once 'methods/bootstrap.php';
require_once 'methods/SkinViewer2D.php';

if (isset($_GET['tag'])) {
  $infoFields = ['name', 'tag', 'color_tag', 'verified', 'packed_bb', 'packed_allies', 'packed_rivals', 'description', 'total_members', 'allies', 'rivals'];
  $clan = $simpleClans->getClanInfo($_GET['tag'], $infoFields);
} else {
  header("Location: ranking.php");
  exit();
}
?>

<!DOCTYPE html>
<html class="scroll-smooth">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Paragon SMP | <?php echo $clan['name'] ?></title>
  <link rel="shortcut icon" href="assets/img/favicon.webp" type="image/x-icon" />
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/minecraft-skin.css">
</head>

<body class="min-h-screen">
  <?php UI::renderHeader(); ?>

  <main class="py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto space-y-6">
      <div class="content-container overflow-hidden">
        <div class="section-header">
          <i class="fas fa-shield-alt"></i>
          <h1 class="minecraft-font"><?php echo $clan['name']; ?></h1>
          <?php if ($clan['verified'] == 1): ?>
            <i class="fas fa-check-circle text-green-500 ml-2" title="Clan Verificado"></i>
          <?php endif; ?>
          <div class="ml-auto flex items-center space-x-4">
            <span class="minecraft-font text-2xl"><?php echo $clan['color_tag']; ?></span>
          </div>
        </div>
        
        <div class="p-6">
          <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Description Card -->
            <div class="lg:col-span-2">
              <div class="bg-white/10 backdrop-blur-sm p-6 rounded-lg">
                <h3 class="text-lg font-semibold text-white mb-4">Sobre o Clan</h3>
                <p class="text-gray-300"><?php echo $clan['description']; ?></p>
              </div>
            </div>
            
            <div class="lg:col-span-1">
              <div class="bg-white/10 backdrop-blur-sm p-6 rounded-lg">
                <div class="space-y-4">
                  <div class="flex justify-between items-center">
                    <span class="text-gray-300">Membros</span>
                    <span class="text-white font-bold"><?php echo $clan['total_members']; ?></span>
                  </div>
                  <div class="flex justify-between items-center">
                    <span class="text-gray-300">Aliados</span>
                    <span class="text-white font-bold"><?php 
                      $allies = explode(', ', $clan['allies']);
                      echo count(array_filter($allies));
                    ?></span>
                  </div>
                  <div class="flex justify-between items-center">
                    <span class="text-gray-300">Rivais</span>
                    <span class="text-white font-bold"><?php 
                      $rivals = explode(', ', $clan['rivals']);
                      echo count(array_filter($rivals));
                    ?></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="content-container overflow-hidden">
        <div class="section-header">
          <i class="fas fa-users"></i>
          <h2>Membros</h2>
        </div>
        <div class="p-6">
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            <?php
            $members = $simpleClans->getClanMembers($clan['tag']);
            if ($members):
              foreach ($members as $member):
                $isLeader = $member['leader'] == 1;
            ?>
            <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4 flex items-center space-x-3 transform transition-all duration-300 hover:scale-105">
              <?php
                $skinUrl = $member['skin'];
                $img = SkinViewer2D::createHead($skinUrl, 32);
                if ($img) {
                  $dataUrl = SkinViewer2D::getImageDataUrl($img);
                  imagedestroy($img);
                  echo '<img src="' . $dataUrl . '" alt="' . $member['name'] . '" class="w-8 h-8">';
                } else {
                  echo '<img src="assets/img/defaultskin.png" alt="' . $member['name'] . '" class="w-8 h-8">';
                }
              ?>
              <div>
                <a href="player.php?uuid=<?php echo $member['uuid']; ?>" class="text-white hover:text-lime-500 font-medium block">
                  <?php echo $member['name']; ?>
                </a>
                <span class="text-sm text-gray-400">
                  <?php echo $isLeader ? '<i class="fas fa-crown text-yellow-500 mr-1"></i> Líder' : 'Membro'; ?>
                </span>
              </div>
            </div>
            <?php 
              endforeach;
            else:
            ?>
            <div class="col-span-full text-center py-8">
              <p class="text-gray-400">Nenhum membro encontrado.</p>
            </div>
            <?php
            endif;
            ?>
          </div>
        </div>
      </div>

      <div class="content-container overflow-hidden">
        <div class="section-header">
          <i class="fas fa-handshake"></i>
          <h2>Alianças e Rivalidades</h2>
        </div>
        <div class="p-6">
          <div class="flex flex-col lg:flex-row gap-6">
            <div class="flex-1 bg-white/10 backdrop-blur-sm p-6 rounded-lg">
              <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-white flex items-center">
                  <i class="fas fa-handshake text-green-500 mr-2"></i>
                  Aliados
                </h3>
                <span class="text-sm text-gray-400"><?php echo count(array_filter(explode(', ', $clan['allies']))); ?></span>
              </div>
              <div class="space-y-2">
                <?php
                $allies = array_filter(explode(', ', $clan['allies']));
                if (count($allies) > 0):
                  foreach ($allies as $ally):
                ?>
                <div class="flex items-center space-x-2">
                  <i class="fas fa-shield-alt text-green-500"></i>
                  <a href="clan.php?tag=<?php echo $ally; ?>" class="text-white hover:text-lime-500">
                    <?php echo $ally; ?>
                  </a>
                </div>
                <?php
                  endforeach;
                else:
                ?>
                <p class="text-gray-400">Nenhum aliado registrado.</p>
                <?php endif; ?>
              </div>
            </div>

            <div class="w-px bg-white/10 hidden lg:block"></div>

            <div class="flex-1 bg-white/10 backdrop-blur-sm p-6 rounded-lg">
              <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-white flex items-center">
                  <i class="fas fa-user-shield text-red-500 mr-2"></i>
                  Rivais
                </h3>
                <span class="text-sm text-gray-400"><?php echo count(array_filter(explode(', ', $clan['rivals']))); ?></span>
              </div>
              <div class="space-y-2">
                <?php
                $rivals = array_filter(explode(', ', $clan['rivals']));
                if (count($rivals) > 0):
                  foreach ($rivals as $rival):
                ?>
                <div class="flex items-center space-x-2">
                  <i class="fas fa-shield"></i>
                  <a href="clan.php?tag=<?php echo $rival; ?>" class="text-white hover:text-lime-500">
                    <?php echo $rival; ?>
                  </a>
                </div>
                <?php
                  endforeach;
                else:
                ?>
                <p class="text-gray-400">Nenhum rival registrado.</p>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="content-container overflow-hidden">
        <div class="section-header">
          <i class="fas fa-history"></i>
          <h2>Registro de Eventos</h2>
          <i class="far fa-question-circle" title="Os registro estão disponíveis apenas em Inglês."></i>
        </div>
        <div class="p-6">
          <div class="space-y-4">
            <?php
            if (!empty($clan['packed_bb'])):
              $messages = array_filter(explode('|', $clan['packed_bb']));
              if (count($messages) > 0):
                foreach ($messages as $message):
                  $parts = explode('_', $message, 2);
                  if (count($parts) === 2):
                    $timestamp = $parts[0];
                    $description = $parts[1];
            ?>
            <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4 transform transition-all duration-300 hover:scale-102">
              <div class="flex items-start justify-between">
                <div class="flex items-start space-x-3">
                  <div class="flex-shrink-0">
                  <i class="fas fa-info-circle"></i>
                  </div>
                  <div>
                    <p class="text-white"><?php echo $description; ?></p>
                    <p class="text-sm text-gray-400 mt-1">
                      <?php echo date('d/m/Y H:i', $timestamp); ?>
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <?php 
                  endif;
                endforeach;
              else:
            ?>
            <div class="text-center py-8">
              <p class="text-gray-400">Nenhum evento registrado ainda.</p>
            </div>
            <?php
              endif;
            else:
            ?>
            <div class="text-center py-8">
              <p class="text-gray-400">Nenhum evento registrado ainda.</p>
            </div>
            <?php
            endif;
            ?>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php UI::renderFooter(); ?>
  <?php UI::renderScripts(); ?>
</body>
</html>