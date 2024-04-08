<?php
if (!isset($_SESSION['member_email'])) {
    echo '<script>window.location.href = "./pages/login.php"</script>';
    exit;
}
