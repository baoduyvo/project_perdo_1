<?php
const _HOST = 'localhost';
const _DB = 'project_period_1';
const _USER = 'root';
const _PASS = '';
try {
    if (class_exists('PDO')) {
        $dsn = 'mysql:dbname=' . _DB . ';host=' . _HOST;
        $options = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        $conn = new PDO($dsn, _USER, _PASS, $options);
        // if ($conn) {
        //     echo 'connect sussfully';
        // }
    }
} catch (Exception $e) {
    echo $e->getMessage();
    die();
}
