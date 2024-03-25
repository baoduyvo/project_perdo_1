<?php
require_once '../../../database/connect.php';
require_once '../../../function/image_processing.php';

date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();

$sql = 'UPDATE product SET
        name = :name,
        price = :price,
        description = :description,
        content = :content,
        image = :image,
        status = :status,
        featured = :featured,
        category_id = :category_id,
        user_id = :user_id,
        updated_at = :updated_at
        WHERE id = :product_id';

$product_id = $_GET['product_id'];
$name = trim($_POST['name']);
$price = trim($_POST['price']);
$description = trim($_POST['description']);
$content = trim($_POST['content']);
$image = $_FILES['image'];
if (!empty($_FILES['image']['name'])) {
    $old_image_path = '../../../uploads/product/' . $_POST['old_image'];
    if (file_exists($old_image_path)) {
        unlink($old_image_path);
    }
    $image = generateFileName($_FILES['image']['name']);
    copy($_FILES['image']['tmp_name'], '../../../uploads/product/' . $image);
} else {
    $image = $_POST['old_image'];
}
$status = trim($_POST['status']);
$featured = trim($_POST['featured']);
$category_id = $_POST['category_id'];
$user_id = $_SESSION['id'];
$updated_at = date('Y-m-d H:i:s');

try {
    $statement = $conn->prepare($sql);

    $statement->bindParam(':product_id', $product_id);
    $statement->bindParam(':name', $name);
    $statement->bindParam(':price', $price);
    $statement->bindParam(':description', $description);
    $statement->bindParam(':content', $content);
    $statement->bindParam(':image', $image);
    $statement->bindParam(':status', $status);
    $statement->bindParam(':featured', $featured);
    $statement->bindParam(':category_id', $category_id);
    $statement->bindParam(':user_id', $user_id);
    $statement->bindParam(':updated_at', $updated_at);

    $statement->execute();

    echo '<script> window.location.href="../../../asset/admin/master.php?page=index&modules=product"</script>';
} catch (Exception $ex) {
    echo 'message: ' . $ex->getMessage() . '<br/>';
    echo 'file: ' . $ex->getFile() . '<br/>';
    echo 'line: ' . $ex->getLine() . '<br/>';
    die();
}
