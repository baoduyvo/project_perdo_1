<?php
require_once '../../database/connect.php';

$sql = 'SELECT * FROM category';

try {
    $statement = $conn->prepare($sql);

    $statement->execute();

    $categories = $statement->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $ex) {
    echo 'message: ' . $ex->getMessage() . '<br/>';
    echo 'file: ' . $ex->getFile() . '<br/>';
    echo 'line: ' . $ex->getLine() . '<br/>';
}
