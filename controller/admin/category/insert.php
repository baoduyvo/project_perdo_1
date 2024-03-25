<?php
require_once '../../database/connect.php';

date_default_timezone_set('Asia/Ho_Chi_Minh');

$sql = 'INSERT INTO category (name,status,created_at) VALUES (:name,:status,:created_at)';

$name = trim($_POST['name']);
$status = trim($_POST['status']);
$created_at = date('Y-m-d H:i:s');

try {
    $statement = $conn->prepare($sql);

    $statement->bindParam(':name', $name);
    $statement->bindParam(':status', $status);
    $statement->bindParam(':created_at', $created_at);

    $statement->execute(); // corrected typo here
} catch (Exception $ex) {
    echo 'message: ' . $ex->getMessage() . '<br/>';
    echo 'file: ' . $ex->getFile() . '<br/>';
    echo 'line: ' . $ex->getLine() . '<br/>';
}
?>
