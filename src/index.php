<?php

require_once 'app/Level/LevelElements.php';
require 'vendor/autoload.php';
use Jenssegers\Blade\Blade;

// generates the element lists
$elements = require "config/elements.php";
$elements_images = require "config/elements_images.php";

$currentUrl = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]/src";
define('BASE_PATH', $currentUrl);

if (isset($_POST['submit'])) {
    require 'transaction.php';
    die();
}

$blade = new Blade(['resources/views'], 'cache');
echo $blade->make('field.content', ['files' => array('mainMenu', 'info', 'statusBar')]);
die();