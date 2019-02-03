<?php

namespace App;

class File extends Level
{
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

    /**
     * @param $capacity
     * File constructor. Accepts the capacity (i.e. the maximum number of levels for a given levelset)
     * as a parameter or if it is empty, it defaults to classic value.
     */
    public function __construct(int $capacity = null)
    {
        parent::__construct();

        if (!$capacity) {
            $this->capacity = 111;
        } else {
            $this->capacity = $capacity;
        }
    }

    /**
     * @param $fileName
     * @return App\File
     * Sets the attribute $filename to the value provided in the paramater.
     * Can have other methods appended to it.
     */
    public function setFileName(string $filename)
    {
        $this->filename = $filename;
        return $this;
    }

    /**
     * @return string
     * Gets the value of the attribute $fileName.
     */
    public function getFileName()
    {
        return $this->filename;
    }

    /**
     * @param $type
     * @return App\File
     * Sets the type of the file that is to be worked with.
     * Can have other methods appended to it.
     */
    public function setType(string $type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     * Gets the value of the atrribute $type.
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param $fileName, $type
     * @return App\File;
     * Based on other provided attributes or parameters, this method sets the full
     * name of the levelset file based on its properties.
     */
    public function setSource(string $filename = null, string $type = null)
    {
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

    /**
     * @return string
     * Gets the value of the attribute $source.
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param $fileName, $type
     * @return App\File
     * Helper method that facilitates lengthy calls and better defines
     * the nomenclature.
     */
    public function config(string $fileName, string $type)
    {
        $this->setFileName($fileName);
        $this->setType($type);
        $this->setSource($fileName, $type);
        return $this;
    }

    /**
     * @return App\Level
     * Returns the entire binary file structure in an array.
     */
    public function read()
    {
        $binary = bin2hex(file_get_contents($this->getSource()));
        $binary = str_split($binary, 2);

        $this->fileBinary = $binary;
        return $this;
    }

    public function level(int $id = 1)
    {
        $this->select($id);
        return $this;
    }

    public function levels()
    {
        $file = new File;
        $file->config('LEVELS', 'DAT')->read();

        $names = [];
        for ($i = 0; $i < $file->getCapacity(); $i++) {
            $file = new File;
            $file->config('LEVELS', 'DAT')->read();

            $names[$i] = $file->level($i + 1)->name();
        }

        return $names;
    }

    /**
     * Gets the value of the attribute $capacity.
     */
    public function getCapacity()
    {
        return $this->capacity;
    }
}