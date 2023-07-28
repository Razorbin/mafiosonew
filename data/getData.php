<?php

include '../db/db.php';
include '../functions/ranks.php';
include '../functions/cities.php';


$stmt = $pdo->prepare('SELECT exp, money, bankBalance, bullets, points, city FROM user WHERE id = :id');
$stmt->execute(['id' => $_SESSION['ID']]);
$user = $stmt->fetch();

$stmt = $pdo->prepare('SELECT count(*) FROM cars WHERE acc_id = :id');
$stmt->execute(['id' => $_SESSION['ID']]);
$carsUser = $stmt->fetchColumn();

$stmt = $pdo->prepare('SELECT count(*) FROM items WHERE acc_id = :id');
$stmt->execute(['id' => $_SESSION['ID']]);
$itemsUser = $stmt->fetchColumn();

$balance = $user['money'];
$bankBalance = $user['bankBalance'];
$bullets = $user['bullets'];
$points = $user['points'];
$city = $cities[$user['city']];
$cityTax = $cityTax[$user['city']]."%";
$family = 'Cosa Nostra';
$playersOnline = 15;
$playersInJail = 0;
$exp = $user['exp'];
$cars = $carsUser;
$maxCars = 50;
$things = $itemsUser;
$maxthings = 50;

$data = [
  'balance' => $balance,
  'bankBalance' => $bankBalance,
  'bullets' => $bullets,
  'points' => $points,
  'city' => $city,
  'cityTax' => $cityTax,
  'family' => $family,
  'playersOnline' => $playersOnline,
  'playersInJail' => $playersInJail,
  'rank' => get_rank($exp),
  'progress' => progress($exp),
  'exp' => $exp,
  'cars' => $cars,
  'maxCars' => $maxCars,
  'things' => $things,
  'maxThings' => $maxthings
];

echo json_encode($data);

?>
