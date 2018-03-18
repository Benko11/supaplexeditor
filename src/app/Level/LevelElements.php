<?php

class LevelElements {
    protected $elements;
    protected $elements_images = array();

    public function __construct() {
        $this->elements = require_once 'config/elements.php';
        $this->elements_images = require_once 'config/elements_images.php';
    }
}