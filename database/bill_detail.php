<?php
require_once 'connect.php';

$sql = 'CREATE TABLE `Bill_DETAIL` (
    id INT NOT NULL AUTO_INCREMENT,
    bill_id INT,
    cart_detail_id INT,
    created_at DATE,
    updated_at DATE,
    PRIMARY KEY (id)
    )';
try {
    $statement = $conn->prepare($sql);

    $statement->execute();

    $conn->exec('ALTER TABLE Bill_DETAIL ADD FOREIGN KEY (bill_id) REFERENCES bill (id)');

    $conn->exec('ALTER TABLE Bill_DETAIL ADD FOREIGN KEY (cart_detail_id) REFERENCES CART_DETAIL (id)');
} catch (Exception $ex) {
    echo 'message: ' . $ex->getMessage() . '<br/>';
    echo 'file: ' . $ex->getFile() . '<br/>';
    echo 'line: ' . $ex->getLine() . '<br/>';
}
