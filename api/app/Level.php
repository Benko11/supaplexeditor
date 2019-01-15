<?php

namespace App;

class Level {
    /** @var int */
    protected $id;

    /** @var int */
    protected $width;

    /** @var int */
    protected $height;

    /** @var int */
    protected $grid;

    /** @var int */
    protected $capacity;

    /** @var array */
    protected $levelBinary;

    /** @var array */
    private $info;

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

    protected function select(int $id) {
        if (!($id > 0 && $id <= $this->capacity)) throw new \Exception("Number out of range: '$id' is not within the range of 1-{$this->capacity}");

        $this->id = $id;
        $start = ($this->id - 1) * $this->grid + 96 * ($this->id - 1);
        $this->levelBinary = array_slice($this->fileBinary, $start, $this->grid);
    }

    public function info() {
        $start = $this->id * $this->grid + ($this->id - 1) * 96;
        $this->info = array_slice($this->fileBinary, $start, 96);
        return $this;
    }

    /**
     * @param $element
     * @return int
     * This function will return the number of elements present in a given level. If an unsupported file type is passed, it returns false.
     */
    protected function countElements(string $element) {
        $number = 0;

        foreach ($this->levelBinary as $sector) {
            $name = elementsImages()[$sector];

            if ($element == strtolower($name)) {
                ++$number;
            }
        }

        return $number;
    }

    public function render() {
        return $this->levelBinary;
    }

    public function gravity() {
        $this->setInfo();

        return !($this->info[4] == 0);
    }

    public function freezeZonks() {
        $this->setInfo();

        return ($this->info[29] == 2);
    }

    public function infotrons() {
        $this->setInfo();

        return hexdec($this->info[30]);
    }

    public function allInfotrons() {
        return $this->countElements('infotron');
    }

    public function classicName() {
        $this->setInfo();

        // First we retrieve the data sectors for the level name
        $name = array_slice($this->info, 6, 23);

        // Then we translate each binary sector into character
        foreach ($name as $key => $sector) {
            $name[$key] = pack('H*', $name[$key]);
        }

        // Lastly we will join the array into a string
        return join('', $name);
    }

    public function name() {
        $this->setInfo();

        $name = $this->classicName();
        $name = str_split($name);

        $letters = [];
        foreach ($name as $key => $character) {
            if (ctype_alpha($character)) {
                $letters[] = $key;
            }
        }
        $threshold = [min($letters), max($letters)];

        foreach ($name as $key => $character) {
            if ($key < $threshold[0] && $character == '-') {
                $name[$key] = '';
            }

            if ($key > $threshold[1] && $character == '-') {
                $name[$key] = '';
            }
        }

        $name = implode('', $name);
        return trim($name);
    }

    /**
     * Sets the parameter of the info attribute if it has been not set yet.
     */
    private function setInfo() {
        if (!$this->info) $this->info();
    }
}