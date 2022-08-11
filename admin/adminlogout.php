
<?php
include 'inc/header.php';
$logout = new Admin\Libs\Session();
$logout->logout();
$logout->logoutDoc();
$logout->logoutAdmin();
if ($logout) {
    header("Location: ../../login.php");
}
include 'inc/footer.php';
