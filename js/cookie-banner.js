(function ($) {
  'use strict';

  var COOKIE_ICON = 'https://eggstime.com/wp-content/uploads/2026/06/cookie.png';

  var COOKIE_TITLE = 'Cookies & Privacy';
  var COOKIE_MESSAGE = 'We use cookies to improve your experience and remember preferences.';

  function unlockSite() {
    $('.wrapper').css('pointer-events', 'auto');
    $('html').css('overflow', '');
  }

  function hasConsent() {
    return !!(window.Cookies && Cookies.get && Cookies.get().CookieLawInfoConsent);
  }

  function hideBar() {
    var $bar = $('#cookie-law-info-bar');
    if ($bar.length) {
      $bar.stop(true, true).fadeOut(250);
    }
    unlockSite();
  }

  function acceptEssentialOnly() {
    if (window.CLI && typeof CLI.reject === 'function') {
      CLI.reject();
      return;
    }

    if (window.CLI && typeof CLI.close === 'function') {
      CLI.close();
      return;
    }

    hideBar();
  }

  function enhanceCookieBar() {
    var $bar = $('#cookie-law-info-bar');
    if (!$bar.length || $bar.hasClass('et-cookie-bar--ready')) {
      return;
    }

    var $container = $bar.find('.cli-bar-container').first();
    var $message = $bar.find('.cli-bar-message').first();
    var $buttons = $bar.find('.cli-bar-btn_container').first();
    var $settings = $bar.find('.cli_settings_button').first();
    var $accept = $bar.find('#wt-cli-accept-all-btn').first();

    if (!$container.length || !$message.length || !$buttons.length) {
      return;
    }

    $bar.addClass('et-cookie-bar--ready');
    $bar.find('> span').addClass('et-cookie-bar__shell');

    if (!$bar.find('.et-cookie-bar__close').length) {
      $('<button type="button" class="et-cookie-bar__close" aria-label="Close cookie notice">&times;</button>')
        .appendTo($container)
        .on('click', function (event) {
          event.preventDefault();
          acceptEssentialOnly();
        });
    }

    if (!$bar.find('.et-cookie-bar__visual').length) {
      $('<div class="et-cookie-bar__visual"><img src="' + COOKIE_ICON + '" alt="" width="64" height="64" decoding="async" /></div>')
        .prependTo($container);
    }

    if (!$bar.find('.et-cookie-bar__title').length) {
      $('<h3 class="et-cookie-bar__title"></h3>').text(COOKIE_TITLE).insertBefore($message);
    }

    $message.text(COOKIE_MESSAGE);

    if (!$bar.find('#et-cli-essential-btn').length) {
      $('<a href="#" role="button" id="et-cli-essential-btn" class="medium cli-plugin-button et-cookie-bar__btn et-cookie-bar__btn--essential">Essential Only</a>')
        .prependTo($buttons)
        .on('click', function (event) {
          event.preventDefault();
          acceptEssentialOnly();
        });
    }

    if ($settings.length) {
      $settings.text('Cookie Preferences');
    }

    if ($accept.length) {
      $accept.text('Accept Cookies');
    }

    if (hasConsent()) {
      unlockSite();
    }
  }

  $(document).on('click', '#wt-cli-accept-all-btn, #wt-cli-privacy-save-btn', function () {
    window.setTimeout(unlockSite, 120);
  });

  $(document).on('click', '#et-cli-essential-btn', function () {
    window.setTimeout(unlockSite, 120);
  });

  $(function () {
    enhanceCookieBar();

    if (!hasConsent()) {
      $('.wrapper').css('pointer-events', 'none');
      $('html').css('overflow', 'hidden');
    }

    var attempts = 0;
    var poll = window.setInterval(function () {
      enhanceCookieBar();
      attempts += 1;
      if ($('#cookie-law-info-bar.et-cookie-bar--ready').length || attempts > 40) {
        window.clearInterval(poll);
      }
    }, 250);
  });
})(jQuery);
