<?php

$id = (isset($_GET['id'])) ? $_GET['id'] : 1;
$beginning = ($id - 1) * 1440 + ($id - 1) * 96;

$levels = bin2hex(file_get_contents('LEVELS.DAT'));
$structure = str_split($levels, 2);
$structure = array_slice($structure, $beginning, 1440);

// go through what has been sent in a form
foreach ($_POST as $name=>$element) {
    if (strpos($name, 'el-') !== false) {
        // convert data element to a number
        $pos = substr($name,3);

        // test whether the sliced part represents an actual number and change the corresponding structure sectors
        if (is_numeric($pos)) {
            $structure[$pos - 1] = array_search($element, $elements_images);
        }
    }
}

print_r($_POST);