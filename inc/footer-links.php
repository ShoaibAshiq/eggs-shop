<?php
/**
 * Site footer link data for the approved footer layout.
 */

if ( ! function_exists( 'et_footer_page_url' ) ) {
    /**
     * Resolve a WordPress page URL by slug with a home_url fallback.
     *
     * @param string $slug Page slug.
     * @param string $fallback_path Optional path appended to home_url().
     * @return string
     */
    function et_footer_page_url( $slug, $fallback_path = '' ) {
        $page = get_page_by_path( $slug );

        if ( $page instanceof WP_Post ) {
            return get_permalink( $page );
        }

        $path = $fallback_path ? $fallback_path : trailingslashit( $slug );

        return home_url( $path );
    }
}

if ( ! function_exists( 'et_get_footer_social_links' ) ) {
    /**
     * @return array<int, array{label: string, url: string}>
     */
    function et_get_footer_social_links() {
        $contact_url = et_footer_page_url( 'contact-us' );
        $contact_id  = 353;
        $permalink   = get_permalink( $contact_id );

        if ( $permalink ) {
            $contact_url = $permalink;
        }

        return array(
            array(
                'label' => 'YouTube',
                'url'   => 'https://www.youtube.com/channel/UC__ZaY9WHmlVMAJiLjXOwRQ',
                'icon'  => 'fab fa-youtube',
            ),
            array(
                'label' => 'Facebook',
                'url'   => 'https://www.facebook.com/eggstime',
                'icon'  => 'fab fa-facebook-f',
            ),
            array(
                'label' => 'Pinterest',
                'url'   => 'https://www.pinterest.com/eggstime',
                'icon'  => 'fab fa-pinterest-p',
            ),
            array(
                'label' => 'X',
                'url'   => 'https://twitter.com/sweets_choice',
                'icon'  => 'fab fa-twitter',
            ),
            array(
                'label' => 'Instagram',
                'url'   => 'https://www.instagram.com/eggs_time/',
                'icon'  => 'fab fa-instagram',
            ),
            array(
                'label' => 'Email',
                'url'   => $contact_url,
                'icon'  => 'fas fa-envelope',
            ),
        );
    }
}

if ( ! function_exists( 'et_get_footer_columns' ) ) {
    /**
     * @return array<int, array{title: string, links: array<int, array{label: string, url: string}>}>
     */
    function et_get_footer_columns() {
        return array(
            array(
                'title' => 'Support',
                'links' => array(
                    array(
                        'label' => 'Store Locator',
                        'url'   => et_footer_page_url( 'store-locator' ),
                    ),
                    array(
                        'label' => 'Contact Us',
                        'url'   => et_footer_page_url( 'contact-us' ),
                    ),
                ),
            ),
            array(
                'title' => 'About Us',
                'links' => array(
                    array(
                        'label' => 'Press',
                        'url'   => et_footer_page_url( 'press' ),
                    ),
                    array(
                        'label' => 'Terms of Use',
                        'url'   => et_footer_page_url( 'terms-of-use' ),
                    ),
                    array(
                        'label' => 'Privacy Policy',
                        'url'   => et_footer_page_url( 'privacy-policy' ),
                    ),
                    array(
                        'label' => "Children's Privacy Policy",
                        'url'   => et_footer_page_url( 'childrens-privacy-policy', '/childrens-privacy-policy/' ),
                    ),
                    array(
                        'label' => 'Return Policy',
                        'url'   => et_footer_page_url( 'return-policy' ),
                    ),
                    array(
                        'label' => 'Shipping Policy',
                        'url'   => et_footer_page_url( 'shipping-policy' ),
                    ),
                ),
            ),
            array(
                'title' => 'Business & Partnerships',
                'links' => array(
                    array(
                        'label' => 'Licensing Opportunities',
                        'url'   => et_footer_page_url( 'license' ),
                    ),
                    array(
                        'label' => 'Influencers & Creators',
                        'url'   => et_footer_page_url( 'influencers-creators', '/influencers-creators/' ),
                    ),
                    array(
                        'label' => 'Resellers & Distributors',
                        'url'   => et_footer_page_url( 'resale' ),
                    ),
                    array(
                        'label' => 'Retail Partners',
                        'url'   => et_footer_page_url( 'retail-partners', '/retail-partners/' ),
                    ),
                ),
            ),
            array(
                'title' => 'Catalogs',
                'links' => array(
                    array(
                        'label' => 'Request a Catalog',
                        'url'   => et_footer_page_url( 'catalogue-request', '/catalogue-request/' ),
                    ),
                    array(
                        'label' => 'Browse Digital Catalog',
                        'url'   => et_footer_page_url( 'digital-catalogue', '/digital-catalogue/' ),
                    ),
                ),
            ),
        );
    }
}
