<?php
    session_start();
    unset($_SESSION['email-login']);
    unset($_SESSION['senha-login']);
    header("Location: login.php");
?>