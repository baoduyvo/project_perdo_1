<?php
require_once 'connect.php';

$sql = '
CREATE TABLE `PRODUCT` (
    id VARCHAR(20) NOT NULL,
    name VARCHAR(50) NOT NULL,
    price INT NOT NULL DEFAULT 100000,
    description VARCHAR(250),
    content VARCHAR(250),
    image VARCHAR(50),
    status TINYINT COMMENT "1:Show - 2:Hidden",
    featured TINYINT COMMENT "1:Featured - 2:UnFeatured",
    category_id INT,
    user_id VARCHAR(20),
    created_at DATE,
    updated_at DATE,
    PRIMARY KEY (id)
)';

try {
    $statement = $conn->prepare($sql);
    $statement->execute();

    // Add foreign key constraints
    $conn->exec('ALTER TABLE PRODUCT ADD FOREIGN KEY (category_id) REFERENCES category (id)');
    $conn->exec('ALTER TABLE PRODUCT ADD FOREIGN KEY (user_id) REFERENCES user (id)');
} catch (Exception $ex) {
    echo 'message: ' . $ex->getMessage() . '<br/>';
    echo 'file: ' . $ex->getFile() . '<br/>';
    echo 'line: ' . $ex->getLine() . '<br/>';
}
