<?php
/**
 * License page — hero / banner section
 */

$et_license_hero_bg = 'https://eggstime.com/wp-content/uploads/2026/07/3c06db2a-7335-444b-906a-795bab105775.png';
?>
<section
    class="et-license__hero"
    aria-label="<?php esc_attr_e( 'License Eggs Time Brands', 'eggs-shop' ); ?>"
    style="--et-license-hero-bg: url('<?php echo esc_url( $et_license_hero_bg ); ?>');"
>
    <img
        class="et-license__hero-bg-image"
        src="<?php echo esc_url( $et_license_hero_bg ); ?>"
        alt=""
        loading="eager"
        decoding="async"
        aria-hidden="true"
    />
    <div class="et-license__hero-overlay" aria-hidden="true"></div>
    <div class="et-license__hero-inner center">
        <div class="et-license__hero-content">
            <p class="et-license__hero-badge">
                <span class="et-license__hero-badge-icon" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2l2.9 6.9 7.5.6-5.7 4.9 1.7 7.3L12 18.8 5.6 21.7l1.7-7.3L1.6 9.5l7.5-.6L12 2z"/>
                    </svg>
                </span>
                Partner with the Eggs Universe
            </p>
            <h1 class="et-license__hero-title">
                <span class="et-license__hero-title-kicker">License</span>
                <span class="et-license__hero-title-brand">Eggs Time Brands</span>
            </h1>
            <p class="et-license__hero-text">
                Partner with Eggs Time to bring our beloved characters, surprise eggs, toys, and educational products to more families around the world. Great brands. Happy kids. Strong business.
            </p>
            <a href="#et-license-contact" class="et-license__hero-btn">
                <span class="et-license__hero-btn-label">Request Licensing Information</span>
                <span class="et-license__hero-btn-icon" aria-hidden="true">
                    <svg class="et-license__hero-btn-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                        <path d="M8 5l8 7-8 7" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>
            </a>
        </div>
    </div>
</section>
