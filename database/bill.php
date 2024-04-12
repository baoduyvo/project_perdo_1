<?php
require_once 'connect.php';

$sql = 'CREATE TABLE `Bill` (
    id INT NOT NULL AUTO_INCREMENT,
    full_name NVARCHAR(50),
    email NVARCHAR(50),
    phone VARCHAR(20),
    address NVARCHAR(250),
    status TINYINT COMMENT "1:Accept - 2:Refuse - 3:Peding",
    cart_total INT,
    user_id VARCHAR(20),
    created_at DATE,
    updated_at DATE,
    PRIMARY KEY (id)
    )';
try {
    $statement = $conn->prepare($sql);

    $statement->execute();

    $conn->exec('ALTER TABLE Bill ADD FOREIGN KEY (user_id) REFERENCES user (id)');
} catch (Exception $ex) {
    echo 'message: ' . $ex->getMessage() . '<br/>';
    echo 'file: ' . $ex->getFile() . '<br/>';
    echo 'line: ' . $ex->getLine() . '<br/>';
}
