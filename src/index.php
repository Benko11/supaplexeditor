<?php

$baseName = basename(__DIR__);
$levels = bin2hex(file_get_contents('LEVELS.DAT'));
$structure = str_split($levels, 2);

$elements = array(
	'00' => 'Void',
	'01' => 'Zonk',
	'02' => 'Base',
	'03' => 'Murphy',
	'04' => 'Infotron',
	'05' => 'Standard RAM',
	'06' => 'Standard Hardware',
	'07' => 'Exit',
	'08' => 'Orange Disk',
	'09' => 'Right Port',
	'0a' => 'Down Port',
	'0b' => 'Left Port',
	'10' => 'Up Port',
	'11' => 'Snik Snak',
	'12' => 'Yellow Disk',
	'13' => 'Terminal',
	'14' => 'Red Disk',
	'15' => 'Vertical Port',
	'16' => 'Horizontal Port',
	'17' => 'Universal Port',
	'18' => 'Electron',
	'19' => 'Bug',
	'1a' => 'Left RAM',
	'1b' => 'Right RAM',
	'1c' => 'Hardware 0',
	'1d' => 'Hardware 1',
	'1e' => 'Hardware 2',
	'1f' => 'Hardware 3',
	'20' => 'Hardware 4',
	'21' => 'Hardware 5',
	'22' => 'Hardware 6',
	'23' => 'Hardware 7',
	'24' => 'Hardware 8',
	'25' => 'Hardware 9',
	'26' => 'Up RAM',
	'27' => 'Down RAM',
	'28' => 'Invisible'
);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Supaplex Editor</title>
    <meta charset="utf-8">

    <link rel="stylesheet" href="css/stylesheet.css">
</head>
<body>
<?php
echo '<table cellpadding="0" cellspacing="0" id="field"><tr>';
$i = 0;
foreach ($structure as $key=>$element) {
    if (empty($element) || trim($element) == '') continue;
    if ($key >= 1529) break;
    $field = $elements[$element];

    $fileName = strtolower($field);
    $fileName = str_replace(' ', '', $fileName);
    echo '<td style="background: url(icons/'.$fileName.'.png);width:32px;height:32px;display:inline-block" data-position="el-'.$i.'">'.'</td>';

    $i++;
    echo ( ($i) % 60 == 0) ? '</tr><tr>' : '';

    if ($i >= 1440) break;
}
echo '</tr></table>';
?>
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
<script src="js/editor.js"></script>
</body>
</html>
