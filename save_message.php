<?php
$message = $_POST['message'];

// Retrieve the existing chat array from the file or database
$chat = json_decode(file_get_contents('chat.json'), true);

// Add the new message to the chat array
$newMessage = ['user' => 'joe', 'message' => $message];
$chat[] = $newMessage;

// Save the updated chat array back to the file
file_put_contents('chat.json', json_encode($chat));

// Send the newly added message as the response
header('Content-Type: application/json');
echo json_encode($newMessage);
?>
