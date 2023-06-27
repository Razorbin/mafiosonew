<?php
// Get the 'user' parameter from the URL
$user = $_GET['user'];

if ($user === 'skitzo') {
    $userData['username'] = 'Skitzo';
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
} else {
    $userData['username'] = 'Unknown User';
    $userData['status'] = 'N/A';
    $userData['rank'] = 'N/A';
    $userData['pengerank'] = 'N/A';
    $userData['drap'] = 'N/A';
    $userData['familie'] = 'N/A';
    $userData['oppdrag'] = 'N/A';
    $userData['registrert'] = 'N/A';
    $userData['sistaktiv'] = 'N/A';
    $userData['profileText'] = 'User profile not found';
    $userData['avatar'] = 'media/logo.png';
}

// Return the user data as JSON
header('Content-Type: application/json');
echo json_encode($userData);
?>
