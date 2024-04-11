<?php
$sql = 'INSERT INTO bill_detail 
        (bill_id, cart_detail_id, created_at) 
        VALUES 
        (:bill_id, :cart_detail_id, :created_at)';

try {
    foreach ($cart_details as $cart_detail) {
        $statement = $conn->prepare($sql);

        $statement->bindValue(':bill_id', $bill_id); 
        $statement->bindValue(':cart_detail_id', $cart_detail['id']); 
        $statement->bindValue(':created_at', date('Y-m-d H:i:s')); 

        $statement->execute();
    }
} catch (PDOException $ex) {
    echo 'Error message: ' . $ex->getMessage() . '<br/>';
    echo 'File: ' . $ex->getFile() . '<br/>';
    echo 'Line: ' . $ex->getLine() . '<br/>';
}
