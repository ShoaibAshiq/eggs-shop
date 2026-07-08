<?php
/**
 * License page — Why / Partners / Process (3 columns)
 */

$et_license_why_items = array(
    'Original family-friendly characters and brands',
    'Educational and entertaining content',
    'Established product portfolio',
    'Global licensing opportunities',
    'Marketing and promotional support',
);

$et_license_partners = array(
    array( 'label' => 'Manufacturers', 'icon' => 'fa-industry', 'color' => '#7b5ea7' ),
    array( 'label' => 'Distributors', 'icon' => 'fa-truck', 'color' => '#27ae60' ),
    array( 'label' => 'Retailers', 'icon' => 'fa-store', 'color' => '#e67e22' ),
    array( 'label' => 'Licensing Agents', 'icon' => 'fa-user-tie', 'color' => '#3498db' ),
    array( 'label' => 'Promotional Partners', 'icon' => 'fa-bullhorn', 'color' => '#e91e8c' ),
    array( 'label' => 'International Business Partners', 'icon' => 'fa-globe-americas', 'color' => '#2b7bbf' ),
);

$et_license_process = array(
    array( 'num' => '1', 'label' => 'Submit Inquiry', 'icon' => 'fa-paper-plane', 'color' => '#2b7bbf' ),
    array( 'num' => '2', 'label' => 'Opportunity Review', 'icon' => 'fa-search', 'color' => '#27ae60' ),
    array( 'num' => '3', 'label' => 'Category & Territory Discussion', 'icon' => 'fa-comments', 'color' => '#f39c12' ),
    array( 'num' => '4', 'label' => 'Licensing Agreement', 'icon' => 'fa-file-signature', 'color' => '#e91e8c' ),
    array( 'num' => '5', 'label' => 'Product Development & Launch', 'icon' => 'fa-rocket', 'color' => '#7b5ea7' ),
);

$et_license_characters_img = function_exists( 'et_get_license_why_characters_image' )
    ? et_get_license_why_characters_image()
    : trailingslashit( get_template_directory_uri() ) . 'images/license-why-characters.png';
?>
<section class="et-license__info" aria-label="Licensing information">
    <div class="et-license__section-inner center">
        <div class="et-license__info-grid">

            <article class="et-license__info-card et-license__info-card--why">
                <h3 class="et-license__info-card-title">Why License Eggs Time?</h3>
                <ul class="et-license__checklist">
                    <?php foreach ( $et_license_why_items as $item ) : ?>
                        <li class="et-license__checklist-item">
                            <span class="et-license__check-icon" aria-hidden="true">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="et-license__checklist-text"><?php echo esc_html( $item ); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="et-license__info-illustration">
                    <img
                        src="<?php echo esc_url( $et_license_characters_img ); ?>"
                        alt="Eggs Time characters"
                        class="et-license__info-characters"
                        loading="lazy"
                        decoding="async"
                    />
                </div>
            </article>

            <article class="et-license__info-card et-license__info-card--partners">
                <h3 class="et-license__info-card-title">Who We Work With</h3>
                <ul class="et-license__partners-grid">
                    <?php foreach ( $et_license_partners as $partner ) : ?>
                        <li class="et-license__partner-item">
                            <span
                                class="et-license__partner-icon"
                                style="--et-partner-color: <?php echo esc_attr( $partner['color'] ); ?>;"
                                aria-hidden="true"
                            >
                                <i class="fas <?php echo esc_attr( $partner['icon'] ); ?>"></i>
                            </span>
                            <span class="et-license__partner-label"><?php echo esc_html( $partner['label'] ); ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </article>

            <article class="et-license__info-card et-license__info-card--process">
                <h3 class="et-license__info-card-title">Our Licensing Process</h3>
                <div class="et-license__process-wrap">
                    <ol class="et-license__process-steps">
                        <?php
                        $process_count = count( $et_license_process );
                        foreach ( $et_license_process as $index => $step ) :
                            ?>
                            <li
                                class="et-license__process-step"
                                style="--et-step-color: <?php echo esc_attr( $step['color'] ); ?>;"
                            >
                                <span class="et-license__process-num"><?php echo esc_html( $step['num'] ); ?></span>
                                <span class="et-license__process-icon" aria-hidden="true">
                                    <i class="fas <?php echo esc_attr( $step['icon'] ); ?>"></i>
                                </span>
                                <span class="et-license__process-label"><?php echo esc_html( $step['label'] ); ?></span>
                            </li>
                            <?php if ( $index < $process_count - 1 ) : ?>
                                <li class="et-license__process-connector" aria-hidden="true">
                                    <span class="et-license__process-arrow">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                            <path d="M9 6l6 6-6 6" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ol>
                </div>
            </article>

        </div>
    </div>
</section>
