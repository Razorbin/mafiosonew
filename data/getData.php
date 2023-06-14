<?php
// Connect to your database and fetch the values
// ...
$balance = 1000;
$bullets = 500;
$points = 150;
$city = 'New York';
$family = 'Cosa Nostra';
$playersOnline = 15;
$playersInJail = 0;

// Prepare the data array
$data = [
  'balance' => $balance,
  'bullets' => $bullets,
  'points' => $points,
  'city' => $city,
  'family' => $family,
  'playersOnline' => $playersOnline,
  'playersInJail' => $playersInJail
];

// Return the data as a JSON response
echo json_encode($data);
?>
