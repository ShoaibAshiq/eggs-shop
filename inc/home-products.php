<?php
/**
 * Home v2 — Toys & Creative Play showcase products.
 */

if ( ! function_exists( 'et_get_home_toy_showcase_slug_groups' ) ) {
    /**
     * Canonical toy product slugs in brand order (happy → lucky → king → magik).
     *
     * @return array<int, string[]>
     */
    function et_get_home_toy_showcase_slug_groups() {
        return array(
            array( 'happy-dress-up-toys', 'happy-toys', 'happy-dress-the-eggs' ),
            array( 'lucky-toys', 'lucky-toy' ),
            array( 'king-toy', 'big-king-egg' ),
            array( 'magik-toys', 'giant-magik-egg', 'magic-eggs' ),
        );
    }
}

if ( ! function_exists( 'et_home_get_product_by_slug' ) ) {
    /**
     * @param string $slug Product slug.
     * @return WC_Product|null
     */
    function et_home_get_product_by_slug( $slug ) {
        if ( ! function_exists( 'wc_get_product' ) || ! $slug ) {
            return null;
        }

        $posts = get_posts(
            array(
                'name'           => $slug,
                'post_type'      => 'product',
                'post_status'    => 'publish',
                'posts_per_page' => 1,
                'fields'         => 'ids',
                'no_found_rows'  => true,
            )
        );

        if ( empty( $posts[0] ) ) {
            return null;
        }

        $product = wc_get_product( (int) $posts[0] );

        return ( $product && $product->is_visible() ) ? $product : null;
    }
}

if ( ! function_exists( 'et_home_format_showcase_product' ) ) {
    /**
     * @param WC_Product $product   WooCommerce product.
     * @param string     $panel     Card panel color.
     * @return array<string, string>
     */
    function et_home_format_showcase_product( $product, $panel, $index = 0 ) {
        if ( ! function_exists( 'et_home_get_showcase_icon_meta' ) ) {
            require_once get_template_directory() . '/inc/home-icons.php';
        }

        $image_id  = $product->get_image_id();
        $image_url = $image_id
            ? wp_get_attachment_image_url( $image_id, 'medium_large' )
            : wc_placeholder_img_src( 'medium_large' );

        if ( ! $image_url && function_exists( 'wc_placeholder_img_src' ) ) {
            $image_url = wc_placeholder_img_src( 'medium_large' );
        }

        $icon_meta = et_home_get_showcase_icon_meta( (int) $index );

        return array(
            'title' => $product->get_name(),
            'image' => $image_url ? $image_url : '',
            'url'   => $product->get_permalink(),
            'panel' => $panel,
            'icon'  => $icon_meta['icon'],
            'tone'  => $icon_meta['tone'],
        );
    }
}

if ( ! function_exists( 'et_home_get_wc_product_pool' ) ) {
    /**
     * Load a pool of published products for the home toys row.
     *
     * @return WC_Product[]
     */
    function et_home_get_wc_product_pool() {
        if ( ! function_exists( 'wc_get_products' ) ) {
            return array();
        }

        $queries = array(
            array(
                'status'   => 'publish',
                'limit'    => 24,
                'category' => array( 'toys' ),
                'orderby'  => 'menu_order',
                'order'    => 'ASC',
                'return'   => 'objects',
            ),
            array(
                'status'   => 'publish',
                'limit'    => 24,
                'orderby'  => 'menu_order',
                'order'    => 'ASC',
                'return'   => 'objects',
            ),
            array(
                'status'   => 'publish',
                'limit'    => 24,
                'orderby'  => 'date',
                'order'    => 'DESC',
                'return'   => 'objects',
            ),
        );

        foreach ( $queries as $args ) {
            $products = wc_get_products( $args );

            if ( ! empty( $products ) ) {
                return array_values(
                    array_filter(
                        $products,
                        static function ( $product ) {
                            return $product && $product->is_visible();
                        }
                    )
                );
            }
        }

        return array();
    }
}

if ( ! function_exists( 'et_home_build_showcase_from_pool' ) ) {
    /**
     * Pick four products in brand order from a WooCommerce pool.
     *
     * @param WC_Product[] $pool WooCommerce products.
     * @return array<int, array<string, string>>
     */
    function et_home_build_showcase_from_pool( $pool ) {
        if ( ! function_exists( 'et_get_home_core_egg_brand_keys' ) ) {
            require_once get_template_directory() . '/inc/home-characters.php';
        }

        $brand_keys  = array_slice( et_get_home_core_egg_brand_keys(), 0, 4 );
        $brand_meta  = et_get_home_core_egg_brand_meta();
        $slug_groups = et_get_home_toy_showcase_slug_groups();
        $by_slug     = array();
        $products    = array();
        $used_ids    = array();

        foreach ( $pool as $product ) {
            if ( ! is_object( $product ) || ! method_exists( $product, 'get_slug' ) ) {
                continue;
            }

            $by_slug[ $product->get_slug() ] = $product;
        }

        foreach ( $slug_groups as $index => $slug_candidates ) {
            $match = null;

            foreach ( $slug_candidates as $slug ) {
                if ( isset( $by_slug[ $slug ] ) ) {
                    $match = $by_slug[ $slug ];
                    break;
                }

                $match = et_home_get_product_by_slug( $slug );

                if ( $match ) {
                    break;
                }
            }

            if ( ! $match ) {
                continue;
            }

            $used_ids[] = $match->get_id();
            $brand_key  = isset( $brand_keys[ $index ] ) ? $brand_keys[ $index ] : 'happy';
            $panel      = isset( $brand_meta[ $brand_key ]['panel'] ) ? $brand_meta[ $brand_key ]['panel'] : '#eef7fb';

            $products[] = et_home_format_showcase_product( $match, $panel, count( $products ) );
        }

        foreach ( $pool as $product ) {
            if ( count( $products ) >= 4 ) {
                break;
            }

            if ( in_array( $product->get_id(), $used_ids, true ) ) {
                continue;
            }

            $used_ids[] = $product->get_id();
            $index      = count( $products );
            $brand_key  = isset( $brand_keys[ $index ] ) ? $brand_keys[ $index ] : 'happy';
            $panel      = isset( $brand_meta[ $brand_key ]['panel'] ) ? $brand_meta[ $brand_key ]['panel'] : '#eef7fb';

            $products[] = et_home_format_showcase_product( $product, $panel, $index );
        }

        return $products;
    }
}

if ( ! function_exists( 'et_home_get_design_showcase_fallback' ) ) {
    /**
     * Curated toy cards matching the approved homepage design.
     *
     * @return array<int, array<string, string>>
     */
    function et_home_get_design_showcase_fallback() {
        return array(
            array(
                'title' => 'Clapping Hands',
                'image' => 'https://eggstime.com/wp-content/uploads/2022/05/05.png',
                'url'   => home_url( '/products/' ),
                'panel' => '#e3f5ea',
                'icon'  => 'hand',
                'tone'  => 'green',
            ),
            array(
                'title' => 'Magik Toy / Grabber',
                'image' => 'https://eggstime.com/wp-content/uploads/2022/05/02.png',
                'url'   => home_url( '/products/' ),
                'panel' => '#fff8e6',
                'icon'  => 'wand',
                'tone'  => 'yellow',
            ),
            array(
                'title' => 'Lucky Toy / Sound Animals',
                'image' => 'https://eggstime.com/wp-content/uploads/2022/05/01.png',
                'url'   => home_url( '/products/big-king-egg/' ),
                'panel' => '#e8f3fc',
                'icon'  => 'music',
                'tone'  => 'blue',
            ),
            array(
                'title' => 'Skazka Puzzles',
                'image' => 'https://eggstime.com/wp-content/uploads/2022/05/03.png',
                'url'   => home_url( '/products/' ),
                'panel' => '#eaf8ef',
                'icon'  => 'puzzle',
                'tone'  => 'green',
            ),
        );
    }
}

if ( ! function_exists( 'et_home_get_showcase_brand_fallback' ) ) {
    /**
     * @return array<int, array<string, string>>
     */
    function et_home_get_showcase_brand_fallback() {
        if ( ! function_exists( 'et_get_home_core_egg_brand_keys' ) ) {
            require_once get_template_directory() . '/inc/home-characters.php';
        }

        $brand_keys      = array_slice( et_get_home_core_egg_brand_keys(), 0, 4 );
        $brand_meta      = et_get_home_core_egg_brand_meta();
        $fallback_panels = array( '#e3f5ea', '#fff8e6', '#e8f3fc', '#eaf8ef' );
        $products        = array();

        foreach ( $brand_keys as $index => $key ) {
            if ( ! isset( $brand_meta[ $key ] ) ) {
                continue;
            }

            if ( ! function_exists( 'et_home_get_showcase_icon_meta' ) ) {
                require_once get_template_directory() . '/inc/home-icons.php';
            }

            $brand     = $brand_meta[ $key ];
            $icon_meta = et_home_get_showcase_icon_meta( $index );

            $products[] = array(
                'title' => $brand['name'],
                'image' => $brand['product_image'],
                'url'   => $brand['shop_url'],
                'panel' => isset( $fallback_panels[ $index ] ) ? $fallback_panels[ $index ] : $brand['panel'],
                'icon'  => $icon_meta['icon'],
                'tone'  => $icon_meta['tone'],
            );
        }

        return $products;
    }
}

if ( ! function_exists( 'et_home_get_quality_products' ) ) {
    /**
     * Fetch four toy showcase products in canonical brand order (cached).
     *
     * @return array<int, array<string, string>>
     */
    function et_home_get_quality_products() {
        $cache_key = 'et_home_quality_products_v6';
        $cached    = get_transient( $cache_key );

        if ( is_array( $cached ) && ! empty( $cached ) ) {
            return $cached;
        }

        $products = array();

        try {
            $products = et_home_build_showcase_from_pool( et_home_get_wc_product_pool() );
        } catch ( Throwable $e ) {
            $products = array();
        }

        if ( empty( $products ) ) {
            $products = et_home_get_design_showcase_fallback();
        }

        if ( ! empty( $products ) ) {
            set_transient( $cache_key, $products, 6 * HOUR_IN_SECONDS );
        }

        return $products;
    }
}
