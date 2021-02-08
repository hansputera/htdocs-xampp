<?php

    function request($routeURL) {
        $base = "https://berita-indo-api.vercel.app/v1";
        $c = curl_init();
        curl_setopt_array($c, array(
            CURLOPT_URL => $base . $routeURL,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_USERAGENT => "BeritaPHP/1.0",
            CURLOPT_MAXREDIRS => 5,
            CURLOPT_HEADER => "Content-Type: application/json"
        ));
        $data = json_decode(curl_exec($c), true);
        return $data;
    }

    function cnnNews($displayData) {
        $berita = request("/cnn-news");
        $berita_slices = array_slice($berita['data'], count($berita) * $displayData);
        return $berita_slices;
    }
    function cncbcNews($displayData) {
        $berita = request("/cnbc-news");
        $berita_slices = array_slice($berita['data'], count($berita) * $displayData);
        return $berita_slices;
    }
    function republikaNews($displayData) {
        $berita = request("/republika-news");
        $berita_slices = array_slice($berita['data'], $displayData);
        return $berita_slices;
    }
?>