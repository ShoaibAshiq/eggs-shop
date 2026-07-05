<?php
/**
 * Toys page — Collect, Play & Learn section
 */
$et_toys_collect_cards = function_exists( 'et_get_toys_collect_cards' )
    ? et_get_toys_collect_cards()
    : array();

$et_toys_collect_explore_url = function_exists( 'et_get_toys_collect_explore_url' )
    ? et_get_toys_collect_explore_url()
    : home_url( '/product-category/toys/' );
?>
<section class="et-toys-collect" id="et-toys-collect" aria-labelledby="et-toys-collect-title">
    <div class="et-toys-collect__sky" aria-hidden="true">
        <span class="et-toys-collect__star et-toys-collect__star--1">★</span>
        <span class="et-toys-collect__star et-toys-collect__star--2">★</span>
        <span class="et-toys-collect__star et-toys-collect__star--3">★</span>
        <span class="et-toys-collect__cloud et-toys-collect__cloud--1"></span>
        <span class="et-toys-collect__cloud et-toys-collect__cloud--2"></span>
    </div>

    <div class="et-toys-collect__inner center">
        <header class="et-toys-collect__head">
            <div class="et-toys-collect__head-row">
                <div class="et-toys-collect__eyebrow-wrap">
                    <span class="et-toys-collect__logo" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" role="img" aria-label="">
                            <rect x="1" y="1" width="14" height="14" rx="3" fill="#e91e8c"/>
                            <rect x="17" y="1" width="14" height="14" rx="3" fill="#ffcc00"/>
                            <rect x="1" y="17" width="14" height="14" rx="3" fill="#1a9fe0"/>
                            <rect x="17" y="17" width="14" height="14" rx="3" fill="#27ae60"/>
                        </svg>
                    </span>
                    <p class="et-toys-collect__eyebrow">
                        Toys &amp; Creative Play
                        <span class="et-toys-collect__badge">NEW</span>
                    </p>
                </div>

                <a href="<?php echo esc_url( $et_toys_collect_explore_url ); ?>" class="et-toys-collect__explore-all">
                    <span class="et-toys-collect__explore-all-label">Explore All Collections</span>
                    <span class="et-toys-collect__explore-all-icon" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                            <path d="M9 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                </a>
            </div>

            <h2 class="et-toys-collect__title" id="et-toys-collect-title">
                <span class="et-toys-collect__title-part">Collect,</span>
                <span class="et-toys-collect__title-part et-toys-collect__title-part--play">Play</span>
                <span class="et-toys-collect__title-part">&amp; Learn</span>
            </h2>

            <p class="et-toys-collect__subtitle">
                Discover toys, puzzles, and collectibles from every Eggs Time world.
            </p>
        </header>

        <?php if ( ! empty( $et_toys_collect_cards ) ) : ?>
            <div class="et-toys-collect__slider-wrap">
                <ul class="et-toys-collect__grid et-toys-collect__slider">
                    <?php foreach ( $et_toys_collect_cards as $card ) : ?>
                        <li class="et-toys-collect__item">
                            <article class="et-toys-collect__card et-toys-collect__card--<?php echo esc_attr( $card['tone'] ); ?>">
                                <span class="et-toys-collect__card-icon" aria-hidden="true">
                                    <?php echo esc_html( $card['icon'] ); ?>
                                </span>

                                <div class="et-toys-collect__card-media">
                                    <img
                                        src="<?php echo esc_url( $card['image'] ); ?>"
                                        alt="<?php echo esc_attr( $card['title'] ); ?>"
                                        class="et-toys-collect__card-img"
                                        loading="lazy"
                                        decoding="async"
                                    />
                                </div>

                                <div class="et-toys-collect__card-body">
                                    <h3 class="et-toys-collect__card-title"><?php echo esc_html( $card['title'] ); ?></h3>
                                    <p class="et-toys-collect__card-desc"><?php echo esc_html( $card['description'] ); ?></p>
                                    <a href="<?php echo esc_url( $card['url'] ); ?>" class="et-toys-collect__card-btn">
                                        <span class="et-toys-collect__card-btn-label">Explore Collection</span>
                                        <span class="et-toys-collect__card-btn-icon" aria-hidden="true">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                                                <path d="M9 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            </article>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>

    <div class="et-toys-collect__grass" aria-hidden="true">
        <span class="et-toys-collect__flower et-toys-collect__flower--1"></span>
        <span class="et-toys-collect__flower et-toys-collect__flower--2"></span>
        <span class="et-toys-collect__flower et-toys-collect__flower--3"></span>
        <span class="et-toys-collect__flower et-toys-collect__flower--4"></span>
    </div>
</section>
