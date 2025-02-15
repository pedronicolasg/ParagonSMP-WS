<?php
require_once 'methods/bootstrap.php';

if (isset($_GET['uuid'])) {
  $player = $utils->getPlayerInfo($_GET['uuid']);

  if (!$player) {
    header("Location: ranking.php");
    exit();
  }
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
  <title>Paragon SMP | <?php echo $player['name'] ?></title>
  <link rel="shortcut icon" href="assets/img/favicon.webp" type="image/x-icon" />
  <script src="https://unpkg.com/skinview3d@3.0.0-alpha.1/bundles/skinview3d.bundle.js"></script>
  <link rel="stylesheet" href="assets/css/style.css">

</head>

<body class="min-h-screen">
  <?php UI::renderHeader(); ?>

  <main class="py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
      <article class="content-container overflow-hidden">
        <div class="section-header">
          <?php if ($player['leader'] == 1): ?>
            <i class="fas fa-crown text-yellow-500"></i>
          <?php else: ?>
            <i class="fas fa-user"></i>
          <?php endif; ?>
          <h1 class="minecraft-font"><?php echo $player['name']; ?>
          <?php if ($player['tag']): ?>
            <a href="clan.php?tag=<?php echo $player['tag'] ?>" class="minecraft-font bg-gray-200 text-gray-800 px-2 py-1 rounded ml-2">[<?php echo strtoupper($player['tag']); ?>]</a>
          <?php endif; ?>
          </h1>
        </div>

        <div class="p-6">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="flex justify-center items-center">
              <canvas id="skin_container"></canvas>
            </div>

            <div>
              <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                  <h3 class="text-lg font-medium leading-6 text-gray-900">Estatísticas do Jogador</h3>
                </div>
                <div class="border-t border-gray-200">
                  <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-6">
                      <dt class="text-sm font-medium text-gray-500">Kills</dt>
                      <dd class="mt-1 text-sm text-gray-900 sm:mt-0"><?php echo $player['kills']; ?></dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-6">
                      <dt class="text-sm font-medium text-gray-500">Mortes</dt>
                      <dd class="mt-1 text-sm text-gray-900 sm:mt-0"><?php echo $player['deaths']; ?></dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-6">
                      <dt class="text-sm font-medium text-gray-500">Empates</dt>
                      <dd class="mt-1 text-sm text-gray-900 sm:mt-0"><?php echo $player['ties']; ?></dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-6">
                      <dt class="text-sm font-medium text-gray-500">Maior Sequência</dt>
                      <dd class="mt-1 text-sm text-gray-900 sm:mt-0"><?php echo $player['max_streak']; ?></dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-6">
                      <dt class="text-sm font-medium text-gray-500">Rating</dt>
                      <dd class="mt-1 text-sm text-gray-900 sm:mt-0"><?php echo $player['rating']; ?></dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-6">
                      <dt class="text-sm font-medium text-gray-500">Maior Rating</dt>
                      <dd class="mt-1 text-sm text-gray-900 sm:mt-0"><?php echo $player['max_rating']; ?></dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-6">
                      <dt class="text-sm font-medium text-gray-500">Maior KD</dt>
                      <dd class="mt-1 text-sm text-gray-900 sm:mt-0"><?php echo $player['max_kd_ratio']; ?></dd>
                    </div>
                  </dl>
                </div>
              </div>
            </div>
          </div>
        </div>
      </article>
    </div>
  </main>

  <?php UI::renderFooter(); ?>
  <?php UI::renderScripts(); ?>

  <script>
    const skinViewer = new skinview3d.SkinViewer({
      canvas: document.getElementById("skin_container"),
      width: 300,
      height: 400,
      skin: "<?php echo $player['skin']; ?>"
    });

    skinViewer.camera.position.set(30, 0, -40);

    skinViewer.animation = new skinview3d.WalkingAnimation();
    skinViewer.animation.speed = 0.5;

    skinViewer.autoRotate = true;
    skinViewer.autoRotateSpeed = 1

    $(document).ready(function() {
      updateStatus();
      setInterval(updateStatus, 60000);
    });
  </script>
</body>

</html>