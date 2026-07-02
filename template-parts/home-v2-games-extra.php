<?php
/**
 * Home v2 — Eggs Time Games (shown just before footer)
 */

$theme_uri = get_template_directory_uri();

$top_img   = $theme_uri . '/images/game_image_1.png';
$card_1    = $theme_uri . '/images/game_2.jpg';
$card_2    = $theme_uri . '/images/game_1.jpg';
$card_3    = $theme_uri . '/images/inside_image.jpg';

$play_url  = 'https://eggstime.com/games/';

$playmarket = $theme_uri . '/images/playmarket.png';
$appstore   = $theme_uri . '/images/appstore.png';
?>

<section class="et-home__games-extra" aria-labelledby="et-home-games-extra-title">
    <div class="et-home__games-extra-inside" aria-hidden="true">
        <div class="center et-home__games-extra-inside-inner">
            <img
                src="<?php echo esc_url( $top_img ); ?>"
                alt=""
                class="et-home__games-extra-inside-img"
                loading="lazy"
                decoding="async"
            />
        </div>
    </div>

    <div class="et-home__games-extra-main">
        <div class="center et-home__games-extra-main-inner">
            <div class="et-home__games-extra-head">
                <h2 class="et-home__games-extra-title" id="et-home-games-extra-title">
                    EGGS TIME GAMES
                </h2>
                <p class="et-home__games-extra-subtitle">
                    Start exploring this fun and educational world
                </p>
            </div>

            <ul class="et-home__games-extra-cards" aria-label="Games">
                <li class="et-home__games-extra-card">
                    <a href="<?php echo esc_url( $play_url ); ?>" target="_blank" rel="noopener noreferrer">
                        <img src="<?php echo esc_url( $card_1 ); ?>" alt="" loading="lazy" decoding="async" />
                    </a>
                </li>
                <li class="et-home__games-extra-card">
                    <a href="<?php echo esc_url( $play_url ); ?>" target="_blank" rel="noopener noreferrer">
                        <img src="<?php echo esc_url( $card_2 ); ?>" alt="" loading="lazy" decoding="async" />
                    </a>
                </li>
                <li class="et-home__games-extra-card">
                    <a href="<?php echo esc_url( $play_url ); ?>" target="_blank" rel="noopener noreferrer">
                        <img src="<?php echo esc_url( $card_3 ); ?>" alt="" loading="lazy" decoding="async" />
                    </a>
                </li>
            </ul>

            <div class="et-home__games-extra-badges" aria-label="Download badges">
                <a href="<?php echo esc_url( $play_url ); ?>" target="_blank" rel="noopener noreferrer">
                    <img src="<?php echo esc_url( $playmarket ); ?>" alt="" loading="lazy" decoding="async" />
                </a>
                <a href="<?php echo esc_url( $play_url ); ?>" target="_blank" rel="noopener noreferrer">
                    <img src="<?php echo esc_url( $appstore ); ?>" alt="" loading="lazy" decoding="async" />
                </a>
            </div>
        </div>
    </div>
</section>

