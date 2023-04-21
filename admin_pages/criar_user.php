<?php

    session_start();
    
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/img/icons/favicon.ico" type="image/x-icon">
    <title>Criar usuário - Swift Parking</title>
    <!-- TAILWIND -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- BOOTSTRAP ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap"rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/admin_main/login.css">
    <link rel="stylesheet" href="../assets/css/admin_main/login_media.css">
    <script src="../assets/js/voltar.js"></script>
</head>
<body>

    <?php

    if ($_SESSION['admin'] == 1) {

        echo 
        '<header>
            <div class="navbar-control">
                <i class="bi bi-arrow-return-left" onclick="voltar()"></i>
                <span>Voltar - Painel de controle</span>
            </div>
        </header>
        
        <div id="login">

        <form class="card" method="POST" action="..\ops\op_login.php?op=criar">

            <div class="card-header">

                <img class="logo" src="../assets/img/icons/logo_swift_parking.png" alt="">

                <h1 class="gradient">Login</h1>
            </div>

            <div class="card-content">

                <div class="card-content-area">

                    <label for="name">Nome</label>

                    <input type="text" name="name" maxlength="100" placeholder="Nome" required>

                </div>

                <div class="card-content-area">

                    <label for="email">E-mail</label>

                    <input type="email" name="email" maxlength="80" placeholder="E-mail" required>

                </div>

                <div class="card-content-area">

                    <label for="password">Senha</label>

                    <input type="password" name="senha" maxlength="50" placeholder="Senha" required>

                </div>

                <div class="card-content-area">

                    <label for="password">Posição</label>

                    <select name="posicao" id="">
                        <option value="0">Funcionário</option>
                        <option value="1">Administrador</option>
                    </select>

                </div>

            </div>

            <div class="card-footer">
                <input type="submit" value="Entrar" class="submit">
            </div>

        </form>

    </div>';

    } else {
        echo "Você não tem permissão pra criar um login. Entre como administrador.";
    }
?>
</body>