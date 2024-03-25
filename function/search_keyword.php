<?php
function searchByKeyWord($users, $keyword)
{
    $result = [];
    foreach ($users as $user) {
        if (str_contains(strtolower($user['full_name']), strtolower($keyword))) {
            array_push($result, $user);
        }
    }
    return $result;
}
