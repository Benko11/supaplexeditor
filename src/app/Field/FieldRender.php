<?php

class FieldRender extends FieldBinary {
    public function __construct() {
        parent::__construct();
    }

    public function level() {
        $level = '<table id="field" cellspacing="0" cellpadding="0"><tr>';

        $i = 0;
        foreach ($this->levelData() as $sector) {
            $element = $this->elements_images[$sector];
            $level .= '<td style="background:url(\'icons/'.$element.'.png\')" ';
            $level .= 'data-type="'.$element.'" ';
            $level .= 'data-position="el-'.$i.'"';
            $level .= '></td>';

            $i++;
            $level .= ($i % $this->width == 0) ? '</tr><tr>' : '';
        }
        $level .= '</tr></table>';

        return $level;
    }

    public function info() {
        $g = ($this->infoData()['g']) ? 'ON' : 'OFF';
        $f_z = ($this->infoData()['f_z']) ? 'ON' : 'OFF';

        $levelInfo = array();
        $levelInfo['id'] = $this->levelId;
        $levelInfo['infotronsNeeded'] = (int)$this->infoData()['i_n'];
        $levelInfo['infotronsAvailable'] = $this->infoData()['i_av'];
        $levelInfo['gravity'] = $this->infoData()['g'];
        $levelInfo['freezeZonks'] = $this->infoData()['f_z'];

        return $levelInfo;
    }
}