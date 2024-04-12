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


    <?php if (isset($_SESSION['member_email'])) { ?>
        <div class="progress" style="background-color:#ffc221; position: fixed; bottom: 98px; right: 25px; width: 50px; border: 3px solid #ffc221; z-index: 100; height: 50px; border-radius: 50px;">
            <span class="message">
                <i class="fas fa-envelope nav-icon"></i>
            </span>
        </div>
        <!-- <div class="notification">
            <div>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Task</th>
                            <th>Progress</th>
                            <th style="width: 40px">Label</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1.</td>
                            <td>Update software</td>
                            <td>
                                <div class="progress progress-xs">
                                    <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                </div>
                            </td>
                            <td><span class="badge bg-danger">55%</span></td>
                        </tr>
                        <tr>
                            <td>1.</td>
                            <td>Update software</td>
                            <td>
                                <div class="progress progress-xs">
                                    <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                </div>
                            </td>
                            <td><span class="badge bg-danger">55%</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div> -->
    <?php } ?>


    <!-- footer -->
    <?php require_once './partials/footer.php'; ?>

    <!-- foot -->
    <?php require_once './partials/foot.php'; ?>


</body>

</html>