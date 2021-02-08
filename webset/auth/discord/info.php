<?php
    include "../../libs/config.php";
    session_start();
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

    if (!isset($_SESSION['access_token'])) {
        header("Location: http://$host$uri/login.php");
    } else {
        $accessToken = $_SESSION['access_token'];
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $discord_api_url . "/users/@me",
            CURLOPT_HTTPHEADER => array("Authorization:Bearer $accessToken"),
            CURLOPT_MAXREDIRS => 5,
            CURLOPT_RETURNTRANSFER => true
        ));
        $data = json_decode(curl_exec($ch), true);
        if (isset($data['error'])) {
            echo "HTTP Request Error: " . $data['error'];
        } else {
            $id = $data["id"];
            $avatar = $data["avatar"];
            $avatarURL = "https://cdn.discordapp.com/avatars/$id/$avatar.png?size=4096";

            $_SESSION['user'] = array($data["username"] . "#" . $data["discriminator"], $avatarURL);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <?php include("../../templates/header.html"); ?>
<body class="bg-yellow-100 font-sans leading-normal tracking-normal">
    <!-- Navbar -->
    <?php  include("../../templates/navbar.html"); ?>
    <!-- End Navbar -->
    <input type="hidden" hidden value="<?= $_SESSION['access_token']; ?>" name="access-token">

    <!-- User content -->
    <div class="place-items-center items-center text-center my-36 container box-border rounded-md">
        <img src="<?= $avatarURL; ?>" class="mx-auto bg-amber-300 rounded-md overflow-hidden object-center object-none" alt="Photo profile">
        <h1 class="font-sans font-black text-3xl mt-10">Welcome, <?= $data["username"] . "#" . $data["discriminator"]; ?></h1>
        <!-- Logout button -->
        <a href="logout.php"><button class="mt-3 ring-blue-100 bg-red-600 hover:bg-green-500 text-white font-bold py-3 px-6 rounded-md">Logout</button></a>
        <!-- End Logout button -->
    </div>
    <!-- End User content -->

    <!-- Footer -->
    <?php  include("../../templates/footer.php"); ?>
    <!-- End Footer -->
</body>
    <script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
    <script src="../../assets/js/index.js"></script>
    <script src="../../assets/fontawesome/js/all.min.js"></script>
</html>