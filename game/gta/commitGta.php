<?php

include '../../db/db.php';
include '../../functions/cars.php';

$sql = "INSERT INTO cars (acc_id, car, city) VALUES (?,?,?)";
$stmt= $pdo->prepare($sql);
$stmt->execute([1, mt_rand(0,19), 1]);

$response = array(
'message' => 'Du stjal en bil!',
'type' => 'success'
);
echo json_encode($response);

?>