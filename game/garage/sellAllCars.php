<?php

include '../../db/db.php';
include '../../helpers.php';
include '../../functions/cars.php';

$stmt = $pdo->prepare('SELECT car FROM cars WHERE acc_id = :id');
$stmt->execute(['id' => 1]);
$cars = $stmt->fetchAll();

$totalValue = 0;
$totalCars = count($cars);

foreach ($cars as $car) {
  if (isset($carsArr[$car['car']]['price'])) {
    $totalValue += $carsArr[$car['car']]['price'];
  }
}

$sql = "UPDATE user SET money = money + ? WHERE id = ?";
$pdo->prepare($sql)->execute([$totalValue, $_SESSION['ID']]);

$sql = "DELETE FROM cars WHERE acc_id = ?";
$pdo->prepare($sql)->execute([$_SESSION['ID']]);

$response = array(
  'message' => "Du solgte " . number($totalCars) . " bil(er) for " . number($totalValue) . ",-",
  'type' => 'success'
  );
    
  echo json_encode($response);
