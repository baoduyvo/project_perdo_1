<?php
require_once '../../../database/connect.php';

$id = $_GET['id'];

$sql = 'DELETE FROM product_images WHERE product_id=:id;';

try {
    $statement = $conn->prepare($sql);

    $statement->bindParam(':id', $id);

    $statement->execute();

    header('location: ../../../asset/admin/master.php?page=index&modules=product');
} catch (Exception $ex) {
    echo 'message: ' . $ex->getMessage() . '<br/>';
    echo 'file: ' . $ex->getFile() . '<br/>';
    echo 'line: ' . $ex->getLine() . '<br/>';
}
