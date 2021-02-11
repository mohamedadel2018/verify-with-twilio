(function ($) {
    "use strict";
    new WOW().init();

    $(window).on("load", function () {
        "use strict";
        $(".preloader").fadeOut(3000);
    });
    $(window).scroll(function () {
        if ($(window).scrollTop()) {
            $('.navbar ').addClass('sticky-menu').animate({
                top: 0
            }, 4000);
        } else {
            $('.navbar ').removeClass('sticky-menu').animate({
                top: 0
            }, 4000);
        }
    });
    $(window).scroll(function () {
        if ($(this).scrollTop() > 150) {
            $('.scroll-top').fadeIn();
        } else {
            $('.scroll-top').fadeOut();
        }
    });
    $(".scroll-top").click(function () {
        $('html, body').animate({
            scrollTop: 0
        }, 1000);
        return false;

    });
    
    $(".navbar-toggler").click(function(){
        $(this).toggleClass("btn-menu-collapse");
        $(".navbar-collapse").toggleClass("nav-collapse-active");
      });
})(jQuery);