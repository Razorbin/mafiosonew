<?php
// Retrieve the chat array from the file or database
$chat = json_decode(file_get_contents('chat.json'), true);

// Send the chat array as JSON response
header('Content-Type: application/json');
echo json_encode($chat);
?>
