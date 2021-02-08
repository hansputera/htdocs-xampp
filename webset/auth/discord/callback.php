<?php
    include "../../libs/config.php";
    session_start();
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    // Mengecek kalau sudah login.
    if (isset($_SESSION['user'])) {
        header("Location: http://$host$uri/info.php");
    } else {
        $callbackCode = $_GET['code'];
        if (!isset($callbackCode)) {
            echo "Missing 'code' query";
        } else {
            $ch = curl_init();
            curl_setopt_array($ch, array(
                CURLOPT_URL => $discord_api_url . "/oauth2/token",
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => http_build_query(array(
                    "client_id" => $clientID,
                    "client_secret" => $clientSecret,
                    "redirect_uri" => "http://$host$uri/callback.php",
                    "grant_type" => "authorization_code",
                    "scope" => "identify",
                    "code" => $callbackCode
                )),
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/x-www-form-urlencoded"
                ),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_MAXREDIRS => 5
            ));
            $data = json_decode(curl_exec($ch), true);
            if ($data['error']) {
                echo "Invalid access token code: ". $data['error'];
            } else {
                $accessToken = $data['access_token'];

                $_SESSION['access_token'] = $accessToken;
                $_SESSION['authProvider'] = "discord";
                header("Location: http://$host$uri/info.php");
            }
            curl_close($ch);
        }
    }
?>