<?php

include '../../db/db.php';
include '../../functions/things.php';

$index = $_POST['clickedIndex'];
$theftOutcome = mt_rand(0, 83);

$stmt = $pdo->prepare('SELECT CD_time FROM cooldown WHERE CD_acc_id = :id AND CD_type = "theft"');
$stmt->execute(['id' => $_SESSION['ID']]);
$cd_theft = $stmt->fetchColumn();

$cooldown = [5, 20, 30];

if($cd_theft > time()){
    $response = array(
        'message' => 'Du har ventetid!',
        'type' => 'warning'
    );
    echo json_encode($response);
} else {
    if($cd_theft){
        $sql = "UPDATE cooldown SET CD_time = ? WHERE CD_type = 'theft' AND CD_acc_id = ?";
        $pdo->prepare($sql)->execute([time() + $cooldown[$index], $_SESSION['ID']]);
    } else {
        $sql = "INSERT INTO cooldown (CD_acc_id, CD_type, CD_time) VALUES (?,?,?)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$_SESSION['ID'], 'theft', time() + $cooldown[$index]]);
    }
    
    $sql = "INSERT INTO items (acc_id, item) VALUES (?,?)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$_SESSION['ID'], $theftOutcome]);

    $response = array(
        'message' => 'Du stjal '.$objects[$theftOutcome]['name'],
        'type' => 'success',
        'cooldown' => $cooldown[$index]
    );
    echo json_encode($response);
}


?>