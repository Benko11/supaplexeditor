<?php

/**
 * Class FieldBinary
 * This class handles packing the level data from a huge string into 'bundles' from which only the necessary stuff is accessed.
 */
class FieldBinary extends FieldElement {
    /** @var int */
    protected $levelId;

    /** @var int */
    protected $width;

    /** @var int */
    protected $height;

    /** @var int */
    protected $size;

    /** @var int */
    protected $capacity;

    /**
     * FieldBinary constructor.
     * Passes on the element arrays to the class.
     */
    public function __construct() {
        parent::__construct();

        $this->width = 60;
        $this->height = 24;
        $this->size = $this->width * $this->height;

        $this->capacity = 111;
        $this->file = 'LEVELS.DAT';

        $this->levelId =
            (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] >= 1 && $_GET['id'] <= $this->capacity)
                ? $_GET['id'] : 1;

        $this->levelData = $this->levelData();
        $this->infoData = $this->infoData();
    }

    /**
     * @param $file
     * @return array
     * This method retrieves the binary value in hex format of the entire level file and splits it into array chunks.
     * The parameter contains the path to the respective level file. TODO: add where it points eventually
     */
    protected function fileData($file) {
        $data = bin2hex(file_get_contents($file));
        $data_arrayed = str_split($data, 2);
        return $data_arrayed;
    }

    /**
     * @return array
     * This method returns the binary value in hex format of a given level. Currently supports only original DAT level structures.
     */
    protected function levelData() {
        $data = $this->fileData($this->file);
        $beginning = ($this->levelId - 1) * $this->size + 96 * ($this->levelId - 1);
        $data = array_slice($data, $beginning, $this->size);

        return $data;
    }

    /**
     * @param $element
     * @return bool|int
     * This function will return the number of elements present in a given level. If an unsupported file type is passed, it returns false.
     */
    protected function countElements($element) {
        if (is_string($element)) {
            $number = 0;
            $data = $this->levelData();

            foreach ($data as $sector) {
                $name = $this->elements_images[$sector];

                if ($element == strtolower($name)) {
                    ++$number;
                }
            }

            return $number;
        } else {
            return false;
        }
    }

    /**
     * @return array
     * This method returns certain information about the level along with the individual binary hex sectors. Currently supports only DAT level formats.
     */
    protected function infoData() {
        $data = $this->fileData($this->file);
        $beginning = $this->levelId * $this->size + ($this->levelId - 1) * 96;

        $info = array();
        $info['sectors'] = array_slice($data, $beginning, 96);
        $info['i_n'] = hexdec($info['sectors'][30]);
        $info['i_av'] = $this->countElements('infotron');
        $info['i_n'] = ($info['i_av'] > 0 && $info['i_n'] == 0) ? $info['i_av'] : $info['i_n']; // rewrite from 0 to all
        $info['g'] = ($info['sectors'][4] == 0) ? false : true;
        $info['f_z'] = ($info['sectors'][29] == 2) ? true : false;

        $info['name'] = array_slice($info['sectors'], 6, 23);
        foreach ($info['name'] as $key=>$character) {
            $info['name'][$key] = pack('H*', $info['name'][$key]);
        }
        $info['name'] = join('', $info['name']);

        return $info;
    }
}