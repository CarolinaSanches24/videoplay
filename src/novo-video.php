<?php

require __DIR__ . '/infra/ConnectionDB.php';

$pdo = ConnectionDB::connect($host, $db, $user, $password);

$url = $_POST['url'];
$title = $_POST['title'];

if (filter_var($url, FILTER_VALIDATE_URL) && (str_starts_with($url, 'http://') || str_starts_with($url, 'https://'))) {
    $sql = "INSERT INTO videos (url, title) VALUES (?,?)";

    $stm = $pdo->prepare($sql);
    $stm->bindValue(1, $url);
    $stm->bindValue(2, $title);

    if ($stm->execute()) {
        header('Location: /index.php?success=0');
        exit;
    } else {
        header('Location: /index.php?success=1');
        exit;
    }
} else {
    header('Location: /index.php?error=invalid_url');
    exit;
}