<?php

/**
 * Lab 03, Exercise 1 — Start file
 * @author Bramus Van Damme &amp; Joris Maervoet <joris.maervoet@odisee.be>
 */
$date = new DateTime();
// Set language to Dutch
setlocale(LC_ALL, 'Dutch_Netherlands');

// Set timezone to Brussels
//date_default_timezone_set('Europe/Brussels');
$date->setTimezone(new DateTimeZone('Europe/Brussels'));


// Create a timestamp for the date
//$timestamp = strtotime('1983-12-26 11:45:00');
$timestamp = $date->setTimestamp(441283500); // seconds since 1983-12-26 11:45:00 , long = timestamp
$timestamp = $timestamp->format('y-m-d h:i:s');


try {

    $dtm = new DateTime('1983-12-26 11:45:00');


    echo $dtm->getTimestamp();
    echo $dtm->format('F') . '</br>';
    echo $dtm->format('l') . '</br>';
    echo $dtm->format('D4') . '</br>';

} catch (Exception $e) {
    echo 'wrong';
}


// Output
/*if ($timestamp !== false) {
    echo $timestamp . PHP_EOL;
    echo date('F', $timestamp) . PHP_EOL;        // Month (in words)
    echo date('l', $timestamp) . PHP_EOL;        // Day of week (in words)
    echo date('D', $timestamp) . PHP_EOL;        // Day of week (short, in words)
    echo date('dmY', $timestamp) . PHP_EOL;    // Date as "26121983"
    echo date('ymd', $timestamp) . PHP_EOL;    // Date as "831226"
    echo date('g:i A', $timestamp) . PHP_EOL;    // Date as "11:45 AM"
    echo date('t', $timestamp) . PHP_EOL;        // Number of days in given month
    echo date('j F Y', $timestamp) . PHP_EOL;    // Date as "26 december 1983" (*)
    echo date('W', $timestamp) . PHP_EOL;        // Weeknumber of date
} else {
    echo('The time of this script could not be interpreted as a date . ');
}*/
// EOF