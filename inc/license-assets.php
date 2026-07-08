<?php
/**
 * License page — official media library image map.
 *
 * Sources match the live Eggs Time license page and 2026/07 product photography.
 */

if ( ! function_exists( 'et_get_license_media_base' ) ) {
    /**
     * @param string $year_month e.g. 2026/07
     * @return string
     */
    function et_get_license_media_base( $year_month = '2026/07' ) {
        return 'https://eggstime.com/wp-content/uploads/' . ltrim( $year_month, '/' ) . '/';
    }
}

if ( ! function_exists( 'et_get_license_character_keys' ) ) {
    /**
     * Hero / CTA / Why — Happy, King, Magik.
     *
     * @return string[]
     */
    function et_get_license_character_keys() {
        return array( 'happy', 'king', 'magik' );
    }
}

if ( ! function_exists( 'et_get_license_character_image' ) ) {
    /**
     * Official 3D character render from the media library.
     *
     * @param string $key happy|king|magik
     * @return string
     */
    function et_get_license_character_image( $key ) {
        $uploads_july = et_get_license_media_base( '2026/07' );
        $map          = array(
            'happy' => $uploads_july . '3%D0%94_2.png',
            'king'  => $uploads_july . '3%D0%94_3.png',
            'magik' => $uploads_july . '3%D0%94_6.png',
        );

        if ( isset( $map[ $key ] ) ) {
            return $map[ $key ];
        }

        if ( function_exists( 'et_get_home_core_egg_brand_meta' ) ) {
            $meta = et_get_home_core_egg_brand_meta();
            if ( isset( $meta[ $key ]['character_image'] ) ) {
                return $meta[ $key ]['character_image'];
            }
        }

        return '';
    }
}

if ( ! function_exists( 'et_get_license_product_egg_image' ) ) {
    /**
     * Official surprise-egg product photography.
     *
     * @param string $key happy|king|magik
     * @return string
     */
    function et_get_license_product_egg_image( $key ) {
        $uploads_july = et_get_license_media_base( '2026/07' );
        $map          = array(
            'happy' => $uploads_july . '5-2.png',
            'king'  => $uploads_july . '2-4.png',
            'magik' => $uploads_july . '7-1.png',
        );

        if ( isset( $map[ $key ] ) ) {
            return $map[ $key ];
        }

        if ( function_exists( 'et_get_home_core_egg_brand_meta' ) ) {
            $meta = et_get_home_core_egg_brand_meta();
            if ( isset( $meta[ $key ]['product_image'] ) ) {
                return $meta[ $key ]['product_image'];
            }
        }

        return '';
    }
}

if ( ! function_exists( 'et_get_license_hero_characters' ) ) {
    /**
     * @return array<int, array{name: string, image: string}>
     */
    function et_get_license_hero_characters() {
        $names = array(
            'happy' => 'Happy Egg',
            'king'  => 'King Egg',
            'magik' => 'Magik Egg',
        );
        $out   = array();

        foreach ( et_get_license_character_keys() as $key ) {
            $image = et_get_license_character_image( $key );
            if ( $image === '' ) {
                continue;
            }

            $out[] = array(
                'name'  => $names[ $key ],
                'image' => $image,
            );
        }

        return $out;
    }
}

if ( ! function_exists( 'et_get_license_why_characters_image' ) ) {
    /**
     * Three-character group for the Why License card.
     *
     * @return string
     */
    function et_get_license_why_characters_image() {
        $local = trailingslashit( get_template_directory_uri() ) . 'images/license-why-characters.png';
        $path  = get_template_directory() . '/images/license-why-characters.png';

        if ( file_exists( $path ) ) {
            return $local;
        }

        return et_get_license_character_image( 'happy' );
    }
}

if ( ! function_exists( 'et_get_license_cta_characters' ) ) {
    /**
     * @return array<int, array{name: string, image: string}>
     */
    function et_get_license_cta_characters() {
        return et_get_license_hero_characters();
    }
}

if ( ! function_exists( 'et_get_license_cta_products' ) ) {
    /**
     * @return array<int, array{name: string, image: string}>
     */
    function et_get_license_cta_products() {
        $names = array(
            'happy' => 'Happy Egg',
            'king'  => 'King Egg',
            'magik' => 'Magik Egg',
        );
        $out   = array();

        foreach ( et_get_license_character_keys() as $key ) {
            $image = et_get_license_product_egg_image( $key );
            if ( $image === '' ) {
                continue;
            }

            $out[] = array(
                'name'  => $names[ $key ],
                'image' => $image,
            );
        }

        return $out;
    }
}

if ( ! function_exists( 'et_get_license_products' ) ) {
    /**
     * Six fixed merchandise categories with official media-library photography.
     *
     * @return array<int, array{title: string, description: string, image: string}>
     */
    function et_get_license_products() {
        $uploads_2021_04 = et_get_license_media_base( '2021/04' );
        $uploads_2021_05 = et_get_license_media_base( '2021/05' );
        $uploads_2022_05 = et_get_license_media_base( '2022/05' );
        $uploads_2026_07 = et_get_license_media_base( '2026/07' );

        return array(
            array(
                'title'       => 'Character Caps',
                'description' => 'Fun and colorful caps featuring our characters.',
                'image'       => $uploads_2022_05 . 'Graber_1.jpg',
            ),
            array(
                'title'       => 'Plush Toys',
                'description' => 'Soft, high-quality plush toys kids love to cuddle.',
                'image'       => $uploads_2021_05 . 'Lucky_comby.png',
            ),
            array(
                'title'       => 'Surprise Eggs',
                'description' => 'Exciting surprises, toys and tasty treats inside.',
                'image'       => $uploads_2026_07 . '5-2.png',
            ),
            array(
                'title'       => 'Product Packaging',
                'description' => 'Attractive packaging designed for retail success.',
                'image'       => $uploads_2021_04 . '------------_--------------------_----------.png',
            ),
            array(
                'title'       => 'Retail Displays',
                'description' => 'Eye-catching displays that drive sales.',
                'image'       => $uploads_2026_07 . 'thumb_2EFFD4E7-CF51-4BA8-9584-AA1AF5255281-1.png',
            ),
            array(
                'title'       => 'Digital Games & Content',
                'description' => 'Engaging games and digital experiences for kids.',
                'image'       => $uploads_2022_05 . 'Lucky_1_%D0%BB%D0%BE%D0%B3%D0%BE.jpg',
            ),
        );
    }
}
