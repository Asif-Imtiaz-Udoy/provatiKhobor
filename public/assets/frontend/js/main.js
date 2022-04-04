/*-----------------------------------------------------------------------------------

  Template Name: Bloger HTML5 Template.
  Template URI: #
  Description: Bloger is a unique website template designed in HTML with a simple & beautiful look. There is an excellent solution for creating clean, wonderful and trending material design corporate, corporate any other purposes websites.
  Author: A. M. Asif Imtiaz Udoy
  Version: 1.0

-----------------------------------------------------------------------------------*/

/*-------------------------------
[  Table of contents  ]
---------------------------------
  01. Sticky Menu
  02. wow js active
  03. Portfolio  Masonry (width)
  04. Sticky Header
  05. ScrollUp
  06. Tooltip
  07. ScrollReveal Js Init
  08. Fixed Footer bottom script ( Newsletter )
  09. Search Bar
  10. Toogle Menu
  11. Shopping Cart Area
  12. Filter Area
  13. User Menu
  14. Overlay Close
  15. Home Slider 
  16. Popular Product Wrap
  17. Testimonial Wrap
  18. Magnific Popup  
  19. Price Slider Active
  20.  Plus Minus Button
  21. jQuery scroll Nav

  

/*--------------------------------
[ End table content ]
-----------------------------------*/

(function ($) {
    "use strict";

    /*-------------------------------------------
      01. Sticky Menu
    --------------------------------------------- */
    var win = $(window);
    var menu = $("#menu");
    win.on('scroll', function () {
        var scroll = win.scrollTop();
        if (scroll < 92) {
            menu.removeClass("sticky");
        } else {
            menu.addClass("sticky");
        }
    });

    /*-------------------------------------------
      02. Initialize Slick
    --------------------------------------------- */
    $('.feature-slider').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<div class="left-arrows lh-1"><button type="button" class="prev-arrow bg-secondary lh-0"><i class="zmdi zmdi-arrow-left"></i></button></div>',
        nextArrow: '<div class="right-arrows lh-1"><button type="button" class="next-arrow bg-secondary lh-0"><i class="zmdi zmdi-arrow-right"></i></button></div>',
        responsive: [{
            breakpoint: 992,
            settings: {
                arrows: false
            }
        }, ]
    });

    /*-------------------------------------------
    03. Initialize Swiper
  --------------------------------------------- */
    var swiper = new Swiper(".mySwiper", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        navigation: {
            nextEl: ".swiper-next",
            prevEl: ".swiper-prev",
        },
        loop: true,
        coverflowEffect: {
            rotate: 0,
            stretch: 0,
            depth: 1200,
            modifier: 1,
            slideShadows: false,
        },
        autoplay: {
            delay: 3000,
        },
    });
})(jQuery);
