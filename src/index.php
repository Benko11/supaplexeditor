<?php

$currentUrl = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]/src";
define('BASE_PATH', $currentUrl);

$levels = bin2hex(file_get_contents('LEVELS.DAT'));

// gets all the levels and split them into binary sectors
$structure = str_split($levels, 2);

// retrieves only the level that is needed
if (isset($_GET['id']) && (int)$_GET['id'] >= 1 && (int)$_GET['id'] <= 111) $id = $_GET['id'];
else $id = 1;
$structure = array_slice($structure, ($id - 1) * 1440 + 96 * ($id - 1), $id * 1440 + 96 * $id);

$elements = require "elements.php";

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
<script src="<?php echo BASE_PATH ?>/js/objects.js"></script>
<script src="<?php echo BASE_PATH ?>/js/editor.js"></script>
</body>
</html>
