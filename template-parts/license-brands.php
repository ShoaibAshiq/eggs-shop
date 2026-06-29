<?php
/**
 * License page — Our Brands section
 */
$et_license_brands = function_exists( 'et_get_license_page_brands' )
    ? et_get_license_page_brands()
    : array();
?>
<section class="et-license__brands" aria-labelledby="et-license-brands-title">
    <div class="et-license__section-inner center">
        <h2 class="et-license__section-title" id="et-license-brands-title">
            <span class="et-license__section-title-icon" aria-hidden="true">&#10022;</span>
            Our Brands
            <span class="et-license__section-title-icon" aria-hidden="true">&#10022;</span>
        </h2>

        <div class="et-license__brands-slider-wrap">
            <ul class="et-license__brands-grid et-license__brands-slider">
            <?php foreach ( $et_license_brands as $brand ) : ?>
                <li class="et-license__brand-item">
                    <div class="et-license__brand-card">
                        <img
                            src="<?php echo esc_url( $brand['image'] ); ?>"
                            alt="<?php echo esc_attr( $brand['name'] ); ?>"
                            class="et-license__brand-logo"
                            loading="lazy"
                            decoding="async"
                        />
                    </div>
                </li>
            <?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>
