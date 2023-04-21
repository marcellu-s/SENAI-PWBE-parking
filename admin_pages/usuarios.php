<?php

  session_start();

  require '../ops/db.php';

  if ($_SESSION['admin'] == 1) {

    $sql = mysqli_query($conn, "SELECT * FROM usuarios");
  } else {
    $sql = mysqli_query($conn, "SELECT * FROM usuarios WHERE ADMINISTRADOR = '0'");
  }

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../assets/img/icons/favicon.ico" type="image/x-icon">
  <title>Lista de usuários - Swift Parking</title>
  <!-- BOOTSTRAP ICONS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <!-- GOOGLE FONTS -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
  <!-- CSS -->
  <link rel="stylesheet" href="../assets/css/admin_main/usuarios.css">
  <script src="..\assets\js\voltar.js" defer></script>
</head>
<body>
  <div class="container">
    <header>
      <div class="navbar">
          <i class="bi bi-arrow-return-left" onclick="voltar()"></i>
          <span>Voltar - Painel de controle</span>
      </div>
    </header>

    <main>
      <div class='users'>
        <?php 
        
          while ($rows = mysqli_fetch_array($sql)) {
            
            echo "<div class='user'>
                    <div class='user-info'>
                    <span class='name'>NOME: $rows[USER_NOME]</span>
                    <span class='email'>E-MAIL: $rows[EMAIL]</span>";
            echo($rows['ADMINISTRADOR'] == 1 ? "<span class='role'>Função: Administrador</span>" : "<span class='role'>Função: Funcionário</span>");
            echo("</div>");

            if ($_SESSION['admin'] == '1') {

              echo "<div class='tools'>";

              echo "<div class='admin-tool edit'><a href='./edit_user.php?id=$rows[ID]'>EDITAR</a><i class='bi bi-pencil-fill'></i></div>";

              echo($rows['ADMINISTRADOR'] == 1 ? "" : "<div class='admin-tool remove'><a href='../ops/delete_user.php?id=$rows[ID]'>REMOVER</a><i class='bi bi-person-x-fill'></i></div>");

              echo "</div></div>";
            }
          }
      
        ?>
      </div>
    </main>
  </div>
</body>
</html>