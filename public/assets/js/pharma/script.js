$(document).ready(function () {
    $("#header-carousel").owlCarousel({
        items: 1,
        autoplay: true,
        margin: 20,
        loop: true,
        nav: true,
        smartSpeed: 1000,
        autoplayHoverPause: true,
        dots: false,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>']
    });
});

$(document).ready(function () {
    $("#health").owlCarousel({
        items: 4,
        autoplay: true,
        margin: 20,
        loop: true,
        nav: true,
        smartSpeed: 1000,
        autoplayHoverPause: true,
        dots: true,
        pagination:false
    });
});

$(document).ready(function () {
    $("#categories").owlCarousel({
        items: 4,
        autoplay: true,
        margin: 20,
        loop: true,
        nav: true,
        smartSpeed: 2000,
        autoplayHoverPause: true,
        dots: true,
        pagination:false
    });
});

$(document).ready(function () {
    $("#products").owlCarousel({
        items: 4,
        autoplay: true,
        margin: 20,
        loop: true,
        nav: true,
        smartSpeed: 4000,
        autoplayHoverPause: true,
        dots: true,
        pagination:false
    });
});

$(document).ready(function () {
    $("#testimonials").owlCarousel({
        items: 1,
        autoplay: true,
        margin: 20,
        loop: true,
        nav: true,
        smartSpeed: 4000,
        autoplayHoverPause: true,
        dots: true,
        pagination:false
    });
});