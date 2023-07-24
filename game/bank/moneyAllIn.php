<?php

include '../../db/db.php';
include '../../helpers.php';

$stmt = $pdo->prepare('SELECT money FROM user WHERE id = :id');
$stmt->execute(['id' => $_SESSION['ID']]);
$user = $stmt->fetch();

$sql = "UPDATE user SET bankBalance = bankBalance + ?, money = 0 WHERE id = ?";
$pdo->prepare($sql)->execute([$user['money'], $_SESSION['ID']]);

if($user['money'] <= 0){
    $response = array(
        'message' => "Du har ingen penger å sette inn",
        'type' => 'warning'
        );
    echo json_encode($response);
} else {
    $response = array(
    'message' => "Du satt inn " . number($user['money']) . ",- i banken",
    'type' => 'success'
    );
      
    echo json_encode($response);
}