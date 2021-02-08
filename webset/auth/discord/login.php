<?php
    session_start();
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    
    // Mengecek kalau sudah login.
    if (isset($_SESSION['user'])) {
        header("Location: http://$host$uri/info.php");
    } else {
        header('Location: https://discord.com/api/oauth2/authorize?client_id=804179465399042098&redirect_uri=http%3A%2F%2Flocalhost%2Fwebset%2Fauth%2Fdiscord%2Fcallback.php&response_type=code&scope=identify');
    }
?>