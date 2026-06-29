<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119049468-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-119049468-1');
</script>
<!-- End of Global site tag (gtag.js) - Google Analytics -->


    <title><?php document_title(); ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
          <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">


    <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,500i,700"
          rel="stylesheet">
    <link rel="stylesheet" href="/wp-content/themes/eggs-shop/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/mb.zoomify.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/styles_topic.css?<?php echo time();?>">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/styles_as_on_press.css?<?php echo time();?>">
    <meta name="description"
          content="<?php echo ( $post->post_title == 'Eggs Surprises' ) ? "King Egg, MagiK Egg, Lucky Egg, Happy Egg" : $post->post_title . ' - ' . get_bloginfo( 'description' ); ?>"/>
  <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/header-new.css?<?php echo esc_attr( time() ); ?>">
    <script>
        if (navigator.userAgent.indexOf("Chrome") > -1) {
            document.documentElement.className += ' browser-chrome';
        }
        else if (navigator.userAgent.indexOf("Safari") > -1) {
            document.documentElement.className += ' browser-safari';
        }
        else if (navigator.userAgent.indexOf("Firefox") > -1) {
            document.documentElement.className += ' browser-firefox';
        }
    </script>
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <script src='<?php echo get_template_directory_uri(); ?>/js/mb.zoomify.js'></script>

</head>
<body <?php //body_class(); ?> class="<?php if ( is_user_logged_in() ) {?> custom_log_in <?php }else{?>custom_log_out<?php }?>">
<?php
global $post;
$cart_qty = ( function_exists( 'WC' ) && WC()->cart ) ? WC()->cart->get_cart_contents_count() : 0;
$cart_has_items = $cart_qty > 0;
$et_post_name   = ( isset( $post ) && isset( $post->post_name ) ) ? $post->post_name : '';
$et_header_mod  = ( $et_post_name === 'games' ) ? ' et-header--games' : '';
$et_account_url = function_exists( 'wc_get_page_permalink' )
    ? wc_get_page_permalink( 'myaccount' )
    : wp_login_url();
?>
<input type="checkbox" class="et-menu-check" id="et_menu_open" aria-hidden="true">

<div class="wrapper">
    <header class="et-header<?php echo esc_attr( $et_header_mod ); ?>">
        <div class="et-header__inner center">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="et-header__logo"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>

            <?php
            wp_nav_menu( array(
                'theme_location' => 'top_menu',
                'container_class' => 'et-header__nav',
                'menu_class'      => 'et-header__menu',
            ) );
            ?>

            <div class="et-header__actions">
                <div class="cart-popup-wrapper et-header__cart-wrap<?php echo $cart_has_items ? ' et-header__cart-wrap--has-items' : ''; ?>">
                    <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="et-header__cart" id="et_header_cart_toggle" aria-label="Shopping cart" aria-expanded="false" aria-controls="et_header_cart_popup">
                        <span class="et-header__cart-icon" aria-hidden="true">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 18" aria-hidden="true">
                                <path d="M19.34,11.75l2.6-7.86a.77.77,0,0,0-.07-.76,1.17,1.17,0,0,0-.93-.39H6.23L5.84.87a1,1,0,0,0-1-.87H.66C.23,0,0,.2,0,.61V1.69c0,.39.23.49.68.49H4.16L6.83,13.63a2.6,2.6,0,0,0-.65,1.73A2.57,2.57,0,0,0,8.62,18,2.73,2.73,0,0,0,11,16h5.2a2.55,2.55,0,0,0,2.41,2,2.51,2.51,0,0,0,2.44-2.53,2.39,2.39,0,0,0-4.26-1.63H10.44a2,2,0,0,0-1.74-1l-.09-.48h9.72C19.06,12.38,19.21,12.11,19.34,11.75Zm-.67,2.76a.92.92,0,1,1-.92.92A.92.92,0,0,1,18.66,14.51Zm-9.14.92a.93.93,0,1,1-.93-.94A.93.93,0,0,1,9.52,15.44Z"/>
                            </svg>
                        </span>
                        <span class="cart__badge"><?php echo (int) $cart_qty; ?></span>
                    </a>
                    <?php if ( $cart_has_items && $et_post_name !== 'cart' ) : ?>
                        <div class="cart-popup" id="et_header_cart_popup">
                            <div class="shopping">
                                <?php echo do_shortcode( '[custom-cart]' ); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <a href="<?php echo esc_url( $et_account_url ); ?>" class="et-header__account" aria-label="My account">
                    <span class="et-header__account-icon" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M12 12a4.5 4.5 0 1 0-4.5-4.5A4.5 4.5 0 0 0 12 12Zm0 2.25c-3 0-9 1.5-9 4.5v1.5h18V18.75c0-3-6-4.5-9-4.5Z"/>
                        </svg>
                    </span>
                </a>

                <button type="button" class="et-header__burger" id="et_menu_toggle" aria-label="Open navigation menu" aria-expanded="false" aria-controls="et_header_drawer"></button>
            </div>
        </div>

        <div class="et-header__drawer" id="et_header_drawer" aria-hidden="true">
            <button type="button" class="et-header__drawer-close" id="et_drawer_close" aria-label="Close menu">&times;</button>
            <?php
            wp_nav_menu( array(
                'theme_location' => 'top_menu',
                'container'      => false,
                'menu_class'     => 'et-header__drawer-list',
            ) );
            ?>
            <div class="et-header__drawer-account">
                <a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>">My Account</a>
                <?php wp_lognout( 'index.php' ); ?>
            </div>
            <div class="et-header__drawer-social">
                <span class="et-header__drawer-social-title">Connect With Us</span>
                <div class="et-header__drawer-social-icons">
                    <a href="https://www.youtube.com/channel/UC__ZaY9WHmlVMAJiLjXOwRQ" target="_blank" rel="noopener noreferrer" aria-label="YouTube">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 30 30" aria-hidden="true"><path d="M28,12.82q0-.78-.12-2a18,18,0,0,0-.31-2.14,3.37,3.37,0,0,0-1-1.78,3.09,3.09,0,0,0-1.81-.84A95.19,95.19,0,0,0,15,5.71a95.18,95.18,0,0,0-9.74.36,3.06,3.06,0,0,0-1.8.84,3.39,3.39,0,0,0-1,1.78,16.06,16.06,0,0,0-.33,2.14Q2,12,2,12.82T2,15q0,1.39,0,2.18t.12,2a18,18,0,0,0,.31,2.14,3.37,3.37,0,0,0,1,1.78,3.09,3.09,0,0,0,1.81.84,95.09,95.09,0,0,0,9.74.36,95.09,95.09,0,0,0,9.74-.36,3.06,3.06,0,0,0,1.8-.84,3.39,3.39,0,0,0,1-1.78,16.07,16.07,0,0,0,.33-2.14q.11-1.2.12-2T28,15Q28,13.61,28,12.82Zm-7.85,3-7.43,4.64a.83.83,0,0,1-.49.15,1,1,0,0,1-.45-.12.86.86,0,0,1-.48-.81V10.36a.86.86,0,0,1,.48-.81.87.87,0,0,1,.94,0l7.43,4.64a.92.92,0,0,1,0,1.57Z"/></svg>
                    </a>
                    <a href="https://www.facebook.com/eggstime" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 30 30" aria-hidden="true"><path d="M21,3H17.89c-3.5,0-5.76,2.32-5.76,5.91v2.72H9a.49.49,0,0,0-.49.49v3.95a.49.49,0,0,0,.49.49h3.13v10a.49.49,0,0,0,.49.49H16.7a.49.49,0,0,0,.49-.49v-10h3.66a.49.49,0,0,0,.49-.49V12.12a.49.49,0,0,0-.49-.49H17.19V9.32c0-1.11.26-1.67,1.71-1.67H21a.49.49,0,0,0,.49-.49V3.49A.49.49,0,0,0,21,3Z"/></svg>
                    </a>
                    <a href="https://www.pinterest.com/eggstime" target="_blank" rel="noopener noreferrer" aria-label="Pinterest">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 30 30" aria-hidden="true"><path d="M24.22,9.67c-.66-4.74-5.38-7.16-10.42-6.59-4,.45-8,3.67-8.13,8.28-.1,2.81.7,4.92,3.37,5.52,1.16-2.05-.37-2.5-.61-4-1-6.07,7-10.22,11.19-6,2.9,2.94,1,12-3.68,11-4.47-.9,2.19-8.09-1.38-9.5C11.67,7.3,10.13,12,11.5,14.27,10.7,18.26,9,22,9.66,27c2.28-1.66,3-4.82,3.68-8.13,1.15.7,1.76,1.42,3.22,1.53C22,20.82,25,15,24.22,9.67Z"/></svg>
                    </a>
                    <a href="https://twitter.com/sweets_choice" target="_blank" rel="noopener noreferrer" aria-label="Twitter">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 30 30" aria-hidden="true"><path d="M27,7.56a9.83,9.83,0,0,1-2.83.78,4.94,4.94,0,0,0,2.16-2.72,9.93,9.93,0,0,1-3.13,1.2,4.93,4.93,0,0,0-8.39,4.49A14,14,0,0,1,4.67,6.15,4.93,4.93,0,0,0,6.2,12.72,4.92,4.92,0,0,1,4,12.11v.06A4.93,4.93,0,0,0,7.91,17a5,5,0,0,1-1.3.17,4.73,4.73,0,0,1-.93-.09,4.93,4.93,0,0,0,4.6,3.42,9.88,9.88,0,0,1-6.11,2.1A10.46,10.46,0,0,1,3,22.53a13.92,13.92,0,0,0,7.55,2.22,13.91,13.91,0,0,0,14-14l0-.64A9.83,9.83,0,0,0,27,7.56Z"/></svg>
                    </a>
                    <a href="https://www.instagram.com/eggs_time/" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 30 30" aria-hidden="true"><path d="M20.92,9.92a.85.85,0,0,1-.85-.85V7.38a.85.85,0,0,1,.85-.85h1.69a.85.85,0,0,1,.85.85V9.08a.85.85,0,0,1-.85.85Z"/><path d="M15,11.77a3.2,3.2,0,0,0-1.67.48,1.6,1.6,0,0,1,.48-.08,1.64,1.64,0,1,1-1.64,1.64,1.62,1.62,0,0,1,.08-.48A3.19,3.19,0,0,0,11.77,15,3.23,3.23,0,1,0,15,11.77Z"/><path d="M15,9.92A5.08,5.08,0,1,1,9.92,15,5.08,5.08,0,0,1,15,9.92m0-1.69A6.77,6.77,0,1,0,21.77,15,6.78,6.78,0,0,0,15,8.23Z"/><path d="M21.88,4H8.13A4.12,4.12,0,0,0,4,8.13V21.88A4.12,4.12,0,0,0,8.13,26H21.88A4.12,4.12,0,0,0,26,21.88V8.13A4.12,4.12,0,0,0,21.88,4Zm2.43,7.62H18.78a5.08,5.08,0,1,1-7.55,0H5.69V8.13A2.44,2.44,0,0,1,8.13,5.69H21.88a2.44,2.44,0,0,1,2.43,2.43Z"/></svg>
                    </a>
                    <a href="<?php echo esc_url( get_permalink( 353 ) ); ?>" aria-label="Email">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 30 30" aria-hidden="true"><path d="M26,20.5a2.73,2.73,0,0,1-.35,1.32L18.7,14.05l6.87-6A2.73,2.73,0,0,1,26,9.5v11Zm-11-5L24.56,7.1a2.72,2.72,0,0,0-1.31-.35H6.75a2.71,2.71,0,0,0-1.31.35ZM17.67,15l-2.21,1.94a.69.69,0,0,1-.9,0L12.33,15l-7,7.87a2.72,2.72,0,0,0,1.45.42h16.5a2.72,2.72,0,0,0,1.45-.42ZM4.43,8A2.73,2.73,0,0,0,4,9.5v11a2.72,2.72,0,0,0,.35,1.32L11.3,14Z"/></svg>
                    </a>
                </div>
            </div>
        </div>
        <label for="et_menu_open" class="et-header__overlay" role="button" aria-label="Close menu"></label>
    </header>

<script>
document.addEventListener('DOMContentLoaded', function () {
    /* Desktop center nav — INFO / LEARN dropdown */
    var dropdownParents = document.querySelectorAll('.et-header__menu > li.menu-item-has-children');
    var closeTimer;

    dropdownParents.forEach(function (li) {
        var link = li.querySelector('a');
        if (!link) return;

        var arrow = document.createElement('span');
        arrow.className = 'et-dropdown-arrow';
        arrow.innerHTML = '&#9662;';
        link.appendChild(arrow);

        li.addEventListener('mouseenter', function () {
            clearTimeout(closeTimer);
            dropdownParents.forEach(function (other) {
                if (other !== li) other.classList.remove('menu-open');
            });
            li.classList.add('menu-open');
        });

        li.addEventListener('mouseleave', function () {
            closeTimer = setTimeout(function () {
                li.classList.remove('menu-open');
            }, 200);
        });

        arrow.addEventListener('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            var isOpen = li.classList.contains('menu-open');
            dropdownParents.forEach(function (other) {
                other.classList.remove('menu-open');
            });
            if (!isOpen) li.classList.add('menu-open');
        });
    });

    document.addEventListener('click', function (e) {
        dropdownParents.forEach(function (li) {
            if (!li.contains(e.target)) {
                li.classList.remove('menu-open');
            }
        });
    });

    /* Mobile / tablet drawer */
    var menuCheck = document.getElementById('et_menu_open');
    var menuToggle = document.getElementById('et_menu_toggle');
    var drawerClose = document.getElementById('et_drawer_close');
    var drawer = document.getElementById('et_header_drawer');
    var cartWrap = document.querySelector('.et-header__cart-wrap');
    var cartToggle = document.getElementById('et_header_cart_toggle');
    var cartPopup = document.getElementById('et_header_cart_popup');

    function setMenuOpen(isOpen) {
        if (menuCheck) menuCheck.checked = isOpen;
        if (menuToggle) menuToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        if (isOpen) {
            setCartOpen(false);
        }
    }

    function closeMobileMenu() {
        setMenuOpen(false);
    }

    function setCartOpen(isOpen) {
        if (!cartWrap || !cartPopup) {
            return;
        }

        cartWrap.classList.toggle('is-cart-open', isOpen);
        if (cartToggle) {
            cartToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
        }

        if (isOpen) {
            closeMobileMenu();
        }
    }

    function closeCartPopup() {
        setCartOpen(false);
    }

    if (cartToggle && cartWrap && cartPopup) {
        cartToggle.addEventListener('click', function (e) {
            e.preventDefault();
            setCartOpen(!cartWrap.classList.contains('is-cart-open'));
        });
    }

    document.addEventListener('click', function (e) {
        if (cartWrap && cartWrap.classList.contains('is-cart-open') && !cartWrap.contains(e.target)) {
            closeCartPopup();
        }
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            closeCartPopup();
            closeMobileMenu();
        }
    });

    if (menuToggle && menuCheck) {
        menuToggle.addEventListener('click', function () {
            setMenuOpen(!menuCheck.checked);
        });

        menuCheck.addEventListener('change', function () {
            menuToggle.setAttribute('aria-expanded', menuCheck.checked ? 'true' : 'false');
        });
    }

    if (drawerClose) {
        drawerClose.addEventListener('click', closeMobileMenu);
    }

    if (drawer) {
        function drawerDirectChild(parent, tag, className) {
            for (var i = 0; i < parent.children.length; i++) {
                var child = parent.children[i];
                if (tag && child.tagName !== tag) continue;
                if (className && !child.classList.contains(className)) continue;
                return child;
            }
            return null;
        }

        var drawerParents = drawer.querySelectorAll('.et-header__drawer-list > li.menu-item-has-children');

        drawerParents.forEach(function (li) {
            var link = drawerDirectChild(li, 'A', null);
            var sub = drawerDirectChild(li, 'UL', 'sub-menu');

            if (!link || !sub) return;

            var row = document.createElement('div');
            row.className = 'et-drawer-item-row';
            li.insertBefore(row, link);
            row.appendChild(link);

            var toggle = document.createElement('button');
            toggle.type = 'button';
            toggle.className = 'et-drawer-toggle';
            toggle.setAttribute('aria-label', 'Toggle submenu');
            toggle.setAttribute('aria-expanded', 'false');
            toggle.innerHTML = '&#9662;';
            row.appendChild(toggle);

            function toggleSubmenu(e) {
                e.preventDefault();
                e.stopPropagation();

                var willOpen = !li.classList.contains('is-open');

                drawerParents.forEach(function (other) {
                    if (other === li) return;
                    other.classList.remove('is-open');
                    var otherBtn = other.querySelector('.et-drawer-toggle');
                    if (otherBtn) {
                        otherBtn.classList.remove('is-open');
                        otherBtn.setAttribute('aria-expanded', 'false');
                    }
                });

                li.classList.toggle('is-open', willOpen);
                toggle.classList.toggle('is-open', willOpen);
                toggle.setAttribute('aria-expanded', willOpen ? 'true' : 'false');
            }

            link.addEventListener('click', toggleSubmenu, true);
            toggle.addEventListener('click', toggleSubmenu);
        });

        drawer.querySelectorAll('.et-header__drawer-list > li:not(.menu-item-has-children) > a').forEach(function (link) {
            link.addEventListener('click', closeMobileMenu);
        });

        drawer.querySelectorAll('.et-header__drawer-list .sub-menu a').forEach(function (link) {
            link.addEventListener('click', closeMobileMenu);
        });
    }
});
</script>