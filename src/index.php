<?php

// generates the elements list
$elements = require "elements.php";
$elements_images = require "elements_images.php";

$currentUrl = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]/src";
define('BASE_PATH', $currentUrl);

if (isset($_POST['submit'])) {
    $id = $_GET['id'];
    $beginning = ($id - 1) * 1440 + 96 * ($id - 1);

    $levels = bin2hex(file_get_contents('LEVELS.DAT'));
    $structure = str_split($levels, 2);
    $structure = array_slice($structure, $beginning, 1440);

    // go through what has been sent in a form
    foreach ($_POST as $name=>$element) {
        if (strpos($name, 'el-') !== false) {
            // convert data element to a number
            $pos = substr($name,3);

            // test whether the sliced part represent an actual number and change the corresponding structure sectors
            if (is_numeric($pos)) {
                $structure[$pos - 1] = array_search($element, $elements_images);
            }
        }
    }
    die();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Supaplex Editor</title>
    <meta charset="utf-8">

    <link rel="stylesheet" href="<?php echo BASE_PATH; ?>/css/stylesheet.css">
</head>
<body>
<table cellpadding="0" cellspacing="0" id="field">
    <tr>
        <?php require_once "field.php"; ?>
    </tr>
</table>
<nav id="administration">
    <form action="" name="changes" method="post">
        <button id="levels">Levels</button>
        <button id="save" type="submit" name="submit">Save ▼</button>
        <select name="" id="elements">
            <option value="void">Void</option>
            <option value="zonk">Zonk</option>
            <option value="base">Base</option>
            <option value="murphy">Murphy</option>
            <option value="infotron">Infotron</option>
        </select>
    </form>
</nav>
<p>
    <header><strong>Level Info:</strong></header>
    <strong>Infotrons needed:</strong>
    <span id="infotrons"><?php echo $info['i_n'] ?></span><br>

    <strong>Infotrons available:</strong>
    <span id="infotronsAvailable"><?php echo $info['i_av'] ?></span><br>

    <strong>Electrons available:</strong>
    <span id="electrons"><?php echo $info['e_av'] ?></span><br>

    <strong>Gravity:</strong>
    <?php echo ($info['g']) ? 'ON' : 'OFF'; ?><br>

    <strong>Freeze zonks:</strong>
    <?php echo ($info['f_z']) ? 'ON' : 'OFF'; ?><br>
</p>
<script src="<?php echo BASE_PATH ?>/js/objects.js"></script>
<script src="<?php echo BASE_PATH ?>/js/editor.js"></script>
</body>
</html>
