<?php
require_once '../../database/connect.php';
require_once '../../function/image_processing.php';

date_default_timezone_set('Asia/Ho_Chi_Minh');

$sql = 'INSERT INTO product_images (images, product_id, created_at) VALUES (:images, :product_id, :created_at)';

try {
    $statement = $conn->prepare($sql);

    foreach ($_FILES['images']['name'] as $key => $imageName) {
        $imageFilename = generateFileName($_FILES['images']['name'][$key]);
        $productId = $id;
        $createdAt = date('Y-m-d H:i:s');

        $tmpName = $_FILES['images']['tmp_name'][$key];
        copy($tmpName, '../../uploads/product/' . $imageFilename);

        $statement->bindParam(':images', $imageFilename);
        $statement->bindParam(':product_id', $productId);
        $statement->bindParam(':created_at', $createdAt);

        $statement->execute();
    }
} catch (Exception $ex) {
    echo 'message: ' . $ex->getMessage() . '<br/>';
    echo 'file: ' . $ex->getFile() . '<br/>';
    echo 'line: ' . $ex->getLine() . '<br/>';
    die();
}
