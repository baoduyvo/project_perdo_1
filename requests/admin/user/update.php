<?php
// password
if (empty($_POST['password'])) {
    $passwordErr = '* Password is required';
} else {
    $regex = '/^.{8,}$/';
    if (preg_match($regex, $_POST['password'])) {
        $password = $_POST['password'];
    } else {
        $passwordErr = "* Minimum eight characters";
    }
}
//password confirmation
if (empty($_POST['password_confirmation'])) {
    $password_confirmationErr = '* Password Confirmation is required';
} else {
    $regex = '/^.{8,}$/';
    if (preg_match($regex, $_POST['password_confirmation'])) {
        $password_confirmation = trim($_POST['password_confirmation']);
    } else {
        $password_confirmationErr = "* Minimum eight characters";
    }
}
// image
if (empty($_FILES['image']['name'])) {
    $imageErr = '* Image is required';
} else {
    $image = $_FILES['image'];
}
