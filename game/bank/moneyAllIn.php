<?php

include '../../db/db.php';

$stmt = $pdo->prepare('SELECT money FROM user WHERE id = :id');
$stmt->execute(['id' => $_SESSION['ID']]);
$user = $stmt->fetch();

$sql = "UPDATE user SET bankBalance = bankBalance + ?, money = 0 WHERE id = ?";
$pdo->prepare($sql)->execute([$user['money'], $_SESSION['ID']]);