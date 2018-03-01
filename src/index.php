<?php

$currentUrl = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]/src";
define('BASE_PATH', $currentUrl);

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
    <button id="levels">Levels</button>
    <button id="save">Save ▼</button>
    <select name="" id="elements">
        <option value="void">Void</option>
        <option value="zonk">Zonk</option>
        <option value="base">Base</option>
        <option value="murphy">Murphy</option>
        <option value="infotron">Infotron</option>
    </select>
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
