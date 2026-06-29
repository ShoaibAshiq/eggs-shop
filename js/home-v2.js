(function ($) {
    'use strict';

    var DESKTOP_BREAKPOINT = 1200;

    function getSliderConfig($wrap, prevLabel, nextLabel, arrowClass, options) {
        var settings = $.extend({
            slidesToShow: 3,
            slidesToScroll: 1,
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
        }, options || {});

        return {
            slidesToShow: settings.slidesToShow,
            slidesToScroll: settings.slidesToScroll,
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
            adaptiveHeight: !!settings.adaptiveHeight,
            prevArrow: '<button class="slick-prev ' + arrowClass + '" aria-label="' + prevLabel + '" type="button"></button>',
            nextArrow: '<button class="slick-next ' + arrowClass + '" aria-label="' + nextLabel + '" type="button"></button>',
            responsive: settings.responsive
        };
    }

    function getParentTrustCertsSliderConfig($wrap, prevLabel, nextLabel, arrowClass) {
        return getSliderConfig($wrap, prevLabel, nextLabel, arrowClass, {
            slidesToShow: 4,
            slidesToScroll: 1,
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
                }
            ]
        });
    }

    function getParentTrustMessagesSliderConfig($wrap, prevLabel, nextLabel, arrowClass) {
        return getSliderConfig($wrap, prevLabel, nextLabel, arrowClass, {
            slidesToShow: 3,
            slidesToScroll: 1,
            adaptiveHeight: true,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    }

    var CHARACTER_ARROW_LEFT = 'https://eggstime.com/wp-content/uploads/2026/06/left-arroww.png';
    var CHARACTER_ARROW_RIGHT = 'https://eggstime.com/wp-content/uploads/2026/06/right-arroww.png';

    function buildEggCarouselArrows(arrowClass, prevLabel, nextLabel) {
        return {
            prevArrow: '<button class="slick-prev et-home__egg-carousel-arrow ' + arrowClass + ' ' + arrowClass + '--prev" aria-label="' + prevLabel + '" type="button"><img class="et-home__egg-carousel-arrow-img" src="' + CHARACTER_ARROW_LEFT + '" alt="" width="44" height="44" decoding="async" /></button>',
            nextArrow: '<button class="slick-next et-home__egg-carousel-arrow ' + arrowClass + ' ' + arrowClass + '--next" aria-label="' + nextLabel + '" type="button"><img class="et-home__egg-carousel-arrow-img" src="' + CHARACTER_ARROW_RIGHT + '" alt="" width="44" height="44" decoding="async" /></button>'
        };
    }

    function getEggWorldSliderConfig($wrap, prevLabel, nextLabel, arrowClass, options) {
        var settings = $.extend({
            slidesToShow: 6,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 1199,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        }, options || {});

        var arrows = buildEggCarouselArrows(arrowClass, prevLabel, nextLabel);

        return {
            slidesToShow: settings.slidesToShow,
            slidesToScroll: settings.slidesToScroll,
            arrows: true,
            appendArrows: $wrap,
            autoplay: false,
            infinite: true,
            swipe: true,
            swipeToSlide: true,
            draggable: true,
            touchMove: true,
            edgeFriction: 0.15,
            waitForAnimate: false,
            prevArrow: arrows.prevArrow,
            nextArrow: arrows.nextArrow,
            responsive: settings.responsive
        };
    }

    function getCharactersSliderConfig($wrap, prevLabel, nextLabel, arrowClass) {
        return getEggWorldSliderConfig($wrap, prevLabel, nextLabel, arrowClass, {
            slidesToShow: 6,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 1199,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    }

    function getBestSellersSliderConfig($wrap, prevLabel, nextLabel, arrowClass) {
        return getEggWorldSliderConfig($wrap, prevLabel, nextLabel, arrowClass, {
            slidesToShow: 6,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 1199,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    }

    function initEggWorldSlider(selector, wrapClass, prevLabel, nextLabel, arrowClass, configBuilder, resizeEvent) {
        var $sliders = $(selector);
        var buildConfig = configBuilder || getEggWorldSliderConfig;
        var resizeTimer;

        if (!$sliders.length) {
            return;
        }

        function initOne($el) {
            var $wrap = $el.closest(wrapClass);

            if (typeof $.fn.slick !== 'function') {
                return false;
            }

            if ($el.hasClass('slick-initialized')) {
                $el.slick('setPosition');
                return true;
            }

            $wrap.addClass('is-slider-active');
            $el.slick(buildConfig($wrap, prevLabel, nextLabel, arrowClass));
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
            $(window).on('load.etHomeEggSlider', function () {
                if (refresh()) {
                    $(window).off('load.etHomeEggSlider');
                }
            });
        }

        if (resizeEvent) {
            $(window).on(resizeEvent, function () {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(refresh, 150);
            });
        }
    }

    function toggleResponsiveSlider($slider, wrapClass, prevLabel, nextLabel, arrowClass, configBuilder) {
        var $wrap = $slider.closest(wrapClass);
        var buildConfig = configBuilder || getSliderConfig;

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

        $slider.slick(buildConfig($wrap, prevLabel, nextLabel, arrowClass));
    }

    function bindResponsiveSlider(selector, wrapClass, prevLabel, nextLabel, arrowClass, resizeEvent, configBuilder) {
        var $sliders = $(selector);
        var resizeTimer;

        if (!$sliders.length || typeof $.fn.slick !== 'function') {
            return;
        }

        function refresh() {
            $sliders.each(function () {
                toggleResponsiveSlider($(this), wrapClass, prevLabel, nextLabel, arrowClass, configBuilder);
            });
        }

        refresh();

        $(window).on(resizeEvent, function () {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(refresh, 150);
        });
    }

    $(document).ready(function () {
        initEggWorldSlider(
            '.et-home__best-sellers-slider',
            '.et-home__best-sellers-slider-wrap',
            'Previous best sellers',
            'Next best sellers',
            'et-home__best-sellers-arrow',
            getBestSellersSliderConfig,
            'resize.etHomeBestSellersSlider'
        );

        initEggWorldSlider(
            '.et-home__characters-slider',
            '.et-home__characters-slider-wrap',
            'Previous characters',
            'Next characters',
            'et-home__characters-arrow',
            getCharactersSliderConfig,
            'resize.etHomeCharactersSlider'
        );

        bindResponsiveSlider(
            '.et-home__stories-slider',
            '.et-home__stories-slider-wrap',
            'Previous stories',
            'Next stories',
            'et-home__stories-arrow',
            'resize.etHomeStoriesSlider'
        );

        bindResponsiveSlider(
            '.et-home__products-slider',
            '.et-home__products-slider-wrap',
            'Previous products',
            'Next products',
            'et-home__products-arrow',
            'resize.etHomeProductsSlider'
        );

        bindResponsiveSlider(
            '.et-home__parent-trust-certs-slider',
            '.et-home__parent-trust-certs-slider-wrap',
            'Previous certifications',
            'Next certifications',
            'et-home__parent-trust-arrow',
            'resize.etHomeParentTrustCertsSlider',
            getParentTrustCertsSliderConfig
        );

        initHeroVideo();
    });

    function initHeroVideo() {
        var hero = document.querySelector('.et-home__hero--split-video');
        if (!hero) {
            return;
        }

        var video = hero.querySelector('.et-home__hero-video');
        var videoWrap = hero.querySelector('.et-home__hero-video-wrap');
        if (!video) {
            return;
        }

        var playToggle = document.getElementById('et_home_hero_play_toggle');

        function setPlayingState(isPlaying) {
            if (videoWrap) {
                videoWrap.classList.toggle('is-playing', isPlaying);
            }
        }

        var mobileQuery = window.matchMedia('(max-width: 767px)');
        var reducedMotionQuery = window.matchMedia('(prefers-reduced-motion: reduce)');

        function shouldPlayVideo() {
            return !mobileQuery.matches && !reducedMotionQuery.matches;
        }

        function markVideoReady() {
            if (videoWrap) {
                videoWrap.classList.remove('is-loading');
            }
        }

        function markVideoLoading() {
            if (videoWrap) {
                videoWrap.classList.add('is-loading');
            }
        }

        function tryPlay() {
            if (!shouldPlayVideo()) {
                video.pause();
                setPlayingState(false);
                return;
            }

            video.preload = 'auto';
            var playPromise = video.play();
            if (playPromise && typeof playPromise.then === 'function') {
                playPromise.then(function () {
                    setPlayingState(true);
                }).catch(function () {
                    setPlayingState(false);
                });
            } else {
                setPlayingState(!video.paused);
            }
        }

        video.addEventListener('play', function () {
            setPlayingState(true);
        });

        video.addEventListener('pause', function () {
            setPlayingState(false);
        });

        if (playToggle) {
            playToggle.addEventListener('click', function () {
                video.play().catch(function () {});
            });
        }

        markVideoLoading();
        video.addEventListener('loadeddata', markVideoReady);
        video.addEventListener('canplay', markVideoReady);

        if (video.readyState >= 2) {
            markVideoReady();
        }

        var soundToggle = document.getElementById('et_home_hero_sound_toggle');

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

        if (soundToggle) {
            soundToggle.addEventListener('click', function () {
                setSoundState(!soundToggle.classList.contains('is-unmuted'));
            });
        }

        if (!shouldPlayVideo()) {
            return;
        }

        tryPlay();

        if (mobileQuery.addEventListener) {
            mobileQuery.addEventListener('change', tryPlay);
            reducedMotionQuery.addEventListener('change', tryPlay);
        }
    }
})(jQuery);
