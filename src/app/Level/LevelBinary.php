<?php

class LevelBinary extends LevelElements {
    /** @var int */
    protected $width;

    /** @var int */
    protected $height;

    /** @var int */
    protected $size;

    /** @var array */
    private $levels;

    /** @var int */
    public $levelId;

    /** @var array */
    public $level = array();

    /**
     * LevelBinary constructor.
     * @param $width
     * @param $height
     */
    public function __construct(int $width, int $height) {
        parent::__construct();

        $this->width = $width;
        $this->height = $height;
        $this->size = $this->width * $this->height;

        if (isset($_GET['id']) && !empty($_GET['id'])
            && (int)$_GET['id'] >= 1 && (int)$_GET['id'] <= 111) {
            $this->levelId = $_GET['id'];
        } else {
            $this->levelId = 1;
        }


        $levels = bin2hex(file_get_contents('LEVELS.DAT')); // TODO: implement database later on
        $this->levels = str_split($levels, 2);

        // define level binary respective data
        $this->level['field'] = $this->generateBinaryLevelField();
    }

    /**
     * @return array
     */
    public function generateBinaryLevelField() {
        $beginning = ($this->levelId - 1) * $this->size + 96 * ($this->levelId - 1);
        $field = array_slice($this->levels, $beginning, $this->size);

        return $field;
    }

    /**
     * @return array
     */
    public function generateBinaryLevelInfo() {
        $beginning = $this->levelId * $this->size + ($this->levelId - 1) * 96;
        $info = array_slice($this->levels, $beginning, 96);

        return $info;
    }

    public function countElements(string $element) {

    }
}