<?php
/**
 * Home v2 — Best Sellers brand cards
 */
$et_home_best_sellers = function_exists( 'et_get_home_best_seller_cards' )
    ? et_get_home_best_seller_cards()
    : array();
?>
<section class="et-home__best-sellers" id="et-home-best-sellers" aria-labelledby="et-home-best-sellers-title">
    <div class="et-home__section-inner center">
        <div class="et-home__best-sellers-head">
            <h2 class="et-home__best-sellers-title et-home__section-title--stars" id="et-home-best-sellers-title">
                <span class="et-home__section-star" aria-hidden="true">★</span>
                Best Sellers
                <span class="et-home__section-star" aria-hidden="true">★</span>
            </h2>
            <p class="et-home__best-sellers-lead">Shop the surprise egg products families love most.</p>
        </div>

        <div class="et-home__best-sellers-slider-wrap">
            <ul class="et-home__best-sellers-grid et-home__best-sellers-slider" data-et-carousel-mode="fixed">
            <?php foreach ( $et_home_best_sellers as $brand ) : ?>
                <li class="et-home__best-sellers-item">
                    <article
                        class="et-home__best-sellers-card"
                        style="--et-best-seller-panel: <?php echo esc_attr( $brand['panel'] ); ?>; --et-best-seller-accent: <?php echo esc_attr( $brand['accent'] ); ?>;"
                    >
                        <div class="et-home__best-sellers-media">
                            <div class="et-home__best-sellers-product">
                                <img
                                    src="<?php echo esc_url( $brand['product_image'] ); ?>"
                                    alt="<?php echo esc_attr( $brand['name'] . ' product packaging' ); ?>"
                                    class="et-home__best-sellers-product-img"
                                    loading="lazy"
                                    decoding="async"
                                />
                            </div>
                        </div>

                        <div class="et-home__best-sellers-body">
                            <h3 class="et-home__best-sellers-name"><?php echo esc_html( $brand['name'] ); ?></h3>
                            <a href="<?php echo esc_url( $brand['shop_url'] ); ?>" class="et-home__card-btn et-home__best-sellers-btn">
                                <span class="et-home__card-btn-label">Shop Now</span>
                                <span class="et-home__card-btn-icon" aria-hidden="true">
                                    <i class="fas fa-shopping-cart"></i>
                                </span>
                            </a>
                        </div>
                    </article>
                </li>
            <?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>
