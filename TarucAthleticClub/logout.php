<?php

session_start();
$_SESSION = array();

if (isset($_SESSION['user_id'])) {
    unset($_SESSION['user_id']);
    setcookie('PHPSESSID', '', time() - 3600, '/', '', 0, 0); // Destroy the cookie.
    session_destroy();
}

header("Location: login.php");
die;
?>

