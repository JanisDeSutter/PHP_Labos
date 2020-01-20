<?php
$moduleAction = isset($_POST['moduleAction']) ? $_POST['moduleAction'] : '';
$price = 0;

if ($moduleAction == 'givePrice') { //als knop met moduleActie givePrice wordt ingedrukt en het formulier dus verzonden is


    if (isset($_POST['g1'])) { //als input field met naam g1 is ingevuld
        $price += $_POST['g1']; // += value van g1
    }
    if (isset($_POST['g2'])) {
        $price += $_POST['g2'];
    }
    if (isset($_POST['g3'])) {
        $price += $_POST['g3'];
    }
    $price = "de prijs is " . $price;

}
$Prices = array(
    '64GB' => 19,
    '128GB ' => 64,
    '256GB' => 62
);


var_dump($Prices[0]);

/*<?php
    echo htmlentities($Prices['64GB']);
    ?>*/

?>

<!DOCTYPE html>
<html>
<head>
    <title>Testform</title>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" type="text/css" href="styles.css"/>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">


    <input type="radio" name="g1" value="19"> 64GB<br>
    <input type="radio" name="g2" value="64"> 128GB<br>
    <input type="radio" name="g3" value="62"> 256GB<br>

    <input type="hidden" name="moduleAction" value="givePrice"/>
    <input type="submit" id="btnSubmit" name="btnSubmit" value="Send"/>
    <p><?php echo $price; ?> </p>
</form>
