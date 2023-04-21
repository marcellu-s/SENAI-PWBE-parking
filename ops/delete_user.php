<?php

    require "../ops/db.php";

    $id = $_GET['id'];

    $sql = mysqli_query($conn, "DELETE FROM usuarios WHERE ID = '$id'");

    header("Location: ../admin_pages/usuarios.php");

?>