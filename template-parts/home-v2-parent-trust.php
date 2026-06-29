<?php
/**
 * Home v2 — Trusted by Families Worldwide (certifications)
 */
$et_home_trust_certs = function_exists( 'et_get_home_trust_certifications' )
    ? et_get_home_trust_certifications()
    : array();
?>
<section class="et-home__parent-trust" id="et-home-parent-trust" aria-labelledby="et-home-parent-trust-title">
    <div class="et-home__section-inner center">
        <div class="et-home__parent-trust-intro">
            <p class="et-home__section-kicker">Certifications &amp; Safety Standards</p>
            <h2 class="et-home__section-title" id="et-home-parent-trust-title">Trusted by Families Worldwide</h2>
        </div>

        <?php if ( ! empty( $et_home_trust_certs ) ) : ?>
            <div class="et-home__parent-trust-certs">
                <div class="et-home__parent-trust-certs-slider-wrap">
                    <ul class="et-home__parent-trust-certs-grid et-home__parent-trust-certs-slider">
                    <?php foreach ( $et_home_trust_certs as $cert ) : ?>
                        <li class="et-home__parent-trust-cert-item">
                            <?php if ( ! empty( $cert['url'] ) ) : ?>
                                <a
                                    href="<?php echo esc_url( $cert['url'] ); ?>"
                                    class="et-home__parent-trust-cert"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >
                                    <img
                                        src="<?php echo esc_url( $cert['image'] ); ?>"
                                        alt="<?php echo esc_attr( $cert['alt'] ); ?>"
                                        class="et-home__parent-trust-cert-img"
                                        loading="lazy"
                                        decoding="async"
                                    />
                                </a>
                            <?php else : ?>
                                <div class="et-home__parent-trust-cert">
                                    <img
                                        src="<?php echo esc_url( $cert['image'] ); ?>"
                                        alt="<?php echo esc_attr( $cert['alt'] ); ?>"
                                        class="et-home__parent-trust-cert-img"
                                        loading="lazy"
                                        decoding="async"
                                    />
                                </div>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
