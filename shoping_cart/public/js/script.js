$(document).ready(function() {
    var navbar = $('#navbar');
    var cardContainer = $('#cardContainer');
    var navbarHeight = navbar.outerHeight();

    // Mengatur posisi awal card saat halaman dimuat
    var initialCardMargin = $(window).scrollTop() > navbarHeight ? navbarHeight : 0;
    cardContainer.css('margin-top', initialCardMargin);

    // Mengatur posisi card dan navbar saat halaman di-scroll
    $(window).scroll(function() {
        var scroll = $(this).scrollTop();

        if (scroll > navbarHeight) {
            cardContainer.animate({ marginTop: navbarHeight }, 300); // Animasi smooth
            navbar.addClass('navbar-fixed-top');
        } else {
            cardContainer.animate({ marginTop: 0 }, 300); // Animasi smooth
            navbar.removeClass('navbar-fixed-top');
        }
    });
});
