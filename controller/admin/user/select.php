<?php
require_once '../../database/connect.php';


$sql = 'SELECT * FROM user WHERE status <> 3';


try {
    $statement = $conn->prepare($sql);

    $statement->execute();

    $users = $statement->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $ex) {
    echo 'message: ' . $ex->getMessage() . '<br/>';
    echo 'file: ' . $ex->getFile() . '<br/>';
    echo 'line: ' . $ex->getLine() . '<br/>';
}
