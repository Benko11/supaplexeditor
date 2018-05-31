<?php

class FieldElement {
    public $elements;
    public $elements_images = array();

    public function __construct() {
        $this->elements = require_once 'config/app/elements.php';
        $this->elements_images = require_once 'config/app/elements_images.php';
    }
}