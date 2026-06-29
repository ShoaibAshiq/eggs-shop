$(document).ready(function(){
  $("a.fancybox").fancybox();

  $('.items-magik, .items-king, .items-lucky, .items-happy').slick({
      arrows:true,
      slidesToShow: 4,
      autoplay: true,
      infinite: true,
      prevArrow: '<button class="slick-prev slick-arrow" aria-label="Previous" type="button" style=""></button>',
      nextArrow: '<button class="slick-next slick-arrow" aria-label="Next" type="button" style=""></button>',
      responsive:[
          {
            breakpoint:1200,
              settings:{
              slidesToShow:3
              }
          },
          {
              breakpoint:768,
              settings:{
                  slidesToShow:2
              }
          },
          {
              breakpoint:480,
              settings:{
                  slidesToShow:1
              }
          }
      ]
  });

  $('.slider-slick-1').slick({
    slidesToShow: 5,
    slidesToSlide: 1,
    autoplay: true,
    arrows: true,
    infinite: true,
    prevArrow: '<button class="slick-prev slick-arrow slick_stories_prev" aria-label="Previous" type="button" style=""></button>',
    nextArrow: '<button class="slick-next slick-arrow slick_stories_next" aria-label="Next" type="button" style=""></button>',
    responsive: [
      {
        breakpoint: 1440,
        settings: {
          slidesToShow: 4
        }
      },

      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3
        }
      },

      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2
        }
      },

      {
        breakpoint: 500,
        settings: {
          slidesToShow: 1
        }
      }
    ]
  });

  $('.slider-slick-2').slick({
    slidesToShow: 4,
    slidesToSlide: 1,
    autoplay: true,
    arrows: true,
    infinite: true,
    prevArrow: '<button class="slick-prev slick-arrow slick_channel_prev" aria-label="Previous" type="button" style=""></button>',
    nextArrow: '<button class="slick-next slick-arrow slick_channel_next" aria-label="Next" type="button" style=""></button>',
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3
        }
      },

      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2
        }
      },

      {
        breakpoint: 500,
        settings: {
          slidesToShow: 1
        }
      }
    ]
  });

  $('.banner__slick').slick({
    slidesToShow: 1,
    slidesToSlide: 1,
    autoplay: true,
    arrows: true,

    infinite: true,
    prevArrow: '<button class="slick-prev slick-arrow slick_banner_prev" aria-label="Previous" type="button" style=""></button>',
    nextArrow: '<button class="slick-next slick-arrow slick_banner_next" aria-label="Next" type="button" style=""></button>'
  });

  $('.slider--product').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    fade: true,
    arrows: false,
    infinite: true,
    prevArrow: '<button class="slick-prev slick-arrow slick_products_prev" aria-label="Previous" type="button" style=""></button>',
    nextArrow: '<button class="slick-next slick-arrow slick_products_next" aria-label="Next" type="button" style=""></button>',
    asNavFor: '.slider-nav'
  });

  $('.slider-nav').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    centerMode: true,
    vertical: true,
    dots: false,
    arrows: false,
    infinite: true,
    asNavFor: '.slider--product',
    focusOnSelect: true,
    responsive: [
      {
        breakpoint: 1600,
        settings: {
          slidesToShow: 5
        }
      },

      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 5
        }
      },

      {
        breakpoint: 768,
        settings: {
          slidesToShow: 5
        }
      },

      {
        breakpoint: 500,
        settings: {
          slidesToShow: 5
        }
      }
    ]
  });

  $('.slider-photos').slick({
    slidesToShow: 4,
    slidesToSlide: 1,
    autoplay: true,
    arrows: true,
    infinite: true,
    prevArrow: '<button class="slick-prev slick-arrow slick_photos_prev" aria-label="Previous" type="button" style=""></button>',
    nextArrow: '<button class="slick-next slick-arrow slick_photos_next" aria-label="Next" type="button" style=""></button>',
    responsive: [

      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3
        }
      },

      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2
        }
      },

      {
        breakpoint: 500,
        settings: {
          slidesToShow: 1
        }
      }
    ]
  });

  $('.slider-slick-3').slick({
    slidesToShow: 2,
    slidesToSlide: 1,
    autoplay: true,
    arrows: true,
    infinite: true,
    prevArrow: '<button class="slick-prev slick-arrow slick_press_prev" aria-label="Previous" type="button" style=""></button>',
    nextArrow: '<button class="slick-next slick-arrow slick_press_next" aria-label="Next" type="button" style=""></button>',
    responsive: [

      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1
        }
      }
    ]
  });

  $('.slider-slick-4').slick({
    slidesToShow: 3,
    slidesToSlide: 1,
    autoplay: true,
    arrows: true,
    infinite: true,
    prevArrow: '<button class="slick-prev slick-arrow slick_game_prev" aria-label="Previous" type="button" style=""></button>',
    nextArrow: '<button class="slick-next slick-arrow slick_game_next" aria-label="Next" type="button" style=""></button>',
    responsive: [
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 3
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 2
            }
        },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1
        }
      }
    ]
  });

  /* Upload Popup */

  $('#upload_button').click(function() {
    $('#upload_photo').addClass("visible");

    $('.upload>.layout').removeClass("visible");

    $('div.choose_source').addClass("visible");

  });

  $('#change_password').change(function() {
    $('#password').toggle();
  });

  $('div.close_btn, div.upload_overlay ').click(function() {
    $('#desc').val('');
    $('#imgInp').val('');
    $('.ajax-reply').text('');
    $('#agree').prop('checked', false);
    $('#blah').css('background', 'url(/wp-content/themes/eggs-shop/images/upload_photo.png)');
    $('#upload_photo').removeClass("visible");
  });

  $('#check_address').prop('checked', $('#ship-to-different-address .woocommerce-form__label-for-checkbox input[type=checkbox]').val());

  $('a.step_1').click(function() {
    $('.upload > div').removeClass("visible");

    $('div.choose_source').addClass("visible");
  });

  $('a.step_2').click(function() {
    $('.upload > div').removeClass("visible");

    $('div.select_content').addClass("visible");
  });

  $('a.step_3').click(function() {
    $('.upload > div').removeClass("visible");

    $('div.review').addClass("visible");
  });

  $('a.step_4').click(function() {
    $('.upload > div').removeClass("visible");

    $('div.submit').addClass("visible");
  });


//Scroll button display when scroll more that 1000px else we hide button
  $(window).scroll(function () {
    if ($(this).scrollTop() >= 1000) { // this refers to window
      $('.scroll-button').fadeIn();
    }
    else {
      $('.scroll-button').fadeOut();
    }
  });
  //Scroll to top
  $('.scroll-button').on('click', function (e) {
    e.preventDefault();
    $('html,body').animate({
      scrollTop: 0
    }, 1000);
  });
  $(".account").each(function () {
      // $('.navigation').unwrap();
    // var $menu = $(this).find(".navigation");
    // var $content = $(this).find(".content");
    //
    // $content.find(".content-block").each(function() {
    //   $(this).addClass("block-"+$(this).index());
    // });
    //
    // $menu.find('a').each(function(index) {
    //   $(this).click(function(event) {
    //     $menu.find("a").each(function() {
    //       $(this).removeClass("active");
    //     });
    //
    //     $(this).addClass("active");
    //     $content.find(".content-block").each(function() {
    //       $(this).removeClass("visible");
    //     });
    //     $content.find(".block-"+index).addClass("visible");
    //     event.preventDefault();
    //   });
    // });
  });


  // resale

    $('#type_of_business').on('change', function () {
        if($(this).val()=='Other (specify)'){
          $(this).remove();
          $('.type_of_business').append('<input type="text" name="type_of_business" id="type_of_business" class="wpcf7-form-control" placeholder="Other (specify)"/>');
          $('.type_of_business input').focus();
        }
    });

    (function () {
        var FOOTER_ACCORDION_BREAKPOINT = 1024;
        var $footerItems = $('.footer__accordion-item');

        if (!$footerItems.length) {
            return;
        }

        function isFooterAccordionMode() {
            return window.innerWidth < FOOTER_ACCORDION_BREAKPOINT;
        }

        function resetFooterAccordion() {
            $footerItems.removeClass('is-open')
                .find('.footer__accordion-toggle')
                .attr('aria-expanded', 'false');
        }

        $(document).on('click', '.footer__accordion-toggle', function () {
            if (!isFooterAccordionMode()) {
                return;
            }

            var $item = $(this).closest('.footer__accordion-item');
            var willOpen = !$item.hasClass('is-open');

            $item.toggleClass('is-open', willOpen);
            $(this).attr('aria-expanded', willOpen ? 'true' : 'false');
        });

        var footerResizeTimer;

        $(window).on('resize.footerAccordion', function () {
            clearTimeout(footerResizeTimer);
            footerResizeTimer = setTimeout(function () {
                if (!isFooterAccordionMode()) {
                    resetFooterAccordion();
                }
            }, 150);
        });
    })();
});

