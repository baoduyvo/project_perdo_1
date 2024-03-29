<?php
require_once 'connect.php';

$sql = '
CREATE TABLE `CART_DETAIL` (
    id INT NOT NULL AUTO_INCREMENT,
    price INT,
    quantity INT,
    product_id VARCHAR(20),
    cart_id INT,
    created_at DATE,
    updated_at DATE,
    PRIMARY KEY (id)
)';

try {
    $statement = $conn->prepare($sql);
    $statement->execute();

    // Add foreign key constraints
    $conn->exec('ALTER TABLE CART_DETAIL ADD FOREIGN KEY (product_id) REFERENCES product (id)');

    $conn->exec('ALTER TABLE CART_DETAIL ADD FOREIGN KEY (cart_id) REFERENCES cart (id)');
} catch (Exception $ex) {
    echo 'message: ' . $ex->getMessage() . '<br/>';
    echo 'file: ' . $ex->getFile() . '<br/>';
    echo 'line: ' . $ex->getLine() . '<br/>';
}
