<?php

include '../../db/db.php';

$objects = [
    ["name" => "Brukte sokker", "price" => 150],
    ["name" => "Tomme plastflasker", "price" => 120],
    ["name" => "Tyggegummi under bordet", "price" => 110],
    ["name" => "Knuste glassflasker", "price" => 200],
    ["name" => "Gamle aviser", "price" => 100],
    ["name" => "Bruskrus", "price" => 130],
    ["name" => "Brukte blyanter", "price" => 110],
    ["name" => "Skrapt lotteri", "price" => 160],
    ["name" => "Småstein", "price" => 150],
    ["name" => "Brutt paraply", "price" => 170],
    ["name" => "Plastbestikk", "price" => 130],
    ["name" => "Kasserte batterier", "price" => 120],
    ["name" => "Gamle telefonkabler", "price" => 140],
    ["name" => "Tannpirkere", "price" => 110],
    ["name" => "Tomme telysholdere", "price" => 120],
    ["name" => "Brukte binders", "price" => 110],
    ["name" => "Tomme kaffekapsler", "price" => 150],
    ["name" => "Knuste plastleker", "price" => 170],
    ["name" => "Ubrukte nøkkelringer", "price" => 140],
    ["name" => "Klumpet tørkepapir", "price" => 120],
    ["name" => "Gamle tannbørster", "price" => 110],
    ["name" => "Brukte stearinlys", "price" => 140],
    ["name" => "Defekte lommelykter", "price" => 160],
    ["name" => "Tomme toalettruller", "price" => 130],
    ["name" => "Knekkebrødkrummer", "price" => 110],
    ["name" => "Brukte engangskopper", "price" => 140],
    ["name" => "Avskårne blomsterstilker", "price" => 170],
    ["name" => "Tomme sjampoflasker", "price" => 130],
    ["name" => "Knekte kleshengere", "price" => 120],
    ["name" => "Brukte tanntrådspoler", "price" => 110],
    ["name" => "Gullring", "price" => 15000],
    ["name" => "iPad", "price" => 8000],
    ["name" => "MacBook", "price" => 25000],
    ["name" => "Rolex-klokke", "price" => 50000],
    ["name" => "Diamantøreringer", "price" => 30000],
    ["name" => "Louis Vuitton-veske", "price" => 20000],
    ["name" => "Plasma-TV", "price" => 12000],
    ["name" => "Gitar", "price" => 5000],
    ["name" => "Skinnjakke", "price" => 7000],
    ["name" => "Porsche-nøkler", "price" => 100000],
    ["name" => "Champagnemagnumflaske", "price" => 3000],
    ["name" => "Antikke mynter", "price" => 15000],
    ["name" => "Dykkerur", "price" => 9000],
    ["name" => "Vinylplatesamling", "price" => 6000],
    ["name" => "Skulptur", "price" => 25000],
    ["name" => "Vintage whiskeyflaske", "price" => 4000],
    ["name" => "Fotoutstyr", "price" => 20000],
    ["name" => "Skreddersydd dress", "price" => 12000],
    ["name" => "Smykkeskrin", "price" => 5000],
    ["name" => "Vespa-scooter", "price" => 18000],
    ["name" => "Designer-solbriller", "price" => 8000],
    ["name" => "Kameratelefon", "price" => 10000],
    ["name" => "Akustisk gitar", "price" => 6000],
    ["name" => "Vintagediamantring", "price" => 20000],
    ["name" => "Samleobjekter", "price" => 15000],
    ["name" => "Laptop", "price" => 10000],
    ["name" => "Safirarmbånd", "price" => 25000],
    ["name" => "Bilnøkler", "price" => 30000],
    ["name" => "Champagnekjøler", "price" => 5000],
    ["name" => "Dykkerutstyr", "price" => 8000],
    ["name" => "Platespiller", "price" => 7000],
    ["name" => "Kunstverk", "price" => 30000],
    ["name" => "Vintage vinkjeller", "price" => 40000],
    ["name" => "Luksuriøst reisesett", "price" => 15000],
    ["name" => "Retro videospillkonsoll", "price" => 8000],
    ["name" => "Kvalitetsvin", "price" => 6000],
    ["name" => "Diamanthalskjede", "price" => 25000],
    ["name" => "Rolleksklokke", "price" => 40000],
    ["name" => "Eksklusive sigarer", "price" => 5000],
    ["name" => "Drone", "price" => 10000],
    ["name" => "Vintage motorsykkel", "price" => 30000],
    ["name" => "Designersko", "price" => 7000],
    ["name" => "Gaming-pc", "price" => 15000],
    ["name" => "Whiskeysamling", "price" => 20000],
    ["name" => "Platinaring", "price" => 25000],
    ["name" => "Sikkerhetsboks", "price" => 5000],
    ["name" => "Parfymesamling", "price" => 8000],
    ["name" => "Vintage sportsbil", "price" => 500000],
    ["name" => "Tegneseriesamling", "price" => 6000],
    ["name" => "Diamantarmbånd", "price" => 30000],
    ["name" => "Gullkjede", "price" => 20000],
    ["name" => "Vinylsamling", "price" => 10000],
    ["name" => "Antikke klokker", "price" => 15000],
    ["name" => "Luksushorlogesett", "price" => 30000],
];

$stmt = $pdo->prepare('SELECT item, COUNT(*) AS amount FROM items WHERE acc_id = :id GROUP BY item');
$stmt->execute(['id' => 1]);
$items = $stmt->fetchAll();

$totalValue = 0;

foreach ($items as &$item) {
    $item['name'] = $objects[$item['item']]['name'];
    $value = $objects[$item['item']]['price'];
    $item['total_value'] = $objects[$item['item']]['price'] * $item['amount']; // Calculate the total value
    $totalValue += $item['total_value']; // Calculate the overall total value
}

header('Content-Type: application/json');
echo json_encode($items);