<?php
// Get the 'user' parameter from the URL
$user = $_GET['user'];

// Fetch the user data based on the 'user' value (e.g., from a database)
// Here, we'll simply return predefined data based on the user
$userData = array();

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
    $userData['avatar'] = 'https://images.unsplash.com/photo-1687295621277-ca5ba0b32e1e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80';
} else {
    $userData['username'] = 'Unknown User';
    $userData['status'] = 'Inactive';
    $userData['rank'] = 'N/A';
    $userData['pengerank'] = 'N/A';
    $userData['drap'] = 'N/A';
    $userData['familie'] = 'N/A';
    $userData['oppdrag'] = 'N/A';
    $userData['registrert'] = 'N/A';
    $userData['sistaktiv'] = 'N/A';
    $userData['profileText'] = 'User profile not found';
    $userData['avatar'] = 'https://images.unsplash.com/photo-1687295621277-ca5ba0b32e1e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80';
}

// Return the user data as JSON
header('Content-Type: application/json');
echo json_encode($userData);
?>
