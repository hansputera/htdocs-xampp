<?php
    // Import berita library.
    require "libs/BeritaLibrary.php";

    $id = @$_GET['page'];
    $defineNews = array(
        1 => "CNBC",
        2 => "Republika",
        3 => "CNN"
    );

    function timestamp($isoDate) {
        return date('d M, Y', strtotime(date($isoDate)));
    }

    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

    if (!isset($defineNews[$id])) {
        header("Location: http://$host$uri/berita.php?page=1");
    } else {

        $newsType = $defineNews[$id];
        $Berita = null;
        $breadcrumbHTML = "";

        if ($newsType == "CNBC") {
            $Berita = cncbcNews(5);
            $breadcrumbHTML = '<a class="inline-block py-2 px-4 no-underline" href="?page=2">Republika</a> / <a class="inline-block py-2 px-4 text-gray no-underline" href="?page=3">CNN</a>';
        } elseif ($newsType == "Republika") {
            $Berita = republikaNews(5);
            $breadcrumbHTML = '<a class="inline-block py-2 px-4 no-underline" href="?page=1">CNBC</a> / <a class="inline-block py-2 px-4 text-gray no-underline" href="?page=3">CNN</a>';
        } elseif ($newsType == "CNN") {
            $Berita = cnnNews(5);
            $breadcrumbHTML = '<a class="inline-block py-2 px-4 no-underline" href="?page=1">CNBC</a> / <a class="inline-block py-2 px-4 text-gray no-underline" href="?page=2">Republika</a>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <?php include("templates/header.html"); ?>
<body class="bg-yellow-100 font-sans leading-normal tracking-normal">
    <!-- Navbar -->
        <?php include("templates/navbar.html"); ?>
    <!-- End Navbar -->

    <!-- Content -->
        <!-- News Selector -->
            <div class="text-center my-28">
                <h1 class="font-sans font-black text-4xl">Pilih Berita</h1>
                <!-- Breadcrumb news -->
                <p class="font-sans font-semibold text-base">Current News Selection: <?= $newsType ?></p>
                <p class="font-sans font-bold text-2xl"><?= $breadcrumbHTML; ?></p>
                <p class="font-sans font-black text-2xl">Data source: Satyawikanda/Berita-Indo-API</p>
                <!-- End Breadcrumb news -->
            </div>
        <!-- End News Selector -->

        <!-- News -->
            <div class="text-center m-10">
                <h1 class="font-sans font-black text-4xl"><?= $newsType ?> News [TOTAL: <?= count($Berita); ?>]</h1>
                <!-- <?= $newsType ?> Views -->
                    <div class="grid grid-cols-2 grid-rows-3 gap-x-20 gap-y-5" style="margin-left: -50px; margin-right: 20px;">
                    <?php foreach($Berita as $index=>$berita) { ?>
                        <?php
                            $image;
                            $snippet;

                            if ($newsType == "CNBC" || $newsType == "CNN") {
                                $image = $berita['image']['small'];
                                $snippet = $berita['contentSnippet'];
                            } elseif ($newsType == "Republika") {
                                $image = $berita["image"];
                                $snippet = $berita['description'];
                            }
                        ?>
                        <div class="rounded-md p-8 m-8 bg-red-500 box-border container text-white shadow md:shadow-lg">
                            <img class="object-contain w-full" height="300px"  src="<?= $image; ?>" alt="Small image <?= $berita["title"]; ?>">
                            <h3 class="font-sans font-bold text-xl"><a href="<?= $berita["link"]; ?>"><?= $index+1 . ". " . $berita["title"]; ?></a></h3>
                            <p class="mt-5 font-sans font-semibold text-base"><?= $snippet; ?></p>
                            <p class="font-sans mt-3 font-bold text-base">- <?= timestamp($berita['isoDate']); ?></p>
                        </div>
                    <?php } ?>
                    </div>
                <!-- End <?= $newsType ?> Views -->
            </div>
        <!-- End News -->
    <!-- End Content -->

    <!-- Footer -->
        <?php include("templates/footer.php"); ?>
    <!-- End Footer -->
</body>
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
    <script src="assets/js/index.js"></script>
    <script src="assets/fontawesome/js/all.min.js"></script>
    <!-- Berita JavaScript -->
    <script type="text/javascript">
        document.title = "Hanif Dwy Putra S | <?= $newsType ?> News";
    </script>
    <!-- End Berita JavaScript -->
</html>