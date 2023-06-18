<?php

include 'db/db.php';

$stmt = $pdo->prepare('SELECT username FROM user WHERE id = :id');
$stmt->execute(['id' => $_SESSION['ID']]);
$user = $stmt->fetch();

$message = $_POST['message'];

// Retrieve the existing chat array from the file or database
$chat = json_decode(file_get_contents('chat.json'), true);

// Add the new message to the chat array
$newMessage = ['user' => $user['username'], 'message' => $message];
$chat[] = $newMessage;

// Save the updated chat array back to the file
file_put_contents('chat.json', json_encode($chat));

// Send the newly added message as the response
header('Content-Type: application/json');
echo json_encode($newMessage);

?>
