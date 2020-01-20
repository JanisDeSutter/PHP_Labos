<?php


$alphabet = [];
for ($i = 0; $i < 26; $i++) {
    $alphabet[$i + 1] = chr($i + 97); //hier stelt men de waarden van het alfabet in
}

$count = 1;
foreach ($alphabet as $char) {
    echo $count . $char; //hier toont men elke letter plus een oplopend cijfer er tussen
    $count++;
}
echo PHP_EOL;

foreach ($alphabet as $char) {
    echo $char . ',';
}
echo PHP_EOL;

$lengte_alphabet = sizeof($alphabet);
echo $lengte_alphabet;
echo PHP_EOL;

$eerste_karakter = array_shift($alphabet); //hier wordt het eertste karakter verwijderd
echo 'Eerste karakter dat verwijderd is : ' . $eerste_karakter;
echo PHP_EOL;

echo 'Nieuwe array : ';
foreach ($alphabet as $char) {
    echo $char . ',';
}

$cities = array('9000' => 'Gent', '1000' => 'Brussel', '2000' => 'Antwerpen', '8500' => 'Kortrijk', '3000' => 'Leuven', '3500' => 'Hasselt');


var_dump($cities); //print de volledige array

$zips = array_keys($cities);
var_dump($zips);
$totaal = 0;
foreach ($zips as $key => $value) {
    $totaal += $value;
}
echo $totaal . PHP_EOL;
asort($cities);
print_r($cities);

/**
 *Hier wordt de array cities omgekeerd op postcode gesorteerd
 */
ksort($cities);
print_r($cities);

/*Veelvouden*/
for ($i = 0; $i < 10000; $i += 1000) {
    echo(array_key_exists($i, $cities) ? strtoupper($cities[$i]). PHP_EOL : '' );
}

/*
echo "de som van alle postcodes = " . $totaal . PHP_EOL;
echo "Array cities gesorteerd op naam van stad :" . PHP_EOL;
$citiesSorted = sort($cities); //alfabetisch sorteren op stadsnaam
var_dump($cities); //print de volledige array alfabetisch gesorteerd op stadsnaam
echo PHP_EOL;/-*/

$citiesSortedOmgekeerdOpPostcode = rsort($cities, $key); //alfabetisch sorteren op stadsnaam
var_dump($cities); //print de volledige array alfabetisch gesorteerd op stadsnaam


