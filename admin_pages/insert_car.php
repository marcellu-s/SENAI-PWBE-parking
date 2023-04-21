<?php
    session_start();
    require_once "../ops/db.php";

    if (!(isset($_SESSION['admin']))) {
        header('Location: ../index.php');
    }

    if(isset($_SESSION['msg_register'])) { 
        echo $_SESSION['msg_register'];  
        unset($_SESSION['msg_register']);
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/img/icons/favicon.ico" type="image/x-icon">
    <title>Estacionar - Swift Parking</title>
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- BOOTSTRAP ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/admin_main/insert_news.css">

    <style>

        .container-insert-news {
            width: 500px;
        }

        .input-control input {
            font-size: 1rem;
        }

    </style>
</head>
<body>
    
    <header>
        <div class="navbar">
            <i class="bi bi-arrow-return-left" onclick="voltar()"></i>
            <span>Voltar - Painel de controle</span>
        </div>
    </header>
    <main>

    <?php

    if (@$_SESSION['admin'] == 1 || @$_SESSION['admin'] == 0) {

        date_default_timezone_set('America/Sao_paulo');

        $date = date('H:i');

        // <--------------------------------------------------------------------------->
        // QUERY - Saber as vagas restantes

        $query = "SELECT COUNT(ID) AS estacionados_agora FROM carros WHERE SAIDA IS NULL AND DATE(ENTRADA) = '". date('Y-m-d'). "'";

        $result = mysqli_query($conn, $query);
        // RESULT QUERY ESTACIONADOS NO DADO MOMENTO

        $estacionados_agora = mysqli_fetch_assoc($result);
        $relatorio['vagas_resntantes'] = 200 - $estacionados_agora['estacionados_agora'];

        echo 
        "<div class='container-insert-news'>
            <form method='POST' action='..\ops\gerencia_carros.php?op=entrada-personalizada'>
                <input type='hidden' name='operacao' value='insercao'>
                <input type='hidden' name='vagas_restantes' value='$relatorio[vagas_resntantes]'>

                <div class='input-control'>
                    <label for='client-name'>Nome do cliente</label>
                    <input type='text' name='client-name' placeholder='Nome do clinte' required>
                </div>

                <div class='input-control'>
                    <label for='news-title'>Placa do veículo</label>
                    <input type='text' pattern='^[a-zA-Z]{3}[-]?\d[a-zA-Z0-9]\d{2}$' required id='placa' name='placa' placeholder='Placa do veículo'>
                </div>
                <div class='input-control'>
                    <label for='news-author'>Hora de entrada</label>
                    <input type='time' name='tempo' name='hora' min='10:00' max='23:50' value='$date' required>
                </div>
                <div class='btn-submit'>
                    <button type='submit'>Enviar</button>
                </div>
            </form>
        </div>";
    }
    else 
    {
        echo "Você não tem permissão para estar aqui";
    }

    ?>
    </main>

    <script src="..\assets\js\voltar.js"></script>
</body>
</html>