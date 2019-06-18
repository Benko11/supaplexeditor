<?php

function elements()
{
  return [
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
    '0c' => 'Up Port (special)', // special
    '0d' => 'Right Port (special)', // special
    '0e' => 'Down Port (special)', // special
    '0f' => 'Left Port (special)', // special
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
}

function elementsImages()
{
  $_elements = elements();
  foreach ($_elements as $key => $value) {
    $_elements[$key] = trim(strtolower($value));
    $_elements[$key] = str_replace(' ', '', $_elements[$key]);
    $_elements[$key] = str_replace('(special)', 's', $_elements[$key]);
  }
  return $_elements;
}
