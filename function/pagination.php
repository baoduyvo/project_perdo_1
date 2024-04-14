<?php
require_once '../database/connect.php';

$i = isset($_POST['i']) ? $_POST['i'] : '';

$records_per_page = 4;

$offset = ($i - 1) * $records_per_page;

$sql = 'SELECT * 
            FROM product 
            WHERE status <> 3 
            LIMIT :offset, :records_per_page';

try {
    $statement = $conn->prepare($sql);

    $statement->bindParam(':offset', $offset, PDO::PARAM_INT);
    $statement->bindParam(':records_per_page', $records_per_page, PDO::PARAM_INT);

    $statement->execute();

    $products = $statement->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode(array("products" => $products));
} catch (Exception $ex) {
    echo json_encode(array("error" => $ex->getMessage()));
}
