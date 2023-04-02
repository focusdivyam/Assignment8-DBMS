<?php
ini_set('display_errors', 1);
error_reporting(-1);
session_start();
 unset($_SESSION['ID']);
 unset($_SESSION['password']);
 unset($_SESSION['email']);
 session_destroy();
session_destroy();
// echo ('Account deleted successfully');
header("Location: login_form.php");
?>