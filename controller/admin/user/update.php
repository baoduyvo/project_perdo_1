<?php
require_once '../../../database/connect.php';
require_once '../../../function/image_processing.php';

session_start();
$sql = 'UPDATE user SET 
id=:id,
email = :email,
password = :password,
level = :level,
status = :status,
full_name = :full_name,
gender = :gender,
image = :image,
phone = :phone,
address = :address,
updated_at = :updated_at
WHERE id = :id';

$id = trim($_POST['id']);
$email = trim($_POST['email']);
$status = trim($_POST['status']);
$password_confirmation = trim($_POST['password_confirmation']);

if (!empty($_POST['password'])) {
  $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
} else {
  $password = $_POST['old_password'];
}

$level = trim($_POST['level']);
$full_name = trim($_POST['full_name']);

if (!empty($_FILES['image']['name'])) {
  $old_image_path = '../../../uploads/avatar/' . $_POST['old_image'];
  if (file_exists($old_image_path)) {
    unlink($old_image_path);
  }
  $image = generateFileName($_FILES['image']['name']);
  copy($_FILES['image']['tmp_name'], '../../../uploads/avatar/' . $image);
} else {
  $image = $_POST['old_image'];
}
$gender = trim($_POST['gender']);
$address = trim($_POST['address']);
$phone = trim($_POST['phone']);
$updated_at = date('Y-m-d H:i:s');
try {
  $statement = $conn->prepare($sql);

  $statement->bindParam(':id', $id);
  $statement->bindParam(':email', $email);
  $statement->bindParam(':password', $password);
  $statement->bindParam(':level', $level);
  $statement->bindParam(':status', $status);
  $statement->bindParam(':full_name', $full_name);
  $statement->bindParam(':gender', $gender);
  $statement->bindParam(':image', $image);
  $statement->bindParam(':phone', $phone);
  $statement->bindParam(':address', $address);
  $statement->bindParam(':updated_at', $updated_at);

  $update = $statement->execute();

  echo '<script> window.location.href="../../../asset/admin/master.php?page=index&modules=user"</script>';
} catch (Exception $ex) {
  echo 'message: ' . $ex->getMessage() . '<br/>';
  echo 'file: ' . $ex->getFile() . '<br/>';
  echo 'line: ' . $ex->getLine() . '<br/>';
}
