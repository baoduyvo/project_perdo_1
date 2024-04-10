<?php
require_once '../../database/connect.php';

$id = $_GET['id'];
$quantity = $_POST['quantity'] == 0 ? 0 : ($_POST['quantity'] > 1 ? $_POST['quantity'] : 1);

if ($quantity == 0) {
    $sql = 'DELETE FROM cart_detail WHERE id=:id';

    try {
        $statement = $conn->prepare($sql);

        $statement->bindParam('id', $id);

        $statement->execute();

        header('location: ../../asset/client/master.php?pages=cart');
    } catch (Exception $ex) {
        echo 'message: ' . $ex->getMessage() . '<br/>';
        echo 'file: ' . $ex->getFile() . '<br/>';
        echo 'line: ' . $ex->getLine() . '<br/>';
    }
} else {
    $sql = 'UPDATE cart_detail SET quantity=:quantity WHERE id=:id';

    try {
        $statement = $conn->prepare($sql);

        $statement->bindParam('id', $id);
        $statement->bindParam('quantity', $quantity);

        $statement->execute();
        
        header('location: ../../asset/client/master.php?pages=cart');
    } catch (Exception $ex) {
        echo 'message: ' . $ex->getMessage() . '<br/>';
        echo 'file: ' . $ex->getFile() . '<br/>';
        echo 'line: ' . $ex->getLine() . '<br/>';
    }
}
