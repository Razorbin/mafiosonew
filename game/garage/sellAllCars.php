<?php

include '../../db/db.php';
include '../../helpers.php';

$carValue = [
  1000000, 800000, 500000, 600000, 900000, 700000, 750000, 400000, 350000, 450000,
  400000, 900000, 600000, 300000, 550000, 850000, 1200000, 1000000, 1100000, 1500000
];

$stmt = $pdo->prepare('SELECT car FROM cars WHERE acc_id = :id');
$stmt->execute(['id' => 1]);
$cars = $stmt->fetchAll();

$totalValue = 0;
$totalCars = count($cars);

foreach ($cars as $car) {
  if (isset($carValue[$car['car']])) {
    $totalValue += $carValue[$car['car']];
  }
}

$sql = "UPDATE user SET money = money + ? WHERE id = ?";
$pdo->prepare($sql)->execute([$totalValue, $_SESSION['ID']]);

$sql = "DELETE FROM cars WHERE acc_id = ?";
$pdo->prepare($sql)->execute([$_SESSION['ID']]);

$response = "Du solgte " . number($totalCars) . " biler for " . number($totalValue) . ",-";
echo $response;