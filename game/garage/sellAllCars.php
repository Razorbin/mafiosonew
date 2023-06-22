<?php

include '../../db/db.php';

$carValue = [100, 150, 200, 250];

$stmt = $pdo->prepare('SELECT car FROM cars WHERE acc_id = :id');
$stmt->execute(['id' => 1]);
$cars = $stmt->fetchAll();

$totalValue = 0;

foreach ($cars as $car) {
  $carIndex = $car['car'] - 1; // Assuming the car column represents the index of the car in the $carValue array
  if (isset($carValue[$carIndex])) {
    $totalValue += $carValue[$carIndex];
  }
}

$sql = "UPDATE user SET money = money + ? WHERE id = ?";
$pdo->prepare($sql)->execute([$totalValue, $_SESSION['ID']]);