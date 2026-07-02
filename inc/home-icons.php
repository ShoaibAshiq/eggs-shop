<?php
/**
 * Home v2 — Font Awesome icons (theme loads FA 5.6.3 in header.php).
 */

if ( ! function_exists( 'et_home_get_fa_icon_class' ) ) {
    /**
     * Map logical icon keys to Font Awesome 5 solid class names.
     *
     * @param string $name Icon key.
     * @return string|null
     */
    function et_home_get_fa_icon_class( $name ) {
        $icons = array(
            'hand'          => 'fa-hands-helping',
            'wand'          => 'fa-magic',
            'music'         => 'fa-music',
            'puzzle'        => 'fa-puzzle-piece',
            'shield-check'  => 'fa-certificate',
            'shield'        => 'fa-shield-alt',
            'education'     => 'fa-book-open',
            'book-open'     => 'fa-book-open',
            'gift'          => 'fa-gift',
            'vitamins'      => 'fa-apple-alt',
            'leaf'          => 'fa-leaf',
            'store'         => 'fa-store',
            'retail'        => 'fa-store',
            'globe'         => 'fa-globe-americas',
            'distributor'   => 'fa-globe-americas',
            'clapperboard'  => 'fa-film',
            'collaborate'   => 'fa-film',
            'cart'          => 'fa-shopping-cart',
            'tag'           => 'fa-tag',
            'truck'         => 'fa-truck',
            'smile'         => 'fa-smile',
            'chart'         => 'fa-chart-bar',
            'star'          => 'fa-star',
            'people'        => 'fa-users',
            'heart'         => 'fa-heart',
            'map'           => 'fa-map',
            'pencil'        => 'fa-pencil-alt',
            'search'        => 'fa-search',
        );

        return isset( $icons[ $name ] ) ? $icons[ $name ] : null;
    }
}

if ( ! function_exists( 'et_home_icon' ) ) {
    /**
     * Output a Font Awesome icon for home page sections.
     *
     * @param string $name Icon key.
     * @param array  $args Optional: class (string), size (string e.g. lg).
     * @return string
     */
    function et_home_icon( $name, $args = array() ) {
        $fa_class = et_home_get_fa_icon_class( $name );

        if ( ! $fa_class ) {
            return '';
        }

        $classes = array( 'fas', $fa_class );

        if ( ! empty( $args['size'] ) ) {
            $classes[] = 'fa-' . sanitize_html_class( $args['size'] );
        }

        if ( ! empty( $args['class'] ) ) {
            $classes[] = $args['class'];
        }

        return sprintf(
            '<i class="%s" aria-hidden="true"></i>',
            esc_attr( implode( ' ', $classes ) )
        );
    }
}

if ( ! function_exists( 'et_home_icon_svg' ) ) {
    /**
     * Back-compat wrapper — now returns Font Awesome markup.
     *
     * @param string $name Icon key.
     * @param array  $args Optional attributes.
     * @return string
     */
    function et_home_icon_svg( $name, $args = array() ) {
        return et_home_icon( $name, $args );
    }
}

if ( ! function_exists( 'et_home_get_showcase_icon_meta' ) ) {
    /**
     * Icon and tone for each product card slot (design order).
     *
     * @param int $index Zero-based card index.
     * @return array{icon: string, tone: string}
     */
    function et_home_get_showcase_icon_meta( $index ) {
        $meta = array(
            array( 'icon' => 'hand', 'tone' => 'green' ),
            array( 'icon' => 'wand', 'tone' => 'yellow' ),
            array( 'icon' => 'music', 'tone' => 'blue' ),
            array( 'icon' => 'puzzle', 'tone' => 'green' ),
        );

        return isset( $meta[ $index ] ) ? $meta[ $index ] : $meta[0];
    }
}
