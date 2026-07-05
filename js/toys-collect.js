(function ($) {
    'use strict';

    function initToysCollectSlider() {
        var $slider = $('.et-toys-collect__slider');

        if (!$slider.length || typeof $.fn.slick !== 'function') {
            return;
        }

        $slider.each(function () {
            var $el = $(this);

            if ($el.hasClass('slick-initialized')) {
                $el.slick('setPosition');
                return;
            }

            $el.slick({
                slidesToShow: 5,
                slidesToScroll: 1,
                infinite: false,
                dots: true,
                arrows: true,
                adaptiveHeight: false,
                prevArrow: '<button type="button" class="slick-prev et-toys-collect__arrow et-toys-collect__arrow--prev" aria-label="Previous collection"></button>',
                nextArrow: '<button type="button" class="slick-next et-toys-collect__arrow et-toys-collect__arrow--next" aria-label="Next collection"></button>',
                responsive: [
                    {
                        breakpoint: 1400,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 1199,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 640,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            centerMode: true,
                            centerPadding: '18px'
                        }
                    }
                ]
            });
        });
    }

    $(function () {
        initToysCollectSlider();
    });

    $(window).on('load', function () {
        initToysCollectSlider();
    });
}(jQuery));
