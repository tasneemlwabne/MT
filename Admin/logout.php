<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['id']);
// session_destroy($_SESSION['username']);
header('location: /MT/login.php');
?>