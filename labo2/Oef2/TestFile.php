<?php
$moduleAction = isset($_POST['moduleAction']) ? $_POST['moduleAction'] : '';
$random = rand(0, 80); //random waarden asignen
$random2 = rand(0, 80);
$cijfer1 = $random;
$cijfer2 = $random2;
$debug = "";
$debug2 = "";
$som = '';


// form is sent: perform formchecking!
if ($moduleAction == 'Calculate') {
    $cijfer1 = $_POST['cijfer1']; //houd waarde van post bij
    $cijfer2 = $_POST['cijfer2'];


    $debug = "";
    if (!filter_var($cijfer1, FILTER_VALIDATE_INT)) {

        $debug = "fout, geef een geldig cijfer1 in";
        $allOk = false;
    }
   else if (!filter_var($cijfer2, FILTER_VALIDATE_INT)) {

        $debug2 = "fout, geef een geldig cijfer2 in";
        $allOk = false;
    } else {
        $som = $cijfer1 + $cijfer2;
        $debug = "juist";
    }
}

var_dump($debug);

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

    <fieldset>

        <h2>Testform</h2>

        <dl class="clearfix">

            <p>Cijfer1</p>
            <dd class="text">
                <input type="text" id="c1" name="cijfer1" value="<?php echo htmlentities($cijfer1); ?>"
                       class="input-text"/>
                <span class="message error"><?php echo $debug; ?></span>
            </dd>

            </br>

            <p>Cijfer2</p>
            <dd class="text">
                <input type="text" id="c2" name="cijfer2" value="<?php echo htmlentities($cijfer2); ?>"
                       class="input-text"/>
                <span class="message error"><?php echo $debug2; ?></span>
            </dd>
            <dt class="full clearfix" id="lastrow">

                <input type="hidden" name="moduleAction" value="Calculate"/>
                <input type="submit" id="btnSubmit" name="btnSubmit" value="Send"/>

                </br>
                <span class="Som : "><?php echo "som :" . $som; ?></span>
                </br>
            </dt>


        </dl>

    </fieldset>

</form>
