<?php
/**
 * Shared Eggs Time brand logo data (license page + home best sellers).
 */

if ( ! function_exists( 'et_get_egg_brand_logos' ) ) {
    function et_get_egg_brand_logos() {
        return array(
            'happy'     => array(
                'name'  => 'Happy Egg',
                'image' => 'https://eggstime.com/wp-content/uploads/2017/12/Happy-Eggs-4.png',
            ),
            'lucky'     => array(
                'name'  => 'Lucky Egg',
                'image' => 'https://eggstime.com/wp-content/uploads/2017/12/Lucky-Eggs-2.png',
            ),
            'king'      => array(
                'name'  => 'King Egg',
                'image' => 'https://eggstime.com/wp-content/uploads/2017/12/King-Eggs.png',
            ),
            'magik'     => array(
                'name'  => 'Magik Egg',
                'image' => 'https://eggstime.com/wp-content/uploads/2017/12/Magik-Eggs-3.png',
            ),
            'skazka'    => array(
                'name'  => 'Skazka Egg',
                'image' => 'https://eggstime.com/wp-content/uploads/2017/12/Skazka-Eggs.png',
            ),
            'emoji'     => array(
                'name'  => 'Emoji Egg',
                'image' => 'https://eggstime.com/wp-content/uploads/2017/12/Emojy-Eggs.png',
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
        $cards = array();

        foreach ( et_get_home_core_egg_brand_keys() as $key ) {
            if ( ! isset( $meta[ $key ] ) ) {
                continue;
            }

            $brand = $meta[ $key ];

            $cards[] = array(
                'name'             => $brand['name'],
                'product_image'    => $brand['product_image'],
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
    function et_get_license_page_brands() {
        if ( ! function_exists( 'et_get_home_core_egg_brand_keys' ) ) {
            return et_get_brands_by_keys( array( 'happy', 'lucky', 'king', 'magik', 'skazka', 'emoji', 'eggs-time' ) );
        }

        $keys = array_merge( et_get_home_core_egg_brand_keys(), array( 'eggs-time' ) );

        return et_get_brands_by_keys( $keys );
    }
}
