<?php
// name
if (empty($_POST['name'])) {
    $nameErr = '* Name is required';
} else {
    $name = trim($_POST['name']);
}
// price
if (empty($_POST['price'])) {
    $priceErr = '* Price is required';
} else {
    $price = $_POST['price'];
}
//description
if (empty($_POST['description'])) {
    $descriptionErr = '* Full Name is required';
} else {
    $description = trim($_POST['description']);
}
//category_id
if ($_POST['category_id'] == -1) {
    $category_idErr = '* Address is required';
} else {
    $category_id = $_POST['category_id'];
}
// image
if (empty($_FILES['image']['name'])) {
    $imageErr = '* Image is required';
} else {
    $lastIndex = strpos($_FILES['image']['name'], '.');
    $ext = substr($_FILES['image']['name'], $lastIndex);
    $mines = ['.jpg', '.png', '.jpeg', '.JPG','.webp'];

    $imageErr = '* Image Must jpg,png,jpeg,JPG';

    for ($i = 0; $i < count($mines); $i++) {
        if ($ext == $mines[$i]) {
            $image = $_FILES['image'];
            $imageErr = '';
            break;
        };
    }
}

//true
if (
    empty($nameErr) &&
    empty($priceErr) &&
    empty($descriptionErr) &&
    empty($category_idErr) &&
    empty($imageErr)
) {
    require_once '../../controller/admin/product/insert.php';
    echo '<script> window.location.href="./master.php?page=index&modules=product"</script>';
    exit();
}
