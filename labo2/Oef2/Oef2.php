<?php

/**
 * Main Code
 */

// initial values
$moduleAction = isset($_POST['moduleAction']) ? $_POST['moduleAction'] : '';

$msgCijfer = '*'; //dit is de initiele message voor een error;

$random = rand(0, 80); //random waarden asignen
$random2 = rand(0, 80);

$cijfer1 = "";
$cijfer2 = "";

$_1_inital = $random;
$_2_inital = $random2;

$som = $random + $random2;

// form is sent: perform formchecking!
if ($moduleAction == 'processName') {


    $cijfer1 = $random;
    $cijfer2 = $random2;


    $allOk = true;
    $debug = "";
    if (!filter_var($cijfer1, FILTER_VALIDATE_INT)) {
        $debug = "fout, geef een geldig cijfer in";
        $allOk = false;
    } else {
        $debug = "juist";
        header('Location: formchecking_thanks.php?name=' . urlencode($cijfer1));
        exit();
    }

}

?><!DOCTYPE html>
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
                <input type="text" id="c1" name="name" value="<?php echo htmlentities($cijfer1); ?>"

                       class="input-text"/>
                <span class="message error"><?php echo $debug; ?></span>
            </dd>

            </br>

            <p>Cijfer2</p>
            <dd class="text">
                <input type="text" id="c2" name="name" value="<?php echo htmlentities($cijfer2); ?>"
                       class="input-text"/>
                <span class="message error"><?php echo $debug; ?></span>
            </dd>
            <dt class="full clearfix" id="lastrow">

                <input type="hidden" name="moduleAction" value="processName"/>
                <input type="submit" id="btnSubmit" name="btnSubmit" value="Send"/>


            </dt>
            </br>  </br>

            <span class="Som : "><?php echo "som :" . $som; ?></span>
            </br>
            <span class="Som : "><?php echo "debug :" . $debug; ?></span>

        </dl>

    </fieldset>

</form>

<div id="debug">

    <?php

    /**
     * Helper Functions
     * ========================
     */

    /**
     * Dumps a variable
     * @param mixed $var
     * @return void
     */
    function dump($var)
    {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    }


    /**
     * Main Program Code
     * ========================
     */

    // dump $_POST
    dump($_POST);

    ?>

</div>

</body>
</html>