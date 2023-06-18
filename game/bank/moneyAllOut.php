<?php

include '../../db/db.php';

$stmt = $pdo->prepare('SELECT bankBalance FROM user WHERE id = :id');
$stmt->execute(['id' => $_SESSION['ID']]);
$user = $stmt->fetch();

$sql = "UPDATE user SET money = money + ?, bankBalance = 0 WHERE id = ?";
$pdo->prepare($sql)->execute([$user['bankBalance'], $_SESSION['ID']]);