<?php
if (empty($_POST['name'])) {
    $category_nameError = '* Category name is required';
} else {
    $name = $_POST['name'];
}

//true
if (empty($category_nameError)) {
    require_once '../../controller/admin/category/insert.php';
    echo '<script> window.location.href="./master.php?page=index&modules=category"</script>';
    exit();
}
