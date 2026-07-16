<?php
/**
 * Home v2 — Interested in Our Products? (partnership cards)
 */

$et_home_cta_logo = get_template_directory_uri() . '/images/eggs_time_logo.png';

$et_home_cta_cards = array(
    array(
        'title'    => 'Become a Retail Partner',
        'text'     => 'Bring our beloved surprise eggs to families in your store.',
        'url'      => home_url( '/resale/' ),
        'tone'     => 'blue',
        'benefits' => array(
            array( 'icon' => 'cart', 'text' => 'High-quality, kid-loved products' ),
            array( 'icon' => 'tag', 'text' => 'Attractive margins for partners' ),
            array( 'icon' => 'truck', 'text' => 'Easy ordering & fast delivery' ),
        ),
    ),
    array(
        'title'    => 'Become a Distributor',
        'text'     => 'Expand the Eggs Time brand into new markets worldwide.',
        'url'      => home_url( '/contact-us/' ),
        'tone'     => 'yellow',
        'benefits' => array(
            array( 'icon' => 'smile', 'text' => 'Global brand with growing demand' ),
            array( 'icon' => 'chart', 'text' => 'Exclusive territory opportunities' ),
            array( 'icon' => 'shield', 'text' => 'Marketing & sales support' ),
        ),
    ),
    array(
        'title'    => 'Collaborate With Eggs Time',
        'text'     => 'Join our exciting and creative partnerships with our team.',
        'url'      => home_url( '/license/' ),
        'tone'     => 'pink',
        'benefits' => array(
            array( 'icon' => 'star', 'text' => 'Exciting brand partnerships' ),
            array( 'icon' => 'people', 'text' => 'Reach millions of fans worldwide' ),
            array( 'icon' => 'heart', 'text' => 'Create amazing experiences together' ),
        ),
    ),
);
?>
<section class="et-home__cta et-home__playful-section" aria-labelledby="et-home-cta-title">
    <div class="et-home__cta-bg" aria-hidden="true"></div>

    <div class="et-home__cta-inner center">
        <div class="et-home__cta-content">
            <img
                src="<?php echo esc_url( $et_home_cta_logo ); ?>"
                alt=""
                class="et-home__cta-logo"
                loading="lazy"
                decoding="async"
            />
            <h2 class="et-home__cta-title" id="et-home-cta-title">Interested in Our Products?</h2>
            <p class="et-home__cta-text">Partner with Eggs Time through retail, distribution, or creative collaboration.</p>

            <div class="et-home__cta-cards-slider-wrap">
                <ul class="et-home__cta-cards et-home__cta-cards-slider">
                    <?php foreach ( $et_home_cta_cards as $card ) : ?>
                        <li class="et-home__cta-card-item">
                            <article class="et-home__cta-card et-home__cta-card--<?php echo esc_attr( $card['tone'] ); ?>">
                                <div class="et-home__cta-card-head">
                                    <div class="et-home__cta-card-icon" aria-hidden="true">
                                        <?php
                                        $card_icon = 'blue' === $card['tone'] ? 'store' : ( 'yellow' === $card['tone'] ? 'globe' : 'clapperboard' );
                                        echo et_home_icon( $card_icon, array( 'size' => '2x' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                        ?>
                                    </div>
                                </div>

                                <div class="et-home__cta-card-body">
                                    <h3 class="et-home__cta-card-title"><?php echo esc_html( $card['title'] ); ?></h3>
                                    <p class="et-home__cta-card-desc"><?php echo esc_html( $card['text'] ); ?></p>

                                    <?php if ( ! empty( $card['benefits'] ) ) : ?>
                                        <ul class="et-home__cta-card-benefits">
                                            <?php foreach ( $card['benefits'] as $benefit ) : ?>
                                                <li class="et-home__cta-card-benefit">
                                                    <span class="et-home__cta-card-benefit-icon et-home__cta-card-benefit-icon--<?php echo esc_attr( $card['tone'] ); ?>" aria-hidden="true">
                                                        <?php echo et_home_icon( $benefit['icon'] ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                                    </span>
                                                    <span class="et-home__cta-card-benefit-text"><?php echo esc_html( $benefit['text'] ); ?></span>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>

                                <a href="<?php echo esc_url( $card['url'] ); ?>" class="et-home__cta-card-action">
                                    Get Started
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <path d="M5 12h12M13 7l5 5-5 5"/>
                                    </svg>
                                </a>
                            </article>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>
