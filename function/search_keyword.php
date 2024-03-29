<?php
function searchByKeyWord($arrays, $keyword, $search)
{
    $result = [];
    foreach ($arrays as $array) {
        if (str_contains(strtolower($array[$search]), strtolower($keyword))) {
            array_push($result, $array);
        }
    }
    return $result;
}
