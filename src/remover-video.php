<?php
require __DIR__ . '/infra/ConnectionDB.php';

$pdo = ConnectionDB::connect($host, $db, $user, $password);

$id = $_GET['id'];

$sql = 'DELETE FROM videos WHERE id = ?';
$stm = $pdo->prepare($sql);
$stm->bindValue(1, $id);

if ($stm->execute()) {
    header('Location: /index.php?message=success_delete');
} else {
    header('Location: /index.php?message=error_delete');
}
exit;
