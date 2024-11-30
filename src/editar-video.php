<?php

require __DIR__ . '/infra/ConnectionDB.php';

$pdo = ConnectionDB::connect($host, $db, $user, $password);

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
$title = filter_input(INPUT_POST, 'title');

if ($id === false) {
    header('Location: /?message=error_edit');
    exit();
}

if (empty($title)) {
    header('Location: /?message=error_invalid_title');
    exit();
}

if ($url && str_starts_with($url, 'http://') || str_starts_with($url, 'https://')) {

    $sql = 'UPDATE videos SET url = :url, title = :title WHERE id = :id;';
    $stm = $pdo->prepare($sql);
    $stm->bindValue(':url', $url);
    $stm->bindValue(':title', $title);
    $stm->bindValue(':id', $id, PDO::PARAM_INT);

    if ($stm->execute()) {
        header('Location: /?message=success_edit');
    } else {
        header('Location: /?message=error_edit');
    }
}else {
    header('Location: /?message=error_invalid_url');
    exit();
}
