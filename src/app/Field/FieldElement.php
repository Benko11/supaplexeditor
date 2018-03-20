<?php

/**
 * Class FieldElement
 * This class generates the items with the elements' names. All other Field classes inherit from this class.
 */
class FieldElement {
    /** @var array  */
    protected $elements;

    /** @var array  */
    protected $elements_images;

    /**
     * FieldElement constructor.
     * Defines the values to be passed on.
     */
    public function __construct() {
        $this->elements = [
            '00' => 'Void',
            '01' => 'Zonk',
            '02' => 'Base',
            '03' => 'Murphy',
            '04' => 'Infotron',
            '05' => 'Standard RAM',
            '06' => 'Standard Hardware',
            '07' => 'Exit',
            '08' => 'Orange Disk',
            '09' => 'Right Port',
            '0a' => 'Down Port',
            '0b' => 'Left Port',
            '0c' => 'Up Port', // special
            '0d' => 'Right Port', // special
            '0e' => 'Down Port', // special
            '0f' => 'Left Port', // special
            '10' => 'Up Port',
            '11' => 'Snik Snak',
            '12' => 'Yellow Disk',
            '13' => 'Terminal',
            '14' => 'Red Disk',
            '15' => 'Vertical Port',
            '16' => 'Horizontal Port',
            '17' => 'Universal Port',
            '18' => 'Electron',
            '19' => 'Bug',
            '1a' => 'Left RAM',
            '1b' => 'Right RAM',
            '1c' => 'Hardware 0',
            '1d' => 'Hardware 1',
            '1e' => 'Hardware 2',
            '1f' => 'Hardware 3',
            '20' => 'Hardware 4',
            '21' => 'Hardware 5',
            '22' => 'Hardware 6',
            '23' => 'Hardware 7',
            '24' => 'Hardware 8',
            '25' => 'Hardware 9',
            '26' => 'Up RAM',
            '27' => 'Down RAM',
            '28' => 'Invisible'
        ];

        $this->elements_images = array();
        foreach ($this->elements as $key=>$value) {
            $this->elements_images[$key] = trim(strtolower($value));
            $this->elements_images[$key] = str_replace(' ', '', $this->elements_images[$key]);
        }
    }
}