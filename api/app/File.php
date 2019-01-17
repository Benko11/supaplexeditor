<?php

namespace App;

class File extends Level {
    /** @var string */
    /**
     * Supports 'dat', 'mpx' and 'sp'.
     */
    protected $type;

    /** @var string */
    protected $filename;

    /** @var string */
    protected $source;

    /** @var array */
    protected $fileBinary;

    /** @var integer */
    protected $capacity;

    public function __construct(int $capacity = null) {
        parent::__construct();

        if (!$capacity) {
            $this->capacity = 111;
        } else {
            $this->capacity = $capacity;
        }
    }

    public function setFileName($filename) {
        $this->filename = $filename;
        return $this;
    }

    public function getFileName() {
        return $this->filename;
    }

    public function setType($type) {
        $this->type = $type;
        return $this;
    }

    public function getType() {
        return $this->type;
    }

    public function setSource(string $filename = null, string $type = null) {
        $source = '../storage/app/levels/';
        if ($filename) {
            $source .= $filename;
        } else {
            $source .= $this->getFileName();
        }

        $source .= '.';

        if ($type) {
            $source .= $type;
        } else {
            $source .= $this->getType();
        }

        $this->source = $source;
        return $this;
    }

    public function getSource() {
        return $this->source;
    }

    public function config($fileName, $type) {
        $this->setFileName($fileName);
        $this->setType($type);
        $this->setSource($fileName, $type);
        return $this;
    }

    public function read() {
        $binary = bin2hex(file_get_contents($this->getSource()));
        $binary = str_split($binary, 2);

        $this->fileBinary = $binary;
        return $this;
    }

    public function level(int $id = 1) {
        $this->select($id);
        return $this;
    }

    public function levels() {
        $levels = [];
        
        $i = 0;
        dump($this->id);
        $levels[0] = $this->level(3)->name();
        dump($this->id);
        $levels[] = $this->level(22)->name();
        dump($this->id);
        // while ($i < 111) {
        //     $levels[] = $this->level($i + 1)->name();
        //     $i++;
        // }
        return $levels;
    }

    public function getCapacity() {
        return $this->capacity;
    }
}