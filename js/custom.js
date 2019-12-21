// Typewriter heading initialization

const title = document.getElementById("head-text");

const typewriter = new Typewriter(title, {
    loop: true,
});

typewriter
    .typeString("Home's Magic")
    .pauseFor(2500)
    .deleteAll()
    .start();


// Banner scroll down arrow animation

$("#scroll-down").click(function() {
    $('html, body').animate({
        scrollTop: $("#locality").offset().top
    }, 2000);
    return false;
});
