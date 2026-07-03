<?php
/**
 * Home v2 — Why Parents Love Eggs Time + certifications
 */
$et_home_parent_benefits = function_exists( 'et_get_home_parent_benefits' )
    ? et_get_home_parent_benefits()
    : array();

$et_home_trust_certs = function_exists( 'et_get_home_trust_certifications' )
    ? et_get_home_trust_certifications()
    : array();
?>
<section class="et-home__parent-benefits et-home__playful-section" id="et-home-parent-benefits" aria-labelledby="et-home-parent-benefits-title">
    <div class="et-home__parent-benefits-bg" aria-hidden="true"></div>
    <div class="et-home__section-inner center">
        <div class="et-home__parent-benefits-intro">
            <p class="et-home__section-kicker et-home__section-kicker--stars">
                <span class="et-home__section-star" aria-hidden="true">★</span>
                Built for Families
                <span class="et-home__section-star" aria-hidden="true">★</span>
            </p>
            <h2 class="et-home__section-title" id="et-home-parent-benefits-title">Why Parents Love Eggs Time</h2>
            <p class="et-home__parent-benefits-trust-line et-home__parent-benefits-trust-line--hearts">
                <span class="et-home__parent-benefits-heart" aria-hidden="true">♥</span>
                Trusted by Families Worldwide
                <span class="et-home__parent-benefits-heart" aria-hidden="true">♥</span>
            </p>
        </div>

        <ul class="et-home__parent-benefits-grid">
            <?php foreach ( $et_home_parent_benefits as $benefit ) : ?>
                <li class="et-home__parent-benefits-item">
                    <article class="et-home__parent-benefits-card">
                        <span class="et-home__parent-benefits-icon et-home__parent-benefits-icon--<?php echo esc_attr( $benefit['tone'] ); ?>" aria-hidden="true">
                            <?php echo et_home_icon( $benefit['icon'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                        </span>
                        <div class="et-home__parent-benefits-text">
                            <h3 class="et-home__parent-benefits-title"><?php echo esc_html( $benefit['title'] ); ?></h3>
                            <p class="et-home__parent-benefits-desc"><?php echo esc_html( $benefit['text'] ); ?></p>
                        </div>
                    </article>
                </li>
            <?php endforeach; ?>
        </ul>

        <?php if ( ! empty( $et_home_trust_certs ) ) : ?>
            <div class="et-home__parent-benefits-certs" id="et-home-parent-trust" aria-labelledby="et-home-parent-trust-title">
                <div class="et-home__parent-benefits-certs-heading">
                    <span class="et-home__parent-benefits-certs-heading-side" aria-hidden="true">
                        <span class="et-home__parent-benefits-certs-heading-line"></span>
                        <span class="et-home__parent-benefits-certs-heading-dot"></span>
                    </span>
                    <h3 class="et-home__parent-benefits-certs-heading-text" id="et-home-parent-trust-title">Trusted by Families Worldwide</h3>
                    <span class="et-home__parent-benefits-certs-heading-side et-home__parent-benefits-certs-heading-side--right" aria-hidden="true">
                        <span class="et-home__parent-benefits-certs-heading-dot"></span>
                        <span class="et-home__parent-benefits-certs-heading-line"></span>
                    </span>
                </div>

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
            </div>
        <?php endif; ?>
    </div>
</section>
