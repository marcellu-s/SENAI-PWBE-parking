<?php

session_start();

require_once "../ops/db.php";

$operacao = $_GET['op'];

if ($operacao == "deslogar") {

    unset($_SESSION['admin']);

    header('Location: ../index.php');

} elseif ($operacao == "logar"){

    $email = $_POST['email'];
    $senha = sha1($_POST['senha']); //sha1

    $sql = mysqli_query($conn, "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'");
    $row = mysqli_fetch_assoc($sql);

    if (mysqli_num_rows($sql) == 1) {

            $_SESSION['admin'] = $row['ADMINISTRADOR'];
            $_SESSION['user'] = $row['USER_NOME'];
            header('Location: ../admin_pages/control_panel.php');
        }
        else {
            $_SESSION['msg'] = "<script>window.alert('Login incorreto')</script>";
            header('Location: ../admin_pages/login.php');
        }
} elseif ($operacao == 'criar') {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = sha1($_POST['senha']);
    $role = $_POST['posicao'];

    $sql = mysqli_query($conn, "SELECT email FROM usuarios WHERE email = '$email'");

    if (mysqli_num_rows($sql) >= 1) {

        $_SESSION['msg'] = "<script>window.alert('E-mail em uso - Tente outro')</script>";
        header('Location: ../admin_pages/criar_user.php');
    } else {

        $sql = mysqli_query($conn, "INSERT INTO usuarios(USER_NOME, EMAIL, SENHA, ADMINISTRADOR) VALUES ('$name', '$email', '$password', '$role')");
        header('Location: ../admin_pages/control_panel.php');
    }
}
