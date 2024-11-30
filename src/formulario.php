<?php

require __DIR__ . '/infra/ConnectionDB.php';
$pdo = ConnectionDB::connect($host, $db, $user, $password);

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

$video = [
    'url' => '',
    'title' => '',
];

if ($id !== false) {
    $sql = "SELECT * FROM videos WHERE id = ?;";
    $stm = $pdo->prepare($sql);
    $stm->bindValue(1, $id, PDO::PARAM_INT);
    $stm->execute();
    $video = $stm->fetch(PDO::FETCH_ASSOC);
}

?>

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
                <a href="./enviar-video.php" class="cabecalho__videos"></a>
                <a href="../pages/login.html" class="cabecalho__sair">Sair</a>
            </div>
        </nav>
    </header>

    <main class="container">
        <form class="container__formulario">
            <h2 class="formulario__titulo">Envie um vídeo!</h2>
            <div class="formulario__campo">
                <label class="campo__etiqueta" for="url">Link embed</label>
                <input name="url"
                    value="<?= $video['url']; ?>"
                    class="campo__escrita"
                    required
                    placeholder="Por exemplo: https://www.youtube.com/embed/FAY1K2aUg5g"
                    id='url' />
            </div>

            <div class="formulario__campo">
                <label class="campo__etiqueta" for="titulo">Titulo do vídeo</label>
                <input name="title"
                    value="<?= $video['title']; ?>"
                    class="campo__escrita"
                    required
                    placeholder="Neste campo, dê o nome do vídeo"
                    id='titulo' />
            </div>

            <input class="formulario__botao" type="submit" value="Enviar" />
        </form>
    </main>
    <script>
        document.querySelector('form').addEventListener('submit', function(event) {
            const urlInput = document.getElementById('url').value;
            const urlPattern = /^https?:\/\/.+/;

            if (!urlPattern.test(urlInput)) {
                event.preventDefault();
                alert('Por favor, insira uma URL válida com http:// ou https://');
            }
        });
    </script>
</body>

</html>