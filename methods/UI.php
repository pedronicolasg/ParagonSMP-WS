<?php
require_once 'conn.php';
require_once 'simpleclans.php';

class UI
{
  private $conn;


  public function __construct($conn)
  {
    $this->conn = $conn;
  }

  public static function renderHeader()
  {
?>
    <header class="header-dark sticky top-0 z-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
          <!-- Logo -->
          <div class="flex-shrink-0">
            <a href="index.php" class="flex items-center hover:opacity-80 transition-opacity duration-200">
              <img src="assets/img/favicon.webp" alt="Paragon SMP" class="h-8 w-auto" />
            </a>
          </div>

          <!-- Desktop Menu -->
          <nav class="hidden md:flex items-center space-x-6">
            <a href="index.php" class="nav-link">
              <i class="fas fa-home"></i>
              <span>Início</span>
            </a>
            <a href="regras.php" class="nav-link">
              <i class="fas fa-book"></i>
              <span>Regras</span>
            </a>
            <a href="ranking.php" class="nav-link">
              <i class="fas fa-crown"></i>
              <span>Ranking</span>
            </a>
            <a href="https://discord.gg/jPvx5EDzM4" target="_blank" class="nav-link">
              <i class="fab fa-discord"></i>
              <span>Discord</span>
            </a>
          </nav>

          <!-- IP Copy Button -->
          <div class="hidden md:block">
            <button id="ip-copy" class="nav-link">
              <i class="fas fa-copy"></i>
              <span>paragonsmp.corujao.com</span>
            </button>
          </div>

          <!-- Mobile menu button -->
          <div class="md:hidden">
            <button type="button" class="mobile-menu-button" aria-expanded="false">
              <span class="sr-only">Abrir menu principal</span>
              <!-- Icon when menu is closed -->
              <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
              </svg>
              <!-- Icon when menu is open -->
              <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        </div>

        <!-- Mobile menu -->
        <div class="mobile-menu hidden md:hidden">
          <div class="py-2">
            <a href="index.php" class="mobile-nav-link">
              <i class="fas fa-home"></i>
              <span>Início</span>
            </a>
            <a href="regras.php" class="mobile-nav-link">
              <i class="fas fa-book"></i>
              <span>Regras</span>
            </a>
            <a href="ranking.php" class="mobile-nav-link">
              <i class="fas fa-crown"></i>
              <span>Ranking</span>
            </a>
            <a href="https://discord.gg/jPvx5EDzM4" target="_blank" class="mobile-nav-link">
              <i class="fab fa-discord"></i>
              <span>Discord</span>
            </a>
            <button id="ip-copy-mobile" class="mobile-nav-link w-full text-left">
              <i class="fas fa-copy"></i>
              <span>paragonsmp.corujao.com</span>
            </button>
          </div>
        </div>
      </div>
    </header>
  <?php
  }

  public static function renderFooter()
  {
  ?>
    <footer class="footer-dark">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="footer-content">
          <div class="footer-section">
            <h3>Sobre o Servidor</h3>
            <p>Paragon SMP é um servidor Minecraft focado em uma experiência survival multiplayer única e divertida. Junte-se a nossa comunidade e faça parte desta aventura!</p>
            
          </div>

          <div class="footer-section">
            <h3>Links Úteis</h3>
            <div class="footer-links">
              <a href="index.php" class="footer-link">
                <i class="fas fa-home"></i>
                <span>Página Inicial</span>
              </a>
              <a href="regras.php" class="footer-link">
                <i class="fas fa-book"></i>
                <span>Regras do Servidor</span>
              </a>
              <a href="ranking.php" class="footer-link">
                <i class="fas fa-crown"></i>
                <span>Ranking de Jogadores</span>
              </a>
              <!--<a href="" class="footer-link">
                <i class="fas fa-cube"></i>
                <span>Recursos e Tutoriais</span>
              </a>-->
            </div>
          </div>

          <div class="footer-section">
            <h3>Conecte-se</h3>
            <p>Siga-nos nas redes sociais para ficar por dentro das novidades e eventos do servidor!</p>
            <div class="social-links">
                <?php
                $sociallinks = array(
                array(
                  "nome" => "Youtube",
                  "icone" => "fab fa-youtube",
                  "link" => "https://www.youtube.com/@Paragoncraft-mc"
                ),
                array(
                  "nome" => "Reddit",
                  "icone" => "fab fa-reddit",
                  "link" => "https://www.reddit.com/r/paragoncraft/"
                ),
                array(
                  "nome" => "Twitch",
                  "icone" => "fab fa-twitch",
                  "link" => "https://www.twitch.tv/paragoncraft_"
                ),
                array(
                  "nome" => "Twitter",
                  "icone" => "fab fa-twitter",
                  "link" => "https://twitter.com/paragoncraft_"
                ),
                array(
                  "nome" => "Instagram",
                  "icone" => "fab fa-instagram",
                  "link" => "https://instagram.com/paragoncraft"
                ),
                array(
                  "nome" => "Tiktok",
                  "svg" => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z"/></svg>',
                  "link" => "https://www.tiktok.com/@paragoncraf_"
                ),
                array(
                  "nome" => "Discord",
                  "icone" => "fab fa-discord",
                  "link" => "https://discord.gg/jPvx5EDzM4"
                ),
                );

                foreach ($sociallinks as $social) {
                echo '<a href="' . $social['link'] . '" target="_blank" class="social-link">';
                if (isset($social['icone'])) {
                  echo '<i class="' . $social['icone'] . ' social-icon"></i>';
                } else if (isset($social['svg'])){
                  echo $social['svg'];
                }
                echo '</a>';
                }
                ?>
            </div>
          </div>
        </div>

        <div class="footer-bottom">
          <p>&copy; <?php echo date('Y'); ?> Paragon SMP. Desenvolvido por <a href="https://konect.gg/pedronicolasg" target="_blank">pedronicolasg</a></p>
        </div>
      </div>
    </footer>
  <?php
  }

  public static function renderScripts()
  {
  ?>
    <script src="assets/js/scripts.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.12.1/js/all.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <?php
  }

  public function renderPlayerRankList()
  {
    $query = "SELECT bt.name, bt.kills, bt.deaths, bt.ties, bt.max_streak, bt.rating, bt.max_rating, bt.max_kd_ratio, bt.id as uuid, sp.tag, sp.leader
              FROM bt_pvp_overall bt
              LEFT JOIN sc_players sp ON bt.name = sp.name
              ORDER BY bt.rating DESC";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $players = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($players as $player) {
    ?>
      <tr>
        <td>
          <a class="minecraft-font" href="player.php?uuid=<?php echo urlencode($player['uuid']) ?>">
            <?= $player['leader'] == 1 ? '<i class="fas fa-crown"></i>' : '<i class="fas fa-user"></i>' ?>
            <?php echo $player['name'] ?>
            <i class="fas fa-external-link-alt external-link-icon" title="Ver perfil"></i>
          </a>
        </td>
        <td><a class="minecraft-font" href="clan.php?tag=<?php echo $player['tag'] ?>"><?php echo strtoupper($player['tag']) ?></a></td>
        <td><?php echo $player['kills'] ?></td>
        <td><?php echo $player['deaths'] ?></td>
        <td><?php echo $player['ties'] ?></td>
        <td><?php echo $player['max_streak'] ?></td>
        <td><?php echo $player['max_kd_ratio'] ?></td>
        <td><?php echo $player['rating'] ?></td>
        <td><?php echo $player['max_rating'] ?></td>
      </tr>
    <?php
    }
  }

  public function renderClanList()
  {
    $query = "SELECT name, tag, color_tag, verified, 
                     REPLACE(packed_allies, '|', ', ') as packed_allies,
                     REPLACE(packed_rivals, '|', ', ') as packed_rivals,
                     LEFT(description, 35) as short_description,
                     (SELECT COUNT(*) FROM sc_kills WHERE attacker_tag = sc_clans.tag) AS total_kills
              FROM sc_clans
              ORDER BY total_kills DESC";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $clans = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($clans as $clan) {
      $clanTag = $clan['tag'];
      $clanPageLink = 'clan.php?tag=' . urlencode($clanTag);
    ?>
      <tr>
        <td><a class="minecraft-font" href="<?php echo $clanPageLink ?>"><?= $clan['verified'] == 1 ? '<i class="fas fa-check-circle verified-icon"></i> ' : '<i class="fas fa-exclamation-circle unverified-icon"></i> ' ?><?php echo $clan['name'] ?></a></td>
        <td class="minecraft-font"><?php echo $clan['color_tag'] ?></td>
        <td><?php echo $clan['total_kills'] ?></td>
        <td><?php echo $clan['packed_allies'] ?></td>
        <td><?php echo $clan['packed_rivals'] ?></td>
        <td><?php if ($clan['short_description']): ?>
            <?php echo $clan['short_description'] ?> <a href="<?php echo $clanPageLink ?>"> Ler mais</a>
          <?php else: ?>
            <a href="<?php echo $clanPageLink ?>">Sobre o clã</a>
          <?php endif; ?>
        </td>
      </tr>
    <?php
    }
  }

  public static function renderTeamList()
  {
    $team = [
      [
        'name' => 'Pedro Nícolas',
        'role' => 'Dono/DEV',
        'link' => 'http://konect.gg/pedronicolasg',
        'pfp' => 'https://avatars.githubusercontent.com/u/53797066'
      ],
      [
        'name' => 'Daniel Berg',
        'role' => 'Staff',
        'link' => 'https://github.com/dbergsilva',
        'pfp' => 'https://avatars.githubusercontent.com/u/189254093'
      ]
    ];

    foreach ($team as $member) {
    ?>
      <li class="bg-gray-50 rounded-lg p-4 flex items-center space-x-4">
        <div class="w-16 h-16 relative">
          <img src="<?php echo $member['pfp']; ?>" alt="<?php echo $member['name']; ?>" class="rounded-full">
        </div>
        <div>
          <h3 class="font-medium text-gray-900"><a href="<?php echo $member['link']; ?>" target="_blank" class="text-indigo-600 hover:text-indigo-900"><?php echo $member['name']; ?></a></h3>
          <p class="text-gray-500 text-sm"><?php echo $member['role']; ?></p>
        </div>
      </li>
    <?php
    }
  }

  private function generateRequirementsButton($item)
  {
    if (isset($item['requisitos']) && !empty($item['requisitos'])) {
      $requisitos = implode(', ', $item['requisitos']);
      return '<button class="requirements-btn" data-requirements="' . htmlspecialchars($requisitos) . '">Ver Requisitos</button>';
    }
    return '';
  }


  private function countItems($items)
  {
    return count(array_filter($items, function ($item) {
      return !empty($item['nome']);
    }));
  }


  public function renderResources()
  {
    $datapacks = array(
      array(
        "nome" => "Alien End",
        "tipo" => "Geração de mundo",
        "imagem" => "https://cdn.modrinth.com/data/E8kMzoSt/b03b2438e9dc7c0f54ca3a89748bd48429f7ab78.png",
        "link" => "https://modrinth.com/datapack/alien-end/"
      ),
      array(
        "nome" => "BlazeandCave's Advancements Pack",
        "tipo" => "Mecânica de jogo",
        "imagem" => "https://cdn.modrinth.com/data/VoVJ47kN/88a39593e6ef876d0a22ebb3fcfa398c223bea3c.png",
        "link" => "https://modrinth.com/datapack/blazeandcaves-advancements-pack"
      ),
      array(
        "nome" => "Blossom Blade",
        "tipo" => "Geração de mundo",
        "imagem" => "https://cdn.modrinth.com/data/UMmSTwE0/0d56baf5966c5bc40aa747d4afa586d54bcb8e20.png",
        "link" => "https://modrinth.com/datapack/blossom-blade"
      ),
      array(
        "nome" => "Craftable Saddle",
        "tipo" => "Utilidade",
        "imagem" => "https://cdn.modrinth.com/data/PamPmbXh/fff9cc53983d5dc5d2ac054d00d5dc29a63be659.png",
        "link" => "https://modrinth.com/datapack/piseks-craftable-saddle"
      ),
      array(
        "nome" => "Crafting+",
        "tipo" => "Mecânica de jogo",
        "imagem" => "https://cdn.modrinth.com/data/sjUk6lfU/4d1dead4342e30cd8110ca0c39f83f53964bfda2.png",
        "link" => "https://modrinth.com/datapack/crafting+"
      ),
      array(
        "nome" => "Dimension Detector",
        "tipo" => "Utilidade",
        "imagem" => "https://cdn.modrinth.com/data/u4lzJTkX/b6259b220ee67c0a67e5b9c3fc86766a04b3f6d0.png",
        "link" => "https://modrinth.com/datapack/dimension-detector"
      ),
      array(
        "nome" => "Dungeons and Taverns",
        "tipo" => "Geração de mundo",
        "imagem" => "https://cdn.modrinth.com/data/tpehi7ww/d3819bdb14026e23a9d48b0cc0be99a1a25ea2b5.png",
        "link" => "https://modrinth.com/datapack/dungeons-and-taverns"
      ),
      array(
        "nome" => "Dungeons and Taverns Stronghold Rework",
        "tipo" => "Geração de mundo",
        "imagem" => "https://cdn.modrinth.com/data/rYocd2LE/8a25c21f59d55ae0a7ff05c3624ccf73f4d9ea88.png",
        "link" => "https://modrinth.com/datapack/dungeons-and-taverns-stronghold-rework"
      )
    );

    $plugins = array(
      array(
        "nome" => "AuthMeReloaded",
        "tipo" => "Segurança",
        "imagem" => "https://www.spigotmc.org/data/resource_icons/6/6269.jpg",
        "link" => "https://www.spigotmc.org/resources/authmereloaded.6269/"
      )
    );

    $resourcepacks = array();

    $numDatapacks = $this->countItems($datapacks);
    $numPlugins = $this->countItems($plugins);
    $numResourcepacks = $this->countItems($resourcepacks);
    ?>
    <div class="resources-container">
      <div class="resources-section">
        <h2 class="text-lg font-bold mb-4">Datapacks (<?php echo $numDatapacks ?>)</h2>
        <div class="resources-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
          <?php foreach ($datapacks as $item): ?>
            <?php if (!empty($item['nome'])): ?>
              <div class="resource-card bg-white rounded-lg shadow-md p-4">
                <img src="<?php echo $item['imagem'] ?>" alt="<?php echo $item['nome'] ?>" class="w-full h-48 object-cover mb-4">
                <div class="resource-info">
                  <h3 class="font-bold text-lg mb-2"><?php echo $item['nome'] ?></h3>
                  <p class="text-gray-500 text-sm mb-2"><?php echo $item['tipo'] ?></p>
                  <?php echo $this->generateRequirementsButton($item) ?>
                  <a href="<?php echo $item['link'] ?>" class="download-btn bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded" target="_blank">Download</a>
                </div>
              </div>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="resources-section mt-8">
        <h2 class="text-lg font-bold mb-4">Plugins (<?php echo $numPlugins ?>)</h2>
        <div class="resources-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
          <?php foreach ($plugins as $item): ?>
            <?php if (!empty($item['nome'])): ?>
              <div class="resource-card bg-white rounded-lg shadow-md p-4">
                <img src="<?php echo $item['imagem'] ?>" alt="<?php echo $item['nome'] ?>" class="w-full h-48 object-cover mb-4">
                <div class="resource-info">
                  <h3 class="font-bold text-lg mb-2"><?php echo $item['nome'] ?></h3>
                  <p class="text-gray-500 text-sm mb-2"><?php echo $item['tipo'] ?></p>
                  <?php echo $this->generateRequirementsButton($item) ?>
                  <a href="<?php echo $item['link'] ?>" class="download-btn bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded" target="_blank">Download</a>
                </div>
              </div>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
      </div>

      <?php if ($numResourcepacks > 0): ?>
        <div class="resources-section mt-8">
          <h2 class="text-lg font-bold mb-4">Pacotes de Recursos (<?php echo $numResourcepacks ?>)</h2>
          <div class="resources-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <?php foreach ($resourcepacks as $item): ?>
              <?php if (!empty($item['nome'])): ?>
                <div class="resource-card bg-white rounded-lg shadow-md p-4">
                  <img src="<?php echo $item['imagem'] ?>" alt="<?php echo $item['nome'] ?>" class="w-full h-48 object-cover mb-4">
                  <div class="resource-info">
                    <h3 class="font-bold text-lg mb-2"><?php echo $item['nome'] ?></h3>
                    <p class="text-gray-500 text-sm mb-2"><?php echo $item['tipo'] ?></p>
                    <?php echo $this->generateRequirementsButton($item) ?>
                    <a href="<?php echo $item['link'] ?>" class="download-btn bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded" target="_blank">Download</a>
                  </div>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endif; ?>
    </div>
<?php
  }
}
