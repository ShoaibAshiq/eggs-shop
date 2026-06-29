<?php
/**
 * Home v2 — Distributor & Retail Partnerships
 */

if ( ! function_exists( 'et_get_home_core_egg_brand_meta' ) ) {
    $et_home_characters_file = get_template_directory() . '/inc/home-characters.php';

    if ( file_exists( $et_home_characters_file ) ) {
        require_once $et_home_characters_file;
    }
}

$et_home_distributor_url  = home_url( '/contact-us/' );
$et_home_distributor_logo = get_template_directory_uri() . '/images/eggs_time_logo.png';
$et_home_distributor_brands = array();

if ( function_exists( 'et_get_home_core_egg_brand_keys' ) && function_exists( 'et_get_home_core_egg_brand_meta' ) ) {
    $brand_meta = et_get_home_core_egg_brand_meta();

    foreach ( et_get_home_core_egg_brand_keys() as $brand_key ) {
        if ( empty( $brand_meta[ $brand_key ]['product_image'] ) ) {
            continue;
        }

        $et_home_distributor_brands[] = array(
            'name'  => $brand_meta[ $brand_key ]['name'],
            'image' => $brand_meta[ $brand_key ]['product_image'],
        );
    }
}

if ( empty( $et_home_distributor_brands ) ) {
    $uploads_base = trailingslashit( home_url( '/wp-content/uploads' ) );

    $et_home_distributor_brands = array(
        array( 'name' => 'Happy Egg', 'image' => $uploads_base . '2022/05/04-2.png' ),
        array( 'name' => 'Lucky Egg', 'image' => $uploads_base . '2022/05/05.png' ),
        array( 'name' => 'King Egg', 'image' => $uploads_base . '2022/05/01.png' ),
        array( 'name' => 'Magik Egg', 'image' => $uploads_base . '2022/05/02.png' ),
        array( 'name' => 'Skazka Egg', 'image' => $uploads_base . '2022/05/03.png' ),
        array( 'name' => 'Emoji Egg', 'image' => $uploads_base . '2022/05/06-2.png' ),
    );
}
?>
<section class="et-home__distributor et-home__playful-section" id="et-home-distributor" aria-labelledby="et-home-distributor-title">
    <div class="et-home__distributor-bg" aria-hidden="true"></div>
    <div class="et-home__section-inner center">
        <div class="et-home__distributor-panel">
            <div class="et-home__distributor-content">
                <p class="et-home__section-kicker et-home__distributor-kicker">Partnership &amp; Retail</p>
                <h2 class="et-home__distributor-title" id="et-home-distributor-title">
                    <span class="et-home__distributor-title-line et-home__distributor-title-line--navy">Become an</span>
                    <span class="et-home__distributor-title-line et-home__distributor-title-line--blue">Eggs Time</span>
                    <span class="et-home__distributor-title-line et-home__distributor-title-line--green">Distributor</span>
                </h2>
                <p class="et-home__distributor-text">
                    Join our growing global network of distributors and retail partners. Eggs Time combines educational entertainment, surprise toys, and quality confectionery products loved by children and families worldwide.
                </p>
                <p class="et-home__distributor-note">
                    <span class="et-home__distributor-check" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 6L9 17l-5-5"/>
                        </svg>
                    </span>
                    Available for distribution worldwide.
                </p>
                <a href="<?php echo esc_url( $et_home_distributor_url ); ?>" class="et-home__distributor-btn">
                    Become a Distributor
                    <span class="et-home__distributor-btn-icon" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h12M13 7l5 5-5 5"/>
                        </svg>
                    </span>
                </a>
            </div>

            <div class="et-home__distributor-visual">
                <div class="et-home__distributor-showcase">
                    <div class="et-home__distributor-showcase-head">
                        <img
                            src="<?php echo esc_url( $et_home_distributor_logo ); ?>"
                            alt="<?php esc_attr_e( 'Eggs Time', 'eggs-shop' ); ?>"
                            class="et-home__distributor-showcase-logo"
                            loading="lazy"
                            decoding="async"
                        />
                    </div>

                    <p class="et-home__distributor-showcase-label">
                        <span class="et-home__distributor-showcase-line" aria-hidden="true"></span>
                        Our Egg Brands
                        <span class="et-home__distributor-showcase-line" aria-hidden="true"></span>
                    </p>

                    <ul class="et-home__distributor-showcase-grid">
                        <?php foreach ( $et_home_distributor_brands as $brand ) : ?>
                            <li class="et-home__distributor-showcase-item">
                                <img
                                    src="<?php echo esc_url( $brand['image'] ); ?>"
                                    alt="<?php echo esc_attr( $brand['name'] ); ?>"
                                    class="et-home__distributor-showcase-product"
                                    loading="lazy"
                                    decoding="async"
                                />
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
