jQuery(document).ready(function ($) {

    // Slider
    $('.slider').slick({
        dots: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        arrows: false,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [
            {
              breakpoint: 769,
              settings: {
                adaptiveHeight: true,
              }
            },
          ]
    });

    // Menu Toggle
    $('.menu-toggle').on('click', function () {
        $('body').toggleClass('menu-active');
    })

    // Video Popup
    $('.popup-video').magnificPopup({
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: true,
    });
});
