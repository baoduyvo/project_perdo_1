<?php
require_once '../../database/connect.php';

$sql = 'INSERT INTO bill 
        (full_name,email,phone,address,status,cart_total,user_id,created_at)
        VALUES 
        (:full_name,:email,:phone,:address,:status,:cart_total,:user_id,:created_at)';

$full_name = $_POST['full_name'];
$email = $_POST['email'];
$cart_total = $_POST['cart_total'];
$user_id = $_SESSION['member_id'];
$user_id = $_SESSION['member_id'];
$created_at = date('Y-m-d H:i:s');


try {
    $statement = $conn->prepare($sql);

    $statement->bindParam('full_name', $full_name);
    $statement->bindParam('email', $email);
    $statement->bindParam('phone', $phone);
    $statement->bindParam('address', $address);
    $statement->bindValue('status', 3);
    $statement->bindParam('cart_total', $cart_total);
    $statement->bindParam('user_id', $user_id);
    $statement->bindParam('created_at', $created_at);

    $statement->execute();

    $bill_id = $conn->lastInsertId();

    require_once '../../controller/client/bill_detail.php';

    $sql = 'UPDATE cart_detail SET status=:status WHERE user_id=:user_id';

    try {
        $statement = $conn->prepare($sql);

        $statement->bindValue('status', 2);
        $statement->bindValue('user_id', $_SESSION['member_id']);

        $statement->execute();
    } catch (Exception $ex) {
        echo 'message: ' . $ex->getMessage() . '<br/>';
        echo 'file: ' . $ex->getFile() . '<br/>';
        echo 'line: ' . $ex->getLine() . '<br/>';
        die();
    }
} catch (Exception $ex) {
    echo 'message: ' . $ex->getMessage() . '<br/>';
    echo 'file: ' . $ex->getFile() . '<br/>';
    echo 'line: ' . $ex->getLine() . '<br/>';
    die();
}
