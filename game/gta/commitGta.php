<?php

include '../../db/db.php';
include '../../functions/cars.php';

$index = $_POST['clickedIndex'];
$carOutcome = mt_rand(0, 19);

$stmt = $pdo->prepare('SELECT CD_time FROM cooldown WHERE CD_acc_id = :id AND CD_type = "gta"');
$stmt->execute(['id' => $_SESSION['ID']]);
$cd_gta = $stmt->fetchColumn();

$cooldown = [5, 20, 30];

if($cd_gta > time()){
    $response = array(
        'message' => 'Du har ventetid!',
        'type' => 'warning'
    );
    echo json_encode($response);
} else {
    if($cd_gta){
        $sql = "UPDATE cooldown SET CD_time = ? WHERE CD_type = 'gta' AND CD_acc_id = ?";
        $pdo->prepare($sql)->execute([time() + $cooldown[$index], $_SESSION['ID']]);
    } else {
        $sql = "INSERT INTO cooldown (CD_acc_id, CD_type, CD_time) VALUES (?,?,?)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$_SESSION['ID'], 'gta', time() + $cooldown[$index]]);
    }
    
    $sql = "INSERT INTO cars (acc_id, car, city) VALUES (?,?,?)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$_SESSION['ID'], $carOutcome, 1]);

    $response = array(
        'message' => 'Du stjal en '.$carsArr[$carOutcome],
        'type' => 'success',
        'cooldown' => $cooldown[$index]
    );
    echo json_encode($response);
}


?>