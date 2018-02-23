<?php

$i = 0;
foreach ($structure as $key=>$element) {
    if (empty($element) || trim($element) == '') continue;

    $field = $elements[$element];

    $fileName = strtolower($field);
    $fileName = str_replace(' ', '', $fileName);

    echo '<td style="background: url('. BASE_PATH .'/icons/'.$fileName.'.png);width:32px;height:32px;display:inline-block" data-position="el-'.$i.'">'.'</td>';

    $i++;
    echo ( ($i) % 60 == 0) ? '</tr><tr>' : '';

    if ($i >= 1440) break;
}