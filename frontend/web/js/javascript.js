function headerMenu() {
    var windowWidth = jQuery(window).width();
    var wH = jQuery(window).height();
    if (windowWidth > 1025) {
        $("header .navbar-collapse").removeAttr("style");
    }
    else {
        $("header .navbar-collapse").css("max-height",wH);
    }
}

function popupGallery() {
    var windowWidth = jQuery(window).width();
    var windowHeight = jQuery(window).height();
    var galleryHeight = $('.box-popup-gallery-content .gallery-thumbs').height();
    var galleryIndicatorsHeight = $('.box-popup-gallery-content .gallery-content .gallery-top .carousel-indicators').height();

    if (windowWidth > 1023) {
        $(".box-popup-gallery-content .gallery-content .gallery-top,.box-popup-gallery-content .gallery-right").css("height", windowHeight - galleryHeight);
        $(".box-popup-gallery-content .gallery-content .gallery-top .carousel-inner").css("height", windowHeight - galleryHeight - galleryIndicatorsHeight);
    }
    else {
        $(".box-popup-gallery-content .gallery-content .gallery-top,.box-popup-gallery-content .gallery-right").removeAttr("style");
        $(".box-popup-gallery-content .gallery-content .gallery-top .carousel-inner").removeAttr("style");
    }
}

function mainpage() {
    var windowWidth = jQuery(window).width();
    var widthContainer = $('.container').width();
    var windowHeight = jQuery(window).height();
    var heightHeader = $('header').height();
    var heightFooter = $('footer').height();
    $(".main-page").css("min-height",windowHeight - heightHeader - heightFooter).css('padding-top',heightHeader-1);
    $(".go-top").css("right",(windowWidth - widthContainer) / 2);
    $(".header .menu-level-2").css("width",widthContainer);
}

$(document).ready(function () {
    $('header .navbar-toggle').click(function () {
        $('body').toggleClass('overflow');
    });

    $('.box-cart-fast').click(function () {
        $('body').toggleClass('show-popup-cart');
    });

    $('body').click(function () {
        $('.box-material .box-add-item').hide();
    });
    // Tuan update
    $('.box-material .add-item').click(function(){
        $(this).find('.box-add-item').show();
    });
    $('.box-properties-other .add-item').click(function(){
        $(this).find('.box-add-item').show();
    });
    $('.button-small-screen').click(function(){
        $(this).next().toggleClass('show');
    });
    // end update

    $('.add-item').click(function (event) {
        event.stopPropagation();
    });

    $('header button.navbar-toggler').click(function () {
        $('body').toggleClass('push-body');
    });

    $('.header .fa-angle-right').click(function () {
        $(this).parent().toggleClass('show-menu');
    });

    $('.header .icon-toggle-menu').click(function () {
        $(this).parent().parent().toggleClass('toggle-menu');
    });

    $('.item-menu-child .title').click(function() {
        $(this).parent().toggleClass('show-child');
    });

    $('.add-item .close-form').click(function () {
        $(this).parents().parents().find('.box-add-item').hide();
    });

    $('.close-popup').click(function () {
        $('body').removeClass('show-popup-cart');
    });

    $('.btn-show-detail').click(function () {
        $(this).parent().parent().toggleClass('show-info');
    });

    // $('.item-form-recruitment .button-add-content .button').click(function () {
    //     $(this).parent().parent().find('.button-dropbox').removeClass('show-textarea');
    //     $(this).parent().toggleClass('show-textarea')
    // });
    // $('.item-form-recruitment .button-dropbox .button').click(function () {
    //     $(this).parent().parent().find('.button-add-content').removeClass('show-textarea');
    //     $(this).parent().toggleClass('show-textarea')
    // });

    $('.list-nav-menu-message .item-toggle .fas').click(function () {
        $(this).parent().parent().toggleClass('show-menu')
    });

    $('.item-button').click(function (event) {
        event.stopPropagation();
    });

    $('.item-button .button').click(function () {
        var formArea = $(this).parent();
        formArea.parent().children('.item-button').not(formArea).removeClass('show-textarea');
        formArea.toggleClass('show-textarea');
    });

    // open show item faq
    $('.box-main-faq .title-item-inner, .box-toggle .toggle-title').click(function () {
        $(this).parent().toggleClass('active');
    });

    $('.btn-popup-gallery-slide').click(function () {
        $('.box-popup-gallery-slide').addClass('show');
    });

    $('.box-popover .text-popover').click(function () {
        $(this).parent().toggleClass('show-popover');
    });

    $('.comment-child-group .comment-child-item-group').click(function () {
        $(this).hide();
        $(this).parent().find('.comment-child-item').css('display','flex');
    });

    $('.carousel').each(function(){
        $(this).carousel({
            pause: true,
            interval: false
        });
    });

    $('.datepicker').datepicker();

    $(window).scroll(function () {
        $(window).scrollTop() > 300 ? $(".go_top").addClass("go_tops") : $(".go_top").removeClass("go_tops")
    });

    headerMenu();
    mainpage();
    popupGallery();
    jQuery(window).resize(function () {
        headerMenu();
        mainpage();
        popupGallery();
    });

    $('.owl-carousel-1').owlCarousel({
        loop:true,
        margin:10,
        responsiveClass:true,
        autoplay: true,
        responsive:{
            0:{
                items:1,
                nav:false
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
    $('.owl-carousel-home').owlCarousel({
        loop:true,
        margin:10,
        responsiveClass:true,
        // autoplay: true,
        responsive:{
            0:{
                items:1,
                nav:false
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
    $('.owl-carousel-4').owlCarousel({
        loop:false,
        margin:30,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            600:{
                items:2,
                dots:false,
                nav:false
            },

            1024:{
                items:3,
                dots:false,
                nav:true
            },
            1200:{
                items:4,
                dots:false,
                nav:true
            },
            1440:{
                items:4,
                margin:39,
                nav:true,
                dots:false,
            }
        }
    });

    $('.owl-carousel-4-small').owlCarousel({
        loop: false,
        margin:15,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                dots:false,
                nav:true
            },
            500:{
                items:2,
                dots:false,
                nav:false
            },

            1024:{
                items:3,
                dots:false,
                nav:true
            },

            1200:{
                items:4,
                dots:false,
                nav:true
            }
        }
    });

    $('.owl-carousel-4-box-shop').owlCarousel({
        loop: false,
        margin: 17,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                dots:false,
                nav:true
            },
            600:{
                items:2,
                dots:false,
                nav:false
            },
            800:{
                items:3,
                dots:false,
                nav:false
            },

            1024:{
                items:3,
                dots:false,
                nav:true
            },
            1200:{
                items:4,
                dots:false,
                nav:true
            }
        }
    });

    $('.owl-carousel-3').owlCarousel({
        loop:false,
        margin: 26,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:false
            },
            768:{
                items:2,
                nav:true
            },
            1024:{
                items:3,
                nav:true
            }
        }
    });

    $('.owl-carousel-3-xs').owlCarousel({
        loop:false,
        margin: 1,
        responsiveClass:true,
        responsive:{
            0:{
                items:3,
                nav:true
            }
        }
    });

    $('.owl-carousel-5').owlCarousel({
        // loop:true,
        margin: 10,
        responsiveClass:true,
        responsive:{
            0:{
                items:5,
                nav:true
            },
            600:{
                items:5,
                nav:false
            },

            1024:{
                items:5,
                nav:false
            },
            1200:{
                items:5,
                nav:true
            },
            1440:{
                items:5,
                nav:true
            }
        }
    });

    $('.owl-carousel-6').owlCarousel({
        loop:false,
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
                items:6,
                nav:true
            }
        }
    });

    $('.owl-carousel-7').owlCarousel({
        loop:false,
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

    $('.owl-carousel-10').owlCarousel({
        loop:false,
        margin: 1,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            320:{
                items:3,
                nav:true
            },
            600:{
                items:4,
                nav:true
            },
            767:{
                items:5,
                nav:true
            },
            1024:{
                items:7,
                nav:true
            },
            1200:{
                items:8,
                nav:true
            },
            1280:{
                items:10,
                nav:true
            }
        }
    });

    $('.owl-carousel-11').owlCarousel({
        loop:false,
        margin: 1,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            320:{
                items:3,
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
            1280:{
                items:10,
                nav:true
            },
            1440:{
                items:11,
                margin: 30,
                nav:true
            }
        }
    });


    // menu autoCollaps
    var menu = $("#menu-list-view"),
        subMenu = $("#mor-menu-list .form-popover"),
        more = $("#mor-menu-list"),
        parent = $("#menu-list-view").parent(),
        ww = $(window).width(),
        smw = more.outerWidth();
    menu.children("li").each(function () {
        var w = $(this).outerWidth();
        if (w > smw) smw = w + 20;
        return smw
    });
    // more.css('width', smw);
    function expand() {
        var w = 0,
            outerWidth = parent.width() - smw - 34;
        menu.children("li").each(function () {
            w += $(this).outerWidth();
            return w;
        });
        for (i = 0; i < subMenu.children("li").size(); i++) {
            w += subMenu.children("li").eq(i).outerWidth() + 34;
            if (w > outerWidth) {
                var a = 0;
                while (a < i) {
                    subMenu.children("li").eq(a)
                        .css('opacity', 0)
                        .detach()
                        .appendTo("#menu-list-view")
                        .stop().animate({
                        'opacity': 1
                    }, 300);
                    a++;
                }
                break;
            }
        }

    }
    $(".box-twenty").twentytwenty({
        default_offset_pct   : 0.7,
        orientation          : 'horizontal',
        no_overlay           : true,
        move_slider_on_hover : false,
        move_with_handle_only: true,
        click_to_move        : true
    });
});

$(document).ready(function() {
    $("#slider-long").slider({
        min: 0,
        max: 100,
        step: 1,
        values: [10, 90],
        slide: function(event, ui) {
            for (var i = 0; i < ui.values.length; ++i) {
                $("input.sliderValue-long[data-index=" + i + "]").val(ui.values[i]);
            }
        }
    });

    $("input.sliderValue-long").change(function() {
        var $this = $(this);
        $("#slider-long").slider("values", $this.data("index"), $this.val());
    });
    $("#slider-long").slider({
        min: 0,
        max: 200,
        step: 1,
        values: [10, 150],
        slide: function(event, ui) {
            for (var i = 0; i < ui.values.length; ++i) {
                $("input.sliderValue-long[data-index=" + i + "]").val(ui.values[i]);
            }
        }
    });

    $("input.sliderValue-long").change(function() {
        var $this = $(this);
        $("#slider-long").slider("values", $this.data("index"), $this.val());
    });
    $("#slider-width").slider({
        min: 0,
        max: 200,
        step: 1,
        values: [10, 150],
        slide: function(event, ui) {
            for (var i = 0; i < ui.values.length; ++i) {
                $("input.sliderValue-width[data-index=" + i + "]").val(ui.values[i]);
            }
        }
    });

    $("input.sliderValue-width").change(function() {
        var $this = $(this);
        $("#slider-width").slider("values", $this.data("index"), $this.val());
    });
    $("#slider-high").slider({
        min: 0,
        max: 50,
        step: 1,
        values: [10, 50],
        slide: function(event, ui) {
            for (var i = 0; i < ui.values.length; ++i) {
                $("input.sliderValue-high[data-index=" + i + "]").val(ui.values[i]);
            }
        }
    });

    $("input.sliderValue-high").change(function() {
        var $this = $(this);
        $("#slider-high").slider("values", $this.data("index"), $this.val());
    });
});
