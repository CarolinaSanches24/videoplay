<?php

require __DIR__ . '/src/infra/ConnectionDB.php';
$pdo = ConnectionDB::connect($host, $db, $user, $password);

$sql = "SELECT * FROM videos;";
$videoList = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

function displayMessage($key)
{
    $messages = [
        'success_add' => 'Vídeo enviado com sucesso!',
        'error_add' => 'Erro ao enviar o vídeo. Tente novamente.',
        'success_delete' => 'Vídeo excluído com sucesso!',
        'error_delete' => 'Erro ao excluir o vídeo.',
        'error_invalid_url' => 'URL inválida. Certifique-se de que começa com http:// ou https://.',
        'error_invalid_title' => 'Título do video inválido!',
        'error_edit' => 'Erro ao editar video',
        'success_edit' => 'Video editado com sucesso!',
    ];

    return $messages[$key] ?? '';
}

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
    <title>Anime Stream</title>
    <link rel="shortcut icon" href="./img/cabecalho/video_call.png" type="image/x-icon">
</head>

<body>

    <header>

        <nav class="cabecalho">
            <a href="/">
                <img src="/img/cabecalho/Logo.png" class="logo" alt="logo anime stream">
            </a>

            <div class="cabecalho__icones">
                <a href="/novo-video" class="cabecalho__videos"></a>
                <a href="./pages/login.html" class="cabecalho__sair"></a>
            </div>
        </nav>

    </header>

    <?php if (isset($_GET['message'])): ?>
        <div id="mensagem" class="mensagem">
            <p class="mensagem <?= str_contains($_GET['message'], 'error') ? 'mensagem--erro' : 'mensagem--sucesso'; ?>">
                <?= displayMessage($_GET['message']); ?>
            </p>
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
                        <img src="/img/cabecalho/Logo.png" alt="logo canal alura">
                        <h3><?php echo $video['title']; ?></h3>
                        <div class="acoes-video">
                            <a href="/editar-video?id=<?= $video['id']; ?>">Editar</a>
                            <a href="/remover-video?id=<?= $video['id']; ?>">Excluir</a>
                        </div>
                    </div>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
    <script>
        setTimeout(() => {
            const mensagem = document.getElementById('mensagem');
            if (mensagem) {
                mensagem.style.transition = 'opacity 0.5s ease'; // Animação de fade-out
                mensagem.style.opacity = '0';
                // Remove o elemento do DOM após a animação
                setTimeout(() => mensagem.remove(), 400); // 500ms corresponde ao tempo da transição
            }
        }, 2000); // 2000ms = 2 segundos
    </script>
</body>

</html>