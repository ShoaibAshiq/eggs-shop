<?php
/**
 * Home v2 — Stories That Teach & Inspire
 */

$et_home_stories_url = 'https://eggstime.com/our-story/';

$et_home_stories = array(
    array(
        'title'    => 'Rainbow and the Cloud',
        'duration' => '8 min',
        'age'      => 'Ages 3+',
        'video_id' => 'bKLkfUwI8ik',
        'is_new'   => true,
    ),
    array(
        'title'    => 'The Dry, Thin Tree',
        'duration' => '12 min',
        'age'      => 'Ages 4+',
        'video_id' => 'iHT-YEZvsG0',
        'is_new'   => false,
    ),
    array(
        'title'    => 'Mysterious Leaf',
        'duration' => '10 min',
        'age'      => 'Ages 3+',
        'video_id' => 'XstD5DZ0ADk',
        'is_new'   => false,
    ),
    array(
        'title'    => 'The Broken Humpty Dumpty',
        'duration' => '9 min',
        'age'      => 'Ages 3+',
        'video_id' => 'EUmdwuOh5KM',
        'is_new'   => false,
    ),
);
?>
<section id="et-home-stories" class="et-home__stories" aria-labelledby="et-home-stories-title">
    <div class="et-home__stories-bg" aria-hidden="true"></div>
    <div class="et-home__section-inner center">
        <div class="et-home__stories-head">
            <div class="et-home__stories-intro">
                <p class="et-home__section-kicker">Educational Adventures</p>
                <h2 class="et-home__section-title" id="et-home-stories-title">Stories That Teach &amp; Inspire</h2>
            </div>
            <a href="<?php echo esc_url( $et_home_stories_url ); ?>" class="et-home__stories-all">
                View All Stories
            </a>
        </div>

        <div class="et-home__stories-slider-wrap">
            <ul class="et-home__stories-grid et-home__stories-slider">
            <?php foreach ( $et_home_stories as $story ) : ?>
                <?php
                $video_url   = 'https://www.youtube.com/watch?v=' . $story['video_id'];
                $thumb_url   = 'https://img.youtube.com/vi/' . $story['video_id'] . '/hqdefault.jpg';
                ?>
                <li class="et-home__story-item">
                    <article class="et-home__story-card">
                        <a
                            href="<?php echo esc_url( $video_url ); ?>"
                            class="et-home__story-thumb fancybox"
                            data-fancybox="et-home-stories"
                            data-caption="<?php echo esc_attr( $story['title'] ); ?>"
                            aria-label="<?php echo esc_attr( sprintf( 'Watch %s', $story['title'] ) ); ?>"
                        >
                            <img
                                src="<?php echo esc_url( $thumb_url ); ?>"
                                alt="<?php echo esc_attr( $story['title'] ); ?>"
                                class="et-home__story-image"
                                loading="lazy"
                                decoding="async"
                            />
                            <?php if ( ! empty( $story['is_new'] ) ) : ?>
                                <span class="et-home__story-badge">New</span>
                            <?php endif; ?>
                            <span class="et-home__story-play" aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M9 7.5v9l7.5-4.5L9 7.5z"/>
                                </svg>
                            </span>
                        </a>

                        <div class="et-home__story-body">
                            <h3 class="et-home__story-title"><?php echo esc_html( $story['title'] ); ?></h3>
                            <div class="et-home__story-meta">
                                <span class="et-home__story-meta-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <circle cx="12" cy="12" r="9"/>
                                        <path d="M12 7v5l3 2"/>
                                    </svg>
                                    <?php echo esc_html( $story['duration'] ); ?>
                                </span>
                                <span class="et-home__story-meta-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <circle cx="12" cy="8" r="4"/>
                                        <path d="M5 20c0-3.3 3.1-6 7-6s7 2.7 7 6"/>
                                    </svg>
                                    <?php echo esc_html( $story['age'] ); ?>
                                </span>
                            </div>
                        </div>
                    </article>
                </li>
            <?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>
