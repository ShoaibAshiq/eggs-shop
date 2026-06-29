<?php
/**
 * Home v2 — Why Parents Love Eggs Time
 */
$et_home_parent_benefits = function_exists( 'et_get_home_parent_benefits' )
    ? et_get_home_parent_benefits()
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
    </div>
</section>
