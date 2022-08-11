
<?php
include 'admin/autoloader.php';
session_start();
$logout = new Admin\Libs\Session();
$logout->logout();
$logout->logoutDoc();
$logout->logoutAdmin();
if ($logout) {
    header("Location: login.php");
}
