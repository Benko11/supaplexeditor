<?php

require_once 'vendor/autoload.php';
require_once 'app/Field/FieldElement.php';
require_once 'app/Field/FieldBinary.php';
require_once 'app/Field/FieldRender.php';

use Jenssegers\Blade\Blade;

$field = new FieldRender();

$blade = new Blade('resources/views', 'cache');
$content = $blade->make('field.content', [
    'level' => $field->level(),
    'info' => $field->info(),
    'elements' => $field->elements
]);
echo $content;