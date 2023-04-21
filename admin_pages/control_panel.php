<?php
    session_start();
    require_once "../ops/db.php";

    if (!(isset($_SESSION['admin']))) {
        header('Location: ../index.php');
    }

    date_default_timezone_set('America/Sao_paulo');

    if (isset($_POST['data_report'])) {
        $data_report = $_POST['data_report'];
    } else {
        $data_report = date('Y-m-d');
    }

    // QUERIES DO RELATÓRIO

    // <--------------------------------------------------------------------------->
    // QUERY 1 - Soma da receita do dia (lucro do dia)

    $result = mysqli_query($conn, "SELECT SUM(VALOR) AS receita_do_dia FROM carros WHERE SAIDA IS NOT NULL AND DATE(ENTRADA) = '$data_report'");

    $assoc = mysqli_fetch_assoc($result);

    $relatorio['receita_do_dia'] = $assoc['receita_do_dia'];

    // <--------------------------------------------------------------------------->
    // QUERY 2 - quantidade de carros atendidos no dia

    $result = mysqli_query($conn, "SELECT COUNT(ID) AS qnta_estacionados_no_dia FROM carros WHERE DATE(ENTRADA) = '$data_report'");

    $assoc = mysqli_fetch_assoc($result);

    $relatorio['qnta_estacionados_no_dia'] = $assoc['qnta_estacionados_no_dia'];

    // <--------------------------------------------------------------------------->
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/img/icons/favicon.ico" type="image/x-icon">
    <title>Painel de controle - Swift Parking</title>
    <!-- BOOTSTRAP ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <!-- TAILWIND -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/admin_main/control_panel.css">
    <link rel="stylesheet" href="../assets/css/admin_main/modal.css">
    <!-- SCRIPT -->
    <script src="../assets/js/mobileMenu.js" defer></script>
    <script src="../assets/js/modal_relatorio.js" defer></script>
</head>
<body>
    <!-- HEADER -->
    <header class="bg-white">
        <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
            <div class="flex lg:flex-1">
                <a href="#" class="-m-1.5 p-1.5">
                    <span class="sr-only">Painel de controle</span>
                    <img class="h-10 w-auto" src="../assets/img/icons/logo_swift_parking.png" alt="">
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
                <a href="../index.php" class="text-sm font-semibold leading-6 text-gray-900">Início</a>
                <a href="../pages/institucional.php" class="text-sm font-semibold leading-6 text-gray-900">Institucional</a>
                <a href="../pages/blog.php" class="text-sm font-semibold leading-6 text-gray-900">Blog</a>
                <a href="../pages/localizacao.php" class="text-sm font-semibold leading-6 text-gray-900">Encontre-nos</a>
                <a href="../pages/contato.php" class="text-sm font-semibold leading-6 text-gray-900">Contato</a>
            </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                <a href="../ops/op_login.php?op=deslogar" class="text-sm font-semibold leading-6 text-gray-900">Deslogar<span aria-hidden="true">&rarr;</span></a>
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
                        <img class="h-10 w-auto" src="../assets/img/icons/logo_swift_parking.png" alt="">
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
                            <a href="../pages/institucional.php" class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Institucional</a>
                            <a href="../pages/blog.php" class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Blog</a>
                            <a href="../pages/localizacao.php" class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Encontre-nos</a>
                            <a href="../pages/contato.php" class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Contato</a>
                        </div>
                        <div class="py-6">
                            <a href="../ops/op_login.php?op=deslogar" class="-mx-3 block rounded-lg py-2.5 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Deslogar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- MAIN -->

    <main>
        <section class="operations">
            <div class="operations-content">
                <h2>
                    Painel de controle - 
                    <span>
                        <?php
                            if ($_SESSION['admin'] == 1) {
                                echo('Administrador');
                            } else {
                                echo('Funcionário');
                            }
                            // <--------------------------------------------------------------------------->
                            // QUERY - Saber as vagas restantes

                            $query = "SELECT COUNT(ID) AS estacionados_agora FROM carros WHERE SAIDA IS NULL AND DATE(ENTRADA) = '". date('Y-m-d'). "'";

                            $result = mysqli_query($conn, $query);
                            // RESULT QUERY ESTACIONADOS NO DADO MOMENTO

                            $estacionados_agora = mysqli_fetch_assoc($result);
                            $relatorio['vagas_resntantes'] = 200 - $estacionados_agora['estacionados_agora'];
                        ?>
                    </span>
                </h2>
                <span id="user-in-command">Olá, <?php echo($_SESSION['user']); ?></span>
                <span id="remaining-vacancies">Vagas restantes: <?php echo($relatorio['vagas_resntantes']); ?></span>
                <ul class="control-tools">
                    <li><a href="./insert_car.php">Estacionar</a></li>
                    <li><a href="./news_insert.php">Inserir notícia</a></li>
                    <?php
                        if (@$_SESSION['admin'] == 1) {
                            echo '<li><a href="./criar_user.php">Cadastrar funcionário</a></li>';
                        }
                    ?>
                    <li><a href="../ops/gerencia_carros.php?op=atualizacao">Atualizar</a></li>
                    <li id="open-modal-btn"><a href="#">Relatório</a></li>
                    <li><a href="./usuarios.php">Usuários</a></li>
                </ul>
            </div>
        </section>
        <div id="fade" class="hide"></div>
        <div id="modal" class="hide">
            <div class="modal-header">
                <form action="./control_panel.php" method="post">
                    <input type="date" name="data_report" id="report">
                    <input type="submit" value="Search">
                </form>
                <i class="bi bi-x-lg" id="close-modal"></i>
            </div>
            <div class="modal-body">
                <div class="content">
                    <span style="font-weight: 500; font-size: 1.2rem; display: block;">Receita do dia = R$ <?php echo($relatorio['receita_do_dia']); ?></span>
                    <span style="font-weight: 500; font-size: 1.2rem; display: block; margin: 1.5rem 0;">Carros atendidos = <?php echo($relatorio['qnta_estacionados_no_dia']); ?></span>
                </div>
            </div>
        </div>
        <section class="parked-cars">
            <form action="./control_panel.php" method="GET">
                <select name="info_select" id="">
                    <option value="" selected disabled>...</option>
                    <option value="now">Agora</option>
                    <option value="finalized">Finalizados</option>
                </select>
                <input type="submit" value="Pesquisar">
            </form>
            <?php
                @$pesquisa = $_GET['info_select'];
            ?>
            <div class="parked-cars-content">
                <?php
                    
                    if (@$pesquisa != null) 
                    {
                        
                        // Páginação
                        $pag_rows = 6; // Número de elementos permitidos
    
                        if (isset($_GET['page'])) {$pag_atual = $_GET['page'];} // Este condicional verifica em qual página você está.
                        else {$pag_atual = 1;} // Se nada for encontrado é porque temos apenas uma página por enquanto 
    
                        $offset = ($pag_atual - 1) * $pag_rows; // Anota o offset para fazer a query abaixo

                        $sql = mysqli_query($conn, "SELECT * FROM carros WHERE SAIDA IS NULL ORDER BY ENTRADA DESC LIMIT $pag_rows OFFSET $offset");
                        
                        if ($pesquisa == 'now')
                        {
                            
                            while ($row = mysqli_fetch_array($sql)) { // Este while gera a tabela

                                echo("
                                    <div class='card'>
                                        <div class='card-text'>
                                            <p>Cliente</p>
                                            <span>$row[CLI_NOME]</span>
                                        </div>
                                        <div class='card-text'>
                                            <p>Placa do veículo</p>
                                            <span>$row[PLACA]</span>
                                        </div>
                                        <div class='card-text'>
                                            <p>Horário de entrada</p>
                                            <span>$row[ENTRADA]</span>
                                        </div>
                                        <div class='more-details'>
                                            <a href='./customer_details.php?id_cli=$row[ID]' class='details' target='_blank'>Detalhes</a>
                                            <form id='form-$row[ID]' method='post' action='../ops/gerencia_carros.php?op=saida'>
                                                <input type='hidden' name='id_carro' value='$row[ID]'>
                                                <input type='hidden' name='data_entrada' value='$row[ENTRADA]'>
                                                <input type='time' name='horario_saida' name='hora' min='10:01' max='23:00' class='exit' required>
                                                <input type='submit' form ='form-" . $row['ID'] . "' name='enviar-saida' value='&#10003;'>
                                            </form>
                                        </div>
                                    </div>
                                ");
                            }
                            @$query = "SELECT COUNT(*) AS count FROM CARROS WHERE SAIDA IS NULL"; // Total de elementos na database [2]
                            @$result = mysqli_query($conn, $query); // Executando a query {2}
                            @$row = mysqli_fetch_assoc($result); // Nesta variável coloquei o resultado do fetch da tabela
                            @$total_rows = $row['count'];             
                            @$total_pag = ceil($total_rows / $pag_rows);
                        }elseif ($pesquisa == "finalized") {
                            
                            $query = "SELECT * FROM carros WHERE SAIDA IS NOT NULL ORDER BY ENTRADA DESC LIMIT $pag_rows OFFSET $offset"; // Query para pegar as informações no banco [1]

                            $receber = mysqli_query($conn, $query); // Executando a query {1} 
                        

                            while ($row = mysqli_fetch_array($receber)) { // Este while gera a tabela
    
                                echo("
                                    <div class='card'>
                                        <div class='card-text'>
                                            <p>Cliente</p>
                                            <span>$row[CLI_NOME]</span>
                                        </div>
                                        <div class='card-text'>
                                            <p>Placa do veículo</p>
                                            <span>$row[PLACA]</span>
                                        </div>
                                        <div class='card-text'>
                                            <p>Horário de saída</p>
                                            <span>$row[SAIDA]</span>
                                        </div>
                                        <div class='card-text'>
                                            <p>Valor pago</p>
                                            <span class='payment'>$row[VALOR]</span>
                                        </div>
                                        <div class='more-details'>
                                            <a href='./customer_details.php?id_cli=$row[ID]' class='details' target='_blank'>Detalhes</a>
                                        </div>
                                    </div>
                                ");
                            }
                            @$query = "SELECT COUNT(*) AS count FROM CARROS WHERE SAIDA IS NOT NULL"; // Total de elementos na database [2]
                            @$result = mysqli_query($conn, $query); // Executando a query {2}
                            @$row = mysqli_fetch_assoc($result); // Nesta variável coloquei o resultado do fetch da tabela
                            @$total_rows = $row['count']; 
                            @$total_pag = ceil($total_rows / $pag_rows);
                            
                        }


                    }
                    // elseif ($pesquisa == 'finalized')
                
                
                ?>
                <?php
            
                    if (!empty($total_pag) && $total_pag > 1) {
                        echo "<div class='pagination'>";
    
                        if ($pag_atual > 1) {
                            echo "<a href='?info_select=$pesquisa&page=" . ($pag_atual - 1) . "'&laquo; ></a>";
                        }
    
                        for ($i = 1; $i <= $total_pag; $i++) {
                            if ($i == $pag_atual) {
                                echo "<span class='current-page'>$i</span>";
                            } else {
                                echo "<a href='?info_select=$pesquisa&page=$i'>$i</a>";
                            }
                        }
    
                        if ($pag_atual < $total_pag) {
                            echo "<a href='?info_select=$pesquisa&page=" . ($pag_atual + 1) . "' &raquo;</a>";
                        }
    
                        echo "</div>";
                    }      

                ?>
            </div>
        </section>
    </main>
</body>
</html>