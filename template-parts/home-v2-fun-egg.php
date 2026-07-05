<?php
/**
 * Home v2 — Fun in Every Egg (games inside + app promo)
 */

if ( ! function_exists( 'et_get_home_core_egg_brand_meta' ) ) {
    require_once get_template_directory() . '/inc/home-characters.php';
}

if ( ! function_exists( 'et_home_icon' ) ) {
    require_once get_template_directory() . '/inc/home-icons.php';
}

$theme_uri    = get_template_directory_uri();
$brand_meta   = et_get_home_core_egg_brand_meta();
$games_url    = function_exists( 'get_permalink' ) ? get_permalink( 617 ) : home_url( '/games/' );

if ( empty( $games_url ) || '#' === $games_url ) {
    $games_url = home_url( '/games/' );
}

$king_character   = $brand_meta['king']['character_image'];
$happy_character  = $brand_meta['happy']['character_image'];
$magik_character  = $brand_meta['magik']['character_image'];

$et_home_fun_egg_activities = array(
    array(
        'label' => 'Maze Time',
        'icon'  => 'map',
        'tone'  => 'pink',
        'url'   => 'http://eggstime.com/upload/mazes/index.html',
    ),
    array(
        'label' => 'Coloring Time',
        'icon'  => 'pencil',
        'tone'  => 'orange',
        'url'   => 'http://eggstime.com/upload/index.html',
    ),
    array(
        'label' => 'Puzzle Time',
        'icon'  => 'star',
        'tone'  => 'green',
        'url'   => 'http://eggstime.com/upload/puzzles/index.html',
    ),
    array(
        'label' => 'Dot & Join the Dots',
        'icon'  => 'dots',
        'tone'  => 'purple',
        'url'   => 'http://eggstime.com/upload/index.html',
    ),
);

$et_home_fun_egg_previews = array(
    array(
        'label' => 'Maze Time',
        'image' => $theme_uri . '/images/fun-egg-maze-preview.png',
        'url'   => 'http://eggstime.com/upload/mazes/index.html',
    ),
    array(
        'label' => 'Dot to Dot',
        'image' => $theme_uri . '/images/fun-egg-dot-preview.png',
        'url'   => 'http://eggstime.com/upload/index.html',
    ),
);

$et_home_fun_egg_app_games = array(
    array(
        'label' => 'Maze Time',
        'image' => $theme_uri . '/images/fun-app-maze-thumb.png',
        'tone'  => 'blue',
        'url'   => 'http://eggstime.com/upload/mazes/index.html',
    ),
    array(
        'label' => 'Coloring Time',
        'image' => $theme_uri . '/images/fun-app-coloring-thumb.png',
        'tone'  => 'pink',
        'url'   => 'http://eggstime.com/upload/index.html',
    ),
    array(
        'label' => 'Puzzle Time',
        'image' => $theme_uri . '/images/fun-app-puzzle-thumb.png',
        'tone'  => 'green',
        'url'   => 'http://eggstime.com/upload/puzzles/index.html',
    ),
    array(
        'label' => 'Difference Time',
        'image' => $theme_uri . '/images/fun-app-memory-thumb.png',
        'tone'  => 'purple',
        'url'   => 'http://eggstime.com/upload/diff/index.html',
    ),
);

$playmarket_url = 'https://play.google.com/store/apps/details?id=com.eggtime.colorings';
$appstore_url   = 'https://itunes.apple.com/us/app/eggs-time-coloring-books/id1263628877?mt=8';
?>
<section class="et-home__fun-egg et-home__playful-section" id="et-home-fun-egg" aria-labelledby="et-home-fun-egg-title">
    <div class="et-home__fun-egg-bg" aria-hidden="true"></div>
    <div class="et-home__section-inner center">
        <header class="et-home__fun-egg-head">
            <p class="et-home__section-kicker et-home__section-kicker--stars et-home__fun-egg-kicker">
                <span class="et-home__section-star" aria-hidden="true">★</span>
                To Play, Learn &amp; Discover
                <span class="et-home__section-star" aria-hidden="true">★</span>
            </p>
            <h2 class="et-home__fun-egg-title" id="et-home-fun-egg-title">Fun in Every Egg!</h2>
            <p class="et-home__fun-egg-lead et-home__fun-egg-lead--hearts">
                <span class="et-home__fun-egg-heart" aria-hidden="true">♥</span>
                Games and fun activities make learning exciting — inside and outside the egg!
                <span class="et-home__fun-egg-heart" aria-hidden="true">♥</span>
            </p>
        </header>

        <div class="et-home__fun-egg-panel">
            <div class="et-home__fun-egg-panel-grid">
                <div class="et-home__fun-egg-games">
                    <div class="et-home__fun-egg-games-intro">
                        <span class="et-home__fun-egg-games-icon" aria-hidden="true">
                            <?php echo et_home_icon( 'file-play' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                        </span>
                        <div class="et-home__fun-egg-games-copy">
                            <h3 class="et-home__fun-egg-games-title">Games Inside Every Egg</h3>
                            <p class="et-home__fun-egg-games-desc">
                                <span class="et-home__fun-egg-colorful" aria-label="<?php esc_attr_e( 'Colorful', 'eggs-shop' ); ?>">
                                    <span class="et-home__fun-egg-colorful-char et-home__fun-egg-colorful-char--dark">C</span><span class="et-home__fun-egg-colorful-char et-home__fun-egg-colorful-char--orange">o</span><span class="et-home__fun-egg-colorful-char et-home__fun-egg-colorful-char--blue">l</span><span class="et-home__fun-egg-colorful-char et-home__fun-egg-colorful-char--green">o</span><span class="et-home__fun-egg-colorful-char et-home__fun-egg-colorful-char--red">r</span><span class="et-home__fun-egg-colorful-char et-home__fun-egg-colorful-char--blue">f</span><span class="et-home__fun-egg-colorful-char et-home__fun-egg-colorful-char--orange">u</span><span class="et-home__fun-egg-colorful-char et-home__fun-egg-colorful-char--green">l</span>
                                </span>
                                fun and games to fuel young minds every day!
                            </p>
                        </div>
                    </div>
                    <ul class="et-home__fun-egg-previews">
                        <?php foreach ( $et_home_fun_egg_previews as $preview ) : ?>
                            <li class="et-home__fun-egg-preview-item">
                                <a href="<?php echo esc_url( $preview['url'] ); ?>" class="et-home__fun-egg-preview" target="_blank" rel="noopener noreferrer">
                                    <span class="et-home__fun-egg-preview-media">
                                        <img
                                            src="<?php echo esc_url( $preview['image'] ); ?>"
                                            alt="<?php echo esc_attr( $preview['label'] ); ?>"
                                            loading="lazy"
                                            decoding="async"
                                        />
                                    </span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="et-home__fun-egg-hero" aria-hidden="true">
                    <img
                        src="<?php echo esc_url( $king_character ); ?>"
                        alt=""
                        class="et-home__fun-egg-hero-img"
                        loading="lazy"
                        decoding="async"
                    />
                </div>

                <div class="et-home__fun-egg-activities-col">
                    <ul class="et-home__fun-egg-activities">
                        <?php foreach ( $et_home_fun_egg_activities as $activity ) : ?>
                            <li class="et-home__fun-egg-activity-item">
                                <a href="<?php echo esc_url( $activity['url'] ); ?>" class="et-home__fun-egg-activity" target="_blank" rel="noopener noreferrer">
                                    <span class="et-home__fun-egg-activity-icon et-home__fun-egg-activity-icon--<?php echo esc_attr( $activity['tone'] ); ?>" aria-hidden="true">
                                        <?php echo et_home_icon( $activity['icon'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                    </span>
                                    <span class="et-home__fun-egg-activity-label"><?php echo esc_html( $activity['label'] ); ?></span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <a href="<?php echo esc_url( $games_url ); ?>" class="et-home__fun-egg-more">...and more!</a>
                </div>

                <div class="et-home__fun-egg-mascot" aria-hidden="true">
                    <img
                        src="<?php echo esc_url( $happy_character ); ?>"
                        alt=""
                        class="et-home__fun-egg-mascot-img"
                        loading="lazy"
                        decoding="async"
                    />
                </div>
            </div>
        </div>

        <div class="et-home__fun-egg-app">
            <div class="et-home__fun-egg-app-panel">
                <div class="et-home__fun-egg-app-stage">
                    <div class="et-home__fun-egg-app-left">
                        <div class="et-home__fun-egg-app-copy">
                            <div class="et-home__fun-egg-app-kicker">
                                <span class="et-home__fun-egg-app-kicker-icon" aria-hidden="true">
                                    <?php echo et_home_icon( 'mobile' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                </span>
                                <span class="et-home__fun-egg-app-kicker-text">
                                    <span class="et-home__fun-egg-app-kicker-line">Something Fun and New</span>
                                    <span class="et-home__fun-egg-app-kicker-line">The Eggz &amp; The App!</span>
                                </span>
                                <div class="et-home__fun-egg-app-text">
                                    <p class="et-home__fun-egg-app-text-line">
                                        <span class="et-home__fun-egg-app-heart" aria-hidden="true">
                                            <?php echo et_home_icon( 'heart' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                        </span>
                                        Play exciting games anytime,
                                    </p>
                                    <p class="et-home__fun-egg-app-text-line">
                                        <span class="et-home__fun-egg-app-heart" aria-hidden="true">
                                            <?php echo et_home_icon( 'heart' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                        </span>
                                        anywhere!
                                        <span class="et-home__fun-egg-app-heart" aria-hidden="true">
                                            <?php echo et_home_icon( 'heart' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <img
                            src="<?php echo esc_url( $magik_character ); ?>"
                            alt=""
                            class="et-home__fun-egg-app-character et-home__fun-egg-app-character--left"
                            loading="lazy"
                            decoding="async"
                        />
                    </div>

                    <ul class="et-home__fun-egg-app-games">
                        <?php foreach ( $et_home_fun_egg_app_games as $game ) : ?>
                            <li class="et-home__fun-egg-app-game-item">
                                <a href="<?php echo esc_url( $game['url'] ); ?>" class="et-home__fun-egg-app-game et-home__fun-egg-app-game--<?php echo esc_attr( $game['tone'] ); ?>" target="_blank" rel="noopener noreferrer">
                                    <span class="et-home__fun-egg-app-game-media">
                                        <img
                                            src="<?php echo esc_url( $game['image'] ); ?>"
                                            alt="<?php echo esc_attr( $game['label'] ); ?>"
                                            loading="lazy"
                                            decoding="async"
                                        />
                                    </span>
                                    <span class="et-home__fun-egg-app-game-label"><?php echo esc_html( $game['label'] ); ?></span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="et-home__fun-egg-app-stores">
                <a
                    href="<?php echo esc_url( $appstore_url ); ?>"
                    class="et-home__fun-egg-store-link et-home__fun-egg-store-link--app"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    <span class="screen-reader-text"><?php esc_html_e( 'Download on the App Store', 'eggs-shop' ); ?></span>
                </a>
                <a
                    href="<?php echo esc_url( $playmarket_url ); ?>"
                    class="et-home__fun-egg-store-link et-home__fun-egg-store-link--play"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    <span class="screen-reader-text"><?php esc_html_e( 'Get it on Google Play', 'eggs-shop' ); ?></span>
                </a>
            </div>
            </div>
        </div>
    </div>
</section>
