jQuery(function($) {
    "use strict";


    if($(".home-slider-box .slider").length){
        $('.home-slider-box .slider').flexslider({
            animation: "fade",
            slideshow: false,
            directionNav: false,
            pauseOnHover: true
        });
    }

    if( $('#horizontalTab').length) {
        $('#horizontalTab').responsiveTabs({
            rotate: false,
            startCollapsed: 'accordion',
            collapsible: 'accordion',
            setHash: true,
            activate: function (e, tab) {
                $('.info').html('Tab <strong>' + tab.id + '</strong> activated!');
            }
        });
    }


    //homeslider
    $('.flexslider').flexslider({
        animation:"fade",
        controlNav: false,
        directionNav: false
    });

    ////hot deals slider left
    $('.flexhd').flexslider({
        animation: "slide"
      });

    $('.flexgallery').flexslider({
        animation: "slide",
        animationLoop: true,
        itemWidth: 176,
        itemMargin: 5
    });
    $('.flexreview').flexslider({
        animation: "slide"
    });
    $('.flext-r').flexslider({
        animation: "slide"
    });

    $("a.prettyphoto").prettyPhoto({
        theme: 'dark_rounded',
        social_tools:false,
        show_title: true
    });

    var $container = $('.gw');
    // init
    $container.isotope({
        // options
        itemSelector: '.gal',
        layoutMode: 'masonry'
    });

    $('.wither-w a.w-select').bind("click", function(e){
        $('.city-drop').fadeToggle();
    });
});
