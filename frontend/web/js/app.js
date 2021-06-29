/**
 *  @author Eugene Terentev <eugene@terentev.net>
 */
Array.prototype.remove = function() {
    var what, a = arguments,
        L = a.length,
        ax;
    while (L && this.length) {
        what = a[--L];
        while ((ax = this.indexOf(what)) !== -1) {
            this.splice(ax, 1);
        }
    }
    return this;
};
var swiper = new Swiper('.story-swpier-container', {
    direction: 'vertical',
    slidesPerView: 1,
    spaceBetween: 0,
    mousewheel: {
        releaseOnEdges: true,
    },
    navigation: {
        nextEl: '.btn-slide'
    }
});

$(document).ready(function() {
    var $myDiv = $("#scroll_to_back");
    $(".go_top").click(function() {
        if ($myDiv.length) {
            $('html, body').animate({
                scrollTop: $("#scroll_to_back").offset().top - 100
            }, 300);
        } else {
            $("html, body").animate({ scrollTop: 0 }, 300);
        }
    })
})
jQuery(document).ready(function($) {
    let isMobile = window.matchMedia("only screen and (max-width: 760px)").matches;
    if (isMobile) {
        $('a#on_tap').off('click').on('click', function(e) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: $("#search_recruitment_div").offset().top - 150
            }, 300);
        });
    }
});

$(document).ready(function() {
    $(document).on('click', '.btn_show_more', function() {
        let _self = $(this);
        let _selfParent = $(this).parents('div');
        $(_selfParent).find('.btn_show_more.more').toggle('fast');
        $(_selfParent).find('.btn_show_more.less').toggle('fast');
        $(this).parents('div').find('.more_text').toggle('fast');
    });
    $('.btn_show_more_description').click(function() {
        let _self = $(this);
        let _selfParent = $(this).parents('div');
        $(_selfParent).find('.btn_show_more_description.more').toggle('fast');
        $(_selfParent).find('.btn_show_more_description.less').toggle('fast');
        $(this).parents('div').find('.more_text').toggle('fast');
    });
    $('.btn_show_more_next_project').click(function() {
        let _self = $(this);
        let _selfParent = $(this).parents('div');
        $(_selfParent).find('.btn_show_more_next_project.more').toggle('fast');
        $(_selfParent).find('.btn_show_more_next_project.less').toggle('fast');
        $(this).parents('div').find('.more_text_next_project').toggle('fast');
    });
    $('.btn_show_more_next_project').click(function() {
        let _self = $(this);
        let _selfParent = $(this).parents('div');
        $(_selfParent).find('.btn_show_more_next_project.more').toggle('fast');
        $(_selfParent).find('.btn_show_more_next_project.less').toggle('fast');
        $(this).parents('div').find('.more_text_next_project').toggle('fast');
    });
    $('.btn_show_more_comment').click(function() {
        let _self = $(this);
        let _selfParent = $(this).parents('.card-text');
        $(_selfParent).find('.btn_show_more_comment.more').toggle('fast');
        $(_selfParent).find('.btn_show_more_comment.less').toggle('fast');
        $(_selfParent).find('.more_text_next_comment').toggle('fast');
    });
    $('.btn_show_more_lasting').click(function() {
        let _self = $(this);
        let _selfParent = $(this).parents('span');
        $(_selfParent).find('.btn_show_more_lasting.more').toggle('fast');
        $(_selfParent).find('.btn_show_more_lasting.less').toggle('fast');
        $(_selfParent).find('.more_text_next_lasting').toggle('fast');
    });
});


function validate(evt) {
    var theEvent = evt || window.event;

    // Handle paste
    if (theEvent.type === 'paste') {
        key = event.clipboardData.getData('text/plain');
    } else {
        // Handle key press
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
    }
    var regex = /[0-9]|\./;
    if (!regex.test(key)) {
        theEvent.returnValue = false;
        if (theEvent.preventDefault) theEvent.preventDefault();
    }
}

$(document).ready(function() {
    if (window.location.hash) {
        console.log(window.location.hash)
        if (window.location.hash == '#login-success') {
            swal("Thành công", "Đăng nhập thành công", "success");
        } else if (window.location.hash == '#error-info') {
            swal("Xin lỗi", "Vui lòng bổ sung thông tin trước khi sử dụng dịch vụ", "warning");
        }
    }
    $('.in_development').click(function() {
        swal("Xin lỗi", "Tính năng đang được xây dựng!", "warning");
    });
    $(document).off('focusout keyup').on('focusout keyup', '#userform-username', function() {
        $('#userprofile-fullname').val(this.value);
    });
    $('#subscribe_button').click(function() {
        let email = $('#subscribe_input').val().trim();
        var self = $(this);
        self.addClass('wait_response');
        if (email.match(/^[a-zA-Z][a-zA-Z0-9_\.]{5,32}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$/)) {
            $.ajax({
                url: '/site/subscribe-news',
                data: {
                    'email': email
                },
                type: 'post',
                success: function(data) {
                    if (data.status == 200) {
                        swal("Thành công", "Cảm ơn bạn đã đăng ký!", "success");
                        $('#subscribe_input').val('');
                    } else {
                        console.log(data.message.email)
                        swal("Thất bại", data.message.email[0], "error");
                    }
                    setTimeout(function() {
                        self.removeClass('wait_response');
                    }, 5000);
                },
            });
        } else {
            swal("Thất bại", "Vui lòng kiểm tra lại email!", "warning");
            setTimeout(function() {
                self.removeClass('wait_response');
            }, 1000);
        }
    });
    if ($(window).width() > 1140) {
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();
            // console.log(scroll)
            if (scroll > 50) {
                $('.custommenu').css('display', 'none');
                $('.top-header .navbar-brand img').css('width', '80%');
                $('.main-menu .nav-item .nav-link').css('line-height', '62px');
            }
            if (scroll < 97) {
                $('.custommenu').css('display', 'flex');
                $('.top-header .navbar-brand img').css('width', '100%');
                $('.main-menu .nav-item .nav-link').css('line-height', '110px');
            }
        });
    }
    if ($('.header-action').length > 0) {
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();
            // console.log(scroll)
            if (scroll > 70) {
                $('.header-action').addClass('fixed');
            }
            if (scroll < 117) {
                $('.header-action').removeClass('fixed');
            }
        });
    }
});

$(document).ready(function() {
    // Click register
    $('.button-regiter').on('click', function(event) {
        var form_data = $('#form-register').serialize();
        console.log('#form-register');
        $.ajax({
            url: '/site/register',
            data: form_data,
            type: 'post',
            success: function(data) {
                console.log(data);
                if (data.status == 200) {
                    $('#register').modal('hide');
                    swal("Thành công", "Cảm ơn bạn đã đăng ký!", "success");
                } else {
                    swal("Thất bại", "Vui lòng kiểm tra lại thông tin!", "warning");
                }
            },
        });
        return false;
    });

    $('#register').on('hidden.bs.modal', function() {
        $(this).find('form').trigger('reset');
    });
    $("#click-login").on('click', function() {
        $('#register').modal('hide');
        $('#login').modal();
    });
    $("#click-register").on('click', function() {
        $('#login').modal('hide');
        $('#register').modal();
    });
    $(".button-login").on('click', function(event) {
        var form_data = $('#form-login').serialize();
        $.ajax({
            url: '/site/login',
            data: form_data,
            type: 'POST',
            success: function(data) {
                if (data.status == 200) {
                    swal("Thành công", "Bạn đã đăng nhập thành công!", "success");
                    location.reload();
                } else {
                    swal("Thất bại", "Sai tên đăng nhập hoặc mật khẩu. Vui lòng nhập lại!", "warning");
                    $('#loginform-password').val('');
                    $('#loginform-captcha').val('');
                    $('#loginform-captcha-image').yiiCaptcha('refresh');
                }
            },
        });
        return false;
    });
});
$(document).on('click', '.wait_response', function(event) {
    event.preventDefault();
});
$(document).on('click', '.like-btn', function(e) {
    event.preventDefault();
    var self = $(this);
    self.addClass('wait_response');
    $.ajax({
        url: '/site/like',
        type: 'POST',
        data: {
            'id': self.attr('data-id'),
            'type': self.attr('data-type')
        },
        success: function(data) {
            if (data.status == 403) {
                $('#modalDetailArt').modal('hide');
                $('#login').modal('show');
            } else if (data.status == 200) {
                if (data.code == 1) {
                    let attrCurrent = $("[data-id =" + self.attr('data-id') + "]" + "[data-type =" + self.attr('data-type') + "]");
                    attrCurrent.addClass('liked');
                    $('.count-like' + "[data-id =" + self.attr('data-id') + "]").html("<span class='icon-default icon-heart-2'></span> (" + (data.count) + ")")
                } else if (data.code == 2) {
                    let attrCurrent = $("[data-id =" + self.attr('data-id') + "]" + "[data-type =" + self.attr('data-type') + "]");
                    attrCurrent.removeClass('liked')
                    $('.count-like' + "[data-id =" + self.attr('data-id') + "]").html("<span class='icon-default icon-heart-2'></span> (" + (data.count) + ")")
                }
            }
            setTimeout(function() {
                self.removeClass('wait_response');
            }, 5000);
        }
    });
});
$(document).ready(function() {
    setTimeout(function() {
        $('body').addClass('loaded');
    }, 500);
    if (window.location.hash && window.location.hash == '#loginsocial') {
        $('#loginsocial').modal('show');
    }
});

$('.service_show_index').owlCarousel({
    loop: false,
    margin: 0,
    responsiveClass: true,
    autoplay: false,
    responsive: {
        0: {
            items: 1,
            nav: true
        },
        320: {
            items: 2,
            nav: false
        },
        600: {
            items: 4,
            nav: false
        },
        800: {
            items: 4,
            nav: false
        },
        1024: {
            items: 5,
            nav: false
        },
        1200: {
            items: 6,
            nav: true
        }
    }
});
$(document).ready(function() {
    $(document).on('click', '#button-start', function(e) {
        event.preventDefault();
        $.ajax({
            url: '/about/get-start',
            type: 'POST',
            success: function(data) {
                if (data.status == 403) {
                    $('#login').modal('show');
                } else if (data.status == 200) {
                    document.getElementById("create-form").style.display = "block";
                    document.getElementById("get-start").style.display = "none";
                    document.getElementById("text-rating").style.display = "none";
                }
            }
        });
    });
});