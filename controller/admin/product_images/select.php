<?php
require_once '../../database/connect.php';

$sql = 'SELECT p_images.*
        FROM product_images p_images
        INNER JOIN product p ON p_images.product_id = p.id';

try {
    $statement = $conn->prepare($sql);

    $statement->execute();

    $product_images = $statement->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $ex) {
    echo 'message: ' . $ex->getMessage() . '<br/>';
    echo 'file: ' . $ex->getFile() . '<br/>';
    echo 'line: ' . $ex->getLine() . '<br/>';
}
