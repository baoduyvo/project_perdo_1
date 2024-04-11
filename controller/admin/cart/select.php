<?php
require_once '../../database/connect.php';

$sql = 'SELECT  b.id,b.full_name,b.email,b.phone,b.address,b.cart_total,b.created_at,
                cd.product_name,cd.price,cd.quantity,cd.image
        FROM bill_detail bd
        JOIN bill b ON bd.bill_id = b.id
        JOIN cart_detail cd ON bd.cart_detail_id = cd.id
        ORDER BY b.id DESC';

try {
    $statement = $conn->prepare($sql);

    $statement->execute();

    $carts = $statement->fetchAll(PDO::FETCH_ASSOC);

   
} catch (Exception $ex) {
    echo 'message: ' . $ex->getMessage() . '<br/>';
    echo 'file: ' . $ex->getFile() . '<br/>';
    echo 'line: ' . $ex->getLine() . '<br/>';
}
