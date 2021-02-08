<?php
    session_start();
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    if (isset($_SESSION['authProvider'])) {
        if ($_SESSION['authProvider'] === "discord") {
            header("Location: http://$host$uri/discord");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <?php include("../templates/header.html"); ?>
<body class="bg-yellow-100 font-sans leading-normal tracking-normal">
    <!-- Navbar -->
    <?php include("../templates/navbar.html"); ?>
    <!-- End Navbar -->

    <!-- Authentication content -->
        <div class="text-center my-36">
            <h1 class="font-sans font-black text-4xl">Authentication | Under construction</h1>
            <p class="font-sans font-semibold text-base mt-5">Support Authentication: <strong><a href="discord">Discord</a></strong></p>
        </div>
    <!-- End Authentication content -->

    <!-- Footer -->
    <?php include("../templates/footer.php"); ?>
    <!-- End Footer -->
</body>
</html>