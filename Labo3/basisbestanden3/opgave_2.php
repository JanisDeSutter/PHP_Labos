<?php

/**
 * Lab 03, Exercise 2 & 3 — Start File
 * @author Bramus Van Damme <bramus.vandamme@odisee.be>
 */

// vars

$basePath = __DIR__ . DIRECTORY_SEPARATOR . 'images'; // C:\wamp\www\vn.an\labo03\images
$baseUrl = 'images'; // images
$images = array(); // An array which will hold all our images


$dp = opendir($basePath);

// Main code

// @TODO Open directory and captions file using some SPL classes

// @TODO loop directory

while (($file = readdir($dp)) !== false) {

    // echo $file . PHP_EOL;

    $ext = pathinfo($file, PATHINFO_EXTENSION);
    //echo $ext;

    if ($ext === 'jpg') {
        array_push($images, $file);
        //  echo "added " . $file . "to the array". PHP_EOL;
    }
}

closedir($dp);
// If it's a '.jpg', add it onto an array named $images
// Use an associative array so you can store the filename, and caption


?><!doctype html>
<html>
<head>
    <title>Images</title>
    <meta charset="utf-8"/>
    <style>

        body {
            font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", sans-serif;
            font-weight: 300;
            font-size: 14px;
            line-height: 1.2;
            background: #FCFCFC;
        }

        ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        li {
            display: block;
            width: 310px;
            height: 310px;
            float: left;
            border: 1px solid #ccc;
            margin: 20px;
            position: relative;
            box-shadow: 0 0 20px #CCC;

        }

        li img {
            max-width: 100%;
        }

        li .caption {
            display: block;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 5px;
            color: #000;
            background: rgba(255, 255, 255, 0.9);
            border-top: 1px solid #ccc;
            text-shadow: 1px 1px 1px #fff;
        }

        li:hover {
            box-shadow: 0 0 20px #999;
        }

        figcaption {
            position: relative;
            top: 250px;
            left: -100px;

        }
    </style>
</head>
<body>
<ul>
    <?php
    $lines = file($basePath . '/captions.txt');
    $l = $basePath . '/captions.txt';
    $SplFileObject = new SplFileObject ($l);
    $imageArray = array();
    // $di = new DirectoryIterator();
    foreach ($images as $image) {
        $t = $SplFileObject->fgets();
        echo '<li >' . '<img src=' . '"' . $baseUrl . '\\' . $image . '" ' . ' alt="test"' . ' title="' . $t . '"' . '>';
        echo ' ' . PHP_EOL;
        echo '<span class="caption"> <span>' . $t . '</span></li>' . PHP_EOL;
        array_push($imageArray, $image, $t);
    }
    ?>
</ul>
</body>
</html>