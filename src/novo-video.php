<?php

require __DIR__ . '/infra/ConnectionDB.php';

$pdo = ConnectionDB::connect($host, $db, $user, $password);

$sql = "INSERT INTO videos (url, title) VALUES (?,?)";

$stm = $pdo->prepare($sql);
$stm->bindValue(1,$_POST['url']);
$stm->bindValue(2,$_POST['title']);

if ($stm->execute()) {
    header('Location: /index.php?success=0');
    exit;
} else {
    header('Location: /index.php?success=1');
    exit;
}
