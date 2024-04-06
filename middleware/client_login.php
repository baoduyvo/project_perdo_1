<?php
if (!isset($_SESSION['member_email'])) {
    header('location: ./pages/login.php');
}
