<?php
    $urlHastebin;
    $hasteURL = "https://bin.hansputera.me/documents";
    if (isset($_POST['submit'])) {
        $note = $_POST['note'];

        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $hasteURL);
        curl_setopt($c, CURLOPT_POST, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $note);
        curl_setopt($c, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);

        $data = json_decode(curl_exec($c), true);
        curl_close($c);
        $urlHastebin = "https://bin.hansputera.me/" . $data["key"];
    }
?>
<!DOCTYPE html>
<html lang="en" style="overflow-y: none;scroll-behavior: smooth;">
    <?php include("../templates/header.html"); ?>
<body class="bg-yellow-100 font-sans leading-normal tracking-normal">
    <!-- Navbar -->
    <?php include("../templates/navbar.html"); ?>
    <!-- End Navbar -->
    
    <!-- Content -->
    <div class="text-center my-36 bg-white rounded shadow-lg p-5" style="margin-left: 100px; margin-right: 100px;">
        <h1 class="font-sans font-black text-4xl capitalize">Hastebin Note Creator | Tools</h1>
        <?php if (isset($urlHastebin)) { ?>
            <!-- Hastebin URL -->
                <h2 class="font-fans font-bold text-3xl my-5">URL: <a href="<?= $urlHastebin ?>" style="text-decoration: none;color: blue;"><?= $urlHastebin ?></a></h2>
            <!-- End Hastebin URL -->
        <?php } ?>
        <!-- Form -->
            <form class="mb-6 my-10" action="hastebin.tools.php" method="post">
                <div class="flex flex-col mb-4">
                    <label class="font-sans mb-2 uppercase font-bold text-3xl text-grey-darkest" for="note">Note</label>
                    <textarea class="border border-red-500 hover:border-blue-500 py-2 px-3 text-grey-darkest" name="note" required placeholder="Place your text here ..."></textarea>
                </div>
                <button class="ring-blue-100 bg-blue-600 hover:bg-red-500 text-white font-bold py-3 px-6 rounded-md" name="submit" type="submit">Submit</button>
            </form>
        <!-- End Form -->
    </div>
    <!-- End Content -->

    <!-- Footer -->
    <?php include("../templates/footer.php"); ?>
    <!-- End Footer -->
</body>
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
    <script src="../assets/js/index.js"></script>
    <script src="../assets/fontawesome/js/all.min.js"></script>
</html>