<?php
/**
 * Home v2 — Watch & Learn
 */

$et_home_youtube_channel = 'https://www.youtube.com/@EggsTime';

$et_home_youtube_featured = array(
    'video_id' => 'k7sCqCZi2Q8',
    'title'    => 'The Broken Humpty Dumpty',
    'duration' => '12:30',
);

$et_home_youtube_list = array(
    array(
        'title'    => 'The Sleepover',
        'video_id' => 'KVBKnGX11Xw',
        'duration' => '12:45',
    ),
    array(
        'title'    => 'The Real Christmas on Lucky Island',
        'video_id' => 'Qv0BI72b1lI',
        'duration' => '15:20',
    ),
    array(
        'title'    => 'The Guiding Star',
        'video_id' => 'I8E_rZ6udJY',
        'duration' => '11:08',
    ),
    array(
        'title'    => 'Cookie Trouble',
        'video_id' => 'EUmdwuOh5KM',
        'duration' => '10:32',
    ),
);

$featured_url   = 'https://www.youtube.com/watch?v=' . $et_home_youtube_featured['video_id'];
$featured_thumb = 'https://img.youtube.com/vi/' . $et_home_youtube_featured['video_id'] . '/hqdefault.jpg';
?>
<section id="et-home-youtube" class="et-home__youtube" aria-labelledby="et-home-youtube-title">
    <div class="et-home__section-inner center">
        <div class="et-home__youtube-panel">
            <div class="et-home__youtube-bg" aria-hidden="true"></div>

            <div class="et-home__youtube-intro">
                <div class="et-home__youtube-intro-mark" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" fill="none">
                        <rect x="6" y="10" width="36" height="26" rx="4" fill="#1a9fe0"/>
                        <rect x="10" y="14" width="28" height="18" rx="2" fill="#ffffff"/>
                        <circle cx="24" cy="23" r="6" fill="#e91e8c"/>
                        <path d="M22 21l5 3-5 3v-6z" fill="#ffffff"/>
                        <path d="M18 36h12" stroke="#1a9fe0" stroke-width="3" stroke-linecap="round"/>
                    </svg>
                </div>
                <div class="et-home__youtube-intro-copy">
                    <p class="et-home__section-kicker">Watch, Learn &amp; Have Fun</p>
                    <h2 class="et-home__youtube-heading" id="et-home-youtube-title">
                        Watch &amp; Learn
                        <span class="et-home__youtube-heading-spark" aria-hidden="true">
                            <span></span><span></span><span></span>
                        </span>
                    </h2>
                </div>
            </div>

            <div class="et-home__youtube-layout">
                <div class="et-home__youtube-featured">
                    <a
                        href="<?php echo esc_url( $featured_url ); ?>"
                        class="et-home__youtube-featured-link fancybox"
                        data-fancybox="et-home-youtube"
                        data-caption="<?php echo esc_attr( $et_home_youtube_featured['title'] ); ?>"
                        aria-label="<?php echo esc_attr( sprintf( 'Watch %s', $et_home_youtube_featured['title'] ) ); ?>"
                    >
                        <img
                            src="<?php echo esc_url( $featured_thumb ); ?>"
                            alt="<?php echo esc_attr( $et_home_youtube_featured['title'] ); ?>"
                            class="et-home__youtube-featured-image"
                            loading="lazy"
                            decoding="async"
                        />
                        <span class="et-home__youtube-play et-home__youtube-play--large" aria-hidden="true">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M9 7.5v9l7.5-4.5L9 7.5z"/>
                            </svg>
                        </span>
                        <div class="et-home__youtube-player-chrome" aria-hidden="true">
                            <span class="et-home__youtube-player-btn et-home__youtube-player-btn--pause">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><rect x="7" y="6" width="3" height="12" rx="1"/><rect x="14" y="6" width="3" height="12" rx="1"/></svg>
                            </span>
                            <span class="et-home__youtube-player-track">
                                <span class="et-home__youtube-player-progress" style="width: 42%;"></span>
                            </span>
                            <span class="et-home__youtube-player-time">05:15 / <?php echo esc_html( $et_home_youtube_featured['duration'] ); ?></span>
                            <span class="et-home__youtube-player-btn et-home__youtube-player-btn--vol">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M11 5 6 9H3v6h3l5 4V5zm4.5 3.5a4.5 4.5 0 010 7 1 1 0 011.4-1.4 2.5 2.5 0 000-4.2 1 1 0 01-1.4-1.4zm3 3a7.5 7.5 0 010 0 1 1 0 011.4 1.4 5.5 5.5 0 000-9.8 1 1 0 01-1.4 1.4z"/></svg>
                            </span>
                            <span class="et-home__youtube-player-btn et-home__youtube-player-btn--fs">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M7 3H3v4h2V5h2V3zm14 0h-4v2h2v2h2V3zM5 19H3v-2h2v-2h2v4zm16 0h-4v-2h2v-2h2v4z"/></svg>
                            </span>
                        </div>
                    </a>
                </div>

                <ul class="et-home__youtube-list">
                    <?php foreach ( $et_home_youtube_list as $index => $video ) : ?>
                        <?php
                        $video_url = 'https://www.youtube.com/watch?v=' . $video['video_id'];
                        $thumb_url = 'https://img.youtube.com/vi/' . $video['video_id'] . '/hqdefault.jpg';
                        $num       = str_pad( (string) ( $index + 1 ), 2, '0', STR_PAD_LEFT );
                        $is_active = 0 === $index;
                        ?>
                        <li class="et-home__youtube-list-item<?php echo $is_active ? ' is-active' : ''; ?>">
                            <a
                                href="<?php echo esc_url( $video_url ); ?>"
                                class="et-home__youtube-list-link fancybox"
                                data-fancybox="et-home-youtube"
                                data-caption="<?php echo esc_attr( $video['title'] ); ?>"
                                aria-label="<?php echo esc_attr( sprintf( 'Watch %s', $video['title'] ) ); ?>"
                            >
                                <span class="et-home__youtube-list-thumb">
                                    <img
                                        src="<?php echo esc_url( $thumb_url ); ?>"
                                        alt=""
                                        class="et-home__youtube-list-image"
                                        loading="lazy"
                                        decoding="async"
                                    />
                                    <span class="et-home__youtube-play et-home__youtube-play--small" aria-hidden="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M9 7.5v9l7.5-4.5L9 7.5z"/>
                                        </svg>
                                    </span>
                                </span>
                                <span class="et-home__youtube-list-num"><?php echo esc_html( $num ); ?></span>
                                <span class="et-home__youtube-list-text">
                                    <span class="et-home__youtube-list-title"><?php echo esc_html( $video['title'] ); ?></span>
                                    <?php if ( ! empty( $video['duration'] ) ) : ?>
                                        <span class="et-home__youtube-list-duration"><?php echo esc_html( $video['duration'] ); ?></span>
                                    <?php endif; ?>
                                </span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <aside class="et-home__youtube-subscribe">
                    <div class="et-home__youtube-subscribe-icon" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M23.5 6.2a3 3 0 0 0-2.1-2.1C19.5 3.6 12 3.6 12 3.6s-7.5 0-9.4.5A3 3 0 0 0 .5 6.2 31.3 31.3 0 0 0 0 12a31.3 31.3 0 0 0 .5 5.8 3 3 0 0 0 2.1 2.1c1.9.5 9.4.5 9.4.5s7.5 0 9.4-.5a3 3 0 0 0 2.1-2.1A31.3 31.3 0 0 0 24 12a31.3 31.3 0 0 0-.5-5.8zM9.6 15.6V8.4L15.8 12 9.6 15.6z"/>
                        </svg>
                    </div>
                    <h3 class="et-home__youtube-subscribe-title">Join Our Channel!</h3>
                    <p class="et-home__youtube-subscribe-text">Subscribe for new videos, songs, and stories from the Eggs Time world!</p>
                    <a
                        href="<?php echo esc_url( $et_home_youtube_channel ); ?>"
                        class="et-home__youtube-subscribe-btn"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        Subscribe
                    </a>
                </aside>
            </div>
        </div>
    </div>
</section>
