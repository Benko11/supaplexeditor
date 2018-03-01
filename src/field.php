<?php

$width = 60;
$height = 24;
$size = $width * $height;

$levels = bin2hex(file_get_contents('LEVELS.DAT'));

// gets all the levels and split them into binary sectors
$structure = str_split($levels, 2);

// retrieves only the level that is needed
if (isset($_GET['id']) && (int)$_GET['id'] >= 1 && (int)$_GET['id'] <= 111) $id = $_GET['id'];
else $id = 1;

$info = array();
$info['i_av'] = 0; // infotrons available
$info['i_n'] = 0; // infotrons needed
$info['e_av'] = 0; // electrons available
$info['g'] = false; // gravity
$info['f_z'] = false; // freeze zonks

// generates an array with level info
$beginning = $id * $size + ($id - 1) * 96;
$info['sectors'] = array_slice($structure, $beginning, 96);
$info['i_n'] = $info['sectors'][30];
$info['g'] = ($info['sectors'][4] == 0) ? false : true;
$info['f_z'] = ($info['sectors'][29] == 2) ? true : false;

// generates an array for the level
$beginning = ($id - 1) * $size + 96 * ($id - 1);
$structure = array_slice($structure, $beginning, $size);

$i = 0;
foreach ($structure as $key=>$element) {
    if (empty($element) || trim($element) == '') continue;

    $field = $elements[$element];

    // generate an element image
    $fileName = strtolower($field);
    $fileName = str_replace(' ', '', $fileName);

    switch ($fileName) {
        case 'infotron':
            $info['i_av']++;
            break;
        case 'electron':
            $info['e_av']++;
            break;
    }

    echo '<td data-type="'. $fileName .'" style="background: url('. BASE_PATH .'/icons/'.$fileName.'.png);width:32px;height:32px;display:inline-block" data-position="el-'.$i.'">'.'</td>';

    $i++;
    echo ( ($i) % 60 == 0) ? '</tr><tr>' : '';
}

// if there are any infotrons, but none are needed, change that to the default behaviour
if ($info['i_n'] == 0 && $info['i_av'] > 0) {
    $info['i_n'] = $info['i_av'];
} else {
    $info['i_n'] = hexdec($info['i_n']);
}