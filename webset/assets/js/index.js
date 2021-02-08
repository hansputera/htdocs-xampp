// Navbar toggle
document.getElementById('nav-toggle').onclick = function(){
    document.getElementById("nav-content").classList.toggle("hidden");
}

// Scroll down
$("#buttonScrollDown").click(function() {
    const targetScroll = $(".seken");
    $("html, body").animate({
        scrollTop: targetScroll.offset().top - 100
    }, 1000);
});