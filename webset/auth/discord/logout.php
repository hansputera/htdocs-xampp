<?php
    include "../../libs/config.php";
    session_start();
    $host  = $_SERVER['HTTP_HOST'];

    if (!isset($_SESSION['user'])) {
        echo "Kamu belum login!";
    } else {
        $accessToken = $_SESSION['access_token'];
        // revoking token.
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $discord_api_url . "/oauth2/token/revoke",
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query(array(
                "token" => $accessToken
            )),
            CURLOPT_HTTPHEADER => array("Content-Type: application/x-www-form-urlencoded"),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_USERNAME => $clientID,
            CURLOPT_PASSWORD => $clientSecret
        ));
        $data = json_decode(curl_exec($ch), true);
        if ($data['error']) {
            echo "HTTP request error: " . $data['error'];
        } else {
            // destroying
            session_destroy();
            header("Location: http://$host");
        }
    }
?>