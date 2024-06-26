<?php
require_once '../../../database/connect.php';

$id = $_GET['id'];

$sql = 'DELETE FROM category WHERE id=:id';

try {
    $statement = $conn->prepare($sql);

    $statement->bindParam(':id', $id);

    $statement->execute();

    $_SESSION['success'] = true;
    header('location: ../../../asset/admin/master.php?page=index&modules=category');
} catch (Exception $ex) {
    $_SESSION['error'] = true;
    header('location: ../../../asset/admin/master.php?page=index&modules=category');
}
