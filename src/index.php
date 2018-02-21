<?php $baseName = basename(__DIR__); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Supaplex Editor</title>
    <meta charset="utf-8">

    <link rel="stylesheet" href="<?php echo $baseName ?>/css/stylesheet.css">
</head>
<body>
<table cellpadding="0" cellspacing="0" id="field">
    <tr>
        <?php require "field.php"; ?>
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
<script src="<?php echo $baseName ?>/js/objects.js"></script>
<script src="<?php echo $baseName ?>/js/editor.js"></script>
</body>
</html>
