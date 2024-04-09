<?php
require_once '../../database/connect.php';

$sql = 'SELECT *
        FROM cart_detail
        WHERE user_id=:user_id';
try {
    $statement = $conn->prepare($sql);

    $statement->bindParam('user_id', $_SESSION['member_id']);

    $statement->execute();

    $cart_details = $statement->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $ex) {
    echo 'message: ' . $ex->getMessage() . '<br/>';
    echo 'file: ' . $ex->getFile() . '<br/>';
    echo 'line: ' . $ex->getLine() . '<br/>';
    die();
}
