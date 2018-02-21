<?php

$i = 0;
foreach ($structure as $key=>$element) {
    if (empty($element) || trim($element) == '') continue;
    if ($key >= 1529) break;
    $field = $elements[$element];

    // format element names to file names
    $fileName = strtolower($field);
    $fileName = str_replace(' ', '', $fileName);

    echo '<td style="background: url('. BASE_PATH .'/icons/'.$fileName.'.png);" data-position="el-'.$i.'">'.'</td>';

    $i++;
    echo ( ($i) % 60 == 0) ? '</tr><tr>' : '';

    if ($i >= 1440) break;
}