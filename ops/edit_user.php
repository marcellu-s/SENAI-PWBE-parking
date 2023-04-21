<?php

    require "../ops/db.php";

    $id = $_POST['id'];
    $email = $_POST['email'];
    $role = intval($_POST['role']);

    $sql = mysqli_query($conn, "UPDATE usuarios SET EMAIL = '$email', ADMINISTRADOR = '$role' WHERE ID = '$id'");

    header('Location: ../admin_pages/usuarios.php');

?>