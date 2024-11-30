<?php

declare(strict_types=1);

// Exibe o método HTTP usado (GET, POST, etc.)
echo 'Método: ' . $_SERVER['REQUEST_METHOD'] . '<br>';

// Exibe o caminho do script sendo acessado
echo 'Caminho: ' . $_SERVER['REQUEST_URI'] . '<br>';

if (array_key_exists('REQUEST_URI', $_SERVER)||$_SERVER['REQUEST_URI'] === '/') {
    require_once 'listagem-videos.php';
} elseif ($_SERVER['REQUEST_URI'] === '/novo-video') {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        require_once 'formulario.php';
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once 'novo-video.php';
    }
} elseif (explode('?', $_SERVER['REQUEST_URI'])[0]  === '/editar-video') {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        require_once 'formulario.php';
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once 'editar-video.php';
    }
} elseif ($_SERVER['REQUEST_URI'] === '/remover-video') {
    require_once 'remover-video.php';
}