<?php
    session_start();
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    if (isset($_SESSION['access_token'])) {
        header("Location: http://$host$uri/info.php");
    } else {
        header("Location: http://$host$uri/login.php");
    }
?>