<?php
/**
 * Home v2 — Parent benefits and certification data.
 */

if ( ! function_exists( 'et_get_home_parent_benefits' ) ) {
    function et_get_home_parent_benefits() {
        return array(
            array(
                'title' => 'Safe & Certified',
                'text'  => 'Kid-safe, non-toxic and parent approved.',
                'icon'  => 'shield-check',
                'tone'  => 'green',
            ),
            array(
                'title' => 'Educational Entertainment',
                'text'  => 'Stories, play and videos that support learning.',
                'icon'  => 'education',
                'tone'  => 'purple',
            ),
            array(
                'title' => 'Surprise Toys',
                'text'  => 'Delightful collectible surprises inside every egg.',
                'icon'  => 'gift',
                'tone'  => 'pink',
            ),
            array(
                'title' => 'Added Vitamins',
                'text'  => 'Quality treats with added nutritional value.',
                'icon'  => 'vitamins',
                'tone'  => 'yellow',
            ),
        );
    }
}

if ( ! function_exists( 'et_get_home_trust_certification_excludes' ) ) {
    /**
     * Marketing / benefit labels that must not appear in the certifications row.
     *
     * @return array
     */
    function et_get_home_trust_certification_excludes() {
        return array(
            'educational entertainment',
            'surprise toys inside every egg',
            'added vitamins',
            'child safe & certified',
            'child safe and certified',
            'quality products for families',
            'safe & certified',
            'safe and certified',
        );
    }
}

if ( ! function_exists( 'et_home_is_trust_certification_post' ) ) {
    /**
     * @param string $title Post title.
     * @param string $slug  Post slug.
     * @return bool
     */
    function et_home_is_trust_certification_post( $title, $slug ) {
        $excludes = et_get_home_trust_certification_excludes();
        $title_key = strtolower( trim( wp_strip_all_tags( $title ) ) );
        $slug_key  = strtolower( trim( $slug ) );

        foreach ( $excludes as $exclude ) {
            if ( $title_key === $exclude || $slug_key === sanitize_title( $exclude ) ) {
                return false;
            }
        }

        return true;
    }
}

if ( ! function_exists( 'et_get_home_trust_certifications' ) ) {
    function et_get_home_trust_certifications() {
        $certifications = array();

        $query = new WP_Query(
            array(
                'post_type'      => 'front-page',
                'category_name'  => 'committed-to-keeping-children-safe',
                'posts_per_page' => 12,
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
                'no_found_rows'  => true,
            )
        );

        if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
                $query->the_post();

                $slug  = get_post_field( 'post_name', get_the_ID() );
                $title = get_the_title();

                if ( ! et_home_is_trust_certification_post( $title, $slug ) ) {
                    continue;
                }

                if ( 'kids-safety-certified' === $slug ) {
                    $certifications[] = array(
                        'image' => 'https://www.kidsafeseal.com/sealimage/202086142965616237/eggstime_large_darktm.png',
                        'alt'   => 'EggsTime.com is certified by the kidSAFE Seal Program.',
                        'url'   => 'https://www.kidsafeseal.com/certifiedproducts/eggstime.html',
                        'label' => $title,
                    );
                    continue;
                }

                $image = function_exists( 'get_post_featured_image' )
                    ? get_post_featured_image( get_the_ID(), 'medium' )
                    : '';

                if ( empty( $image ) ) {
                    continue;
                }

                $certifications[] = array(
                    'image' => $image,
                    'alt'   => $title,
                    'url'   => '',
                    'label' => $title,
                );
            }

            wp_reset_postdata();
        }

        if ( empty( $certifications ) ) {
            $certifications[] = array(
                'image' => 'https://www.kidsafeseal.com/sealimage/202086142965616237/eggstime_large_darktm.png',
                'alt'   => 'EggsTime.com is certified by the kidSAFE Seal Program.',
                'url'   => 'https://www.kidsafeseal.com/certifiedproducts/eggstime.html',
                'label' => 'kidSAFE Certified',
            );
        }

        return $certifications;
    }
}
