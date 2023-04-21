<?php

    session_start();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/img/icons/favicon.ico" type="image/x-icon">
    <title>Institucional - Swift Parking</title>
    <!-- TAILWIND -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/institucional/style.css">
    <link rel="stylesheet" href="../assets/css/institucional/media.css">
</head>

<body>
    
   
    <!-- HEADER -->

    <header class="bg-white">
        <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
            <div class="flex lg:flex-1">
                <a href="#" class="-m-1.5 p-1.5">
                    <span class="sr-only">Your Company</span>
                    <img class="h-10 w-auto" src="../assets/img/icons/logo_swift_parking.png"
                        alt="">
                </a>
            </div>
            <div class="flex lg:hidden">
                <button type="button"
                    class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700"
                    id="open-menu">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
            <div class="hidden lg:flex lg:gap-x-12">
                <a href="../index.php" class="text-sm font-semibold leading-6 text-gray-900">Início</a>
                <a href="./institucional.php" class="text-sm font-semibold leading-6 text-gray-900">Institucional</a>
                <a href="./blog.php" class="text-sm font-semibold leading-6 text-gray-900">Blog</a>
                <a href="./localizacao.php" class="text-sm font-semibold leading-6 text-gray-900">Encontre-nos</a>
                <a href="./contato.php" class="text-sm font-semibold leading-6 text-gray-900">Contato</a>
            </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                <?php

                    if (isset($_SESSION['admin'])) {
                        echo('<a href="..\admin_pages\control_panel.php" class="text-sm font-semibold leading-6 text-gray-900">Painel de controle<span aria-hidden="true">&rarr;</span></a>');
                    } else {
                        echo('<a href="..\admin_pages\login.php" class="text-sm font-semibold leading-6 text-gray-900">Log in<span aria-hidden="true">&rarr;</span></a>');
                    }
                ?>
            </div>
        </nav>

        <!-- Mobile menu, show/hide based on menu open state. -->

        <div class="lg:hidden hidden" role="dialog" aria-modal="true" id="mobile-menu">
            <!-- Background backdrop, show/hide based on slide-over state. -->
            <div class="fixed inset-0 z-10"></div>
            <div
                class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                <div class="flex items-center justify-between">
                    <a href="#" class="-m-1.5 p-1.5">
                        <span class="sr-only">Your Company</span>
                        <img class="h-10 w-auto" src="../assets/img/icons/logo_swift_parking.png"
                            alt="">
                    </a>
                    <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700" id="close-menu">
                        <span class="sr-only">Close menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="mt-6 flow-root">
                    <div class="-my-6 divide-y divide-gray-500/10">
                        <div class="space-y-2 py-6">
                        <a href="../index.php" class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Início</a>
                        <a href="./institucional.php" class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Institucional</a>
                        <a href="./blog.php" class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Blog</a>
                        <a href="./localizacao.php" class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Encontre-nos</a>
                        <a href="./contato.php" class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Contato</a>
                        </div>
                        <div class="py-6">
                            <?php

                                if (isset($_SESSION['admin'])) {
                                    echo('<a href="..\admin_pages\control_panel.php" class="text-sm font-semibold leading-6 text-gray-900">Painel de controle<span aria-hidden="true">&rarr;</span></a>');
                                } else {
                                    echo('<a href="..\admin_pages\login.php" class="text-sm font-semibold leading-6 text-gray-900">Log in<span aria-hidden="true">&rarr;</span></a>');
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="about-header">
            <h1 class="about-title">Sobre nós:</h1>
            <h2 class="about-subtitle">500 anos de Swift Parking!</h2>
            <p id="content">SwiftPark é uma empresa de tecnologia que oferece soluções para estacionamentos e garagens. A empresa foi fundada em 2023 por um grupo de empreendedores que acreditavam que poderiam revolucionar a maneira como as pessoas estacionam seus carros.
                Com o aplicativo e site, os usuários não precisam mais perder tempo procurando estacionamento ou lidando com o estresse de não encontrar uma vaga. O aplicativo permite que os usuários encontrem vagas disponíveis em garagens e estacionamentos próximos a eles e reservem uma vaga com antecedência.
                 A SwiftPark também trabalha em parceria com proprietários de garagens e estacionamentos para oferecer tarifas especiais e descontos exclusivos aos usuários do aplicativo.
                Desde o seu lançamento, o SwiftPark tem sido um sucesso retumbante. A empresa já conquistou uma base de usuários fiéis em todo o mundo e continua a crescer a cada dia. O aplicativo é fácil de usar, confiável e oferece uma solução conveniente para um problema comum.
                Com o SwiftPark, estacionar nunca foi tão fácil.</p>
        </div>
        <div class="about-caracteristc">
            <h1 class="about-caracteristc" style="color: #8A6DF2;">Nossas Características</h1>
            <p class="caracteristic">Nossa Missão:</p>  <p class="caracteristic-info">Simplificar o processo de estacionamento.</p>
            
            <p class="caracteristic">Nossos Valores:</p> <p class="caracteristic-info">Inovação, Simplicidade, rapidez.</p>

            <p class="caracteristic">Nossa Visão:</p> <p class="caracteristic-info">Transformar o Mercado de Estacionamento Nacional.</p>
                
                
        </div>
    </main>

    <?php

    include_once '../assets/components/footer.php';

    ?>  
</body>
</html>
