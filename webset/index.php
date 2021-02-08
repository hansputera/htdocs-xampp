<!DOCTYPE html>
<html lang="en" class="text-gray-900 leading-tight overscroll-auto md:overscroll-contain lg:overscroll-none" style="scroll-behavior: smooth;">
    <?php include("./templates/header.html"); ?>
<body class="bg-yellow-100 font-sans leading-normal tracking-normal">
    <?php include("./templates/navbar.html"); ?>
    <div class="text-center my-36 awal">
        <h1 class="overflow-clip font-black subpixel-antialiased text-4xl capitalize">Welcome to my website</h1>
        <p class="font-sans font-bold text-xl my-10">👋 Hi! My name is <strong>Hanif Dwy Putra S</strong>, i'm <?= date("Y") - 2007; ?> years old.</p><button class="transition duration-500 ease-in-out transform hover:-translate-y-2 hover:scale-200 ring-blue-100 bg-blue-600 hover:bg-red-500 text-white font-bold py-3 px-6 rounded-md" id="buttonScrollDown">Scroll Down</button>
    </div>

    <div class="text-center seken">
        <h2 class="font-black text-4xl capitalize">🛠️ Projects</h2>
        <div class="projects">
            <div class="grid grid-cols-3 grid-rows-auto gap-x-20 gap-x-20">
                <div class="p-5 m-8 bg-blue-500 rounded-md container px-auto box-content items-center justify-center text-white shadow md:shadow-lg">
                    <h1 class="font-sans text-2xl font-black">Aqua Discord Bot</h1>
                    <p class="my-5 font-sans text-base font-bold">
                        A discord bot designed to server all Discord servers, <strong>Aqua</strong> has great features like Moderation, Economy, and Music.
                    </p>
                </div>
                <div class="p-5 m-8 bg-yellow-500 rounded-md container px-auto box-content items-center justify-center text-white shadow md:shadow-lg">
                    <h1 class="font-sans text-2xl font-black">YukCatat</h1>
                    <p class="my-5 font-sans text-base font-bold">
                        A simple project that functions like note in general such as pastebin, hastebin, google notes, and others.
                    </p>
                </div>
                <br />
                <div class="p-5 m-8 bg-purple-500 rounded-md container px-auto box-content items-center justify-center text-white shadow md:shadow-lg">
                    <h1 class="font-sans text-2xl font-black">Coming soon</h1>
                    <p class="my-5 font-sans text-base font-bold">
                        I'll create another project again, see ya!
                    </p>
                </div>
            </div>
        </div>
    </div>

    <?php include("./templates/footer.php"); ?>
</body>
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
    <script src="assets/js/index.js"></script>
    <script src="assets/fontawesome/js/all.min.js"></script>
</html>