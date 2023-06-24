<?php

function truncate($text, $chars = 25) {
    if (strlen($text) <= $chars) {
        return $text;
    }
    $text = $text." ";
    $text = substr($text,0,$chars);
    $text = substr($text,0,strrpos($text,' '));
    $text = $text."...";
    return $text;
}

function bigNumbers(int $number) {
    if ($number < 1000000) {
        // Anything less than a million
        $format = number_format($number);
    } else if ($number < 1000000000) {
        // Anything less than a billion
        $format = number_format($number / 1000000, 1) . 'M';
    } else {
        // At least a billion
        $format = number_format($number / 1000000000, 1) . 'B';
    }
    
    return $format;
}

function number($amount){
    if (!is_numeric($amount) || $amount == null || $amount == '') {
        return 0;
    } else {
        return number_format($amount, 0, '.', ' ');
    }
}