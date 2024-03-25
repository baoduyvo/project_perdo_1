<?php
require_once 'connect.php';

$sql = '
CREATE TABLE `PRODUCT_IMAGES` (
    id INT NOT NULL AUTO_INCREMENT,
    images VARCHAR(250) NOT NULL,
    product_id VARCHAR(20),
    created_at DATE,
    updated_at DATE,
    PRIMARY KEY (id)
)';

try {
    $statement = $conn->prepare($sql);
    $statement->execute();

    // Add foreign key constraints
    $conn->exec('ALTER TABLE product_images ADD FOREIGN KEY (product_id) REFERENCES product (id)');
} catch (Exception $ex) {
    echo 'message: ' . $ex->getMessage() . '<br/>';
    echo 'file: ' . $ex->getFile() . '<br/>';
    echo 'line: ' . $ex->getLine() . '<br/>';
}
