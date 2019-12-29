$(document).ready(() => {
    // Page content padding bottom for footer
    $(".content-wrap").css({
        "padding-bottom":$("footer").outerHeight()
    });

    // Page content padding top for navbar
    $(".content-wrap").css({
        "padding-top":$("nav").outerHeight()
    });
})
