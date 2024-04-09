<?php
require_once '../database/connect.php';

$action = isset($_POST['action']) ? $_POST['action'] : '';
$itemId = isset($_POST['itemId']) ? $_POST['itemId'] : '';
$quantity = isset($_POST['quantity']) ? $_POST['quantity'] : '';

if ($action == 'increase') {
    $sql = 'UPDATE cart_detail
            SET quantity = :quantity + 1
            WHERE id = :id';

    try {
        $statement = $conn->prepare($sql);

        $statement->bindValue(':quantity', $quantity);
        $statement->bindValue(':id', $itemId);

        $statement->execute();

        $cart_detail = $statement->fetchAll(PDO::FETCH_ASSOC);

        echo json_decode(json_encode($cart_detail), true);
    } catch (Exception $ex) {
        echo 'message: ' . $ex->getMessage() . '<br/>';
        echo 'file: ' . $ex->getFile() . '<br/>';
        echo 'line: ' . $ex->getLine() . '<br/>';
    }
}
