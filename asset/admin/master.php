<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'partials/head.php' ?>
</head>

<?php
require_once '../../middleware/login.php';
?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <?php require_once 'partials/header.php' ?>

        <!-- Main Sidebar -->
        <?php require_once 'partials/sidebar.php' ?>

        <div class="content-wrapper">

            <?php
            $requested_modules = isset($_GET['modules']) ? $_GET['modules'] : 'dashboard';
            $requested_page = isset($_GET['page']) ? $_GET['page'] : 'index';
            require_once 'modules/' . $requested_modules . '/' . $requested_page . '.php';
            ?>

        </div>

        <!-- Footer-->

    </div>

    <?php require_once 'partials/foot.php' ?>

</body>

</html>