$(function () {




    $(window).on('load', function () {
        setTimeout(function () {
            $(".loader").fadeOut();
        }, 1000)
        setTimeout(function () {
            AOS.refresh();
            AOS.init({
                once: true,
                offset: 200,
                duration: 500
            });
        }, 1600)
    });

    if ($(".js-ref-slider").length) {
        $(".js-ref-slider").slick({
            fade: true,
            autoplay: true,
            responsive: [
                {
                    breakpoint: 767,
                    settings: {
                        dots: true
                    }
                }
            ]
        })
    }

    if ($(".js-news-list").length) {
        $(".js-news-list").slick({
            slidesToShow: 3,
            responsive: [
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                        arrows: false,
                        autoplay: true,
                        dots: true
                    }
                }
            ]
        })
    }

    $(".menu-toggle").on("click", function (e) {
        $(".header__nav").slideToggle();
        e.preventDefault();
    })

    if ($(".js-offer-list").length) {
        $slick_slider = $('.js-offer-list');
        settings_slider = {
            dots: true,
            arrows: false
            // more settings
        }
        slick_on_mobile($slick_slider, settings_slider);

        function slick_on_mobile(slider, settings){
            $(window).on('load resize', function() {
                if ($(window).width() > 767) {
                    if (slider.hasClass('slick-initialized')) {
                        slider.slick('unslick');
                    }
                    return
                }
                if (!slider.hasClass('slick-initialized')) {
                    return slider.slick(settings);
                }
            });
        };
    }

    $(".content__aside ul li a").on("click", function (e) {
        var href_ = $($(this).attr("href"));
        $('html,body').animate({
            scrollTop: href_.offset().top
        }, 1000);
        e.preventDefault()
    })



});