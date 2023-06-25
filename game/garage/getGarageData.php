<?php

include '../../db/db.php';

$cities = ['Palermo', 'New York City', 'Medellin', 'Napoli', 'Chicago', 'Bangkok'];
$carsArr = [
    'Tesla Model X',
    'BMW iX xDrive 40',
    'Mercedes-Benz C-Class',
    'Audi A6',
    'Volvo XC90',
    'Ford Mustang',
    'Chevrolet Camaro',
    'Toyota Corolla',
    'Honda Civic',
    'Hyundai Tucson',
    'Kia Sportage',
    'Nissan GT-R',
    'Mazda CX-5',
    'Volkswagen Golf',
    'Subaru Forester',
    'Lexus RX',
    'Porsche 911',
    'Jaguar F-Type',
    'Land Rover Range Rover',
    'Ferrari 488 GTB'
];
$carValue = [
    1000000, 800000, 500000, 600000, 900000, 700000, 750000, 400000, 350000, 450000,
    400000, 900000, 600000, 300000, 550000, 850000, 1200000, 1000000, 1100000, 1500000
];

$stmt = $pdo->prepare('SELECT car, city, COUNT(*) AS amount FROM cars WHERE acc_id = :id GROUP BY car, city');
$stmt->execute(['id' => 1]);
$cars = $stmt->fetchAll();

$totalValue = 0;

foreach ($cars as &$car) {
    $carId = $car['car'];
    $car['city'] = $cities[$car['city']];
    $car['car'] = $carsArr[$car['car']];
    $car['value'] = $carValue[$carId];
    $car['total_value'] = (int)$car['value'] * $car['amount']; // Calculate the total value
    $totalValue += $car['total_value']; // Calculate the overall total value
}

header('Content-Type: application/json');
echo json_encode($cars);