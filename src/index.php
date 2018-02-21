<?php

$currentUrl = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
define('BASE_PATH', $currentUrl);

$levels = bin2hex(file_get_contents('LEVELS.DAT'));
$structure = str_split($levels, 2);

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
<?php
$i = 0;
foreach ($structure as $key=>$element) {
    if (empty($element) || trim($element) == '') continue;
    if ($key >= 1529) break;
    $field = $elements[$element];

    $fileName = strtolower($field);
    $fileName = str_replace(' ', '', $fileName);

    echo '<td style="background: url('. BASE_PATH .'/icons/'.$fileName.'.png);width:32px;height:32px;display:inline-block" data-position="el-'.$i.'">'.'</td>';

    $i++;
    echo ( ($i) % 60 == 0) ? '</tr><tr>' : '';

    if ($i >= 1440) break;
}
?>
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
