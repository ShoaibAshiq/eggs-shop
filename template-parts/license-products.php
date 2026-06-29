<?php
/**
 * License page — Existing Products & Merchandise (cached WooCommerce query)
 */

/**
 * Fetch license showcase products (cached, no ORDER BY RAND).
 *
 * @return array|null Product rows or null to use static fallback.
 */
function et_license_get_showcase_products() {
    $cache_key = 'et_license_showcase_products_v2';
    $cached    = get_transient( $cache_key );

    if ( is_array( $cached ) ) {
        return $cached;
    }

    if ( ! function_exists( 'wc_get_products' ) ) {
        return null;
    }

    $query_args = array(
        'status'   => 'publish',
        'limit'    => 6,
        'orderby'  => 'date',
        'order'    => 'DESC',
        'return'   => 'objects',
        'paginate' => false,
    );

    // Rotate offset by day (fast) instead of ORDER BY RAND() which times out on large catalogs.
    $published = wp_count_posts( 'product' );
    $total     = isset( $published->publish ) ? (int) $published->publish : 0;

    if ( $total > 6 ) {
        $query_args['offset'] = ( (int) gmdate( 'z' ) ) % ( $total - 5 );
    }

    $wc_products = wc_get_products( $query_args );
    $products    = array();

    foreach ( $wc_products as $product ) {
        if ( ! $product || ! $product->is_visible() ) {
            continue;
        }

        $image_id  = $product->get_image_id();
        $image_url = $image_id
            ? wp_get_attachment_image_url( $image_id, 'medium' )
            : wc_placeholder_img_src( 'medium' );

        $description = wp_strip_all_tags( $product->get_short_description() );
        if ( $description === '' ) {
            $description = wp_trim_words( $product->get_name(), 8, '...' );
        } else {
            $description = wp_trim_words( $description, 14, '...' );
        }

        $products[] = array(
            'title'       => $product->get_name(),
            'description' => $description,
            'image'       => $image_url,
            'url'         => $product->get_permalink(),
        );

        if ( count( $products ) >= 6 ) {
            break;
        }
    }

    set_transient( $cache_key, $products, 6 * HOUR_IN_SECONDS );

    return $products;
}

$et_license_products = et_license_get_showcase_products();

/* Fallback if WooCommerce has no products */
if ( empty( $et_license_products ) ) {
    $et_license_products = array(
        array(
            'title'       => 'Character Caps',
            'description' => 'Fun and colorful caps featuring our characters.',
            'image'       => 'https://eggstime.com/wp-content/uploads/2017/12/banner3-min.jpg',
            'url'         => '',
        ),
        array(
            'title'       => 'Plush Toys',
            'description' => 'Soft, high-quality plush toys kids love to cuddle.',
            'image'       => 'https://eggstime.com/wp-content/uploads/2017/12/King-Eggs.png',
            'url'         => '',
        ),
        array(
            'title'       => 'Surprise Eggs',
            'description' => 'Exciting surprises, toys and tasty treats inside.',
            'image'       => 'https://eggstime.com/wp-content/uploads/2017/12/Magik-Eggs-3.png',
            'url'         => '',
        ),
        array(
            'title'       => 'Product Packaging',
            'description' => 'Attractive packaging designed for retail success.',
            'image'       => 'https://eggstime.com/wp-content/uploads/2017/12/Lucky-Eggs-2.png',
            'url'         => '',
        ),
        array(
            'title'       => 'Retail Displays',
            'description' => 'Eye-catching displays that drive sales.',
            'image'       => 'https://eggstime.com/wp-content/uploads/2017/12/Happy-Eggs-4.png',
            'url'         => '',
        ),
        array(
            'title'       => 'Digital Games & Content',
            'description' => 'Engaging games and digital experiences for kids.',
            'image'       => 'https://eggstime.com/wp-content/uploads/2017/12/Emojy-Eggs.png',
            'url'         => '',
        ),
    );
}
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
                        <?php if ( ! empty( $item['url'] ) ) : ?>
                            <a href="<?php echo esc_url( $item['url'] ); ?>" class="et-license__product-link">
                        <?php else : ?>
                            <div class="et-license__product-link">
                        <?php endif; ?>

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

                        <?php if ( ! empty( $item['url'] ) ) : ?>
                            </a>
                        <?php else : ?>
                            </div>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>
