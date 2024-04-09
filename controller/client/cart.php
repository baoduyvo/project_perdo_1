<?php
require_once '../../database/connect.php';


$sql = 'INSERT INTO cart 
        (full_name,email,phone,address,cart_total,created_at)
        VALUES 
        (:full_name,:email,:phone,:address,:cart_total,:created_at)';

$full_name = $_POST['full_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$cart_total = $_POST['cart_total'];

try {
        $statement = $conn->prepare($sql);

        $statement->bindParam('full_name', $full_name);
        $statement->bindParam('email', $email);
        $statement->bindParam('phone', $phone);
        $statement->bindParam('address', $address);
        $statement->bindParam('cart_total', $cart_total);
        $statement->bindParam('created_at', $created_at);

        $statement->execute();

} catch (Exception $ex) {
        echo 'message: ' . $ex->getMessage() . '<br/>';
        echo 'file: ' . $ex->getFile() . '<br/>';
        echo 'line: ' . $ex->getLine() . '<br/>';
        die();
}
