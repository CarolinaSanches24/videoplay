<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/estilos-form.css">
    <link rel="stylesheet" href="../css/flexbox.css">
    <title>AluraPlay</title>
    <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
</head>

<body>
    <!-- Cabecalho -->
    <header>
        <nav class="cabecalho">
            <a class="logo" href="../index.html"></a>
            <div class="cabecalho__icones">
                <a href="./enviar-video.html" class="cabecalho__videos"></a>
                <a href="../pages/login.html" class="cabecalho__sair">Sair</a>
            </div>
        </nav>
    </header>

    <main class="container">
        <!-- Verifica se existe uma mensagem na URL -->
        <?php if (isset($_GET['success'])): ?>
            <div class="mensagem">
                <?php if ($_GET['success'] == 0): ?>
                    <p class="mensagem mensagem--sucesso">Vídeo enviado com sucesso!</p>
                <?php elseif ($_GET['success'] == 1): ?>
                    <p class="mensagem mensagem--erro">Erro ao enviar o vídeo. Tente novamente.</p>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <form class="container__formulario" action="/src/novo-video.php" method="post">
            <h2 class="formulario__titulo">Envie um vídeo!</h2>
            <div class="formulario__campo">
                <label class="campo__etiqueta" for="url">Link embed</label>
                <input name="url" class="campo__escrita" required
                    placeholder="Por exemplo: https://www.youtube.com/embed/FAY1K2aUg5g" id='url' />
            </div>

            <div class="formulario__campo">
                <label class="campo__etiqueta" for="titulo">Titulo do vídeo</label>
                <input name="title" class="campo__escrita" required placeholder="Neste campo, dê o nome do vídeo"
                    id='titulo' />
            </div>

            <input class="formulario__botao" type="submit" value="Enviar" />
        </form>
    </main>
</body>

</html>