<?php

    session_start();

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/img/icons/favicon.ico" type="image/x-icon">
    <title>Inserir notícia - Swift Parking</title>
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
    <script src="..\assets\js\voltar.js" defer></script>
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

    if (@$_SESSION['admin'] == 1) {
        echo 
        '<div class="container-insert-news">
            <form method="post" action="..\ops\gerencia_noticias.php?operacao=postagem">
                <input type="hidden" name="operacao" value="postagem">

                <div class="input-control">
                    <label for="news-title">Título da notícia</label>
                    <input type="text" name="news-title" maxlength="80" id="news-title" placeholder="Insira o título da notícia" required>
                </div>
                <div class="input-control">
                    <label for="news-author">Autor</label>
                    <input type="text" name="news-author" maxlength="50" id="news-author" placeholder="Insira o autor da notícia" required>
                </div>
                <div class="input-control">
                    <label for="news-img">Imagem</label>
                    <input type="text" name="news-img" maxlength="300" id="news-img" placeholder="Insira o link da imagem" required>
                </div>
                <div class="input-control">
                    <label for="news-summary">Resumo</label>
                    <textarea name="news-summary" maxlength="300" id="news-summary" cols="30" rows="10" placeholder="Insira um resumo da notícia" required></textarea>
                </div>
                <div class="input-control">
                    <label for="">Noticia</label>
                    <textarea name="news" id="news" cols="30" rows="10" placeholder="Insira a notícia" required></textarea>
                </div>
                <div class="btn-submit">
                    <button type="submit">Enviar</button>
                </div>
            </form>
        </div>';
    }
    else 
    {
        echo "Você não tem permissão para postar uma notícia. Logue primeiro como administrador.";
    }

    ?>
    </main>
</body>
</html>