<?php
/**
 * Home v2 — Collect, Play & Learn
 */

if ( ! function_exists( 'et_home_get_quality_products' ) ) {
    $et_home_products_file = get_template_directory() . '/inc/home-products.php';
    $et_home_icons_file    = get_template_directory() . '/inc/home-icons.php';

    if ( file_exists( $et_home_icons_file ) ) {
        require_once $et_home_icons_file;
    }

    if ( file_exists( $et_home_products_file ) ) {
        require_once $et_home_products_file;
    }
}

$et_home_quality_products = function_exists( 'et_home_get_quality_products' )
    ? et_home_get_quality_products()
    : array();

$et_home_products_url = home_url( '/product-category/toys/' );
?>
<section id="et-home-products" class="et-home__products et-home__products--showcase" aria-labelledby="et-home-products-title">
    <div class="et-home__products-sky" aria-hidden="true">
        <span class="et-home__products-cloud"></span>
        <span class="et-home__products-star et-home__products-star--1">★</span>
        <span class="et-home__products-star et-home__products-star--2">★</span>
        <span class="et-home__products-star et-home__products-star--3">★</span>
        <span class="et-home__products-star et-home__products-star--4">★</span>
        <span class="et-home__products-star et-home__products-star--5">★</span>
        <span class="et-home__products-star et-home__products-star--6">★</span>
    </div>

    <div class="et-home__section-inner center">
        <div class="et-home__products-panel">
            <header class="et-home__products-head">
                <div class="et-home__products-head-bar">
                    <div class="et-home__products-kicker-row">
                        <span class="et-home__products-kicker-pill">Toys &amp; Creative Play</span>
                        <span class="et-home__products-new">New</span>
                    </div>
                    <a href="<?php echo esc_url( $et_home_products_url ); ?>" class="et-home__products-all">
                        <span class="et-home__products-all-label">Explore All</span>
                        <span class="et-home__products-all-icon" aria-hidden="true">
                            <i class="fas fa-chevron-right"></i>
                        </span>
                    </a>
                </div>

                <h2 class="et-home__products-title" id="et-home-products-title">
                    Collect, <span class="et-home__products-title-accent">Play &amp; Learn</span>
                </h2>

                <p class="et-home__products-lead">
                    <span class="et-home__products-lead-heart" aria-hidden="true">♥</span>
                    Discover toys, puzzles, games, and collectibles from every Eggs Time world.
                    <span class="et-home__products-lead-heart" aria-hidden="true">♥</span>
                </p>
            </header>

            <div class="et-home__products-carousel">
                <div class="et-home__products-slider-wrap">
                    <ul class="et-home__products-grid et-home__products-slider">
                    <?php foreach ( $et_home_quality_products as $item ) : ?>
                        <?php
                        $item_tone   = ! empty( $item['tone'] ) ? $item['tone'] : 'green';
                        $item_accent = ! empty( $item['accent'] ) ? $item['accent'] : '#27ae60';
                        ?>
                        <li class="et-home__products-item">
                            <article
                                class="et-home__product-card et-home__product-card--<?php echo esc_attr( $item_tone ); ?>"
                                style="--et-home-product-panel: <?php echo esc_attr( $item['panel'] ); ?>; --et-card-accent: <?php echo esc_attr( $item_accent ); ?>;"
                            >
                                <a href="<?php echo esc_url( $item['url'] ); ?>" class="et-home__product-media">
                                    <img
                                        src="<?php echo esc_url( $item['image'] ); ?>"
                                        alt="<?php echo esc_attr( $item['title'] ); ?>"
                                        class="et-home__product-image"
                                        loading="lazy"
                                        decoding="async"
                                    />
                                </a>
                                <div class="et-home__product-body">
                                    <div class="et-home__product-heading">
                                        <span class="et-home__product-icon et-home__product-icon--<?php echo esc_attr( $item_tone ); ?>" aria-hidden="true">
                                            <?php if ( ! empty( $item['icon'] ) ) : ?>
                                                <?php echo et_home_icon( $item['icon'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                            <?php elseif ( ! empty( $item['emoji'] ) ) : ?>
                                                <span class="et-home__product-icon-emoji"><?php echo esc_html( $item['emoji'] ); ?></span>
                                            <?php else : ?>
                                                <?php echo et_home_icon( 'puzzle' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                            <?php endif; ?>
                                        </span>
                                        <div class="et-home__product-copy">
                                            <h3 class="et-home__product-title"><?php echo esc_html( $item['title'] ); ?></h3>
                                            <?php if ( ! empty( $item['description'] ) ) : ?>
                                                <p class="et-home__product-desc"><?php echo esc_html( $item['description'] ); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <a href="<?php echo esc_url( $item['url'] ); ?>" class="et-home__product-btn et-home__card-btn">
                                        <span class="et-home__product-btn-label et-home__card-btn-label">Explore Collection</span>
                                        <span class="et-home__product-btn-icon et-home__card-btn-icon" aria-hidden="true">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                                                <path d="M9 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            </article>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                </div>
                <div class="et-home__products-dots" aria-hidden="true"></div>
            </div>
        </div>
    </div>

    <div class="et-home__products-grass" aria-hidden="true">
        <span class="et-home__products-flower et-home__products-flower--1"></span>
        <span class="et-home__products-flower et-home__products-flower--2"></span>
        <span class="et-home__products-flower et-home__products-flower--3"></span>
        <span class="et-home__products-flower et-home__products-flower--4"></span>
        <span class="et-home__products-flower et-home__products-flower--5"></span>
    </div>
</section>
