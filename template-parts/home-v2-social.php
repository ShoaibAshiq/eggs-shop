<?php
/**
 * Home v2 — Join the Eggs Time Community
 */

$et_home_social_logo = get_template_directory_uri() . '/images/eggs_time_logo.png';

$et_home_social_cards = array(
    array(
        'platform'    => 'instagram',
        'name'        => 'Instagram',
        'handle'      => '@eggstime_official',
        'url'         => 'https://www.instagram.com/eggstime_official/',
        'type'        => 'Lifestyle',
        'type_color'  => '#e1306c',
        'images'      => array( 'https://eggstime.com/wp-content/uploads/2017/12/banner3-min.jpg' ),
        'play'        => true,
        'description' => 'Fun moments, creative play and surprise egg adventures!',
        'cta'         => 'Follow Us',
    ),
    array(
        'platform'    => 'tiktok',
        'name'        => 'TikTok',
        'handle'      => '@eggstime_official',
        'url'         => 'https://www.tiktok.com/@eggstime_official',
        'type'        => 'Short Videos',
        'type_color'  => '#27ae60',
        'images'      => array( 'https://img.youtube.com/vi/KVBKnGX11Xw/hqdefault.jpg' ),
        'play'        => true,
        'video'       => 'https://www.youtube.com/watch?v=KVBKnGX11Xw',
        'description' => 'Quick, fun and engaging videos kids love!',
        'cta'         => 'Follow Us',
    ),
    array(
        'platform'    => 'facebook',
        'name'        => 'Facebook',
        'handle'      => '@eggstime',
        'url'         => 'https://www.facebook.com/eggstime',
        'type'        => 'Community',
        'type_color'  => '#1877f2',
        'images'      => array( 'https://img.youtube.com/vi/Qv0BI72b1lI/hqdefault.jpg' ),
        'play'        => true,
        'video'       => 'https://www.youtube.com/watch?v=Qv0BI72b1lI',
        'description' => 'Join our community for updates, events and lots of fun!',
        'cta'         => 'Follow Us',
    ),
    array(
        'platform'    => 'youtube',
        'name'        => 'YouTube',
        'handle'      => 'Eggs Time',
        'url'         => 'https://www.youtube.com/@EggsTime',
        'type'        => 'Stories & Learning',
        'type_color'  => '#ff0000',
        'images'      => array( 'https://img.youtube.com/vi/bKLkfUwI8ik/hqdefault.jpg' ),
        'play'        => true,
        'video'       => 'https://www.youtube.com/watch?v=bKLkfUwI8ik',
        'description' => 'Stories, learning videos and exciting egg surprises!',
        'cta'         => 'Subscribe',
    ),
    array(
        'platform'    => 'world',
        'name'        => 'Eggs Time World',
        'handle'      => '@eggstime.world',
        'url'         => 'https://www.instagram.com/eggstime.world/',
        'type'        => 'Fun & Play',
        'type_color'  => '#f39c12',
        'images'      => array( 'https://img.youtube.com/vi/I8E_rZ6udJY/hqdefault.jpg' ),
        'play'        => true,
        'video'       => 'https://www.youtube.com/watch?v=I8E_rZ6udJY',
        'description' => 'Games, activities and fun for the whole family!',
        'cta'         => 'Follow Us',
    ),
);
?>
<section id="et-home-social" class="et-home__social et-home__playful-section" aria-labelledby="et-home-social-title">
    <div class="et-home__social-bg" aria-hidden="true"></div>
    <div class="et-home__section-inner center">
        <div class="et-home__social-intro">
            <img
                src="<?php echo esc_url( $et_home_social_logo ); ?>"
                alt=""
                class="et-home__social-logo"
                loading="lazy"
                decoding="async"
            />
            <p class="et-home__section-kicker et-home__section-kicker--stars">
                <span class="et-home__section-star" aria-hidden="true">★</span>
                Follow, Share &amp; Inspire
                <span class="et-home__section-star" aria-hidden="true">★</span>
            </p>
            <h2 class="et-home__social-title" id="et-home-social-title">
                Join the <span class="et-home__social-title-accent">Eggs Time</span> Community
            </h2>
            <p class="et-home__social-lead">Be part of our global family! Follow us for fun videos, learning ideas, exclusive updates, and exciting surprises.</p>
        </div>

        <ul class="et-home__social-grid">
            <?php foreach ( $et_home_social_cards as $card ) : ?>
                <?php
                $card_class = 'et-home__social-card et-home__social-card--' . esc_attr( $card['platform'] );
                ?>
                <li class="et-home__social-item">
                    <article class="<?php echo esc_attr( $card_class ); ?>">
                        <a href="<?php echo esc_url( $card['url'] ); ?>" class="et-home__social-head" target="_blank" rel="noopener noreferrer">
                            <span class="et-home__social-brand" aria-hidden="true">
                                <?php if ( 'instagram' === $card['platform'] ) : ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.881 1.44 1.44 0 0 0 0-2.881z"/>
                                    </svg>
                                <?php elseif ( 'tiktok' === $card['platform'] ) : ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M16.5 3c.4 2.2 1.8 4 4 4.5v3.4c-1.6 0-3.1-.5-4.4-1.4v6.8c0 3.4-2.8 6.2-6.2 6.2S3.7 19.7 3.7 16.3s2.8-6.2 6.2-6.2c.4 0 .8 0 1.2.1v3.6a2.7 2.7 0 1 0 1.9 2.6V3h3.5z"/>
                                    </svg>
                                <?php elseif ( 'facebook' === $card['platform'] ) : ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M13.5 8.5H16V5.7C15.4 5.6 14 5.5 12.4 5.5 9.3 5.5 7.2 7.3 7.2 10.8v2.2H4.5v3.2h2.7V22h3.9v-5.8h3.2l.5-3.2h-3.7v-1.9c0-1 .3-1.7 1.7-1.7z"/>
                                    </svg>
                                <?php elseif ( 'world' === $card['platform'] ) : ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                        <ellipse cx="8.5" cy="14" rx="4.5" ry="5.5"/>
                                        <ellipse cx="15.5" cy="14" rx="4.5" ry="5.5"/>
                                        <ellipse cx="12" cy="8.5" rx="4.5" ry="5.5"/>
                                    </svg>
                                <?php else : ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M23.5 6.2a3 3 0 0 0-2.1-2.1C19.5 3.6 12 3.6 12 3.6s-7.5 0-9.4.5A3 3 0 0 0 .5 6.2 31.3 31.3 0 0 0 0 12a31.3 31.3 0 0 0 .5 5.8 3 3 0 0 0 2.1 2.1c1.9.5 9.4.5 9.4.5s7.5 0 9.4-.5a3 3 0 0 0 2.1-2.1A31.3 31.3 0 0 0 24 12a31.3 31.3 0 0 0-.5-5.8zM9.6 15.6V8.4L15.8 12 9.6 15.6z"/>
                                    </svg>
                                <?php endif; ?>
                            </span>
                            <span class="et-home__social-meta">
                                <span class="et-home__social-name"><?php echo esc_html( $card['name'] ); ?></span>
                                <span class="et-home__social-handle"><?php echo esc_html( $card['handle'] ); ?></span>
                            </span>
                        </a>

                        <?php if ( ! empty( $card['type'] ) ) : ?>
                            <p class="et-home__social-type" style="--et-social-type-color: <?php echo esc_attr( $card['type_color'] ); ?>;">
                                <?php echo esc_html( $card['type'] ); ?>
                            </p>
                        <?php endif; ?>

                        <div class="et-home__social-media">
                            <a
                                href="<?php echo esc_url( ! empty( $card['video'] ) ? $card['video'] : $card['url'] ); ?>"
                                class="et-home__social-media-link et-home__social-media-link--single<?php echo ! empty( $card['video'] ) ? ' fancybox' : ''; ?>"
                                <?php echo ! empty( $card['video'] ) ? 'data-fancybox="et-home-social"' : 'target="_blank" rel="noopener noreferrer"'; ?>
                            >
                                <img src="<?php echo esc_url( $card['images'][0] ); ?>" alt="<?php echo esc_attr( $card['name'] ); ?>" class="et-home__social-media-image" loading="lazy" decoding="async" />
                                <?php if ( ! empty( $card['play'] ) ) : ?>
                                    <span class="et-home__social-play" aria-hidden="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M9 7.5v9l7.5-4.5L9 7.5z"/>
                                        </svg>
                                    </span>
                                <?php endif; ?>
                            </a>
                        </div>

                        <div class="et-home__social-foot">
                            <?php if ( ! empty( $card['description'] ) ) : ?>
                                <div class="et-home__social-copy">
                                    <span class="et-home__social-desc"><?php echo esc_html( $card['description'] ); ?></span>
                                </div>
                            <?php endif; ?>

                            <a href="<?php echo esc_url( $card['url'] ); ?>" class="et-home__social-cta" target="_blank" rel="noopener noreferrer">
                                <?php echo esc_html( ! empty( $card['cta'] ) ? $card['cta'] : 'Visit Channel' ); ?>
                                <span class="et-home__social-cta-icon" aria-hidden="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h12M13 7l5 5-5 5"/>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </article>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
