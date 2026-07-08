<?php
/**
 * License page — hero / banner section
 */

$et_license_hero_characters = function_exists( 'et_get_license_hero_characters' )
    ? et_get_license_hero_characters()
    : array();
?>
<section class="et-license__hero" aria-label="License Eggs Time brands">
    <div class="et-license__hero-confetti" aria-hidden="true"></div>
    <div class="et-license__hero-overlay" aria-hidden="true"></div>
    <div class="et-license__hero-inner center">
        <div class="et-license__hero-layout">
            <div class="et-license__hero-content">
                <p class="et-license__hero-kicker">License</p>
                <h1 class="et-license__hero-title">Eggs Time Brands</h1>
                <p class="et-license__hero-text">
                    Partner with Eggs Time to bring our beloved characters, surprise eggs, toys, and educational products to more families around the world. Great brands. Happy kids. Strong business.
                </p>
                <a href="#et-license-contact" class="et-license__hero-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8l-6-6zm-1 2 5 5h-5V4zM8 13h8v2H8v-2zm0 4h5v2H8v-2z"/>
                    </svg>
                    Request Licensing Information
                </a>
            </div>

            <?php if ( ! empty( $et_license_hero_characters ) ) : ?>
                <div class="et-license__hero-visual" aria-hidden="true">
                    <ul class="et-license__hero-characters">
                        <?php foreach ( $et_license_hero_characters as $index => $character ) : ?>
                            <li class="et-license__hero-character et-license__hero-character--<?php echo esc_attr( (string) ( $index + 1 ) ); ?>">
                                <img
                                    src="<?php echo esc_url( $character['image'] ); ?>"
                                    alt="<?php echo esc_attr( $character['name'] ); ?>"
                                    class="et-license__hero-character-img"
                                    loading="eager"
                                    decoding="async"
                                />
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
