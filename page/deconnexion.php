<?php
    session_start();
    unset($_SESSION['login']);
    unset($_SESSION['role']);
    session_destroy();
    header('Location:padlet.php');
?>