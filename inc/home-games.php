<?php
/**
 * Home v2 — official game media from the WordPress media library (Games category)
 * with branded theme fallbacks.
 */

if ( ! function_exists( 'et_home_resolve_game_image_url' ) ) {
    /**
     * Normalize an ACF/image field value to a URL string.
     *
     * @param mixed $image Image field value.
     * @return string
     */
    function et_home_resolve_game_image_url( $image ) {
        if ( empty( $image ) ) {
            return '';
        }

        if ( is_string( $image ) ) {
            return $image;
        }

        if ( is_array( $image ) ) {
            if ( ! empty( $image['url'] ) ) {
                return (string) $image['url'];
            }

            if ( ! empty( $image['ID'] ) ) {
                $attachment = wp_get_attachment_image_url( (int) $image['ID'], 'full' );
                return $attachment ? $attachment : '';
            }
        }

        if ( is_numeric( $image ) ) {
            $attachment = wp_get_attachment_image_url( (int) $image, 'full' );
            return $attachment ? $attachment : '';
        }

        return '';
    }
}

if ( ! function_exists( 'et_home_match_game_showcase_key' ) ) {
    /**
     * Map a Games post slug/title to a showcase card key.
     *
     * @param string $slug  Post slug.
     * @param string $title Post title.
     * @return string
     */
    function et_home_match_game_showcase_key( $slug, $title ) {
        $slug  = strtolower( (string) $slug );
        $title = strtolower( (string) $title );
        $hay   = $slug . ' ' . $title;

        if ( false !== strpos( $hay, 'maze' ) ) {
            return 'maze';
        }

        if ( false !== strpos( $hay, 'color' ) ) {
            return 'coloring';
        }

        if ( false !== strpos( $hay, 'puzzle' ) ) {
            return 'puzzle';
        }

        if ( false !== strpos( $hay, 'diff' ) ) {
            return 'difference';
        }

        return '';
    }
}

if ( ! function_exists( 'et_home_get_games_category_images' ) ) {
    /**
     * Load official game card images from Games category posts.
     *
     * Uses the same ACF background field as the /games/ page, with featured
     * image fallback (same source as the live homepage games slider).
     *
     * @return array<string, string>
     */
    function et_home_get_games_category_images() {
        static $images = null;

        if ( null !== $images ) {
            return $images;
        }

        $images = array();

        if ( ! function_exists( 'get_posts' ) ) {
            return $images;
        }

        $posts = get_posts(
            array(
                'post_type'              => 'post',
                'category_name'          => 'games',
                'posts_per_page'         => 20,
                'post_status'            => 'publish',
                'orderby'                => 'title',
                'order'                  => 'ASC',
                'no_found_rows'          => true,
                'update_post_meta_cache' => false,
                'update_post_term_cache' => false,
            )
        );

        foreach ( $posts as $game_post ) {
            $key = et_home_match_game_showcase_key( $game_post->post_name, $game_post->post_title );

            if ( '' === $key || isset( $images[ $key ] ) ) {
                continue;
            }

            $image = '';

            if ( function_exists( 'get_field' ) ) {
                $image = et_home_resolve_game_image_url( get_field( 'game_images_background', $game_post->ID ) );
            }

            if ( '' === $image && function_exists( 'get_post_featured_image' ) ) {
                $image = (string) get_post_featured_image( $game_post->ID, 'full' );
            }

            if ( '' !== $image ) {
                $images[ $key ] = $image;
            }
        }

        return $images;
    }
}

if ( ! function_exists( 'et_home_get_game_theme_asset_map' ) ) {
    /**
     * Branded theme fallbacks keyed by game slug.
     *
     * @param string $theme_uri Theme directory URI.
     * @return array<string, array<string, string>>
     */
    function et_home_get_game_theme_asset_map( $theme_uri ) {
        $base = trailingslashit( $theme_uri ) . 'images/';

        return array(
            'maze' => array(
                'showcase' => $base . 'fun-egg-maze-preview.png',
                'preview'  => $base . 'fun-egg-maze-preview.png',
                'app_card' => $base . 'fun-app-maze.png',
                'icon'     => $base . 'fun-app-maze-thumb.png',
                'slider'   => $base . 'fun-egg-maze-preview.png',
            ),
            'coloring' => array(
                'showcase' => $base . 'game_2.jpg',
                'preview'  => $base . 'fun-egg-dot-preview.png',
                'app_card' => $base . 'fun-app-coloring.png',
                'icon'     => $base . 'fun-app-coloring-thumb.png',
                'slider'   => $base . 'game_2.jpg',
            ),
            'puzzle' => array(
                'showcase' => $base . 'game_1.jpg',
                'preview'  => $base . 'game_1.jpg',
                'app_card' => $base . 'fun-app-puzzle.png',
                'icon'     => $base . 'fun-app-puzzle-thumb.png',
                'slider'   => $base . 'game_1.jpg',
            ),
            'difference' => array(
                'showcase' => $base . 'fun-app-memory.png',
                'preview'  => $base . 'fun-app-memory.png',
                'app_card' => $base . 'fun-app-memory.png',
                'icon'     => $base . 'fun-app-memory-thumb.png',
                'slider'   => $base . 'fun-app-memory.png',
            ),
        );
    }
}

if ( ! function_exists( 'et_home_get_game_brand_image' ) ) {
    /**
     * Resolve a branded game image (WP media library first, theme fallback).
     *
     * @param string $key       Game key.
     * @param string $theme_uri Theme directory URI.
     * @param string $type      Asset type: showcase, app_card, icon.
     * @return string
     */
    function et_home_get_game_brand_image( $key, $theme_uri, $type = 'showcase' ) {
        $map = et_home_get_game_theme_asset_map( $theme_uri );

        // Portrait/square UI slots always use the illustrated card assets.
        if ( in_array( $type, array( 'app_card', 'icon', 'preview', 'slider' ), true ) ) {
            return isset( $map[ $key ][ $type ] ) ? $map[ $key ][ $type ] : '';
        }

        $wp_images = et_home_get_games_category_images();

        if ( ! empty( $wp_images[ $key ] ) ) {
            return $wp_images[ $key ];
        }

        if ( isset( $map[ $key ][ $type ] ) ) {
            return $map[ $key ][ $type ];
        }

        return '';
    }
}

if ( ! function_exists( 'et_home_get_fun_egg_section_icon' ) ) {
    /**
     * Branded icon for the Games Inside Every Egg heading.
     *
     * @param string $theme_uri Theme directory URI.
     * @return string
     */
    function et_home_get_fun_egg_section_icon( $theme_uri ) {
        return trailingslashit( $theme_uri ) . 'images/games-icon_1.png';
    }
}

if ( ! function_exists( 'et_home_get_fun_egg_activity_icon' ) ) {
    /**
     * Branded activity-list icon badge for a game.
     *
     * @param string $key       Game key or "education".
     * @param string $theme_uri Theme directory URI.
     * @return string
     */
    function et_home_get_fun_egg_activity_icon( $key, $theme_uri ) {
        if ( 'education' === $key ) {
            return trailingslashit( $theme_uri ) . 'images/games-icon_2.png';
        }

        return et_home_get_game_brand_image( $key, $theme_uri, 'icon' );
    }
}

if ( ! function_exists( 'et_home_get_fun_egg_previews' ) ) {
    /**
     * Preview cards for the Games Inside Every Egg panel.
     *
     * @param string $theme_uri Theme directory URI.
     * @return array<int, array<string, string>>
     */
    function et_home_get_fun_egg_previews( $theme_uri ) {
        return array(
            array(
                'label' => 'Puzzle Time',
                'image' => 'https://eggstime.com/wp-content/uploads/2017/12/IMG_05012019_114538_0.png',
                'url'   => 'http://eggstime.com/upload/puzzles/index.html',
            ),
            array(
                'label' => 'Coloring Time',
                'image' => 'https://eggstime.com/wp-content/uploads/2017/12/IMG_05012019_114533_0.png',
                'url'   => 'http://eggstime.com/upload/index.html',
            ),
        );
    }
}

if ( ! function_exists( 'et_home_get_fun_egg_activities' ) ) {
    /**
     * Activity list items with branded icon badges.
     *
     * @param string $games_url Games landing page URL.
     * @param string $theme_uri Theme directory URI.
     * @return array<int, array<string, string>>
     */
    function et_home_get_fun_egg_activities( $games_url, $theme_uri ) {
        return array(
            array(
                'key'   => 'maze',
                'label' => 'Maze Time',
                'icon'  => et_home_get_fun_egg_activity_icon( 'maze', $theme_uri ),
                'url'   => 'http://eggstime.com/upload/mazes/index.html',
            ),
            array(
                'key'   => 'coloring',
                'label' => 'Coloring Time',
                'icon'  => et_home_get_fun_egg_activity_icon( 'coloring', $theme_uri ),
                'url'   => 'http://eggstime.com/upload/index.html',
            ),
            array(
                'key'   => 'puzzle',
                'label' => 'Puzzle Time',
                'icon'  => et_home_get_fun_egg_activity_icon( 'puzzle', $theme_uri ),
                'url'   => 'http://eggstime.com/upload/puzzles/index.html',
            ),
            array(
                'key'   => 'difference',
                'label' => 'Difference Time',
                'icon'  => et_home_get_fun_egg_activity_icon( 'difference', $theme_uri ),
                'url'   => 'http://eggstime.com/upload/diff/index.html',
            ),
            array(
                'key'   => 'education',
                'label' => 'And More Educational Activities',
                'icon'  => et_home_get_fun_egg_activity_icon( 'education', $theme_uri ),
                'url'   => $games_url,
            ),
        );
    }
}

if ( ! function_exists( 'et_home_get_fun_egg_app_games' ) ) {
    /**
     * App promo game cards with official illustrated scene images.
     *
     * @param string $theme_uri Theme directory URI.
     * @return array<int, array<string, string>>
     */
    function et_home_get_fun_egg_app_games( $theme_uri ) {
        $cards = array(
            array(
                'key'   => 'maze',
                'label' => 'Maze Time',
                'tone'  => 'blue',
                'url'   => 'http://eggstime.com/upload/mazes/index.html',
            ),
            array(
                'key'   => 'coloring',
                'label' => 'Coloring Time',
                'tone'  => 'pink',
                'url'   => 'http://eggstime.com/upload/index.html',
            ),
            array(
                'key'   => 'puzzle',
                'label' => 'Puzzle Time',
                'tone'  => 'green',
                'url'   => 'http://eggstime.com/upload/puzzles/index.html',
            ),
            array(
                'key'   => 'difference',
                'label' => 'Difference Time',
                'tone'  => 'purple',
                'url'   => 'http://eggstime.com/upload/diff/index.html',
            ),
        );

        foreach ( $cards as &$card ) {
            $card['image'] = et_home_get_game_brand_image( $card['key'], $theme_uri, 'app_card' );
            unset( $card['key'] );
        }
        unset( $card );

        return $cards;
    }
}

if ( ! function_exists( 'et_home_get_games_extra_cards' ) ) {
    /**
     * Footer games slider cards.
     *
     * @param string $theme_uri Theme directory URI.
     * @return array<int, array<string, string>>
     */
    function et_home_get_games_extra_cards( $theme_uri ) {
        $items = array(
            array(
                'key'   => 'coloring',
                'title' => 'Coloring Time',
                'url'   => 'http://eggstime.com/upload/index.html',
            ),
            array(
                'key'   => 'puzzle',
                'title' => 'Puzzle Time',
                'url'   => 'http://eggstime.com/upload/puzzles/index.html',
            ),
            array(
                'key'   => 'difference',
                'title' => 'Difference Time',
                'url'   => 'http://eggstime.com/upload/diff/index.html',
            ),
            array(
                'key'   => 'maze',
                'title' => 'Maze Time',
                'url'   => 'http://eggstime.com/upload/mazes/index.html',
            ),
        );

        foreach ( $items as &$item ) {
            $item['image'] = et_home_get_game_brand_image( $item['key'], $theme_uri, 'slider' );
            unset( $item['key'] );
        }
        unset( $item );

        return $items;
    }
}

if ( ! function_exists( 'et_home_get_game_app_store_badges' ) ) {
    /**
     * Official App Store / Google Play badges and links.
     *
     * Pulls from the eggs-time-game-app category post when available.
     *
     * @param string $theme_uri Theme directory URI.
     * @return array<string, array<string, string>>
     */
    function et_home_get_game_app_store_badges( $theme_uri ) {
        static $badges = null;

        if ( null !== $badges ) {
            return $badges;
        }

        $base = trailingslashit( $theme_uri ) . 'images/';

        $badges = array(
            'play' => array(
                'url'   => 'https://play.google.com/store/apps/details?id=com.eggtime.colorings',
                'image' => $base . 'playmarket.png',
                'label' => 'Get it on Google Play',
            ),
            'app'  => array(
                'url'   => 'https://itunes.apple.com/us/app/eggs-time-coloring-books/id1263628877?mt=8',
                'image' => $base . 'appstore.png',
                'label' => 'Download on the App Store',
            ),
        );

        if ( ! function_exists( 'get_posts' ) || ! function_exists( 'get_field' ) ) {
            return $badges;
        }

        $posts = get_posts(
            array(
                'post_type'              => 'post',
                'category_name'          => 'eggs-time-game-app',
                'posts_per_page'         => 1,
                'post_status'            => 'publish',
                'no_found_rows'          => true,
                'update_post_meta_cache' => false,
                'update_post_term_cache' => false,
            )
        );

        if ( empty( $posts ) ) {
            return $badges;
        }

        $post_id = $posts[0]->ID;

        $play_image = et_home_resolve_game_image_url( get_field( 'icon_game_playmarket', $post_id ) );
        $app_image  = et_home_resolve_game_image_url( get_field( 'icon_game_ios', $post_id ) );
        $play_url   = (string) get_field( 'link_for_game_on_playmarket', $post_id );
        $app_url    = (string) get_field( 'link_for_game_on_app_store', $post_id );

        if ( '' !== $play_image ) {
            $badges['play']['image'] = $play_image;
        }

        if ( '' !== $app_image ) {
            $badges['app']['image'] = $app_image;
        }

        if ( '' !== $play_url ) {
            $badges['play']['url'] = $play_url;
        }

        if ( '' !== $app_url ) {
            $badges['app']['url'] = $app_url;
        }

        return $badges;
    }
}

if ( ! function_exists( 'et_home_get_game_rating_badge_images' ) ) {
    /**
     * Official safety / age-rating badge icons (ESRB, PEGI, USK, IARC, etc.).
     *
     * @param string $theme_uri Theme directory URI.
     * @return string[]
     */
    function et_home_get_game_rating_badge_images( $theme_uri ) {
        $base   = trailingslashit( $theme_uri ) . 'images/';
        $badges = array();

        for ( $i = 1; $i <= 7; $i++ ) {
            $badges[] = $base . 'games_badge_' . $i . '.png';
        }

        return $badges;
    }
}
