<?php

$_elements = require('elements.php');
foreach ($_elements as $key=>$value) {
    $_elements[$key] = trim( strtolower($value) );
    $_elements[$key] = str_replace(' ', '', $_elements[$key]);
}
return $_elements;