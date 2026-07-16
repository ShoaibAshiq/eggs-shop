(function ($) {
    'use strict';

    var DESKTOP_BREAKPOINT = 1200;

    /* Duplicate slides so infinite + autoplay work with few cards. */
    function prepareProductsSliderForLoop($el) {
        if ($el.data('et-loop-prepared')) {
            return;
        }

        var $items = $el.children('li');

        /* Enough slides for infinite without cloning (e.g. 10 brand logos). */
        if ($items.length > 1 && $items.length < 8) {
            $items.clone().appendTo($el);
        }

        $el.data('et-loop-prepared', true);
    }

    function getBrandsSliderConfig($wrap, prevLabel, nextLabel, arrowClass) {
        return {
            slidesToShow: 5,
            slidesToScroll: 1,
            arrows: true,
            appendArrows: $wrap,
            autoplay: true,
            autoplaySpeed: 4500,
            pauseOnHover: true,
            pauseOnFocus: true,
            infinite: true,
            swipe: true,
            swipeToSlide: true,
            draggable: true,
            touchMove: true,
            prevArrow: '<button class="slick-prev ' + arrowClass + '" aria-label="' + prevLabel + '" type="button"></button>',
            nextArrow: '<button class="slick-next ' + arrowClass + '" aria-label="' + nextLabel + '" type="button"></button>',
            responsive: [
                {
                    breakpoint: 1400,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1
                    }
                },
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
                        slidesToShow: 2,
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

    function getProductsSliderConfig($wrap, prevLabel, nextLabel, arrowClass) {
        return {
            slidesToShow: 4,
            slidesToScroll: 1,
            arrows: false,
            autoplay: true,
            autoplaySpeed: 4500,
            pauseOnHover: true,
            pauseOnFocus: true,
            infinite: true,
            swipe: true,
            swipeToSlide: true,
            draggable: true,
            touchMove: true,
            speed: 350,
            responsive: [
                {
                    breakpoint: 1400,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        infinite: true
                    }
                },
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        infinite: true
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true
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

    function initAlwaysOnSlider(selector, wrapClass, prevLabel, nextLabel, arrowClass, configBuilder, resizeEvent) {
        var $sliders = $(selector);
        var resizeTimer;

        if (!$sliders.length || typeof $.fn.slick !== 'function') {
            return;
        }

        function initOne($el) {
            var $wrap = $el.closest(wrapClass);

            if ($el.hasClass('slick-initialized')) {
                $el.slick('setPosition');
                return true;
            }

            prepareProductsSliderForLoop($el);
            $wrap.addClass('is-slider-active');
            $el.slick(configBuilder($wrap, prevLabel, nextLabel, arrowClass));
            $el.slick('slickPlay');
            return true;
        }

        function refresh() {
            var initialized = true;

            $sliders.each(function () {
                if (!initOne($(this))) {
                    initialized = false;
                }
            });

            return initialized;
        }

        if (!refresh()) {
            $(window).on('load.etLicenseProductsSlider', function () {
                if (refresh()) {
                    $(window).off('load.etLicenseProductsSlider');
                }
            });
        }

        $(window).on(resizeEvent, function () {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(refresh, 150);
        });
    }

    function initLicenseHeroVideo() {
        var hero = document.querySelector('.et-license__hero-wrap .et-home__hero--split-video');
        if (!hero) {
            return;
        }

        hero.querySelectorAll('.et-home__hero-video-wrap').forEach(function (videoWrap) {
            if (videoWrap.getAttribute('data-et-video-ready') === '1') {
                return;
            }

            var video = videoWrap.querySelector('.et-home__hero-video');
            var playToggle = videoWrap.querySelector('.et-home__hero-video-play');
            var soundToggle = videoWrap.querySelector('.et-home__hero-video-sound');

            if (!video) {
                return;
            }

            videoWrap.setAttribute('data-et-video-ready', '1');

            function updatePlayButtonLabel() {
                if (!playToggle) {
                    return;
                }
                playToggle.setAttribute('aria-label', video.paused ? 'Play video' : 'Pause video');
            }

            function setPlayingState(isPlaying) {
                videoWrap.classList.toggle('is-playing', isPlaying);
                updatePlayButtonLabel();
            }

            function setSoundState(isUnmuted) {
                if (!soundToggle) {
                    return;
                }
                video.muted = !isUnmuted;
                soundToggle.classList.toggle('is-unmuted', isUnmuted);
                soundToggle.setAttribute('aria-pressed', isUnmuted ? 'true' : 'false');
                soundToggle.setAttribute('aria-label', isUnmuted ? 'Turn sound off' : 'Turn sound on');
                if (isUnmuted) {
                    video.play().catch(function () {});
                }
            }

            video.pause();
            setPlayingState(false);

            video.addEventListener('play', function () {
                setPlayingState(true);
            });

            video.addEventListener('pause', function () {
                setPlayingState(false);
            });

            if (playToggle) {
                playToggle.addEventListener('click', function (event) {
                    event.stopPropagation();
                    if (video.paused) {
                        video.muted = true;
                        setPlayingState(true);
                        video.play().catch(function () {
                            setPlayingState(false);
                        });
                        return;
                    }
                    video.pause();
                });
            }

            videoWrap.addEventListener('click', function (event) {
                if (
                    event.target.closest('.et-home__hero-video-sound') ||
                    event.target.closest('.et-home__hero-video-play')
                ) {
                    return;
                }
                if (!video.paused) {
                    video.pause();
                }
            });

            if (soundToggle) {
                soundToggle.addEventListener('click', function (event) {
                    event.stopPropagation();
                    setSoundState(!soundToggle.classList.contains('is-unmuted'));
                });
            }
        });
    }

    $(document).ready(function () {
        initLicenseHeroVideo();

        initAlwaysOnSlider(
            '.et-license__brands-slider',
            '.et-license__brands-slider-wrap',
            'Previous brands',
            'Next brands',
            'et-license__slider-arrow',
            getBrandsSliderConfig,
            'resize.etLicenseBrandsSlider'
        );

        /* Products: static grid on tablet/desktop; slick slider on mobile only. */
        (function initProductsMobileSlider() {
            var MOBILE_MAX = 767;
            var $sliders = $('.et-license__products-slider');
            var resizeTimer;

            if (!$sliders.length || typeof $.fn.slick !== 'function') {
                return;
            }

            function toggle($slider) {
                var $wrap = $slider.closest('.et-license__products-slider-wrap');

                if (window.innerWidth > MOBILE_MAX) {
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

                $slider.slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: true,
                    appendArrows: $wrap,
                    autoplay: true,
                    autoplaySpeed: 4500,
                    pauseOnHover: true,
                    pauseOnFocus: true,
                    infinite: true,
                    swipe: true,
                    swipeToSlide: true,
                    draggable: true,
                    touchMove: true,
                    prevArrow: '<button class="slick-prev et-license__slider-arrow" aria-label="Previous products" type="button"></button>',
                    nextArrow: '<button class="slick-next et-license__slider-arrow" aria-label="Next products" type="button"></button>'
                });
            }

            function refresh() {
                $sliders.each(function () {
                    toggle($(this));
                });
            }

            refresh();

            $(window).on('resize.etLicenseProductsSlider', function () {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(refresh, 150);
            });
        })();

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
