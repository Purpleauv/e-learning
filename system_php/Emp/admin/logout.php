<?php
    session_start(); 
    $_SESSION = array();
    unset($_SESSION['ID']);
    unset($_SESSION['role']);
    session_destroy(); // destroy session
    header("location:../../login.php"); 
?>

