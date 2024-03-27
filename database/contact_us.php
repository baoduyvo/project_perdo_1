<?php
require_once 'connect.php';

$sql = 'CREATE TABLE `CONTACT_US` (
    id INT NOT NULL AUTO_INCREMENT,
    message NVARCHAR(250),
    user_id VARCHAR(20),
    created_at DATE,
    updated_at DATE,
    PRIMARY KEY (id)
);
';
try {
    $statement = $conn->prepare($sql);

    $statement->execute();

    $conn->exec('ALTER TABLE CONTACT_US ADD FOREIGN KEY (user_id) REFERENCES user (id)');
} catch (Exception $ex) {
    echo 'message: ' . $ex->getMessage() . '<br/>';
    echo 'file: ' . $ex->getFile() . '<br/>';
    echo 'line: ' . $ex->getLine() . '<br/>';
}
