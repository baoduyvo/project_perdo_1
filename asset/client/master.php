<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once './partials/head.php'; ?>
</head>

<?php session_start(); ?>

<body class="main-layout">
    <!-- header -->
    <?php require_once './partials/header.php'; ?>

    <?php (isset($_GET['pages']) && $_GET['pages'] == 'home' || empty($_GET['pages']))
        ? require_once './partials/slider.php'
        : require_once './partials/titlepage.php';

    ?>

    <?php
    $requested_page = isset($_GET['pages']) ? $_GET['pages'] : 'home';
    require_once 'pages/' . $requested_page . '.php';
    ?>

    <!-- footer -->
    <?php require_once './partials/footer.php'; ?>

    <!-- foot -->
    <?php require_once './partials/foot.php'; ?>


</body>

</html>