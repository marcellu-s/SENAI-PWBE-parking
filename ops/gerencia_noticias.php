<?php

include_once('db.php');

date_default_timezone_set('America/Sao_paulo');

$operacao = $_GET['operacao'];

if ($operacao == 'postagem') {

    $link_img = $_POST['news-img']; 
    $titulo = $_POST['news-title'];
    $resumo = $_POST['news-summary'];
    $noticia = $_POST['news'];
    $autor = $_POST['news-author'];

    $sql_query = "INSERT INTO noticias (LINK_IMG, TITULO, RESUMO, NOTICIA, AUTOR, DATA_PUB)
    VALUES ('$link_img', '$titulo', '$resumo', '$noticia', '$autor', CURDATE())";

    $result_query = mysqli_query($conn, $sql_query);

    
    header("location: ../pages/blog.php");
}

elseif ($operacao == 'editar') {

    $id_noticia = $_POST['id_noticia'];
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $link_img = $_POST['news-img']; 
    $resumo = $_POST['news-summary'];
    $noticia = $_POST['news'];
    $data_pub = $_POST['data_pub'];

    $sql_query = "UPDATE noticias 
    SET LINK_IMG = '$link_img', TITULO = '$titulo', RESUMO = '$resumo', DATA_EDIT = CURDATE() 
    WHERE ID_NOTICIA = '$id_noticia'";

    $result_query = mysqli_query($conn, $sql_query);
    
    header("location: ../pages/blog.php");

}

elseif ($operacao == 'apagar') {

    $id_noticia = $_GET['id_noticia'];

    $sql_query = "DELETE FROM noticias WHERE ID_NOTICIA = $id_noticia";
    $result_query = mysqli_query($conn, $sql_query);

    header("location: ../pages/blog.php");
}
