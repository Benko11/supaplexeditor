<?php

require_once 'vendor/autoload.php';
require_once 'app/Field/FieldElement.php';
require_once 'app/Field/FieldBinary.php';
require_once 'app/Field/FieldRender.php';

if (isset($_POST['submit'])) {
	require_once 'app/Level/LevelSave.php';

	$save = new LevelSave();
	header('Location: index.php?id='.$_GET['id']);
}

use Jenssegers\Blade\Blade;

$field = new FieldRender();

$blade = new Blade('resources/views', 'cache');
$content = $blade->make('field.content', [
    'level' => $field->level(),
    'info' => $field->info(),
    'elements' => $field->elements,
    'elements_images' => $field->elements_images
]);

echo $content;