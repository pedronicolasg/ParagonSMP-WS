<?php require_once 'methods/bootstrap.php'; ?>

<!DOCTYPE html>
<html class="scroll-smooth">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Paragon SMP | Home</title>

    <meta name="keywords" content="minecraft, servidor, semi-anárquico, survival, comunidade, clãs, construção, aventura">
    <meta name="description" content="Bem-vindo ao Paragon SMP, o refúgio dos aventureiros intrépidos e dos construtores destemidos! Descubra um mundo semi-anárquico de aventuras e construções no Minecraft, com mais de 15 datapacks selecionados, sistema de clãs, e uma comunidade ativa. Explore, construa e junte-se à jornada no Paragon SMP agora!">
    <meta property="theme-color" content="#d1d1d1">
    <meta property="og:title" content="Paragon SMP - Servidor de Minecraft Semi-Anárquico">
    <meta property="og:description" content="Descubra um mundo semi-anárquico de aventuras e construções no Minecraft, com mais de 15 datapacks selecionados, sistema de clãs, e uma comunidade ativa. Explore, construa e junte-se à jornada no Paragon SMP agora!">
    <meta property="og:url" content="https://paragonsmp.rf.gd">
    <meta property="og:image" content="https://paragonsmp.rf.gd/assets/img/logo.webp">
    <meta property="og:type" content="website">
    <link rel="shortcut icon" href="assets/img/favicon.webp" type="image/x-icon" />
    <script src="https://unpkg.com/skinview3d@3.0.0-alpha.1/bundles/skinview3d.bundle.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .hero-background {
            background-image: url(assets/img/miniatura.png);
        }
    </style>
</head>

<body class="min-h-screen">
    <?php UI::renderHeader(); ?>

    <main class="py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2">
                    <article class="content-container overflow-hidden mb-8">
                        <div class="section-header">
                            <i class="fas fa-gamepad text-indigo-600"></i>
                            <h1>Sobre o servidor</h1>
                        </div>
                        <div class="relative h-64 bg-cover bg-center hero-background"></div>
                        <div class="p-6 space-y-4">
                            <p class="text-gray-700">
                                Paragon SMP é um servidor Minecraft dedicado a proporcionar uma experiência de jogo excepcional para jogadores de todas as plataformas. Nosso servidor está online 24/7, garantindo que você possa se divertir a qualquer hora do dia ou da noite. Com um foco especial em guerras entre clãs e construção de comunidades, estamos sempre prontos para novas aventuras e desafios emocionantes! O que oferecemos:
                            </p>

                            <ul class="space-y-6">
                                <li class="flex space-x-4">
                                    <span class="text-2xl">🏰</span>
                                    <div>
                                        <strong class="text-gray-900">Sistema de Clã:</strong>
                                        <p class="text-gray-700">No Paragon SMP, você pode formar ou se juntar a clãs para colaborar, competir e dominar o servidor juntos. Participe de guerras épicas e mostre sua força estratégica.</p>
                                    </div>
                                </li>
                                <li class="flex space-x-4">
                                    <span class="text-2xl">🔄</span>
                                    <div>
                                        <strong class="text-gray-900">Crossplay:</strong>
                                        <p class="text-gray-700">Jogue com amigos independentemente da plataforma! Nosso servidor suporta Minecraft Java (PC) e Bedrock (Celular, Windows 10, PS4, PS5, Xbox), permitindo que todos possam se juntar à diversão.</p>
                                    </div>
                                </li>
                                <li class="flex space-x-4">
                                    <span class="text-2xl">🕒</span>
                                    <div>
                                        <strong class="text-gray-900">Servidor Online 24/7:</strong>
                                        <p class="text-gray-700">Nosso servidor está sempre disponível, oferecendo uma experiência sem lag para todos os jogadores, graças a host <a href="https://corujao.com/" class="text-indigo-600 hover:text-indigo-800">Corujão</a>.</p>
                                    </div>
                                </li>
                                <li class="flex space-x-4">
                                    <span class="text-2xl">🔐</span>
                                    <div>
                                        <strong class="text-gray-900">Sistema de Proteção de Território:</strong>
                                        <p class="text-gray-700">Conquiste e proteja suas áreas no mapa com nosso sistema de proteção de território, garantindo que suas construções fiquem seguras contra invasões e destruições indesejadas.</p>
                                    </div>
                                </li>
                                <li class="flex space-x-4">
                                    <span class="text-2xl">📦</span>
                                    <div>
                                        <strong class="text-gray-900">Datapacks Exclusivos:</strong>
                                        <p class="text-gray-700">Enriquecemos a experiência de jogo com uma série de datapacks emocionantes que trazem novas estruturas, biomas, mecânicas e melhorias que tornam o mundo do Paragon SMP ainda mais dinâmico e emocionante.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </article>

                    <article class="content-container overflow-hidden">
                        <div class="section-header">
                            <i class="fas fa-users text-indigo-600"></i>
                            <h1>Conheça nossa equipe</h1>
                        </div>
                        <div class="p-6">
                            <ul class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <?php UI::renderTeamList(); ?>
                            </ul>
                        </div>
                    </article>
                </div>

                <div class="lg:col-span-1">
                    <article class="content-container overflow-hidden mb-8">
                        <div class="section-header">
                            <i class="fab fa-discord text-lime-600"></i>
                            <h1>Discord</h1>
                        </div>
                        <div class="p-6">
                            <iframe src="https://discord.com/widget?id=1254086100469682397&theme=dark" class="w-full h-[500px] border-0"></iframe>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </main>

    <?php UI::renderFooter(); ?>
    <?php UI::renderScripts(); ?>
</body>

</html>