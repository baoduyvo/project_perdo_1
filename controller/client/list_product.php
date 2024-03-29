<?php
require_once '../../database/connect.php';

$sql = 'SELECT p.id, p.name, p.price, p.image
        FROM product as p
        limit 8';
try {
    $statement = $conn->prepare($sql);

    $statement->execute();

    $products = $statement->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $ex) {
    echo 'message: ' . $ex->getMessage() . '<br/>';
    echo 'file: ' . $ex->getFile() . '<br/>';
    echo 'line: ' . $ex->getLine() . '<br/>';
}
