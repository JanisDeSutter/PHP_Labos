<?php

$param = $argv;
$testParm = '1983‐12‐26 11:45:00';


if($param < 2){ //checken op parameters
    echo 'geef parameters';
    exit();
}


$date = $param[1];
date_default_timezone_set('Europe/Brussels');
$date = strtotime($date);






























/*
$time = mktime($testParm);

echo strtotime($time) . PHP_EOL;

echo strtotime('next year');

$splitDate = explode((' '), $testParm);
echo $splitDate[0];
echo PHP_EOL;
echo $splitDate[1];

$datum = explode(('-'), $splitDate[0]);
$tijd = explode((':'), $splitDate[1]);


echo 'datum = ' . $datum;
echo 'tijd = ' . $tijd;

$jaar = $datum[0];
$maand = $datum[1];
$dag = $datum[2];

$uur = $tijd[0];
$minuut = $tijd[1];
$seconde = $tijd[2];
 $time =mktime($uur,$minuut,$seconde,$maand,$dag,$jaar);
echo date($time);
*/