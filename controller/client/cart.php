<?php
require_once '../../database/connect.php';


$sql = 'INSERT INTO cart 
        (id,full_name,email,phone,address,cart_total,created_at)
        VALUES 
        (:id,:full_name,:email,:phone,:address,:cart_total,:created_at)';
        
$email = $_POST['email'];
$full_name = $_POST['full_name'];

echo $email;

// try {
//     $statement = $conn->prepare($sql);

//     $statement->bindParam('id', $id);

//     $statement->execute();
// } catch (Exception $ex) {
//     echo 'message: ' . $ex->getMessage() . '<br/>';
//     echo 'file: ' . $ex->getFile() . '<br/>';
//     echo 'line: ' . $ex->getLine() . '<br/>';
//     die();
// }
