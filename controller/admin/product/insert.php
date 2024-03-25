<?php
require_once '../../database/connect.php';
require_once '../../function/image_processing.php';

date_default_timezone_set('Asia/Ho_Chi_Minh');

$sql = 'INSERT INTO product
        (id,name,price,description,content,image,status,featured,category_id,user_id,created_at)
        VALUES
        (:id,:name,:price,:description,:content,:image,:status,:featured,:category_id,:user_id,:created_at)';
$id = uniqid();
$name = trim($_POST['name']);
$price = trim($_POST['price']);
$description = trim($_POST['description']);
$content = trim($_POST['content']);
$image = $_FILES['image'];
if (!empty($_FILES['image']['name'])) {
    $image = generateFileName($_FILES['image']['name']);
    copy($_FILES['image']['tmp_name'], '../../uploads/product/' . $image);
}
$status = trim($_POST['status']);
$featured = trim($_POST['featured']);
$category_id = $_POST['category_id'];
$user_id = $_SESSION['id'];
$created_at = date('Y-m-d H:i:s');

try {
    $statement = $conn->prepare($sql);

    $statement->bindParam(':id', $id);
    $statement->bindParam(':name', $name);
    $statement->bindParam(':price', $price);
    $statement->bindParam(':description', $description);
    $statement->bindParam(':content', $content);
    $statement->bindParam(':image', $image);
    $statement->bindParam(':status', $status);
    $statement->bindParam(':featured', $featured);
    $statement->bindParam(':category_id', $category_id);
    $statement->bindParam(':user_id', $user_id);
    $statement->bindParam(':created_at', $created_at);

    $statement->execute();
} catch (Exception $ex) {
    echo 'message: ' . $ex->getMessage() . '<br/>';
    echo 'file: ' . $ex->getFile() . '<br/>';
    echo 'line: ' . $ex->getLine() . '<br/>';
    die();
}
if (!empty($_FILES['images']['name'])) {
    require_once '../../controller/admin/product_images/insert.php';
}
