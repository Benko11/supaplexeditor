<?php

// generates the element lists
$elements = require "elements.php";
$elements_images = require "elements_images.php";

$currentUrl = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]/src";
define('BASE_PATH', $currentUrl);

if (isset($_POST['submit'])) {
    require 'transaction.php';
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
            <?php
                foreach ($elements as $hex=>$element) {
                    echo '<option value="'.$elements_images[$hex].'">'.$element.'</option>';
                }
            ?>
        </select>
    </form>
</nav>
<p>
    <strong>Level Info:</strong><br>

    <strong>Infotrons needed:</strong>
    <span id="infotrons"><?php echo $info['i_n'] ?></span><br>

    <strong>Infotrons available:</strong>
    <span id="infotronsAvailable"><?php echo $info['i_av'] ?></span><br>

    <strong>Electrons available:</strong>
    <span id="electrons"><?php echo $info['e_av'] ?></span><br>

    <strong>Gravity:</strong>
    <span id="gravityToggle"><?php echo ($info['g']) ? 'ON' : 'OFF'; ?></span><br>

    <strong>Freeze zonks:</strong>
    <span id="freezeZonkToggle"><?php echo ($info['f_z']) ? 'ON' : 'OFF'; ?></span><br>
</p>
<script src="<?php echo BASE_PATH ?>/js/objects.js"></script>
<script src="<?php echo BASE_PATH ?>/js/editor.js"></script>
</body>
</html>
