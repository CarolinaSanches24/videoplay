<?php

require __DIR__ . '/src/infra/ConnectionDB.php';
$pdo = ConnectionDB::connect($host,$db,$user,$password);

$sql = "SELECT * FROM videos;";
$videoList= $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/estilos.css">
    <link rel="stylesheet" href="./css/flexbox.css">
    <title>AluraPlay</title>
    <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
</head>

<body>

    <header>

        <nav class="cabecalho">
            <a class="logo" href="./index.php"></a>

            <div class="cabecalho__icones">
                <a href="./pages/enviar-video.php" class="cabecalho__videos"></a>
                <a href="./pages/login.html" class="cabecalho__sair">Sair</a>
            </div>
        </nav>

    </header>
     <!-- Verifica se existe uma mensagem na URL -->
     <?php echo "teste". $_GET['success'];?>
        <?php if (isset($_GET['success'])): ?>
            
            <div id="mensagem" class="mensagem">
                <?php if ($_GET['success'] == 0): ?>
                    <p class="mensagem mensagem--sucesso">Vídeo enviado com sucesso!</p>
                <?php elseif ($_GET['success'] == 1): ?>
                    <p class="mensagem mensagem--erro">Erro ao enviar o vídeo. Tente novamente.</p>
                <?php endif; ?>
            </div>
        <?php endif; ?>

    <ul class="videos__container" alt="videos alura">
        <?php foreach ($videoList as $video): ?>
            <?php if (str_starts_with($video['url'], 'http')): ?>
                <li class="videos__item">
                    <iframe width="100%" height="72%" src="<?php echo $video['url']; ?>"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                    <div class="descricao-video">
                        <img src="./img/logo.png" alt="logo canal alura">
                        <h3><?php echo $video['title']; ?></h3>
                        <div class="acoes-video">
                            <a href="./pages/enviar-video.html">Editar</a>
                            <a href="./pages/enviar-video.html">Excluir</a>
                        </div>
                    </div>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
    <script>
    // Espera 5 segundos e depois remove a mensagem
    setTimeout(() => {
        const mensagem = document.getElementById('mensagem');
        if (mensagem) {
            mensagem.style.transition = 'opacity 0.5s ease'; // Animação de fade-out
            mensagem.style.opacity = '0'; // Define a opacidade para 0 (invisível)
            // Remove o elemento do DOM após a animação
            setTimeout(() => mensagem.remove(), 400); // 500ms corresponde ao tempo da transição
        }
    }, 2000); // 2000ms = 2 segundos
</script>
</body>

</html>