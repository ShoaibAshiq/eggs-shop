<?php
/**
 * Shared Eggs Time brand logo data (license page + home best sellers).
 */

if ( ! function_exists( 'et_get_egg_brand_logos' ) ) {
    function et_get_egg_brand_logos() {
        $uploads = 'https://eggstime.com/wp-content/uploads/2026/07/';

        return array(
            'happy'     => array(
                'name'  => 'Happy Egg',
                'image' => $uploads . 'Happy_egg.png',
            ),
            'lucky'     => array(
                'name'  => 'Lucky Egg',
                'image' => $uploads . 'Lucky_egg.png',
            ),
            'king'      => array(
                'name'  => 'King Egg',
                'image' => $uploads . 'King_egg.png',
            ),
            'magik'     => array(
                'name'  => 'Emoji Toy',
                'image' => $uploads . 'Emoji_toy.png',
            ),
            'skazka'    => array(
                'name'  => 'Skazka Egg',
                'image' => $uploads . 'Skazka_egg.png',
            ),
            'emoji'     => array(
                'name'  => 'Emoji Egg',
                'image' => $uploads . 'Emoji_egg.png',
            ),
            'eggs-time' => array(
                'name'  => 'Eggs Time',
                'image' => get_template_directory_uri() . '/images/eggs_time_logo.png',
            ),
        );
    }
}

if ( ! function_exists( 'et_get_brands_by_keys' ) ) {
    function et_get_brands_by_keys( $keys ) {
        $logos  = et_get_egg_brand_logos();
        $brands = array();

        foreach ( $keys as $key ) {
            if ( isset( $logos[ $key ] ) ) {
                $brands[] = $logos[ $key ];
            }
        }

        return $brands;
    }
}

if ( ! function_exists( 'et_get_home_best_seller_cards' ) ) {
    function et_get_home_best_seller_cards() {
        if ( ! function_exists( 'et_get_home_core_egg_brand_keys' ) ) {
            require_once get_template_directory() . '/inc/home-characters.php';
        }

        $meta  = et_get_home_core_egg_brand_meta();
        $logos = et_get_egg_brand_logos();
        $cards = array();

        foreach ( et_get_home_core_egg_brand_keys() as $key ) {
            if ( ! isset( $meta[ $key ] ) ) {
                continue;
            }

            $brand = $meta[ $key ];

            if ( ! empty( $brand['best_seller_image'] ) ) {
                $image = $brand['best_seller_image'];
            } elseif ( isset( $logos[ $key ]['image'] ) ) {
                $image = $logos[ $key ]['image'];
            } else {
                $image = $brand['product_image'];
            }

            $cards[] = array(
                'name'             => $brand['name'],
                'product_image'    => $image,
                'character_image'  => $brand['character_image'],
                'shop_url'         => $brand['shop_url'],
                'panel'            => $brand['panel'],
                'accent'           => $brand['accent'],
            );
        }

        return $cards;
    }
}

if ( ! function_exists( 'et_get_home_best_seller_brands' ) ) {
    function et_get_home_best_seller_brands() {
        $cards = et_get_home_best_seller_cards();

        return array_map(
            static function ( $card ) {
                return array(
                    'name'  => $card['name'],
                    'image' => $card['character_image'],
                );
            },
            $cards
        );
    }
}

if ( ! function_exists( 'et_get_license_page_brands' ) ) {
    /**
     * License page "Our Brands" logos (media library).
     *
     * @return array<int, array{name: string, image: string}>
     */
    function et_get_license_page_brands() {
        $uploads = function_exists( 'et_get_license_media_base' )
            ? et_get_license_media_base( '2026/07' )
            : 'https://eggstime.com/wp-content/uploads/2026/07/';

        return array(
            array(
                'name'  => 'Happy Toy',
                'image' => $uploads . 'Happy_toy.png',
            ),
            array(
                'name'  => 'Lucky Toy',
                'image' => $uploads . 'Lucky_toy.png',
            ),
            array(
                'name'  => 'King Egg',
                'image' => $uploads . 'King_egg-1.png',
            ),
            array(
                'name'  => 'King Toy',
                'image' => $uploads . 'King_toy.png',
            ),
            array(
                'name'  => 'Magik Egg',
                'image' => $uploads . 'Magik_egg.png',
            ),
            array(
                'name'  => 'Lucky Egg',
                'image' => $uploads . 'Lucky_egg-1.png',
            ),
            array(
                'name'  => 'Happy Egg',
                'image' => $uploads . 'Happy_egg-1.png',
            ),
            array(
                'name'  => 'Emoji Toy',
                'image' => $uploads . 'Emoji_toy-1.png',
            ),
            array(
                'name'  => 'Skazka Toy',
                'image' => $uploads . 'Skazka_toy.png',
            ),
            array(
                'name'  => 'Emoji Egg',
                'image' => $uploads . 'Emoji_egg-1.png',
            ),
        );
    }
}
