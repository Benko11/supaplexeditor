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

        $info = '<section id="info">';
        $info .= '<header>Level #'.$this->levelId.'</header>';
        $info .= '<p><strong>Infotrons needed:</strong> <span id="infotrons">'.(int)$this->infoData()['i_n'].'</span></p>';
        $info .= '<p><strong>Infotrons available:</strong> <span id="infotronsAvailable">'.$this->infoData()['i_av'].'</span></p>';
        $info .= '<p><strong>Electrons available:</strong> '.$this->infoData()['e_av'].'</p>';
        $info .= '<p><strong>Gravity:</strong> '.$g.'</p>';
        $info .= '<p><strong>Freeze zonks:</strong> '.$f_z.'</p>';
        $info .= '</section>';

        return $info;
    }
}