<?php
/**
 * Home v2 — Eggs Time character universe data.
 */

if ( ! function_exists( 'et_get_home_carousel_character_image' ) ) {
    /**
     * Shared cartoon image for all Choose Your Egg World cards.
     *
     * @return string
     */
    function et_get_home_carousel_character_image() {
        return 'https://eggstime.com/wp-content/uploads/2026/07/3%D0%94_2.png';
    }
}

if ( ! function_exists( 'et_get_home_core_egg_brand_keys' ) ) {
    /**
     * Canonical brand order used across home carousels and brand rows.
     *
     * @return string[]
     */
    function et_get_home_core_egg_brand_keys() {
        return array( 'happy', 'lucky', 'king', 'magik', 'skazka', 'emoji' );
    }
}

if ( ! function_exists( 'et_get_home_core_egg_brand_meta' ) ) {
    /**
     * Shared metadata for the six core egg brands.
     *
     * @return array<string, array<string, string>>
     */
    function et_get_home_core_egg_brand_meta() {
        $uploads_july = 'https://eggstime.com/wp-content/uploads/2026/07/';
        $uploads      = trailingslashit( home_url( '/wp-content/uploads' ) );

        return array(
            'happy'  => array(
                'name'             => 'Happy Egg',
                'character_image'  => $uploads_july . '3%D0%94_2.png',
                'product_image'    => $uploads_july . '5-2.png',
                'best_seller_image'=> 'https://eggstime.com/wp-content/uploads/2017/12/Happy-Eggs-4.png',
                'showcase_image'   => $uploads . '2022/05/04-2.png',
                'tagline'          => 'Sunny surprises full of joy and laughter.',
                'shop_url'         => home_url( '/products/happy-egg-surprises-gummies-vitamin-c-toy/' ),
                'panel'            => '#fff0f6',
                'accent'           => '#e91e8c',
            ),
            'lucky'  => array(
                'name'             => 'Lucky Egg',
                'character_image'  => $uploads_july . '3%D0%94_8.png',
                'product_image'    => $uploads_july . '9-1.png',
                'best_seller_image'=> 'https://eggstime.com/wp-content/uploads/2017/12/Lucky-Eggs-2.png',
                'showcase_image'   => $uploads . '2022/05/05.png',
                'tagline'          => 'Lucky finds and playful discoveries await.',
                'shop_url'         => home_url( '/products/lucky-egg-surprises-multivitamin-gummies-toy/' ),
                'panel'            => '#fff8e6',
                'accent'           => '#f39c12',
            ),
            'king'   => array(
                'name'             => 'King Egg',
                'character_image'  => $uploads_july . '3%D0%94_3.png',
                'product_image'    => $uploads_july . '2-4.png',
                'best_seller_image'=> 'https://eggstime.com/wp-content/uploads/2017/12/King-Eggs.png',
                'showcase_image'   => $uploads . '2022/05/01.png',
                'tagline'          => 'Royal adventures with wisdom and courage.',
                'shop_url'         => home_url( '/products/big-king-egg/' ),
                'panel'            => '#e8f3fc',
                'accent'           => '#1a9fe0',
            ),
            'magik'  => array(
                'name'             => 'Magik Egg',
                'character_image'  => $uploads_july . '3%D0%94_6.png',
                'product_image'    => $uploads_july . '7-1.png',
                'best_seller_image'=> 'https://eggstime.com/wp-content/uploads/2017/12/Magik-Eggs-3.png',
                'showcase_image'   => $uploads . '2022/05/02.png',
                'tagline'          => 'Magical worlds of wonder and imagination.',
                'shop_url'         => home_url( '/products/giant-magik-egg/' ),
                'panel'            => '#f3eef9',
                'accent'           => '#8e44ad',
            ),
            'skazka' => array(
                'name'             => 'Skazka Egg',
                'character_image'  => $uploads_july . '3%D0%94_10.png',
                'product_image'    => $uploads_july . '8-2.png',
                'best_seller_image'=> 'https://eggstime.com/wp-content/uploads/2017/12/Skazka-Eggs.png',
                'showcase_image'   => $uploads . '2022/05/03.png',
                'tagline'          => 'Fairytale stories that spark creativity.',
                'shop_url'         => home_url( '/products/skazka-egg/' ),
                'panel'            => '#eaf8ef',
                'accent'           => '#27ae60',
            ),
            'emoji'  => array(
                'name'             => 'Emoji Egg',
                'character_image'  => $uploads_july . 'EmojiCharacter.png',
                'product_image'    => $uploads_july . '1-4.png',
                'best_seller_image'=> 'https://eggstime.com/wp-content/uploads/2017/12/Emojy-Eggs.png',
                'showcase_image'   => $uploads . '2022/05/06-2.png',
                'tagline'          => 'Expressive fun with playful emoji friends.',
                'shop_url'         => home_url( '/products/emoji-egg/' ),
                'panel'            => '#fff0f6',
                'accent'           => '#e91e8c',
            ),
        );
    }
}

if ( ! function_exists( 'et_home_get_carousel_min_count' ) ) {
    /**
     * Minimum cards rendered in the Choose Your Egg World carousel.
     *
     * @return int
     */
    function et_home_get_carousel_min_count() {
        return 20;
    }
}

if ( ! function_exists( 'et_home_guess_brand_key_from_text' ) ) {
    /**
     * Map a product slug or title to one of the six core egg brands.
     *
     * @param string $text Slug or product title.
     * @return string
     */
    function et_home_guess_brand_key_from_text( $text ) {
        $text = strtolower( (string) $text );

        if ( false !== strpos( $text, 'lucky' ) ) {
            return 'lucky';
        }

        if ( false !== strpos( $text, 'king' ) ) {
            return 'king';
        }

        if ( false !== strpos( $text, 'magik' ) || false !== strpos( $text, 'magic' ) ) {
            return 'magik';
        }

        if ( false !== strpos( $text, 'skazka' ) || false !== strpos( $text, 'sказ' ) ) {
            return 'skazka';
        }

        if ( false !== strpos( $text, 'emoji' ) || false !== strpos( $text, 'emoj' ) ) {
            return 'emoji';
        }

        if ( false !== strpos( $text, 'happy' ) ) {
            return 'happy';
        }

        return 'happy';
    }
}

if ( ! function_exists( 'et_home_build_carousel_visual_item' ) ) {
    /**
     * Build one carousel card for either the character or product egg artwork.
     *
     * @param string $name      Card title.
     * @param string $url       Product URL.
     * @param string $brand_key Core brand key.
     * @param string $visual    character|egg
     * @return array<string, string>|null
     */
    function et_home_build_carousel_visual_item( $name, $url, $brand_key, $visual = 'character' ) {
        $meta = et_get_home_core_egg_brand_meta();

        if ( ! isset( $meta[ $brand_key ] ) ) {
            return null;
        }

        $brand = $meta[ $brand_key ];
        $visual = ( 'egg' === $visual ) ? 'egg' : 'character';

        return array(
            'name'    => $name,
            'image'   => ( 'egg' === $visual ) ? $brand['product_image'] : $brand['character_image'],
            'visual'  => $visual,
            'tagline' => $brand['tagline'],
            'url'     => $url,
            'panel'   => $brand['panel'],
            'accent'  => $brand['accent'],
        );
    }
}

if ( ! function_exists( 'et_home_build_carousel_character_item' ) ) {
    /**
     * @param string $name      Card title.
     * @param string $url       Product URL.
     * @param string $brand_key Core brand key.
     * @return array<string, string>|null
     */
    function et_home_build_carousel_character_item( $name, $url, $brand_key ) {
        return et_home_build_carousel_visual_item( $name, $url, $brand_key, 'character' );
    }
}

if ( ! function_exists( 'et_home_get_core_carousel_character_items' ) ) {
    /**
     * Twelve canonical brand cards: character + egg for each core brand.
     *
     * @return array<int, array<string, string>>
     */
    function et_home_get_core_carousel_character_items() {
        if ( ! function_exists( 'et_get_home_core_egg_brand_meta' ) || ! function_exists( 'et_get_home_core_egg_brand_keys' ) ) {
            return array();
        }

        $meta  = et_get_home_core_egg_brand_meta();
        $items = array();

        foreach ( et_get_home_core_egg_brand_keys() as $key ) {
            if ( ! isset( $meta[ $key ] ) ) {
                continue;
            }

            $character_item = et_home_build_carousel_visual_item(
                $meta[ $key ]['name'],
                $meta[ $key ]['shop_url'],
                $key,
                'character'
            );

            if ( $character_item ) {
                $items[] = $character_item;
            }
        }

        return $items;
    }
}

if ( ! function_exists( 'et_home_get_carousel_expansion_catalog' ) ) {
    /**
     * Extra product slugs used to fill the carousel when WooCommerce is unavailable.
     *
     * @return array<int, array<string, string>>
     */
    function et_home_get_carousel_expansion_catalog() {
        return array(
            array( 'slug' => 'happy-dress-up-toys', 'brand' => 'happy', 'name' => 'Happy Dress Up Toys' ),
            array( 'slug' => 'happy-toys', 'brand' => 'happy', 'name' => 'Happy Toys' ),
            array( 'slug' => 'happy-dress-the-eggs', 'brand' => 'happy', 'name' => 'Happy Dress The Eggs' ),
            array( 'slug' => 'lucky-toys', 'brand' => 'lucky', 'name' => 'Lucky Toys' ),
            array( 'slug' => 'lucky-toy', 'brand' => 'lucky', 'name' => 'Lucky Toy' ),
            array( 'slug' => 'king-toy', 'brand' => 'king', 'name' => 'King Toy' ),
            array( 'slug' => 'magik-toys', 'brand' => 'magik', 'name' => 'Magik Toys' ),
            array( 'slug' => 'magic-eggs', 'brand' => 'magik', 'name' => 'Magic Eggs' ),
            array( 'slug' => 'happy-egg-surprises-gummies-vitamin-c-toy', 'brand' => 'happy', 'name' => 'Happy Egg Surprises' ),
            array( 'slug' => 'lucky-egg-surprises-multivitamin-gummies-toy', 'brand' => 'lucky', 'name' => 'Lucky Egg Surprises' ),
            array( 'slug' => 'big-king-egg', 'brand' => 'king', 'name' => 'Big King Egg' ),
            array( 'slug' => 'giant-magik-egg', 'brand' => 'magik', 'name' => 'Giant Magik Egg' ),
            array( 'slug' => 'skazka-egg', 'brand' => 'skazka', 'name' => 'Skazka Egg' ),
            array( 'slug' => 'emoji-egg', 'brand' => 'emoji', 'name' => 'Emoji Egg' ),
            array( 'slug' => 'happy-egg-gummies', 'brand' => 'happy', 'name' => 'Happy Egg Gummies' ),
            array( 'slug' => 'lucky-egg-gummies', 'brand' => 'lucky', 'name' => 'Lucky Egg Gummies' ),
            array( 'slug' => 'king-egg-surprises', 'brand' => 'king', 'name' => 'King Egg Surprises' ),
            array( 'slug' => 'magik-egg-surprises', 'brand' => 'magik', 'name' => 'Magik Egg Surprises' ),
            array( 'slug' => 'skazka-toys', 'brand' => 'skazka', 'name' => 'Skazka Toys' ),
            array( 'slug' => 'emoji-toys', 'brand' => 'emoji', 'name' => 'Emoji Toys' ),
            array( 'slug' => 'happy-surprise-egg', 'brand' => 'happy', 'name' => 'Happy Surprise Egg' ),
            array( 'slug' => 'lucky-surprise-egg', 'brand' => 'lucky', 'name' => 'Lucky Surprise Egg' ),
            array( 'slug' => 'king-surprise-egg', 'brand' => 'king', 'name' => 'King Surprise Egg' ),
            array( 'slug' => 'magik-surprise-egg', 'brand' => 'magik', 'name' => 'Magik Surprise Egg' ),
        );
    }
}

if ( ! function_exists( 'et_home_get_carousel_product_by_slug' ) ) {
    /**
     * @param string $slug Product slug.
     * @return WC_Product|null
     */
    function et_home_get_carousel_product_by_slug( $slug ) {
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

if ( ! function_exists( 'et_home_append_carousel_character_item' ) ) {
    /**
     * @param array<int, array<string, string>> $items
     * @param array<string, string>             $seen_urls
     * @param array<string, string>             $item
     * @return bool
     */
    function et_home_append_carousel_character_item( array &$items, array &$seen_urls, array $item ) {
        if ( empty( $item['url'] ) || empty( $item['name'] ) ) {
            return false;
        }

        $url_key = untrailingslashit( strtolower( $item['url'] ) );
        $image_key = isset( $item['image'] ) ? md5( (string) $item['image'] ) : '';
        $dedupe_key = $url_key . '|' . $image_key;

        if ( isset( $seen_urls[ $dedupe_key ] ) ) {
            return false;
        }

        $items[]                  = $item;
        $seen_urls[ $dedupe_key ] = true;

        return true;
    }
}

if ( ! function_exists( 'et_home_build_carousel_characters' ) ) {
    /**
     * Build the full carousel card list (core brands + product expansion).
     *
     * @return array<int, array<string, string>>
     */
    function et_home_build_carousel_characters() {
        $min_count  = et_home_get_carousel_min_count();
        $brand_keys = function_exists( 'et_get_home_core_egg_brand_keys' ) ? et_get_home_core_egg_brand_keys() : array();
        $items      = array();
        $seen_urls  = array();

        foreach ( et_home_get_core_carousel_character_items() as $item ) {
            et_home_append_carousel_character_item( $items, $seen_urls, $item );
        }

        if ( function_exists( 'wc_get_products' ) ) {
            $product_queries = array(
                array(
                    'status'  => 'publish',
                    'limit'   => 36,
                    'orderby' => 'menu_order',
                    'order'   => 'ASC',
                    'return'  => 'objects',
                ),
                array(
                    'status'  => 'publish',
                    'limit'   => 36,
                    'orderby' => 'date',
                    'order'   => 'DESC',
                    'return'  => 'objects',
                ),
            );

            foreach ( $product_queries as $query_args ) {
                $products = wc_get_products( $query_args );

                foreach ( (array) $products as $product ) {
                    if ( ! is_object( $product ) || ! method_exists( $product, 'is_visible' ) || ! $product->is_visible() ) {
                        continue;
                    }

                    $slug      = method_exists( $product, 'get_slug' ) ? $product->get_slug() : '';
                    $brand_key = et_home_guess_brand_key_from_text( $slug . ' ' . $product->get_name() );
                    $item      = et_home_build_carousel_character_item(
                        $product->get_name(),
                        $product->get_permalink(),
                        $brand_key
                    );

                    if ( $item ) {
                        et_home_append_carousel_character_item( $items, $seen_urls, $item );
                    }

                    if ( count( $items ) >= $min_count ) {
                        break 2;
                    }
                }

                if ( count( $items ) >= $min_count ) {
                    break;
                }
            }
        }

        foreach ( et_home_get_carousel_expansion_catalog() as $catalog_item ) {
            if ( count( $items ) >= $min_count ) {
                break;
            }

            $slug    = isset( $catalog_item['slug'] ) ? $catalog_item['slug'] : '';
            $brand   = isset( $catalog_item['brand'] ) ? $catalog_item['brand'] : et_home_guess_brand_key_from_text( $slug );
            $product = et_home_get_carousel_product_by_slug( $slug );

            if ( $product ) {
                $name = $product->get_name();
                $url  = $product->get_permalink();
            } else {
                $name = isset( $catalog_item['name'] ) ? $catalog_item['name'] : ucwords( str_replace( '-', ' ', $slug ) );
                $url  = home_url( '/products/' . $slug . '/' );
            }

            $item = et_home_build_carousel_character_item( $name, $url, $brand );

            if ( $item ) {
                et_home_append_carousel_character_item( $items, $seen_urls, $item );
            }
        }

        $core_items = et_home_get_core_carousel_character_items();

        while ( count( $items ) < $min_count && ! empty( $core_items ) ) {
            $items[] = $core_items[ count( $items ) % count( $core_items ) ];
        }

        return $items;
    }
}

if ( ! function_exists( 'et_home_get_carousel_characters' ) ) {
    /**
     * Cards for the Choose Your Egg World carousel (minimum 20).
     *
     * @return array<int, array<string, string>>
     */
    function et_home_get_carousel_characters() {
        $cache_key = 'et_home_character_products_v5';
        $cached    = get_transient( $cache_key );

        if ( false !== $cached && is_array( $cached ) && count( $cached ) >= et_home_get_carousel_min_count() ) {
            return $cached;
        }

        $items = et_home_build_carousel_characters();

        if ( ! empty( $items ) ) {
            set_transient( $cache_key, $items, DAY_IN_SECONDS );
        }

        return $items;
    }
}

if ( ! function_exists( 'et_home_get_characters' ) ) {
    /**
     * Core egg-world characters for the home carousel.
     *
     * @return array<int, array<string, string>>
     */
    function et_home_get_characters() {
        $meta  = et_get_home_core_egg_brand_meta();
        $items = array();

        foreach ( et_get_home_core_egg_brand_keys() as $key ) {
            if ( ! isset( $meta[ $key ] ) ) {
                continue;
            }

            $brand = $meta[ $key ];

            $items[] = array(
                'name'    => $brand['name'],
                'image'   => $brand['character_image'],
                'visual'  => 'character',
                'tagline' => $brand['tagline'],
                'url'     => $brand['shop_url'],
                'panel'   => $brand['panel'],
                'accent'  => $brand['accent'],
            );
        }

        return $items;
    }
}
