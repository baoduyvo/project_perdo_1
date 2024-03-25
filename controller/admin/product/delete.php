<?php
require_once '../../../database/connect.php';

$product_id = $_GET['product_id'];

$sql = 'DELETE FROM product_images WHERE product_id=:product_id;
        DELETE FROM product WHERE id=:product_id;';

$old_image_path = '../../../uploads/product/' . $_GET['image'];

if (file_exists($old_image_path)) {
    unlink($old_image_path);
}

try {
    $statement = $conn->prepare($sql);

    $statement->bindParam(':product_id', $product_id);

    $statement->execute();

    header('location: ../../../asset/admin/master.php?page=index&modules=product');
} catch (Exception $ex) {
    echo 'message: ' . $ex->getMessage() . '<br/>';
    echo 'file: ' . $ex->getFile() . '<br/>';
    echo 'line: ' . $ex->getLine() . '<br/>';
}
