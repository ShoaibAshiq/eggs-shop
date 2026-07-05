<?php
/**
 * Home v2 — Learn and Joy + Eggs Time Games (footer-adjacent stack)
 */

$theme_uri   = get_template_directory_uri();
$games_url   = function_exists( 'get_permalink' ) ? get_permalink( 617 ) : home_url( '/games/' );

if ( empty( $games_url ) || '#' === $games_url ) {
    $games_url = home_url( '/games/' );
}

$et_home_games_cards = array(
    array(
        'title' => 'Coloring Time',
        'image' => $theme_uri . '/images/game_2.jpg',
        'url'   => 'http://eggstime.com/upload/index.html',
    ),
    array(
        'title' => 'Puzzle Time',
        'image' => $theme_uri . '/images/game_1.jpg',
        'url'   => 'http://eggstime.com/upload/puzzles/index.html',
    ),
    array(
        'title' => 'Difference Time',
        'image' => $theme_uri . '/images/game_1.jpg',
        'url'   => 'http://eggstime.com/upload/diff/index.html',
    ),
    array(
        'title' => 'Maze Time',
        'image' => $theme_uri . '/images/game_2.jpg',
        'url'   => 'http://eggstime.com/upload/mazes/index.html',
    ),
);

$playmarket_url = 'https://play.google.com/store/apps/details?id=com.eggtime.colorings';
$appstore_url   = 'https://itunes.apple.com/us/app/eggs-time-coloring-books/id1263628877?mt=8';
?>
<section class="et-home__games-extra" aria-label="<?php esc_attr_e( 'Eggs Time Games', 'eggs-shop' ); ?>">
    <div class="et-home__games-extra-inside">
        <div class="center et-home__games-extra-inside-inner">
            <h2 class="et-home__games-extra-inside-title">
                Learn and Joy!<br>
                <span>Find the game inside the eggs!</span>
            </h2>
            <img
                src="<?php echo esc_url( $theme_uri . '/images/inside_image.jpg' ); ?>"
                alt=""
                class="et-home__games-extra-inside-img"
                loading="lazy"
                decoding="async"
            />
        </div>
    </div>

    <div class="et-home__games-extra-main">
        <div class="center et-home__games-extra-main-inner">
            <div class="et-home__games-extra-layout">
                <div class="et-home__games-extra-intro">
                    <h2 class="et-home__games-extra-title">
                        <a href="<?php echo esc_url( $games_url ); ?>">Eggs time Games</a>
                    </h2>
                    <p class="et-home__games-extra-subtitle">
                        Start exploring this fun and<br>educational world
                    </p>

                    <div class="et-home__games-extra-market">
                        <a
                            href="<?php echo esc_url( $playmarket_url ); ?>"
                            class="et-home__games-extra-market-link et-home__games-extra-market-link--play"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            <span class="screen-reader-text"><?php esc_html_e( 'Get it on Google Play', 'eggs-shop' ); ?></span>
                        </a>
                        <a
                            href="<?php echo esc_url( $appstore_url ); ?>"
                            class="et-home__games-extra-market-link et-home__games-extra-market-link--app"
                            target="_blank"
                            rel="noopener noreferrer"
                        >
                            <span class="screen-reader-text"><?php esc_html_e( 'Download on the App Store', 'eggs-shop' ); ?></span>
                        </a>
                    </div>

                    <div class="et-home__games-extra-ratings" aria-hidden="true">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>

                <div class="et-home__games-extra-slider-wrap">
                    <ul class="et-home__games-extra-slider">
                        <?php foreach ( $et_home_games_cards as $game ) : ?>
                            <li class="et-home__games-extra-slide">
                                <a href="<?php echo esc_url( $game['url'] ); ?>" target="_blank" rel="noopener noreferrer">
                                    <img
                                        src="<?php echo esc_url( $game['image'] ); ?>"
                                        alt="<?php echo esc_attr( $game['title'] ); ?>"
                                        loading="lazy"
                                        decoding="async"
                                    />
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
