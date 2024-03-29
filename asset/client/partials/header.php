<?php
if (isset($_GET['logout'])) {
    unset($_SESSION['member_email']);
    header("Location: ./master.php");
    exit();
}
?>

<header>
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                    <div class="full">
                        <div class="center-desk">
                            <div class="logo"> <a href="index.html"><img src="../../dist/client/images/logo.jpg" alt="logo" /></a> </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-9 col-sm-9">
                    <div class="menu-area">
                        <div class="limit-box">
                            <nav class="main-menu">
                                <ul class="menu-area-main">
                                    <li class="active"> <a href="http://localhost/project_perdo_1/asset/client/master.php?pages=home">Home</a> </li>
                                    <li> <a href="http://localhost/project_perdo_1/asset/client/master.php?pages=product">Product</a> </li>
                                    <li> <a href="http://localhost/project_perdo_1/asset/client/master.php?pages=cart">Cart</a> </li>
                                    <li> <a href="http://localhost/project_perdo_1/asset/client/master.php?pages=contact">Contact</a> </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2">
                    <?php if (!isset($_SESSION['member_email'])) { ?>
                        <li>
                            <a class="buy" href="./pages/login.php">Login</a>
                        </li>
                    <?php } else { ?>
                        <div class="navigation">
                            <a class="button" href="?logout=1">
                                <img src="https://pbs.twimg.com/profile_images/378800000639740507/fc0aaad744734cd1dbc8aeb3d51f8729_400x400.jpeg">
                                <div class="logout">LOGOUT</div>
                            </a>
                        </div>
                    <?php } ?>
                </div>


            </div>
        </div>
</header>