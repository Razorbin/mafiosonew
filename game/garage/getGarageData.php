<?php

include '../../db/db.php';

$cities = ['Oslo', 'New York'];
$carsArr = ['Tesla Model X', 'BMW iX xDrive 40'];
$carValue = [100, 150, 200, 250];

$stmt = $pdo->prepare('SELECT car, city FROM cars WHERE acc_id = :id');
$stmt->execute(['id' => 1]);
$cars = $stmt->fetchAll();

foreach ($cars as &$car) {
    $carId = $car['car'];
    $car['value'] = $carValue[$carId - 1] ?? 'N/A';
    $car['city'] = $cities[$car['city']];
    $car['car'] = $carsArr[$car['car']];
}

header('Content-Type: application/json');
echo json_encode($cars);