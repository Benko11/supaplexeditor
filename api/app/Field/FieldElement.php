<?php

namespace App\Field;

class FieldElement {
    public $elements;
    public $elements_images = array();

    public function __construct() {
        $this->elements = elements();
        $this->elements_images = elementsImages();
    }
}