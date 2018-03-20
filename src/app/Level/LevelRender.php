<?php

class LevelRender extends LevelBinary {
    /**
     * LevelRender constructor.
     * @param $width
     * @param $height
     */
    public function __construct($width, $height) {
        parent::__construct($width, $height);
    }

    public function generateLevelField() {
        $this->level['field'] = $this->generateBinaryLevelField();
        echo '<table id="field" cellpadding="0" cellspacing="0"><tr>';

        $i = 0;

        foreach ($this->level['field'] as $element) {
            if (empty($element) || trim($element) == '') continue;

            $field = $this->elements_images[$element];

            echo '<td style="background: url('. BASE_PATH .'/icons/'.$field.'.png);width:32px;height:32px;display:inline-block" ';
            echo 'data-type="'. $field .'" ';
            echo 'data-position="el-'.$i.'"></td>';

            $i++;
            echo ($i % $this->width == 0) ? '</tr><tr>' : '';
        }
        echo '</tr></table>';

        return true;
    }

    public function generateLevelInfo() {
        return parent::generateBinaryLevelInfo();
    }
}