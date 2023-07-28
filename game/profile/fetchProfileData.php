<?php

include '../../db/db.php';

// Get the 'user' parameter from the URL
$user = $_GET['user'];

$stmt = $pdo->prepare('SELECT username FROM user WHERE username = :username');
$stmt->execute(['username' => $user]);
$user_row = $stmt->fetch();

$userData['username'] = $user_row['username'];
$userData['status'] = 'Active';
$userData['rank'] = 'Gangster';
$userData['pengerank'] = 'High Roller';
$userData['drap'] = '10';
$userData['familie'] = 'Mafia Family';
$userData['oppdrag'] = 'Completed';
$userData['registrert'] = '2022-01-01';
$userData['sistaktiv'] = '2023-06-25';
$userData['profileText'] = 'Profile text for user Skitzo';
$userData['avatar'] = 'https://mafioso.no/img/avatar/avatar1663353880-5ghzUdX.png';


// Return the user data as JSON
header('Content-Type: application/json');
echo json_encode($userData);

?>
