<?php

    session_start();

?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/img/icons/favicon.ico" type="image/x-icon">
    <title>Swfit Parking - BLOG</title>
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- TAILWIND -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FONTS GOOGLE -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/blog/style.css">
    <link rel="stylesheet" href="../assets/css/blog/media.css">
    <!-- ESTILOS INTERNO -->
    <style>
        .botao_paginacao{
            border: 1px solid rgb(46, 46, 46);
            border-radius: 4px;
            height: 35px;
            width: 35px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: 15px;
            margin-right: 15px;
        }

        .paginacao{
            display: flex;
            margin-top: 50px;
            margin-bottom: 35px;
            justify-content: center;
        }
    </style>
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

    <!-- MAIN  -->

    <main>
        <div class='blog-container'>
            <?php
                require_once("../ops/db.php");

                $num_noticias_pag = 4; // DEFINIÇÃO DE QUANTAS NOTICIAS EXIBIDAS POR PÁGINA
                $links_pag = 2; // DEFINIÇÂO DE QUANTOS LINKS HAVERÃO PARA PAGINAÇÃO

                if (isset($_GET['pagina'])) {
                    $pagina = $_GET['pagina'];
                } else {
                    $pagina = 1;
                }

                //$_SESSION['pagina'];

                $inicio = ($pagina - 1) * $num_noticias_pag;

                $limite_pag = "SELECT * FROM noticias ORDER BY DATA_PUB DESC";

                $total_registros = mysqli_query( $conn, "SELECT * FROM noticias");
                $total_registros = mysqli_num_rows($total_registros);

                $total_paginas = ceil($total_registros / $num_noticias_pag);
            
                $sql = mysqli_query($conn, $limite_pag); 
                                
                    if (mysqli_num_rows($sql) > 0) {
                        while ($row = mysqli_fetch_assoc($sql)) {
                                        
                            echo "<div class='blog-post'>
                            <div class='post-image'>
                                <img src='$row[LINK_IMG] alt='imagem relacionada a notícia'>
                            </div>
                            <div class='post-content'>
                                <div class='post-title'>
                                    <h1>$row[TITULO]</h1>
                                </div>
                                <div class='post-info'>
                                    <div class='post-info-single'>
                                        <i class='bi bi-calendar'></i>
                                        <span class='news-date'>$row[DATA_PUB]</span>
                                    </div>
                                    <div class='post-info-single'>
                                        <i class='bi bi-person-fill'></i>
                                        <span class='news-author'>$row[AUTOR]</span>
                                    </div>
                                </div>
                                <div class='post-subject'>
                                    <p>$row[RESUMO]</p>
                                </div>
                                <div class='post-options'>
                                    <span class='remove-post'>
                                        ".(@$_SESSION['admin'] == 1 ? "<a href='../ops/gerencia_noticias.php?id_noticia=". $row["ID_NOTICIA"] ."&operacao=apagar'>
                                            <i class='bi bi-trash3-fill'></i>
                                            EXCLUIR
                                    </a>" : "")."
                                    </span>
                                    <span class='edit-post'>
                                        ".(@$_SESSION['admin'] == 1 ? "<a href='../admin_pages/edit_news.php?id_noticia=$row[ID_NOTICIA]'>
                                            <i class='bi bi-pencil-fill'></i>
                                            EDITAR
                                        </a>" : "")."
                                    </span>
                                    <span class='read-more-link'><a href='./noticia.php?id_noticia=". $row['ID_NOTICIA'] ."'>+ LEIA MAIS</a></span>
                                </div>
                            </div>
                        </div>";
                    }
                }
            ?>
        </div>
        <div class="paginacao">
            <?php
            // PAGINAÇÃO

                // vamos criar a visualização

                // agora vamos criar os botões "Anterior e próximo"

                // PRIMEIRA PAGINA 
                echo '<div class="botao_paginacao"><a href="?pagina=1">1</a></div>';

                // LOOP FOR PARA LINKS PRÉ PAGINA ATUAL
                if ($pagina > 1) {
                    for($i = $pagina - $links_pag; $i < $pagina; $i++) {
                        if ($i > 1) {
                            echo '<div class="botao_paginacao"><a href="?pagina='.$i.'">'.$i.'</a></div>';
                        }
                    }
                }

                // PAGINA INTERMEDIARIA
                if ($pagina != 1 && $pagina != $total_paginas) {
                    echo '<div class="botao_paginacao"><a href="?pagina='.$pagina.'">'.$pagina.'</a></div>';
                }

                // LOOP FOR PARA LINKS PÓS PAGINA ATUAL
                for ($i = $pagina + 1; $i < $pagina + $links_pag + 1; $i++) {
                    if ($i < $total_paginas) {
                        echo '<div class="botao_paginacao"><a href="?pagina='.$i.'">'.$i.'</a></div>';
                    }
                }

                // ULTIMA PAGINA 
                if ($total_paginas > 1) {
                    echo '<div class="botao_paginacao"><a href="?pagina='.$total_paginas.'">'.$total_paginas.'</a></div>';
                }
            ?>
        </div>
        <!-- FIM DO CONTAINER -->
    </main>

    <!-- FOOTER -->

    <?php
    include_once '../assets/components/footer.php';
    ?>       

</body>

</html>
