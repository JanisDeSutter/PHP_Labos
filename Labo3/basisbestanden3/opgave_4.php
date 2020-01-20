<?php
/**
 *  file upload
 * @author Janis
 */


// vars
$basePath = __DIR__ . DIRECTORY_SEPARATOR . 'images'; // C:\wamp\www\vn.an\labo03\images
$baseUrl = 'images'; // images
$images = array(); // An array which will hold all our images
$lines = new SPLFileObject($basePath . DIRECTORY_SEPARATOR . 'captions.txt');


// @TODO Open directory and captions file using some SPL classes
$di = new DirectoryIterator($basePath);
// @TODO loop directory
foreach ($di as $file) {
    if (!$file->isDot() && !$file->isDir()) {
        if ($file->getExtension() === 'jpg') {
            $images [] = array('url' => $baseUrl . DIRECTORY_SEPARATOR . $file, 'caption' => $lines->current());
            $lines->next();
        }
    }
}


if (isset($_FILES['avatar'])) {


    // get file info
    echo '<p>Uploaded file: ' . $_FILES['avatar']['name'] . '</p>' . PHP_EOL;
    echo '<p>Temp location: ' . $_FILES['avatar']['tmp_name'] . '</p>' . PHP_EOL;
    echo '<p>Size: ' . $_FILES['avatar']['size'] . '</p>' . PHP_EOL;
    // check file extension
    if (!in_array((new SplFileInfo($_FILES['avatar']['name']))->getExtension(), array('jpeg', 'jpg', 'png', 'gif'))) {
        exit('<p>Invalid file extension. Only .jpeg, .jpg, .png or .gif allowed</p>');
    }


    // file in folder steken
    @move_uploaded_file(
        $_FILES['avatar']['tmp_name'],
        __DIR__ . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $_FILES['avatar']['name']
    ) or die('<p>Error while saving file in the uploads folder</p>');


    //in array toevoegen
    $capt = $_POST['caption'];
    $dir = $baseUrl . DIRECTORY_SEPARATOR . $_FILES['avatar']['name'];
    $images [] = array('url' => $dir, 'caption' => $capt); //pushen

    // show image
    echo '<p><img src=' . 'images' . DIRECTORY_SEPARATOR . $_FILES['avatar']['name'] . ' alt="" /><p>';
}
?>
<!doctype html>
<html>
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
<head>
    <title>Images</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style>
        body {
            font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", sans-serif;
            font-weight: 300;
            line-height: 1.2;
            background: #FCFCFC;
        }
    </style>
</head>
<body>


<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
    <label for="avatar">Image: </label>
    <input type="file" name="avatar" id="avatar"/><br/>
    <label for="caption">Caption: </label>
    <input type="text" name="caption" id="caption"/><br/>
    <input type="submit"/> test
</form>

<ul>
    <?php
    foreach ($images as $image) {
        echo '		<li><img src="' . $image['url'] . '"></img><span class="caption">' . $image['caption'] . '</span></li>' . PHP_EOL;
    }
    ?>
</ul>
</body>
</html>
