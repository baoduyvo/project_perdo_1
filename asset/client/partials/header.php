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
                                    <li> <a href="about.html">About</a> </li>
                                    <li> <a href="product.html">product</a> </li>
                                    <li> <a href="blog.html"> Blog</a> </li>
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
                        <li>
                            <div class="image">
                                <span><?= $_SESSION['member_name']; ?></span>
                                <span><a href="?logout=1">logout</a></span>
                            </div>
                        </li>
                    <?php } ?>
                </div>


            </div>
        </div>
</header>