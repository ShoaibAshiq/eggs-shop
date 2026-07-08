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
    <div class="et-license__hero-overlay" aria-hidden="true"></div>
    <div class="et-license__hero-inner center">
        <div class="et-license__hero-content">
            <h1 class="et-license__hero-title">
                <span class="et-license__hero-title-kicker">License</span>
                <span class="et-license__hero-title-brand">Eggs Time Brands</span>
            </h1>
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
    </div>
</section>
