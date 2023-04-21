<?php

    require "../ops/db.php";

    $id = $_GET['id'];

    $sql = mysqli_query($conn, "SELECT * FROM usuarios WHERE id = '$id'");

    $user = mysqli_fetch_assoc($sql);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/img/icons/favicon.ico" type="image/x-icon">
    <title>Editar usuário - Swift Parking</title>
    <script src="../assets/js/voltar.js" defer></script>
    <style>
        form {
            margin-top: 3rem;
        }

        .input-control {
            margin-bottom: 1rem;
        }

        input {
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <button onclick="voltar()">Voltar</button>
    <form action="../ops/edit_user.php" method="POST">
        <input type="hidden" name="id" value="<?php echo($user['ID']) ?>">
        <div class="input-control">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" value="<?php echo($user['EMAIL']) ?>" required>
        </div>
        <div class="input-control">
            <label for="role">Função</label>
            <select name="role" id="role" required>
                <option value="" selected disabled><?php echo($user['ADMINISTRADOR'] == 1 ? 'admin' : 'funcionário') ?></option>
                <option value="0">Funcionário</option>
                <option value="1">Administrador</option>
            </select>
        </div>
        <input type="submit" value="Editar">
    </form>
</body>
</html>