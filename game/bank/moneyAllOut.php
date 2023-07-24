<?php

include '../../db/db.php';
include '../../helpers.php';

$stmt = $pdo->prepare('SELECT bankBalance FROM user WHERE id = :id');
$stmt->execute(['id' => $_SESSION['ID']]);
$user = $stmt->fetch();

$sql = "UPDATE user SET money = money + ?, bankBalance = 0 WHERE id = ?";
$pdo->prepare($sql)->execute([$user['bankBalance'], $_SESSION['ID']]);

if($user['bankBalance'] <= 0){
    $response = array(
        'message' => "Du har ingen penger å ta ut",
        'type' => 'warning'
        );
    echo json_encode($response);
} else {
    $response = array(
    'message' => "Du tok ut " . number($user['bankBalance']) . ",- fra banken",
    'type' => 'success'
    );
      
    echo json_encode($response);
}