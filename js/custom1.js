var h1 = document.querySelector("h1");

h1.addEventListener("input", function () {
    this.setAttribute("data-heading", this.innerText);
});

// When the user scrolls down 20px from the top of the document, show the move to top button
var mybutton = document.getElementById("myBtn");

window.onscroll = function () { scrollFunction() };

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}