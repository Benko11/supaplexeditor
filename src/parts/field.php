<?php

class LevelBinary {
    private $width;
    private $height;
    private $size;
    private $levels;

    protected $levelId;
    protected $level = array();

    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
        $this->size = $this->width * $this->height;

        if (isset($_GET['id']) && !empty($_GET['id'])
            && (int)$_GET['id'] >= 1 && (int)$_GET['id'] <= 111) {
            $this->levelId = $_GET['id'];
        } else {
            $this->levelId = 1;
        }

        $this->levels = bin2hex(file_get_contents('LEVELS.DAT')); // TODO: implement database later on

        $this->level['field'] = $this->generateLevelField();
        $this->level['info'] = $this->generateLevelInfo($this->level['field']);
    }

    /**
     * @return array
     */
    private function generateLevelField() {
        $field = str_split($this->levels, 2);
        $beginning = ($this->levelId - 1) * $this->size + 96 * ($this->levelId - 1);
        $field = array_slice($field, $beginning, $this->size);
        return $field;
    }

    /**
     * @param $field
     * @return array
     */
    private function generateLevelInfo($field) {
        $beginning = $this->levelId * $this->size + ($this->levelId - 1) * 96;
        $info = array_slice($field, $beginning, $this->size);
        return $info;
    }
}

class LevelRender extends LevelBinary {
    public function __construct($width, $height) {
        parent::__construct($width, $height);
    }
}

$width = 60;
$height = 24;
$size = $width * $height;

$levels = bin2hex(file_get_contents('LEVELS.DAT'));

// gets all the levels and split them into binary sectors
$structure = str_split($levels, 2);

// retrieves only the level that is needed
if (isset($_GET['id']) && (int)$_GET['id'] >= 1 && (int)$_GET['id'] <= 111) $id = $_GET['id'];
else $id = 1;

// initiates an array with level info
$info = array();
$info['i_av'] = 0; // infotrons available
$info['i_n'] = 0; // infotrons needed
$info['e_av'] = 0; // electrons available
$info['g'] = false; // gravity
$info['f_z'] = false; // freeze zonks

// generates its data by retrieving the respective binary portion
$beginning = $id * $size + ($id - 1) * 96;
$info['sectors'] = array_slice($structure, $beginning, 96);
$info['i_n'] = $info['sectors'][30];
$info['g'] = ($info['sectors'][4] == 0) ? false : true;
$info['f_z'] = ($info['sectors'][29] == 2) ? true : false;

// generates an array with level structure
$beginning = ($id - 1) * $size + 96 * ($id - 1);
$structure = array_slice($structure, $beginning, $size);

$i = 0;
foreach ($structure as $element) {
    if (empty($element) || trim($element) == '') continue;

    $field = $elements_images[$element];

    switch ($field) {
        case 'infotron':
            $info['i_av']++;
            break;
        case 'electron':
            $info['e_av']++;
            break;
    }

    echo '<td style="background: url('. BASE_PATH .'/icons/'.$field.'.png);width:32px;height:32px;display:inline-block" ';
    echo 'data-type="'. $field .'" ';
    echo 'data-position="el-'.$i.'">';
    echo '</td>';

    $i++;
    echo ( ($i) % 60 == 0) ? '</tr><tr>' : '';
}

// if there are any infotrons, but none are meant to be needed, change that to the default behaviour
if ($info['i_n'] == 0 && $info['i_av'] > 0) {
    $info['i_n'] = $info['i_av'];
} else {
    $info['i_n'] = hexdec($info['i_n']);
}