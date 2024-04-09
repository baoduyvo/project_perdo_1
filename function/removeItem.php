<?php
require_once '../database/connect.php';

$itemId = isset($_POST['itemId']) ? $_POST['itemId'] : '';
$action = isset($_POST['action']) ? $_POST['action'] : '';

if ($action == 'remove') {
    $sql = 'DELETE FROM cart_detail WHERE id=:id';

    try {
        $statement = $conn->prepare($sql);

        $statement->bindParam(':id', $itemId);

        $statement->execute();

        $cart_detail = $statement->fetchAll(PDO::FETCH_ASSOC);

        echo json_decode(json_encode($cart_detail), true);
    } catch (Exception $ex) {
        echo 'message: ' . $ex->getMessage() . '<br/>';
        echo 'file: ' . $ex->getFile() . '<br/>';
        echo 'line: ' . $ex->getLine() . '<br/>';
    }
}
