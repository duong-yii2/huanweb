// function headerMenu() {
//     var windowWidth = jQuery(window).width();
//     var wH = jQuery(window).height();
//     if (windowWidth > 767) {
//         $("header .menu_topnav").removeAttr("style");
//     } else {
//         var rh = 90;
//         $("header .menu_topnav").css("max-height",wH-rh);
//     }
// }

function mainpage() {
    var windowWidth = jQuery(window).width();
    var widthContainer = $('.container').width();
    var windowHeight = jQuery(window).height();
    var heightHeader = $('header').height();
    var heightFooter = $('footer').height();
    $(".main-page").css("min-height",windowHeight - heightHeader - heightFooter);
    $(".go-top").css("right",(windowWidth - widthContainer) / 2);
}

$(document).ready(function () {
    $('header .navbar-toggle').click(function () {
        $('body').toggleClass('overflow');
    });

    $('.box-cart-fast').click(function () {
        $('body').toggleClass('show-popup-cart');
    });

    $('body').click(function () {
        $('.box-add-item').hide();
    });

    $('.add-item').click(function (event) {
        event.stopPropagation();
    });

    $('.add-item .icon-add-item').click(function () {
        $(this).parent().find('.box-add-item').show();
    });

    $('.add-item .close-form').click(function () {
        $(this).parent().parent().parent().find('.box-add-item').hide();
    });

    $('.close-popup').click(function () {
        $('body').removeClass('show-popup-cart');
    });

    $('.carousel').each(function(){
        $(this).carousel({
            pause: true,
            interval: false
        });
    });
    $(function(){
        $("#twenty01").twentytwenty({
            default_offset_pct   : 0.7,
            orientation          : 'horizontal',
            no_overlay           : true,
            move_slider_on_hover : false,
            move_with_handle_only: true,
            click_to_move        : true
        });
    });


    //
    // $('.box-list-option .list-option .box-icon').click(function () {
    //     $(this).removeClass('active');
    //     var formSearch = $(this).parent().find('.list');
    //     formSearch.toggle();
    //     $('.box-list-option .list').not(formSearch).hide();
    //     $(this).addClass('active');
    //     $(this).parent().toggleClass('show-dropdown');
    //     // $('.box-list-option .list-option').not(formSearch).removeClass('show-dropdown');
    // });

    $('.datepicker').datepicker();

    $(window).scroll(function () {
        $(window).scrollTop() > 300 ? $(".go_top").addClass("go_tops") : $(".go_top").removeClass("go_tops")
    });

    //headerMenu();
    mainpage();
    jQuery(window).resize(function () {
        //headerMenu();
        mainpage();
    });

    $('.owl-carousel-1').owlCarousel({
        loop:true,
        margin:10,
        responsiveClass:true,
        autoplay: true,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            600:{
                items:1,
                nav:false
            },
            1000:{
                items:1,
                nav:true
            }
        }
    });

    $('.owl-carousel-3').owlCarousel({
        loop:true,
        margin:30,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            600:{
                items:2,
                nav:false
            },

            1024:{
                items:2,
                nav:false
            },
            1200:{
                items:3,
                nav:true
            },
            1440:{
                items:3,
                margin:39,
                nav:true
            }
        }
    });

    $('.owl-carousel-7').owlCarousel({
        loop:true,
        margin:0,
        responsiveClass:true,
        autoplay: true,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            320:{
                items:2,
                nav:false
            },
            600:{
                items:4,
                nav:false
            },
            800:{
                items:4,
                nav:false
            },
            1024:{
                items:5,
                nav:false
            },
            1200:{
                items:7,
                nav:true
            }
        }
    });

    $('.owl-carousel-9').owlCarousel({
        loop:true,
        margin: 1,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            320:{
                items:2,
                nav:false
            },
            600:{
                items:4,
                nav:false
            },
            800:{
                items:4,
                nav:false
            },
            1024:{
                items:7,
                nav:false
            },
            1200:{
                items:9,
                nav:true
            }
        }
    });

});

// var $topFooter = $('.footer');
// var CssFooter = $topFooter.offset().top;
//
// $(window).scroll(function(){
//     var scrollTop = $(window).scrollTop();
//     if (window.pageYOffset > CssFooter) {
//         $topFooter.addClass("RemoveCss");
//     } else {
//         $topFooter.removeClass("RemoveCss");
//     }
// });
//
// var $leftMenu = $('.leftmenu-sticky');
// var sticky = $leftMenu.offset().top;
//
// $(window).scroll(function(){
//     var windowWidth = jQuery(window).width();
//     var windowHeight = jQuery(window).height();
//     var scrollTop = $(window).scrollTop();
//     if (window.pageYOffset > sticky) {
//         $leftMenu.addClass("sticky");
//     } else {
//         $leftMenu.removeClass("sticky");
//     }
// });

