(function ($) {
    'use strict';

    var DESKTOP_BREAKPOINT = 1200;

    function getSliderConfig($wrap, prevLabel, nextLabel, arrowClass) {
        return {
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: true,
            appendArrows: $wrap,
            autoplay: true,
            autoplaySpeed: 4500,
            pauseOnHover: true,
            pauseOnFocus: true,
            infinite: true,
            swipe: true,
            draggable: true,
            touchMove: true,
            prevArrow: '<button class="slick-prev ' + arrowClass + '" aria-label="' + prevLabel + '" type="button"></button>',
            nextArrow: '<button class="slick-next ' + arrowClass + '" aria-label="' + nextLabel + '" type="button"></button>',
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        };
    }

    function toggleResponsiveSlider($slider, wrapClass, prevLabel, nextLabel, arrowClass) {
        var $wrap = $slider.closest(wrapClass);

        if (window.innerWidth >= DESKTOP_BREAKPOINT) {
            $wrap.removeClass('is-slider-active');

            if ($slider.hasClass('slick-initialized')) {
                $slider.slick('unslick');
            }

            return;
        }

        $wrap.addClass('is-slider-active');

        if ($slider.hasClass('slick-initialized')) {
            $slider.slick('setPosition');
            return;
        }

        $slider.slick(getSliderConfig($wrap, prevLabel, nextLabel, arrowClass));
    }

    function bindResponsiveSlider(selector, wrapClass, prevLabel, nextLabel, arrowClass, resizeEvent) {
        var $sliders = $(selector);
        var resizeTimer;

        if (!$sliders.length || typeof $.fn.slick !== 'function') {
            return;
        }

        function refresh() {
            $sliders.each(function () {
                toggleResponsiveSlider($(this), wrapClass, prevLabel, nextLabel, arrowClass);
            });
        }

        refresh();

        $(window).on(resizeEvent, function () {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(refresh, 150);
        });
    }

    $(document).ready(function () {
        bindResponsiveSlider(
            '.et-license__brands-slider',
            '.et-license__brands-slider-wrap',
            'Previous brands',
            'Next brands',
            'et-license__slider-arrow',
            'resize.etLicenseBrandsSlider'
        );

        bindResponsiveSlider(
            '.et-license__products-slider',
            '.et-license__products-slider-wrap',
            'Previous products',
            'Next products',
            'et-license__slider-arrow',
            'resize.etLicenseProductsSlider'
        );

        bindResponsiveSlider(
            '.et-license__categories-slider',
            '.et-license__categories-slider-wrap',
            'Previous categories',
            'Next categories',
            'et-license__slider-arrow',
            'resize.etLicenseCategoriesSlider'
        );
    });
})(jQuery);
