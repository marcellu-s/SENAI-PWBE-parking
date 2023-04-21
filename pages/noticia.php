<?php
    
    session_start();
    require_once "../ops/db.php";

    if (isset($_GET['id_noticia'])) {
        $id_noticia = $_GET['id_noticia'];
    }

    $query_noticia = "SELECT * FROM noticias WHERE ID_NOTICIA = $id_noticia";
    $result = mysqli_query($conn, $query_noticia);

    $noticia = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/img/icons/favicon.ico" type="image/x-icon">
    <title><?php echo($noticia['TITULO']); ?></title>
    <!-- TAILWIND -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- BOOTSTRAP ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- FONTS GOOGLE -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/noticia/style.css">
    <link rel="stylesheet" href="../assets/css/noticia/media.css">
    <!-- JAVASCRIPT -->
    <script src="../assets/js/voltar.js" defer></script>
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

    <!-- MAIN -->

    <main>

        <?php 

        echo '<section class="news-container">
        <div class="back-to-page">
            <a href="#" onclick="voltar()"><i class="bi bi-arrow-left"></i></a>
        </div>
        <div class="news">
            <div class="news-header">
                <h1>'. $noticia['TITULO'].'</h1>
            </div>
            <div class="news-image">
                <img src="'. $noticia['LINK_IMG'].'" alt="">
            </div>
            <div class="news-info">
                <div class="news-info-single">
                    <i class="bi bi-calendar"></i>
                    <span class="news-date">Pub &nbsp;'. $noticia['DATA_PUB'] .'</span>
                </div>
                '.
                    (!empty($noticia['DATA_EDIT']) ? 
                        '<div class="news-info-single">
                            <i class="bi bi-pencil-fill"></i>
                            <span class="news-edit-date">Edit &nbsp;'. $noticia['DATA_EDIT'] .'</span>
                        </div>'
                    :
                        ''
                    )
                .'
                <div class="news-info-single">
                    <i class="bi bi-person-fill"></i>
                    <span class="news-author">'. $noticia['AUTOR'] .'</span>
                </div>
            </div>
            <div class="news-content">
                <p>'. nl2br($noticia['NOTICIA']).'</p>
            </div>
        </div>
    </section>'

        ?>

    </main>

    <!-- FOOTER -->

    <?php

    include_once '../assets/components/footer.php';

    ?>  

    <!-- BUTTON SCROLL TO TOP -->
    <button type="button" id="btn-to-top">
        <span>&#129153;</span>
    </button>
    
    <script src="../assets/js/btnScrollToTop.js"></script>
</body>
</html>
