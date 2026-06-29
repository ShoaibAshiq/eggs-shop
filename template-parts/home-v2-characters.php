<?php
/**
 * Home v2 — Choose Your Egg World (character carousel)
 */

if ( ! function_exists( 'et_home_get_carousel_characters' ) ) {
    $et_home_characters_file = get_template_directory() . '/inc/home-characters.php';

    if ( file_exists( $et_home_characters_file ) ) {
        require_once $et_home_characters_file;
    }
}

$et_home_characters = function_exists( 'et_home_get_carousel_characters' )
    ? et_home_get_carousel_characters()
    : array();

if ( empty( $et_home_characters ) && function_exists( 'et_home_get_characters' ) ) {
    $et_home_characters = et_home_get_characters();
}

if ( empty( $et_home_characters ) ) {
    $et_home_carousel_image = function_exists( 'et_get_home_carousel_character_image' )
        ? et_get_home_carousel_character_image()
        : 'https://eggstime.com/wp-content/uploads/2026/06/85d0a881-1271-4fc2-882a-a2d6e4339729-removebg-preview.png';

    $et_home_characters = array(
        array(
            'name'    => 'Happy Egg',
            'image'   => $et_home_carousel_image,
            'tagline' => 'Sunny surprises full of joy and laughter.',
            'url'     => home_url( '/products/happy-egg-surprises-gummies-vitamin-c-toy/' ),
            'panel'   => '#fff0f6',
            'accent'  => '#e91e8c',
        ),
        array(
            'name'    => 'Lucky Egg',
            'image'   => $et_home_carousel_image,
            'tagline' => 'Lucky finds and playful discoveries await.',
            'url'     => home_url( '/products/lucky-egg-surprises-multivitamin-gummies-toy/' ),
            'panel'   => '#fff8e6',
            'accent'  => '#f39c12',
        ),
        array(
            'name'    => 'King Egg',
            'image'   => $et_home_carousel_image,
            'tagline' => 'Royal adventures with wisdom and courage.',
            'url'     => home_url( '/products/big-king-egg/' ),
            'panel'   => '#e8f3fc',
            'accent'  => '#1a9fe0',
        ),
        array(
            'name'    => 'Magik Egg',
            'image'   => $et_home_carousel_image,
            'tagline' => 'Magical worlds of wonder and imagination.',
            'url'     => home_url( '/products/giant-magik-egg/' ),
            'panel'   => '#f3eef9',
            'accent'  => '#8e44ad',
        ),
        array(
            'name'    => 'Skazka Egg',
            'image'   => $et_home_carousel_image,
            'tagline' => 'Fairytale stories that spark creativity.',
            'url'     => home_url( '/products/skazka-egg/' ),
            'panel'   => '#eaf8ef',
            'accent'  => '#27ae60',
        ),
        array(
            'name'    => 'Emoji Egg',
            'image'   => $et_home_carousel_image,
            'tagline' => 'Expressive fun with playful emoji friends.',
            'url'     => home_url( '/products/emoji-egg/' ),
            'panel'   => '#fff0f6',
            'accent'  => '#e91e8c',
        ),
    );
}
?>
<section id="et-home-characters" class="et-home__characters" aria-labelledby="et-home-characters-title">
    <div class="et-home__section-inner center">
        <div class="et-home__characters-intro">
            <h2 class="et-home__section-title et-home__section-title--stars" id="et-home-characters-title">
                <span class="et-home__section-star" aria-hidden="true">★</span>
                Choose Your Egg World
                <span class="et-home__section-star" aria-hidden="true">★</span>
            </h2>
            <p class="et-home__characters-lead">Meet each egg world&rsquo;s personality and story.</p>
        </div>

        <div class="et-home__characters-slider-wrap">
            <ul class="et-home__characters-slider">
                <?php foreach ( $et_home_characters as $item ) : ?>
                    <li class="et-home__character-item">
                        <article
                            class="et-home__character-card"
                            style="--et-character-panel: <?php echo esc_attr( $item['panel'] ); ?>; --et-character-accent: <?php echo esc_attr( $item['accent'] ); ?>;"
                        >
                            <div class="et-home__character-media">
                                <img
                                    src="<?php echo esc_url( $item['image'] ); ?>"
                                    alt="<?php echo esc_attr( $item['name'] ); ?>"
                                    class="et-home__character-image"
                                    loading="lazy"
                                    decoding="async"
                                />
                            </div>

                            <div class="et-home__character-body">
                                <h3 class="et-home__character-name"><?php echo esc_html( $item['name'] ); ?></h3>
                                <a href="<?php echo esc_url( $item['url'] ); ?>" class="et-home__card-btn et-home__character-btn">
                                    <span class="et-home__card-btn-label">Learn More</span>
                                    <span class="et-home__card-btn-icon" aria-hidden="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h12M13 7l5 5-5 5"/>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </article>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>
