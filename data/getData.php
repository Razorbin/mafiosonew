<?php

// Connect to your database and fetch the values
$balance = 1000;
$bankBalance = 100000000;
$bullets = 50;
$points = 150;
$city = 'New York';
$family = 'Cosa Nostra';
$playersOnline = 15;
$playersInJail = 0;

$data = [
  'balance' => $balance,
  'bankBalance' => $bankBalance,
  'bullets' => $bullets,
  'points' => $points,
  'city' => $city,
  'family' => $family,
  'playersOnline' => $playersOnline,
  'playersInJail' => $playersInJail
];

echo json_encode($data);

?>
