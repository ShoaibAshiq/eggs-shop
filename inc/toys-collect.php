<?php
/**
 * Toys page — Collect, Play & Learn section data.
 */

if ( ! function_exists( 'et_get_toys_collect_cards' ) ) {
    /**
     * @return array<int, array<string, string>>
     */
    function et_get_toys_collect_cards() {
        $uploads = 'https://eggstime.com/wp-content/uploads/2026/07/';
        $brands  = function_exists( 'et_get_home_core_egg_brand_meta' )
            ? et_get_home_core_egg_brand_meta()
            : array();

        $cards = array(
            array(
                'key'         => 'lucky',
                'icon'        => '🧸',
                'title'       => 'Lucky Egg Toys',
                'description' => 'Collect adorable animal friends and discover fun surprises in every Lucky Egg.',
                'image'       => $uploads . 'Lucky.png',
                'url'         => isset( $brands['lucky']['shop_url'] ) ? $brands['lucky']['shop_url'] : home_url( '/products/lucky-egg-surprises-multivitamin-gummies-toy/' ),
                'tone'        => 'pink',
            ),
            array(
                'key'         => 'king',
                'icon'        => '👑',
                'title'       => 'King Egg Toys',
                'description' => 'Play with colorful finger puppets and imaginative King Egg characters.',
                'image'       => $uploads . 'King.jpg.jpeg',
                'url'         => isset( $brands['king']['shop_url'] ) ? $brands['king']['shop_url'] : home_url( '/products/big-king-egg/' ),
                'tone'        => 'blue',
            ),
            array(
                'key'         => 'magik',
                'icon'        => '👾',
                'title'       => 'Magik Egg Toys',
                'description' => 'Meet funny little monsters and build your own magical collection.',
                'image'       => $uploads . 'Magik.png',
                'url'         => isset( $brands['magik']['shop_url'] ) ? $brands['magik']['shop_url'] : home_url( '/products/giant-magik-egg/' ),
                'tone'        => 'purple',
            ),
            array(
                'key'         => 'skazka',
                'icon'        => '🏰',
                'title'       => 'Skazka Toys',
                'description' => 'Step into fairy tales with magical characters, puzzles and collectible toys.',
                'image'       => $uploads . 'Skazka.png',
                'url'         => isset( $brands['skazka']['shop_url'] ) ? $brands['skazka']['shop_url'] : home_url( '/products/skazka-egg/' ),
                'tone'        => 'green',
            ),
            array(
                'key'         => 'emoji',
                'icon'        => '😊',
                'title'       => 'Emoji Inspirational Toys',
                'description' => 'Positive characters, magnetic puzzles and inspirational messages for every child.',
                'image'       => $uploads . 'Emoji.png',
                'url'         => isset( $brands['emoji']['shop_url'] ) ? $brands['emoji']['shop_url'] : home_url( '/products/emoji-egg/' ),
                'tone'        => 'orange',
            ),
        );

        return $cards;
    }
}

if ( ! function_exists( 'et_get_toys_collect_explore_url' ) ) {
    function et_get_toys_collect_explore_url() {
        return home_url( '/product-category/toys/' );
    }
}
