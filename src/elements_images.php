<?php

$elements = require('elements.php');
foreach ($elements as $key=>$value) {
    $elements[$key] = trim( strtolower($value) );
    $elements[$key] = str_replace(' ', '', $elements[$key]);
}
return $elements;