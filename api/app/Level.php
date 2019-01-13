<?php

namespace App;

class Level {
    /** @var int */
    protected $width;

    /** @var int */
    protected $height;

    /** @var int */
    protected $grid;

    /** @var int */
    protected $capacity;

    public function __construct(int $width = null, int $height = null, int $capacity = null) {
        if ($width) {
            $this->width = $width;
        } else {
            $this->width = 60;
        }

        if ($height) {
            $this->height = $height;
        } else {
            $this->height = 24;
        }

        if ($capacity) {
            $this->capacity = $capacity;
        } else {
            $this->capacity = 111;
        }

        $this->grid = $this->width * $this->height;
    }

    public function select(int $id) {
        ($id - 1) * $this->grid + 96 * ($id - 1);
    }
}