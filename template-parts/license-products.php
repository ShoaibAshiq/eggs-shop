<?php
/**
 * License page — Existing Products & Merchandise
 */

$et_license_products = function_exists( 'et_get_license_products' )
    ? et_get_license_products()
    : array();
?>
<section class="et-license__products" aria-labelledby="et-license-products-title">
    <div class="et-license__section-inner center">
        <h2 class="et-license__section-title" id="et-license-products-title">
            <span class="et-license__section-title-icon" aria-hidden="true">&#10022;</span>
            Existing Products &amp; Merchandise
            <span class="et-license__section-title-icon" aria-hidden="true">&#10022;</span>
        </h2>

        <div class="et-license__products-panel">
            <div class="et-license__products-slider-wrap">
                <ul class="et-license__products-grid et-license__products-slider">
                <?php foreach ( $et_license_products as $item ) : ?>
                    <li class="et-license__product-item">
                        <div class="et-license__product-card">
                            <div class="et-license__product-image-wrap">
                                <img
                                    src="<?php echo esc_url( $item['image'] ); ?>"
                                    alt="<?php echo esc_attr( $item['title'] ); ?>"
                                    class="et-license__product-image"
                                    loading="lazy"
                                    decoding="async"
                                />
                            </div>
                            <div class="et-license__product-meta">
                                <h3 class="et-license__product-title"><?php echo esc_html( $item['title'] ); ?></h3>
                                <?php if ( ! empty( $item['description'] ) ) : ?>
                                    <p class="et-license__product-desc"><?php echo esc_html( $item['description'] ); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>
