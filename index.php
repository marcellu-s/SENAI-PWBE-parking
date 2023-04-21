<?php

    session_start();
    
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/img/icons/favicon.ico" type="image/x-icon">
    <title>Swift Parking</title>
    <!-- TAILWIND -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FONTS GOOGLE -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="./assets/css/index/style.css">
    <link rel="stylesheet" href="./assets/css/index/media.css">
</head>
<body>
    <!-- HEADER -->

    <header class="bg-white">
        <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
            <div class="flex lg:flex-1">
                <a href="#" class="-m-1.5 p-1.5">
                    <span class="sr-only">Your Company</span>
                    <img class="h-10 w-auto" src="./assets/img/icons/logo_swift_parking.png" alt="">
                </a>
            </div>
            <div class="flex lg:hidden">
                <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700"
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
                <a href="./index.php" class="text-sm font-semibold leading-6 text-gray-900">Início</a>
                <a href="./pages/institucional.php" class="text-sm font-semibold leading-6 text-gray-900">Institucional</a>
                <a href="./pages/blog.php" class="text-sm font-semibold leading-6 text-gray-900">Blog</a>
                <a href="./pages/localizacao.php" class="text-sm font-semibold leading-6 text-gray-900">Encontre-nos</a>
                <a href="./pages/contato.php" class="text-sm font-semibold leading-6 text-gray-900">Contato</a>
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
                        <img class="h-10 w-auto" src="./assets/img/icons/logo_swift_parking.png"
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
                            <a href="./index.php" class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Início</a>
                            <a href="./pages/institucional.php" class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Institucional</a>
                            <a href="./pages/blog.php" class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Blog</a>
                            <a href="./pages/localizacao.php" class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Encontre-nos</a>
                            <a href="./pages/contato.php" class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Contato</a>
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

    <!-- MAIN -->

    <main>
        <section class="headline">
            <div class="headline-text">
                <h1 class="title">Bem vindo ao Swift Parking</h1>
                <h2 class="subtitle">Nós temos as melhores<br>ofertas para<br>estacionamentos!</h2>
                <button class="lean-more-btn">
                    <a href="#">Leia mais</a>
                </button>
            </div>
            <div class="headline-banner">
                <img src="./assets/img/banner/headline_banner.jpg" alt="carro estacionado">
            </div>
        </section>

        <section class="container-benefits">
            <div class="benefits-text">
                <h2 class="title">Por que escolher nosso estacionamento?</h2>
                <h2 class="subtitle">Estacionamento Facilitado Com a Swift Parking</h2>
                <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius ducimus sed
                    molestiae aliquam dolores distinctio iusto itaque eos praesentium harum quis laboriosam, veritatis
                    nostrum architecto voluptate cumque iste! Voluptatum, cum?</p>
                <img src="./assets/img/banner/parking.png" alt="carro estacionado">
            </div>
            <div class="benefits">
                <div class="benefit">
                    <img src="./assets/img/icons/save_your_money.jpg" alt="cofre em forma de porco">
                    <div class="benefit-detail">
                        <h3>Economize Dinheiro</h3>
                        <p>Economize até 70% em nosso site em comparação com o custo de outros estacionamentos.</p>
                    </div>
                </div>
                <div class="benefit">
                    <img src="./assets/img/icons/save_time.jpg" alt="relógio">
                    <div class="benefit-detail">
                        <h3>Economize Tempo</h3>
                        <p>Fazer uma reserva é rápido e simples!</p>
                    </div>
                </div>
                <div class="benefit">
                    <img src="./assets/img/icons/safe_and_secure.jpg" alt="emblema de escudo">
                    <div class="benefit-detail">
                        <h3>Confiável e Seguro</h3>
                        <p>Vigilância 24 horas para garantir que seu carro esteja seguro enquanto você estiver ausente.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="parking-options">
            <div class="header-options">
                <h2 class="title">Preços de Estacionamento</h2>
                <h3 class="subtitle">Opções e Tarifas de Estacionamento</h3>
            </div>
            <div class="options">
                <div class="option">
                    <p class="option-hour">1 Hora</p>
                    <span class="option-price">R$ 27,00</span>
                    <p class="option-detail">Este plano inclui todos os serviços que acompanham uma vaga de garagem!</p>
                    <button class="lean-more-btn">
                        <a href="#">Saiba mais</a>
                    </button>
                </div>
                <div class="option">
                    <p class="option-hour">2 Horas</p>
                    <span class="option-price">R$ 32,00</span>
                    <p class="option-detail">Este plano inclui todos os serviços que acompanham uma vaga de garagem!</p>
                    <button class="lean-more-btn">
                        <a href="#">Saiba mais</a>
                    </button>
                </div>
            </div>
        </section>
    </main>

    <!-- FOOTER -->

    <footer id="footer-fluid">
        <div class="footer-content">
            <div class="about-parking">
                <h3 class="title">Sobre a Swift Parking</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus obcaecati aliquid cupiditate eligendi
                    nobis sit inventore ducimus quis alias esse mollitia eaque dolorum voluptatibus nulla corrupti, minima
                    praesentium porro enim.</p>
            </div>
            <div class="content-details">
                <div class="service">
                    <h3 class="title">Serviços</h3>
                    <ul class="list-content">
                        <li class="list-item"><a href="#">Estacionamento</a></li>
                        <li class="list-item"><a href="#">Auto Estacionamento</a></li>
                        <li class="list-item"><a href="#">Garagem</a></li>
                        <li class="list-item"><a href="#">Manobrista</a></li>
                    </ul>
                </div>
                <div class="quick-links">
                    <h3 class="title">Links Rápidos</h3>
                    <ul class="list-content">
                        <li class="list-item"><a href="#">Início</a></li>
                        <li class="list-item"><a href="#">Institucional</a></li>
                        <li class="list-item"><a href="#">Serviços</a></li>
                        <li class="list-item"><a href="#">Blog</a></li>
                        <li class="list-item"><a href="#">Contato</a></li>
                    </ul>
                </div>
                <div class="contact-info">
                    <h3 class="title">Informção de Contato</h3>
                    <p class="info-street">Rua Alfredo Blackman, 234</p>
                    <span class="info-phone">+55 9999-9999</span>
                    <span class="info-email">contato@swiftparking.com</span>
                </div>
            </div>
            <div class="line-separator"></div>
            <div class="copyright">
                <p>&copy; Copyright 2023 Swift Parking. All Rights Reserved</p>
            </div>
        </div>
    </footer>


    <!-- BUTTON SCROLL TO TOP -->
    <button type="button" id="btn-to-top">
        <span>&#129153;</span>
    </button>

    <script src="./assets/js/btnScrollToTop.js"></script>
    <script src="./assets/js/mobileMenu.js"></script>
</body>
</html>
