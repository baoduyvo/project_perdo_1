<?php
require_once '../../database/connect.php';

session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');

$sql = 'SELECT price, quantity FROM cart_detail WHERE product_id = :product_id';

$product_id = $_GET['product_id'];

try {
    $statement = $conn->prepare($sql);
    $statement->bindValue(':product_id', $product_id);
    $statement->execute();
    $cart_details = $statement->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $ex) {
    echo 'message: ' . $ex->getMessage() . '<br/>';
    echo 'file: ' . $ex->getFile() . '<br/>';
    echo 'line: ' . $ex->getLine() . '<br/>';
}

$totalQuantity = 0;
$totalPrice = 0;
foreach ($cart_details as $cart_detail) {
    $totalQuantity += $cart_detail['quantity'];
    $totalPrice += $cart_detail['price'];
}
echo $totalPrice, $totalQuantity;

if ($statement->rowCount() > 0) {
    $sql = 'UPDATE cart_detail SET 
            price = :price,
            quantity = :quantity
            WHERE product_id = :product_id';

    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $product_id = $_GET['product_id'];


    try {
        $statement = $conn->prepare($sql);

        $statement->bindValue(':price', $totalPrice + $price);
        $statement->bindValue(':quantity', $totalQuantity + $quantity);
        $statement->bindValue(':product_id', $product_id);

        $update = $statement->execute();

        header('location: ../../asset/client/master.php?pages=cart');
    } catch (Exception $ex) {
        echo 'message: ' . $ex->getMessage() . '<br/>';
        echo 'file: ' . $ex->getFile() . '<br/>';
        echo 'line: ' . $ex->getLine() . '<br/>';
        die();
    }
} else {
    $sql = 'INSERT INTO cart_detail
    (product_name,price,quantity,image,status,product_id,user_id,created_at)
    VALUES
    (:product_name,:price,:quantity,:image,:status,:product_id,:user_id,:created_at)';

    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $image = $_POST['image'];
    $status = 1;
    $product_id = $_GET['product_id'];
    $user_id = $_SESSION['member_id'];
    $created_at = date('Y-m-d H:i:s');

    try {

        $statement = $conn->prepare($sql);

        $statement->bindParam(':product_name', $product_name);
        $statement->bindParam(':price', $price);
        $statement->bindParam(':quantity', $quantity);
        $statement->bindParam(':image', $image);
        $statement->bindParam(':status', $status);
        $statement->bindParam(':product_id', $product_id);
        $statement->bindParam(':user_id', $user_id);
        $statement->bindParam(':created_at', $created_at);

        $statement->execute();

        header('location: ../../asset/client/master.php?pages=cart');
    } catch (Exception $ex) {
        echo 'message: ' . $ex->getMessage() . '<br/>';
        echo 'file: ' . $ex->getFile() . '<br/>';
        echo 'line: ' . $ex->getLine() . '<br/>';
    }
};
