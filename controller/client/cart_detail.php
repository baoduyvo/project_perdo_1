<?php
require_once '../../database/connect.php';

date_default_timezone_set('Asia/Ho_Chi_Minh');

$sql = 'INSERT INTO cart_detail
        (id,price,quantity,product_id,cart_id,created_at)
        VALUES
        (:id,:price,:quantity,:product_id,:cart_id,:created_at)';

$id = uniqid();


try {

    $statement = $conn->prepare($sql);

    $statement->bindParam(':id', $id);
 
    $statement->bindParam(':created_at', $created_at);

    $statement->execute();
} catch (Exception $ex) {
    echo 'message: ' . $ex->getMessage() . '<br/>';
    echo 'file: ' . $ex->getFile() . '<br/>';
    echo 'line: ' . $ex->getLine() . '<br/>';
}
