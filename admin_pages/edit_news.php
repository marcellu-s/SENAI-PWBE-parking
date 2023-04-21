<?php

    session_start();
    include_once "../ops/db.php";
    
    if (isset($_GET['id_noticia'])) {
        $id_noticia = $_GET['id_noticia'];
    }

    $query_noticia = "SELECT * FROM noticias WHERE ID_NOTICIA = $id_noticia";
    $result = mysqli_query($conn, $query_noticia);

    $noticia = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/img/icons/favicon.ico" type="image/x-icon">
    <title>Editar notícia - Swift Parking</title>
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
</head>
<body>
    
    <header>
        <div class="navbar">
            <i class="bi bi-arrow-return-left" onclick="voltar()"></i>
            <span>Voltar - Blog</span>
        </div>
    </header>

    <script src="..\assets\js\voltar.js"></script>

    <main>

    <?php

    if (@$_SESSION['admin'] == 1) {
        echo 
        '<div class="container-insert-news">
            <form method="post" action="..\ops\gerencia_noticias.php?operacao=editar">
                <input type="hidden" name="id_noticia" value="'. $noticia['ID_NOTICIA'] .'">

                <input type="hidden" name="titulo" value="'. $noticia['TITULO'] .'</">
                <input type="hidden" name="autor" value="'. $noticia['AUTOR'] .'">   
                
                <input type="hidden" name="data_pub" value="'. $noticia['DATA_PUB'] .'">   

                <div class="input-control">
                    <label for="news-title">Título da notícia</label>
                    <p>'. $noticia['TITULO'] .'</p>
                </div>
                <div class="input-control">
                    <label for="news-author">Autor</label>
                    <p>'. $noticia['AUTOR'] .'</p>
                </div>
                <div class="input-control">
                    <label for="news-img">Imagem</label>
                    <input type="text" name="news-img" value="'. $noticia['LINK_IMG'] .'" maxlength="300" id="news-img" placeholder="Insira o link da imagem" required>
                </div>
                <div class="input-control">
                    <label for="news-summary">Resumo</label>
                    <textarea name="news-summary" maxlength="300" id="news-summary" cols="30" rows="10" placeholder="Insira um resumo da notícia" required>'. $noticia['RESUMO'] .'</textarea>
                </div>
                <div class="input-control">
                    <label for="news">Noticia</label>
                    <textarea name="news" id="news" cols="30" rows="10" placeholder="Insira a notícia" required>'. $noticia['NOTICIA'] .'</textarea>
                </div>
                <div class="btn-submit">
                    <button type="submit">Enviar</button>
                </div>
            </form>
        </div>';
    }
    else 
    {
        echo "Você não tem permissão para editar uma notícia. Logue primeiro como administrador.";
    }

    ?>
    </main>
</body>
</html>
