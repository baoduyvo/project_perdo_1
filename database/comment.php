<?php
require_once 'connect.php';

$sql = '
CREATE TABLE `COMMENT` (
    id INT NOT NULL AUTO_INCREMENT,
    content VARCHAR(250) NOT NULL,
    product_id VARCHAR(20),
    created_at DATE,
    updated_at DATE,
    PRIMARY KEY (id)
)';

try {
    $statement = $conn->prepare($sql);
    $statement->execute();

    // Add foreign key constraints
    $conn->exec('ALTER TABLE comment ADD FOREIGN KEY (product_id) REFERENCES product (id)');
} catch (Exception $ex) {
    echo 'message: ' . $ex->getMessage() . '<br/>';
    echo 'file: ' . $ex->getFile() . '<br/>';
    echo 'line: ' . $ex->getLine() . '<br/>';
}
