<?php

$dir = __DIR__; //current directory
$di = new DirectoryIterator($dir);
foreach ($di as $file) {
    //if (!$file->isDot() && !$file->isDir()) {
    // echo $file . " " . filesize($file) . "b" . PHP_EOL;
}
?>

<!doctype html>
<html>
<style>

</style>
<head>
    <title>Images</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>
<body>


<ul>
    <?php
    $href = "";
    foreach ($di as $file) {

        $iconFolder = "icons";
        $icon = $iconFolder . DIRECTORY_SEPARATOR . 'default.gif';
        $ext = pathinfo($file, PATHINFO_EXTENSION);


        if (is_dir($file)) {
            $icon = $iconFolder . DIRECTORY_SEPARATOR . 'folder.gif';
        } else if ($ext == 'php') {
            $icon = $iconFolder . DIRECTORY_SEPARATOR . 'php.gif';
        }

        if (!$file->isDot()) {

            /*  if ($file == "images") {
                  $href = "images";
              } else if ($file == "icons") {
                  $href = "icons";
              } else {
                  $href = "#";
              }*/

            $href = $file;
            $linkTxt = $file . " " . filesize($file) . "b";

            echo '<li> <img src="' . $icon . '"/>' . '<a href="' . $href . '">' . $linkTxt . '</a>' . '</li>' . PHP_EOL;

        }
    }
    ?>
</ul>


</body>
</html>


