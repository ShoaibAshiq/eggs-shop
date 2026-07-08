<?php
/**
 * Site footer — approved dark-blue layout.
 */

$et_footer_columns = function_exists( 'et_get_footer_columns' ) ? et_get_footer_columns() : array();
$et_footer_social  = function_exists( 'et_get_footer_social_links' ) ? et_get_footer_social_links() : array();
$et_footer_logo    = trailingslashit( get_template_directory_uri() ) . 'images/eggs_time_logo.png';
?>
<footer class="et-footer" id="site-footer" aria-label="Site footer">
    <div class="et-footer__inner center">
        <div class="et-footer__top">
            <div class="et-footer__brand">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="et-footer__logo-link">
                    <img
                        src="<?php echo esc_url( $et_footer_logo ); ?>"
                        alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"
                        class="et-footer__logo"
                        width="220"
                        height="72"
                        loading="lazy"
                        decoding="async"
                    />
                </a>
                <p class="et-footer__tagline">Great brands. Happy kids. Strong business.</p>

                <?php if ( ! empty( $et_footer_social ) ) : ?>
                    <ul class="et-footer__social" aria-label="Social media">
                        <?php foreach ( $et_footer_social as $social ) : ?>
                            <li class="et-footer__social-item">
                                <a
                                    class="et-footer__social-link"
                                    href="<?php echo esc_url( $social['url'] ); ?>"
                                    target="<?php echo ( 0 === strpos( $social['url'], 'http' ) ) ? '_blank' : '_self'; ?>"
                                    <?php echo ( 0 === strpos( $social['url'], 'http' ) ) ? 'rel="noopener noreferrer"' : ''; ?>
                                    aria-label="<?php echo esc_attr( $social['label'] ); ?>"
                                >
                                    <?php if ( ! empty( $social['icon'] ) ) : ?>
                                        <i class="<?php echo esc_attr( $social['icon'] ); ?>" aria-hidden="true"></i>
                                    <?php endif; ?>
                                    <span class="et-footer__social-label"><?php echo esc_html( $social['label'] ); ?></span>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>

            <div class="et-footer__nav">
                <?php foreach ( $et_footer_columns as $index => $column ) : ?>
                    <?php
                    $panel_id = 'et-footer-panel-' . ( $index + 1 );
                    ?>
                    <section class="et-footer__column et-footer__accordion-item">
                        <h2 class="et-footer__column-title">
                            <button
                                type="button"
                                class="et-footer__accordion-toggle"
                                aria-expanded="false"
                                aria-controls="<?php echo esc_attr( $panel_id ); ?>"
                            >
                                <span class="et-footer__accordion-label"><?php echo esc_html( $column['title'] ); ?></span>
                                <span class="et-footer__accordion-chevron" aria-hidden="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg>
                                </span>
                            </button>
                        </h2>
                        <div class="et-footer__accordion-panel" id="<?php echo esc_attr( $panel_id ); ?>">
                            <ul class="et-footer__links">
                                <?php foreach ( $column['links'] as $link ) : ?>
                                    <li class="et-footer__links-item">
                                        <a href="<?php echo esc_url( $link['url'] ); ?>"><?php echo esc_html( $link['label'] ); ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </section>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="et-footer__bottom">
            <p class="et-footer__copyright">
                Copyright &copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> Sweets Choice. All rights reserved.
            </p>
            <p class="et-footer__legal">
                Copying any part of this website without written permission from the owner is a violation of federal law and may result in criminal prosecution and civil liability.
            </p>
        </div>
    </div>
</footer>
