<?php

    require '../ops/db.php';

    $id_cli = $_GET['id_cli'];

    $sql = mysqli_query($conn, "SELECT * FROM carros WHERE ID = '$id_cli'");

    $user = mysqli_fetch_assoc($sql);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/img/icons/favicon.ico" type="image/x-icon">
    <title>Detalhes do cliente - Swift Parking</title>
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/admin_main/customer_details.css">
</head>
<body>
    <div class="container">
        <header>
            <a href="./control_panel.php?info_select=now">Voltar</a>
        </header>
        <main>
            <div class="customer-details">
                <div class="text">
                    <p>Nome do cliente</p>
                    <span><?php echo($user['CLI_NOME']); ?></span>
                </div>
                <div class="text">
                    <p>Placa do veículo</p>
                    <span><?php echo($user['PLACA']); ?></span>
                </div>
                <div class="text">
                    <p>Horário de entrada</p>
                    <span><?php echo($user['ENTRADA']); ?></span>
                </div>
                <div class="text">
                    <p>Horário de saída</p>
                    <span><?php echo($user['SAIDA'] == '' ? 'Sem registro' : $user['SAIDA']); ?></span>
                </div>
                <div class="text">
                    <p>Tempo de uso</p>
                    <span><?php echo($user['TOTAL'] == '' ? 'Sem registro' : $user['TOTAL']); ?></span>
                </div>
                <div class="text">
                    <p>Valor pago</p>
                    <span class="coin"><?php echo($user['VALOR'] == '' ? 'Sem registro' : $user['VALOR']); ?></span>
                </div>
            </div>
        </main>
    </div>
</body>
</html>