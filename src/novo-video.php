<?php

require __DIR__ . '/infra/ConnectionDB.php';

$pdo = ConnectionDB::connect($host, $db, $user, $password);

$url = filter_input(INPUT_POST,'url', FILTER_VALIDATE_URL);
$title = filter_input(INPUT_POST,'title');

if(empty($title)){
    header('Location: /index.php?message=error_invalid_title');
    exit;
}

if($url && str_starts_with($url, 'http://') || str_starts_with($url, 'https://')){
    $sql = "INSERT INTO videos (url, title) VALUES (?,?)";

    $stm = $pdo->prepare($sql);
    $stm->bindValue(1, $url);
    $stm->bindValue(2, $title);

    if ($stm->execute()) {
        header('Location: /index.php?message=success_add');
    } else {
        header('Location: /index.php?message=erro_add');
    }
}else {
    header('Location: /index.php?message=error_invalid_url');
    exit;
}