<?php

declare(strict_types=1);

if (!array_key_exists('REQUEST_URI', $_SERVER) || $_SERVER['REQUEST_URI'] === '/') {
    require_once 'listagem-videos.php';

}elseif ($_SERVER['REQUEST_URI'] === '/novo-video') {
    
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        require_once __DIR__ .'/src/formulario.php';

    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

        require_once 'novo-video.php';
    }
}  elseif (explode('?', $_SERVER['REQUEST_URI'])[0] === '/editar-video') {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        require_once __DIR__ .'/src/formulario.php';

    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

        require_once 'editar-video.php';
    }
};
