<?php
/**
 * License page — Pre-footer CTA banner
 */

$et_license_cta_characters = function_exists( 'et_get_license_cta_characters' )
    ? et_get_license_cta_characters()
    : array();

$et_license_cta_products = function_exists( 'et_get_license_cta_products' )
    ? et_get_license_cta_products()
    : array();
?>
<section class="et-license__cta" aria-labelledby="et-license-cta-title">
    <div class="et-license__cta-shine" aria-hidden="true"></div>
    <div class="et-license__cta-inner center">
        <div class="et-license__cta-layout">
            <div class="et-license__cta-content">
                <h2 class="et-license__cta-title" id="et-license-cta-title">
                    Ready to License <span class="et-license__cta-highlight">Eggs Time?</span>
                </h2>
                <p class="et-license__cta-text">
                    Contact our licensing team to discuss partnership opportunities and bring our beloved characters to families worldwide.
                </p>
                <a href="#et-license-contact" class="et-license__cta-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4-8 5-8-5V6l8 5 8-5v2z"/>
                    </svg>
                    Contact Licensing Team
                </a>
            </div>

            <div class="et-license__cta-visual">
                <div class="et-license__cta-visual-stage">
                    <?php if ( ! empty( $et_license_cta_products ) ) : ?>
                        <ul class="et-license__cta-products" aria-hidden="true">
                            <?php foreach ( $et_license_cta_products as $index => $product ) : ?>
                                <li class="et-license__cta-product et-license__cta-product--<?php echo esc_attr( (string) ( $index + 1 ) ); ?>">
                                    <img
                                        src="<?php echo esc_url( $product['image'] ); ?>"
                                        alt=""
                                        class="et-license__cta-product-img"
                                        loading="lazy"
                                        decoding="async"
                                    />
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <?php if ( ! empty( $et_license_cta_characters ) ) : ?>
                        <ul class="et-license__cta-characters">
                            <?php foreach ( $et_license_cta_characters as $index => $character ) : ?>
                                <li class="et-license__cta-character et-license__cta-character--<?php echo esc_attr( (string) ( $index + 1 ) ); ?>">
                                    <img
                                        src="<?php echo esc_url( $character['image'] ); ?>"
                                        alt="<?php echo esc_attr( $character['name'] ); ?>"
                                        class="et-license__cta-character-img"
                                        loading="lazy"
                                        decoding="async"
                                    />
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
