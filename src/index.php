<?php

// generates the element lists
$elements = require "parts/elements.php";
$elements_images = require "parts/elements_images.php";

$currentUrl = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]/src";
define('BASE_PATH', $currentUrl);

if (isset($_POST['submit'])) {
    require 'transaction.php';
    die();
}

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
        <?php require_once "parts/field.php"; ?>
    </tr>
</table>

<?php require_once 'parts/mainMenu.php'; ?>

<?php require_once 'parts/info.php'; ?>

<?php require_once 'parts/statusbar.php'; ?>

<script src="<?php echo BASE_PATH ?>/js/objects.js"></script>
<script src="<?php echo BASE_PATH ?>/js/editor.js"></script>
</body>
</html>
