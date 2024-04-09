<?php
require_once 'connect.php';

$sql = '
CREATE TABLE `CART_DETAIL` (
    id INT NOT NULL AUTO_INCREMENT,
    product_name VARCHAR(50) NOT NULL,
    price INT,
    quantity INT,
    image VARCHAR(200),
    status TINYINT COMMENT "1:Show - 2:Hidden",
    product_id VARCHAR(20),
    user_id VARCHAR(20),
    created_at DATE,
    updated_at DATE,
    PRIMARY KEY (id)
)';

try {
    $statement = $conn->prepare($sql);
    
    $statement->execute();

    $conn->exec('ALTER TABLE CART_DETAIL ADD FOREIGN KEY (product_id) REFERENCES product (id)');

    $conn->exec('ALTER TABLE CART_DETAIL ADD FOREIGN KEY (user_id) REFERENCES user (id)');
} catch (Exception $ex) {
    echo 'message: ' . $ex->getMessage() . '<br/>';
    echo 'file: ' . $ex->getFile() . '<br/>';
    echo 'line: ' . $ex->getLine() . '<br/>';
}
