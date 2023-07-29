<?php

include '../../db/db.php';
include '../../functions/cars.php';
include '../../functions/cities.php';

$stmt = $pdo->prepare('SELECT car, city, COUNT(*) AS amount FROM cars WHERE acc_id = :id GROUP BY car, city');
$stmt->execute(['id' => $_SESSION['ID']]);
$cars = $stmt->fetchAll();

$totalValue = 0;

foreach ($cars as &$car) {
    $carId = $car['car'];
    $car['city'] = $cities[$car['city']];
    $car['car'] = $carsArr[$car['car']]['car'];
    $car['value'] = $carsArr[$carId]['price'];
    $car['total_value'] = (int)$car['value'] * $car['amount']; // Calculate the total value
    $totalValue += $car['total_value']; // Calculate the overall total value
}

header('Content-Type: application/json');
echo json_encode($cars);