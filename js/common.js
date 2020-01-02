$(document).ready(adjustSpacing);

$(window).on('resize', adjustSpacing);

// Adjusts spacing for navbar and footer
function adjustSpacing() {
    $(".content-wrap").css({
        // Page content padding bottom for footer
        "padding-bottom":$("footer").outerHeight(),
        // Page content padding top for navbar
        "padding-top":$("nav").outerHeight()
    });
}
