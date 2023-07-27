<?php

include '../../db/db.php';
include '../../functions/things.php';

$stmt = $pdo->prepare('SELECT item, COUNT(*) AS amount FROM items WHERE acc_id = :id GROUP BY item');
$stmt->execute(['id' => 1]);
$items = $stmt->fetchAll();

$totalValue = 0;

foreach ($items as &$item) {
    $item['name'] = $objects[$item['item']]['name'];
    $value = $objects[$item['item']]['price'];
    $item['total_value'] = $objects[$item['item']]['price'] * $item['amount']; // Calculate the total value
    $totalValue += $item['total_value']; // Calculate the overall total value
}

header('Content-Type: application/json');
echo json_encode($items);