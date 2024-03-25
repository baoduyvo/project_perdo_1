<?php
require_once 'connect.php';

$sql = 'CREATE TABLE `USER` (
    id VARCHAR(20) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(200) NOT NULL,
    level TINYINT COMMENT "1:Admin - 2:Member",
    status TINYINT COMMENT "1:Show - 2:Hidden",
    full_name NVARCHAR(50) NOT NULL,
    gender TINYINT COMMENT "1:Male - 2:Female",
    image VARCHAR(200),
    phone VARCHAR(20) NOT NULL,
    address NVARCHAR(200) NOT NULL,
    created_at DATE,
    updated_at DATE,
    PRIMARY KEY (id)
);
';
try {
    $statement = $conn->prepare($sql);

    $statement->execute();
} catch (Exception $ex) {
    echo 'message: ' . $ex->getMessage() . '<br/>';
    echo 'file: ' . $ex->getFile() . '<br/>';
    echo 'line: ' . $ex->getLine() . '<br/>';
}
