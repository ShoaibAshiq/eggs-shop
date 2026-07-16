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

if ( ! function_exists( 'et_home_get_fun_egg_app_games' ) ) {
    require_once get_template_directory() . '/inc/home-games.php';
}

$theme_uri                   = get_template_directory_uri();
$brand_meta                  = et_get_home_core_egg_brand_meta();
$games_url                   = function_exists( 'get_permalink' ) ? get_permalink( 617 ) : home_url( '/games/' );
$et_home_fun_egg_section_icon = et_home_get_fun_egg_section_icon( $theme_uri );
$et_home_fun_egg_previews    = et_home_get_fun_egg_previews( $theme_uri );
$et_home_fun_egg_activities  = et_home_get_fun_egg_activities( $games_url, $theme_uri );
$et_home_fun_egg_app_games   = et_home_get_fun_egg_app_games( $theme_uri );
$et_home_game_store_badges   = et_home_get_game_app_store_badges( $theme_uri );
$et_home_game_rating_badges  = et_home_get_game_rating_badge_images( $theme_uri );

if ( empty( $games_url ) || '#' === $games_url ) {
    $games_url = home_url( '/games/' );
}

$king_character  = $brand_meta['king']['character_image'];
$happy_character = $brand_meta['happy']['character_image'];
$magik_character = $brand_meta['magik']['character_image'];
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
                            <img
                                src="<?php echo esc_url( $et_home_fun_egg_section_icon ); ?>"
                                alt=""
                                loading="lazy"
                                decoding="async"
                            />
                        </span>
                        <div class="et-home__fun-egg-games-copy">
                            <h3 class="et-home__fun-egg-games-title">Games Inside Every Egg</h3>
                            <p class="et-home__fun-egg-games-subtitle">Educational activities designed to inspire creativity, problem-solving, and learning through play.</p>
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
                                    <span class="et-home__fun-egg-activity-icon" aria-hidden="true">
                                        <img
                                            src="<?php echo esc_url( $activity['icon'] ); ?>"
                                            alt=""
                                            loading="lazy"
                                            decoding="async"
                                        />
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
                                    <span class="et-home__fun-egg-app-kicker-line">Continue Learning with the</span>
                                    <span class="et-home__fun-egg-app-kicker-line">Eggs Time App</span>
                                </span>
                                <div class="et-home__fun-egg-app-text">
                                    <p class="et-home__fun-egg-app-text-line">
                                        <span class="et-home__fun-egg-app-heart" aria-hidden="true">
                                            <?php echo et_home_icon( 'heart' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                        </span>
                                        Play exciting educational games inspired
                                    </p>
                                    <p class="et-home__fun-egg-app-text-line">
                                        by your favorite egg characters anytime,
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

                    <div class="et-home__fun-egg-app-games-slider-wrap">
                        <ul class="et-home__fun-egg-app-games et-home__fun-egg-app-games-slider">
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
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <div class="et-home__fun-egg-app-stores">
                    <a
                        href="<?php echo esc_url( $et_home_game_store_badges['app']['url'] ); ?>"
                        class="et-home__fun-egg-store-link et-home__fun-egg-store-link--app"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        <img
                            src="<?php echo esc_url( $et_home_game_store_badges['app']['image'] ); ?>"
                            alt="<?php echo esc_attr( $et_home_game_store_badges['app']['label'] ); ?>"
                            loading="lazy"
                            decoding="async"
                        />
                    </a>
                    <a
                        href="<?php echo esc_url( $et_home_game_store_badges['play']['url'] ); ?>"
                        class="et-home__fun-egg-store-link et-home__fun-egg-store-link--play"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        <img
                            src="<?php echo esc_url( $et_home_game_store_badges['play']['image'] ); ?>"
                            alt="<?php echo esc_attr( $et_home_game_store_badges['play']['label'] ); ?>"
                            loading="lazy"
                            decoding="async"
                        />
                    </a>
                </div>

                <div class="et-home__fun-egg-ratings" aria-hidden="true">
                    <?php foreach ( $et_home_game_rating_badges as $badge_image ) : ?>
                        <span class="et-home__fun-egg-ratings-badge">
                            <img
                                src="<?php echo esc_url( $badge_image ); ?>"
                                alt=""
                                loading="lazy"
                                decoding="async"
                            />
                        </span>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
