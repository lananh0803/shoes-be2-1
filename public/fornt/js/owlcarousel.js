autoplay: false
autoplayTimeout: 5000
autoplayHoverPause: false
var owl = $('.owl-carousel');
owl.owlCarousel({
    nav: true,
    items: 4,
    loop: true,
    margin: 10,
    autoplay: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        960: {
            items: 5
        },
        1200: {
            items: 5
        }
    }
});
$('.play').on('click', function () {
    owl.trigger('play.owl.autoplay', [1000])
})
$('.stop').on('click', function () {
    owl.trigger('stop.owl.autoplay')
})