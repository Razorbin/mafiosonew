<?php

include '../../db/db.php';
include '../../functions/cities.php';

$stmt = $pdo->prepare('SELECT CD_time FROM cooldown WHERE CD_acc_id = :id AND CD_type = "airport"');
$stmt->execute(['id' => $_SESSION['ID']]);
$cd_airport = $stmt->fetchColumn();

$stmt = $pdo->prepare('SELECT city FROM user WHERE id = :id');
$stmt->execute(['id' => $_SESSION['ID']]);
$user_row = $stmt->fetchColumn();

$hasCooldown = $cd_airport > time();
$cooldownTimeLeft = $cd_airport - time();

if ($user_row >= 0 && $user_row < count($cities)) {
    unset($cities[$user_row]);
}

$filteredCities = array_values($cities);
