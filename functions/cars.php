<?php

$cheapCars = array(
    array(
        'car' => "Toyota Yaris",
        'price' => 15000
    ),
    array(
        'car' => "Honda Fit",
        'price' => 16000
    ),
    array(
        'car' => "Ford Fiesta",
        'price' => 14000
    ),
    array(
        'car' => "Chevrolet Spark",
        'price' => 13000
    ),
    array(
        'car' => "Nissan Versa",
        'price' => 15500
    ),
    array(
        'car' => "Kia Rio",
        'price' => 14500
    ),
    array(
        'car' => "Hyundai Accent",
        'price' => 14000
    ),
    array(
        'car' => "Mitsubishi Mirage",
        'price' => 13500
    ),
    array(
        'car' => "Volkswagen Polo",
        'price' => 16000
    ),
    array(
        'car' => "Fiat 500",
        'price' => 13000
    )
);

$expensiveCars = array(
    array(
        'car' => "BMW 5 Series",
        'price' => 600000
    ),
    array(
        'car' => "Mercedes-Benz E-Class",
        'price' => 580000
    ),
    array(
        'car' => "Audi A6",
        'price' => 570000
    ),
    array(
        'car' => "Lexus ES",
        'price' => 550000
    ),
    array(
        'car' => "Volvo S90",
        'price' => 590000
    ),
    array(
        'car' => "Jaguar XF",
        'price' => 620000
    ),
    array(
        'car' => "Infiniti Q70",
        'price' => 560000
    )
);

$deluxeCars = array(
    array(
        'car' => "Porsche 911",
        'price' => 1000000
    ),
    array(
        'car' => "Aston Martin DBS Superleggera",
        'price' => 3000000
    ),
    array(
        'car' => "Rolls-Royce Phantom",
        'price' => 4500000
    )
);

$carsArr = array_merge($cheapCars, $expensiveCars, $deluxeCars);
