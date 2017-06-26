<?php

include 'Sort.php';

function ArrayToString(array $mas)
{
    if(is_array($mas))
    {
        $str = null;
        foreach($mas as $item)
        {
            $str .= $item . ' ';
        }
        return $str;
    }
    return false;
}

$mas = [9,7,13,4,2,1,12];

echo 'Исходный массив: ' . ArrayToString($mas);

echo '<br>' . ArrayToString(Sort::selectSort($mas));