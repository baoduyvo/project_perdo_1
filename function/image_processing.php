<?php
function generateFileName($fileName)
{
    $lastIndex = strrpos($fileName, '.');

    $ext = substr($fileName, $lastIndex);
    return uniqid()  . $ext;
}
