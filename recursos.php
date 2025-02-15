<?php require_once 'methods/bootstrap.php'; ?>

<!DOCTYPE html>
<html class="scroll-smooth">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Paragon SMP | Recursos</title>

  <meta name="keywords" content="minecraft, servidor, recursos, datapacks, plugins, texturas, mods, comunidade">
  <meta name="description" content="Explore os recursos disponíveis no Paragon SMP e aprimore sua experiência de jogo! Nossa lista de datapacks, plugins e texturas oferece uma variedade de opções para personalizar e enriquecer o seu gameplay. Descubra como elevar o seu jogo ao próximo nível com os recursos disponíveis em nosso servidor.">
  <meta property="theme-color" content="#d1d1d1">
  <meta property="og:title" content="Recursos do Paragon SMP - Servidor de Minecraft Semi-Anárquico">
  <meta property="og:description" content="Explore os recursos disponíveis no Paragon SMP e aprimore sua experiência de jogo! Nossa lista de datapacks, plugins e texturas oferece uma variedade de opções para personalizar e enriquecer o seu gameplay. Descubra como elevar o seu jogo ao próximo nível com os recursos disponíveis em nosso servidor.">
  <meta property="og:url" content="https://paragonsmp.rf.gd/recursos.php">
  <meta property="og:image" content="https://paragonsmp.rf.gd/assets/img/logo.webp">
  <meta property="og:type" content="website">
  <link rel="shortcut icon" href="assets/img/favicon.webp" type="image/x-icon" />
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body class="min-h-screen bg-gray-100">
  <?php UI::renderHeader(); ?>

  <main class="py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto space-y-8">
      <section class="content-container overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
          <h2 class="text-xl font-bold text-gray-900">Datapacks</h2>
        </div>
        <div class="p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          <?php foreach ($datapacks as $datapack): ?>
          <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition-shadow duration-200">
            <h3 class="text-lg font-semibold text-gray-900 mb-2"><?php echo $datapack['name']; ?></h3>
            <p class="text-gray-600 mb-4"><?php echo $datapack['description']; ?></p>
            <?php if (isset($datapack['link'])): ?>
            <a href="<?php echo $datapack['link']; ?>" target="_blank" class="inline-flex items-center text-indigo-600 hover:text-indigo-500">
              Saiba mais
              <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
              </svg>
            </a>
            <?php endif; ?>
          </div>
          <?php endforeach; ?>
        </div>
      </section>

      <section class="content-container overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
          <h2 class="text-xl font-bold text-gray-900">Plugins</h2>
        </div>
        <div class="p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          <?php foreach ($plugins as $plugin): ?>
          <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition-shadow duration-200">
            <h3 class="text-lg font-semibold text-gray-900 mb-2"><?php echo $plugin['name']; ?></h3>
            <p class="text-gray-600 mb-4"><?php echo $plugin['description']; ?></p>
            <?php if (isset($plugin['link'])): ?>
            <a href="<?php echo $plugin['link']; ?>" target="_blank" class="inline-flex items-center text-indigo-600 hover:text-indigo-500">
              Saiba mais
              <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
              </svg>
            </a>
            <?php endif; ?>
          </div>
          <?php endforeach; ?>
        </div>
      </section>

      <section class="content-container overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
          <h2 class="text-xl font-bold text-gray-900">Resource Packs</h2>
        </div>
        <div class="p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          <?php foreach ($resourcePacks as $pack): ?>
          <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition-shadow duration-200">
            <h3 class="text-lg font-semibold text-gray-900 mb-2"><?php echo $pack['name']; ?></h3>
            <p class="text-gray-600 mb-4"><?php echo $pack['description']; ?></p>
            <?php if (isset($pack['link'])): ?>
            <a href="<?php echo $pack['link']; ?>" target="_blank" class="inline-flex items-center text-indigo-600 hover:text-indigo-500">
              Download
              <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
              </svg>
            </a>
            <?php endif; ?>
          </div>
          <?php endforeach; ?>
        </div>
      </section>
    </div>
  </main>

  <?php UI::renderFooter(); ?>
  <?php UI::renderScripts(); ?>
</body>

</html>