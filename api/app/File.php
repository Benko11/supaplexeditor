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
    protected $binary;

    public function __construct() {
        parent::__construct();
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

    public function read() {
        $binary = bin2hex(file_get_contents($this->getSource()));
        $binary = str_split($binary, 2);

        $this->binary = $binary;
        return $this;
    }

    public function level() {
        
    }
}