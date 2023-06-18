<?php

include '../db/db.php';

$cities = ['Oslo', 'New York'];

$stmt = $pdo->prepare('SELECT money, bankBalance, bullets, points, city FROM user WHERE id = :id');
$stmt->execute(['id' => $_SESSION['ID']]);
$user = $stmt->fetch();

$balance = $user['money'];
$bankBalance = $user['bankBalance'];
$bullets = $user['bullets'];
$points = $user['points'];
$city = $cities[$user['city']];
$family = 'Cosa Nostra';
$playersOnline = 15;
$playersInJail = 0;

$data = [
  'balance' => $balance,
  'bankBalance' => $bankBalance,
  'bullets' => $bullets,
  'points' => $points,
  'city' => $city,
  'family' => $family,
  'playersOnline' => $playersOnline,
  'playersInJail' => $playersInJail
];

echo json_encode($data);

?>
