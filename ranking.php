<?php require_once 'methods/bootstrap.php'; ?>

<!DOCTYPE html>
<html class="scroll-smooth">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Paragon SMP | Ranking</title>

  <meta name="keywords" content="minecraft, servidor, ranking, melhores, clans, jogadores, competitivo, comunidade">
  <meta name="description" content="Confira o ranking do Paragon SMP, onde os melhores clans e jogadores se destacam! Veja quem está no topo da tabela de classificação e acompanhe a competição acirrada entre os membros da nossa comunidade.">
  <meta property="theme-color" content="#d1d1d1">
  <meta property="og:title" content="Ranking do Paragon SMP - Servidor de Minecraft Semi-Anárquico">
  <meta property="og:description" content="Confira o ranking do Paragon SMP, onde os melhores clans e jogadores se destacam! Veja quem está no topo da tabela de classificação e acompanhe a competição acirrada entre os membros da nossa comunidade.">
  <meta property="og:url" content="https://paragonsmp.rf.gd/ranking.php">
  <meta property="og:image" content="https://paragonsmp.rf.gd/assets/img/logo.webp">
  <meta property="og:type" content="website">
  <link rel="shortcut icon" href="assets/img/favicon.webp" type="image/x-icon" />
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body class="min-h-screen">
  <?php UI::renderHeader(); ?>

  <main class="py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto grid grid-cols-1 gap-8">
      <div class="lg:col-span-1">
        <article class="content-container h-full">
          <section class="bg-white/95 backdrop-blur-sm rounded-lg shadow-lg overflow-hidden h-full">
            <div class="section-header">
              <i class="fas fa-shield-alt text-lime-600 text-xl"></i>
              <h2 class="text-xl font-bold text-gray-900">Clans</h2>
            </div>
            
            <div class="p-6">
              <div class="table-container">
                <table>
                  <thead>
                    <tr>
                      <th>Nome</th>
                      <th>Tag</th>
                      <th>Kills</th>
                      <th>Aliados</th>
                      <th>Rivais</th>
                      <th>Descrição</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $UI->renderClanList(); ?>
                  </tbody>
                </table>
              </div>
            </div>
          </section>
        </article>
      </div>

      <div class="lg:col-span-1">
        <article class="content-container h-full">
          <section class="bg-white/95 backdrop-blur-sm rounded-lg shadow-lg overflow-hidden h-full">
            <div class="section-header">
              <i class="fas fa-users text-lime-600 text-xl"></i>
              <h2 class="text-xl font-bold text-gray-900">Players</h2>
            </div>
            
            <div class="p-6">
              <div class="table-container">
                <table>
                  <thead>
                    <tr>
                      <th>Nick</th>
                      <th>Clan</th>
                      <th>Kills</th>
                      <th>Mortes</th>
                      <th>Empates</th>
                      <th>Streak</th>
                      <th>KDR</th>
                      <th>Pontuação</th>
                      <th>Pontuação Máx.</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $UI->renderPlayerRankList(); ?>
                  </tbody>
                </table>
              </div>
            </div>
          </section>
        </article>
      </div>
    </div>
  </main>

  <?php UI::renderFooter(); ?>
  <?php UI::renderScripts(); ?>
</body>
</html>