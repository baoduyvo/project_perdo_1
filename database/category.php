<?php
require_once 'connect.php';

$sql = 'CREATE TABLE `CATEGORY` (
    id INT NOT NULL AUTO_INCREMENT,
    name NVARCHAR(50) NOT NULL,
    status TINYINT COMMENT "1:Show - 2:Hidden" DEFAULT(1),
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
