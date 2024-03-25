<?php
require_once '../../../database/connect.php';

$sql = 'UPDATE category SET 
        name = :name,
        status = :status,
        updated_at = :updated_at
        WHERE id = :id';

$id = trim($_GET['id']);
$name = trim($_POST['name']);
$status = trim($_POST['status']);
$updated_at = date('Y-m-d H:i:s');

try {
    $statement = $conn->prepare($sql);

    $statement->bindParam(':name', $name);
    $statement->bindParam(':status', $status);
    $statement->bindParam(':updated_at', $updated_at);
    $statement->bindParam(':id', $id);

    $update = $statement->execute();

    echo '<script> window.location.href="../../../asset/admin/master.php?page=index&modules=category"</script>';
} catch (Exception $ex) {
    echo 'message: ' . $ex->getMessage() . '<br/>';
    echo 'file: ' . $ex->getFile() . '<br/>';
    echo 'line: ' . $ex->getLine() . '<br/>';
}
