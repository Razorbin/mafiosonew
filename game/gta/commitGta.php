<?php

include '../../db/db.php';
include '../../functions/cars.php';
include '../../functions/gtas.php';

$index = $_POST['clickedIndex'];
$carOutcome = mt_rand($gtasData[$index]['reward_from'], $gtasData[$index]['reward_to']);
$expOutcome = $gtasData[$index]['exp'];

$stmt = $pdo->prepare('SELECT CD_time FROM cooldown WHERE CD_acc_id = :id AND CD_type = "gta"');
$stmt->execute(['id' => $_SESSION['ID']]);
$cd_gta = $stmt->fetchColumn();

if($cd_gta > time()){
    $response = array(
        'message' => 'Du har ventetid!',
        'type' => 'warning'
    );
    echo json_encode($response);
} else {
    if($cd_gta){
        $sql = "UPDATE cooldown SET CD_time = ? WHERE CD_type = 'gta' AND CD_acc_id = ?";
        $pdo->prepare($sql)->execute([time() + $gtasData[$index]['cooldown'], $_SESSION['ID']]);
    } else {
        $sql = "INSERT INTO cooldown (CD_acc_id, CD_type, CD_time) VALUES (?,?,?)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$_SESSION['ID'], 'gta', time() + $gtasData[$index]['cooldown']]);
    }
    
    $chance = mt_rand(0, 100);
    if($gtasData[$index]['chance'] > $chance){

        $sql = "INSERT INTO cars (acc_id, car, city) VALUES (?,?,?)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$_SESSION['ID'], $carOutcome, 1]);

        $sql = "UPDATE user SET exp = exp + ? WHERE id = ?";
        $pdo->prepare($sql)->execute([$expOutcome, $_SESSION['ID']]);

        $response = array(
            'message' => 'Du stjal en '.$carsArr[$carOutcome]['car'],
            'type' => 'success',
            'cooldown' => $gtasData[$index]['cooldown']
        );
        echo json_encode($response);
    } else {
        $response = array(
            'message' => 'Du feilet biltyveriet!',
            'type' => 'warning',
            'cooldown' => $gtasData[$index]['cooldown']
        );
        echo json_encode($response);
    }
}


?>