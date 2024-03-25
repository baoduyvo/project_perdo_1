<?php
require_once '../../database/connect.php';

$sql = 'SELECT p.*,
        c.name AS category_name
        FROM product p
        INNER JOIN category c ON p.category_id = c.id';

try {
    $statement = $conn->prepare($sql);

    $statement->execute();

    $products = $statement->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $ex) {
    echo 'message: ' . $ex->getMessage() . '<br/>';
    echo 'file: ' . $ex->getFile() . '<br/>';
    echo 'line: ' . $ex->getLine() . '<br/>';
}
