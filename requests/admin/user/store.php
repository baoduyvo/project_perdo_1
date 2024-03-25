<?php
// email
if (empty($_POST['email'])) {
    $emailErr = '* Email is required';
} else {
    $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
    if (preg_match($regex, $_POST['email'])) {
        $email = trim($_POST['email']);
    } else {
        $emailErr = "* is an invalid email. Please try again.";
    }
}
// password
if (empty($_POST['password'])) {
    $passwordErr = '* Password is required';
} else {
    $regex = '/^.{8,}$/';
    if (preg_match($regex, $_POST['password'])) {
        $password1 = $_POST['password'];
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
        $password_confirmation1 = trim($_POST['password_confirmation']);
        if ($password1 == $password_confirmation1) {
            $password = trim($_POST['password']);
        } else {
            $passwordErr = '* Password mismatch';
            $password_confirmationErr = '* Password Confirmation mismatch';
        }
    } else {
        $password_confirmationErr = "* Minimum eight characters";
    }
}
//full name
if (empty($_POST['full_name'])) {
    $full_nameErr = '* Full Name is required';
} else {
    $full_name = trim($_POST['full_name']);
}
// image
if (empty($_FILES['image']['name'])) {
    $imageErr = '* Image is required';
} else {
    $lastIndex = strpos($_FILES['image']['name'], '.');
    $ext = substr($_FILES['image']['name'], $lastIndex);
    $mines = ['.jpg', '.png', '.jpeg', '.JPG'];

    $imageErr = '* Image Must jpg,png,jpeg,JPG';

    for ($i = 0; $i < count($mines); $i++) {
        if ($ext == $mines[$i]) {
            $image = $_FILES['image'];
            $imageErr = '';
            break;
        };
    }
}
//address
if (empty($_POST['address'])) {
    $addressErr = '* Address is required';
} else {
    $address = trim($_POST['address']);
}
//phone
if (empty($_POST['phone'])) {
    $phoneErr = '* Phone is required';
} else {
    $regex = '/^[0-9]{10}$/';
    if (preg_match($regex, $_POST['phone'])) {
        $phone = trim($_POST['phone']);
    } else {
        $phoneErr = "* Phone is munbers";
    }
}
//true
if (
    empty($emailErr) &&
    empty($passwordErr) &&
    empty($password_confirmationErr) &&
    empty($full_nameErr) &&
    empty($imageErr) &&
    empty($addressErr) &&
    empty($phoneErr)
) {
    require_once '../../controller/admin/user/insert.php';
    echo '<script> window.location.href="./master.php?page=index&modules=user"</script>';
    exit();
}
