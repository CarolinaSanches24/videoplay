<?php

require __DIR__ . '/infra/ConnectionDB.php';

$pdo = ConnectionDB::connect($host, $db, $user, $password);

$sql = "INSERT INTO videos (url, title) VALUES (?,?)";

$stm = $pdo->prepare($sql);
$stm->bindValue(1,$_POST['url']);
$stm->bindValue(2,$_POST['title']);

var_dump($stm->execute());