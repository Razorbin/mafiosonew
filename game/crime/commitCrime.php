<?php

include '../../db/db.php';
include '../../functions/crimes.php';

$index = $_POST['clickedIndex'];

$stmt = $pdo->prepare('SELECT CD_time FROM cooldown WHERE CD_acc_id = :id AND CD_type = "crime"');
$stmt->execute(['id' => $_SESSION['ID']]);
$cd_crime = $stmt->fetchColumn();

if($cd_crime > time()){
    $response = array(
        'message' => 'Du har ventetid!',
        'type' => 'warning'
    );
    echo json_encode($response);
} else {
    if($cd_crime){
        $sql = "UPDATE cooldown SET CD_time = ? WHERE CD_type = 'crime' AND CD_acc_id = ?";
        $pdo->prepare($sql)->execute([time() + $crimesData[$index]['cooldown'], $_SESSION['ID']]);
    } else {
        $sql = "INSERT INTO cooldown (CD_acc_id, CD_type, CD_time) VALUES (?,?,?)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$_SESSION['ID'], 'crime', time() + $crimesData[$index]['cooldown']]);
    }
    
    $chance = mt_rand(0, 100);
    if($crimesData[$index]['chance'] > $chance){
        $moneyOutcome = mt_rand($crimesData[$index]['reward_from'], $crimesData[$index]['reward_to']);
        $expOutcome = $crimesData[$index]['exp'];

        $sql = "UPDATE user SET money = money + ?, exp = exp + ? WHERE id = ?";
        $pdo->prepare($sql)->execute([$moneyOutcome, $expOutcome, $_SESSION['ID']]);

        $response = array(
            'message' => 'Du utførte en kriminell handling og kom deg unna med '.$moneyOutcome.',-',
            'type' => 'success',
            'cooldown' => $crimesData[$index]['cooldown']
        );
        echo json_encode($response);
    } else {
        $response = array(
            'message' => 'Du feilet den kriminelle handlingen!',
            'type' => 'warning',
            'cooldown' => $crimesData[$index]['cooldown']
        );
        echo json_encode($response);
    }
}


?>