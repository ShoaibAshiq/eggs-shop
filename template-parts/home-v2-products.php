<?php
/**
 * Home v2 — More Ways to Play & Learn
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

if ( ! function_exists( 'et_home_get_quality_products' ) ) {
    /**
     * Inline fallback so product cards always render on the server.
     *
     * @return array<int, array<string, string>>
     */
    function et_home_get_quality_products() {
        $panels = array( '#e3f5ea', '#fff8e6', '#e8f3fc', '#eaf8ef' );
        $items  = array();

        if ( function_exists( 'wc_get_products' ) ) {
            $wc_products = wc_get_products(
                array(
                    'status'   => 'publish',
                    'limit'    => 4,
                    'orderby'  => 'menu_order',
                    'order'    => 'ASC',
                    'return'   => 'objects',
                    'paginate' => false,
                )
            );

            if ( empty( $wc_products ) ) {
                $wc_products = wc_get_products(
                    array(
                        'status'   => 'publish',
                        'limit'    => 4,
                        'orderby'  => 'date',
                        'order'    => 'DESC',
                        'return'   => 'objects',
                        'paginate' => false,
                    )
                );
            }

            $color_index = 0;

            foreach ( (array) $wc_products as $product ) {
                if ( ! is_object( $product ) || ! method_exists( $product, 'is_visible' ) || ! $product->is_visible() ) {
                    continue;
                }

                $image_id  = $product->get_image_id();
                $image_url = $image_id
                    ? wp_get_attachment_image_url( $image_id, 'medium_large' )
                    : ( function_exists( 'wc_placeholder_img_src' ) ? wc_placeholder_img_src( 'medium_large' ) : '' );

                $items[] = array(
                    'title' => $product->get_name(),
                    'image' => $image_url ? $image_url : '',
                    'url'   => $product->get_permalink(),
                    'panel' => $panels[ $color_index % count( $panels ) ],
                );

                $color_index++;

                if ( count( $items ) >= 4 ) {
                    break;
                }
            }
        }

        if ( ! empty( $items ) ) {
            return $items;
        }

        return array(
            array(
                'title' => 'Clapping Hands',
                'image' => 'https://eggstime.com/wp-content/uploads/2022/05/05.png',
                'url'   => 'https://eggstime.com/products/',
                'panel' => '#e3f5ea',
                'icon'  => 'hand',
                'tone'  => 'green',
            ),
            array(
                'title' => 'Magik Toy / Grabber',
                'image' => 'https://eggstime.com/wp-content/uploads/2022/05/02.png',
                'url'   => 'https://eggstime.com/products/',
                'panel' => '#fff8e6',
                'icon'  => 'wand',
                'tone'  => 'yellow',
            ),
            array(
                'title' => 'Lucky Toy / Sound Animals',
                'image' => 'https://eggstime.com/wp-content/uploads/2022/05/01.png',
                'url'   => 'https://eggstime.com/products/big-king-egg/',
                'panel' => '#e8f3fc',
                'icon'  => 'music',
                'tone'  => 'blue',
            ),
            array(
                'title' => 'Skazka Puzzles',
                'image' => 'https://eggstime.com/wp-content/uploads/2022/05/03.png',
                'url'   => 'https://eggstime.com/products/',
                'panel' => '#eaf8ef',
                'icon'  => 'puzzle',
                'tone'  => 'green',
            ),
        );
    }
}

$et_home_quality_products = function_exists( 'et_home_get_design_showcase_fallback' )
    ? et_home_get_design_showcase_fallback()
    : et_home_get_quality_products();

if ( empty( $et_home_quality_products ) ) {
    $et_home_quality_products = function_exists( 'et_home_get_design_showcase_fallback' )
        ? et_home_get_design_showcase_fallback()
        : array(
            array(
                'title' => 'Clapping Hands',
                'image' => 'https://eggstime.com/wp-content/uploads/2022/05/05.png',
                'url'   => 'https://eggstime.com/products/',
                'panel' => '#e3f5ea',
                'icon'  => 'hand',
                'tone'  => 'green',
            ),
            array(
                'title' => 'Magik Toy / Grabber',
                'image' => 'https://eggstime.com/wp-content/uploads/2022/05/02.png',
                'url'   => 'https://eggstime.com/products/',
                'panel' => '#fff8e6',
                'icon'  => 'wand',
                'tone'  => 'yellow',
            ),
            array(
                'title' => 'Lucky Toy / Sound Animals',
                'image' => 'https://eggstime.com/wp-content/uploads/2022/05/01.png',
                'url'   => 'https://eggstime.com/products/big-king-egg/',
                'panel' => '#e8f3fc',
                'icon'  => 'music',
                'tone'  => 'blue',
            ),
            array(
                'title' => 'Skazka Puzzles',
                'image' => 'https://eggstime.com/wp-content/uploads/2022/05/03.png',
                'url'   => 'https://eggstime.com/products/',
                'panel' => '#eaf8ef',
                'icon'  => 'puzzle',
                'tone'  => 'green',
            ),
        );
}

$et_home_products_url = 'https://eggstime.com/products/';
?>
<section id="et-home-products" class="et-home__products" aria-labelledby="et-home-products-title">
    <div class="et-home__section-inner center">
        <div class="et-home__products-panel">
        <div class="et-home__products-head">
            <div class="et-home__products-intro">
                <div class="et-home__products-intro-mark" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" fill="none">
                        <rect x="10" y="26" width="16" height="12" rx="3" fill="#27ae60"/>
                        <rect x="14" y="16" width="16" height="12" rx="3" fill="#f39c12"/>
                        <rect x="18" y="6" width="16" height="12" rx="3" fill="#1a9fe0"/>
                    </svg>
                </div>
                <div class="et-home__products-intro-copy">
                    <div class="et-home__products-kicker-row">
                        <p class="et-home__section-kicker et-home__section-kicker--inline">Toys &amp; Creative Play</p>
                        <span class="et-home__products-new">New</span>
                    </div>
                    <h2 class="et-home__section-title" id="et-home-products-title">More Ways to Play &amp; Learn</h2>
                </div>
            </div>
            <a href="<?php echo esc_url( $et_home_products_url ); ?>" class="et-home__products-all">
                <span class="et-home__products-all-label">View All Products</span>
                <span class="et-home__products-all-icon" aria-hidden="true">
                    <i class="fas fa-chevron-right"></i>
                </span>
            </a>
        </div>

        <div class="et-home__products-slider-wrap">
            <ul class="et-home__products-grid et-home__products-slider">
            <?php foreach ( $et_home_quality_products as $item ) : ?>
                <li class="et-home__products-item">
                    <article
                        class="et-home__product-card"
                        style="--et-home-product-panel: <?php echo esc_attr( $item['panel'] ); ?>;"
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
                            <span class="et-home__product-icon et-home__product-icon--<?php echo esc_attr( ! empty( $item['tone'] ) ? $item['tone'] : 'green' ); ?>" aria-hidden="true">
                                <?php
                                $icon_name = ! empty( $item['icon'] ) ? $item['icon'] : 'hand';
                                echo et_home_icon( $icon_name ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                ?>
                            </span>
                            <div class="et-home__product-copy">
                                <h3 class="et-home__product-title">
                                    <a href="<?php echo esc_url( $item['url'] ); ?>"><?php echo esc_html( $item['title'] ); ?></a>
                                </h3>
                                <a href="<?php echo esc_url( $item['url'] ); ?>" class="et-home__product-link">
                                    Explore Now
                                    <span class="et-home__product-link-icon" aria-hidden="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h12M13 7l5 5-5 5"/>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </article>
                </li>
            <?php endforeach; ?>
            </ul>
        </div>
        </div>
    </div>
</section>
