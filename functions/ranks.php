<?php

$ranks = array(
    'Thug',
    'Enforcer',
    'Associate',
    'Soldier',
    'Caporegime',
    'Consigliere',
    'Underboss',
    'Boss',
    'Don',
    'Godfather',
    'Kingpin',
    'Crime Lord',
    'Mobster',
    'Gang Leader',
    'High Roller',
    'Mastermind',
    'Scarface',
    'Infamous',
    'Untouchable',
    'Shadow'
);

$exp_from = array(
    0,      // Thug
    100,    // Enforcer
    500,    // Associate
    1000,   // Soldier
    2000,   // Caporegime
    5000,   // Consigliere
    10000,  // Underboss
    20000,  // Boss
    50000,  // Don
    100000, // Godfather
    200000, // Kingpin
    300000, // Crime Lord
    400000, // Mobster
    500000, // Gang Leader
    600000, // High Roller
    700000, // Mastermind
    800000, // Scarface
    900000, // Infamous
    1000000, // Untouchable
    1500000 // Shadow
);

$exp_to = array(
    99,     // Thug
    499,    // Enforcer
    999,    // Associate
    1999,   // Soldier
    4999,   // Caporegime
    9999,   // Consigliere
    19999,  // Underboss
    49999,  // Boss
    99999,  // Don
    199999, // Godfather
    299999, // Kingpin
    399999, // Crime Lord
    499999, // Mobster
    599999, // Gang Leader
    699999, // High Roller
    799999, // Mastermind
    899999, // Scarface
    999999, // Infamous
    1499999, // Untouchable
    PHP_INT_MAX // Shadow (No upper limit)
);

function get_rank($exp) {
    global $ranks, $exp_from;

    $rankCount = count($ranks);
    for ($i = $rankCount - 1; $i >= 0; $i--) {
        if ($exp >= $exp_from[$i]) {
            return $ranks[$i];
        }
    }
    return 'Unknown Rank';
}

function progress($exp) {
    global $exp_from, $exp_to;

    $rankCount = count($exp_from);
    for ($i = 0; $i < $rankCount; $i++) {
        if ($exp >= $exp_from[$i] && $exp <= $exp_to[$i]) {
            $currentRankExp = $exp_from[$i];
            $nextRankExp = $exp_to[$i];
            $progressPercentage = ($exp - $currentRankExp) / ($nextRankExp - $currentRankExp) * 100;
            return $progressPercentage;
        }
    }
    return 0;
}