<?php
/**
 * License page — Licensing Categories
 */
$et_license_categories = array(
    array(
        'label' => 'Toys & Collectibles',
        'color' => '#2b7bbf',
        'icon'  => 'fa-child',
    ),
    array(
        'label' => 'Surprise Eggs',
        'color' => '#e91e8c',
        'icon'  => 'egg',
    ),
    array(
        'label' => 'Confectionery & Snacks',
        'color' => '#f39c12',
        'icon'  => 'fa-candy-cane',
    ),
    array(
        'label' => 'Vitamins & Kids Wellness',
        'color' => '#27ae60',
        'icon'  => 'fa-medkit',
    ),
    array(
        'label' => 'Apparel & Accessories',
        'color' => '#4a5fc1',
        'icon'  => 'fa-tshirt',
    ),
    array(
        'label' => 'Publishing & Educational Products',
        'color' => '#d4a017',
        'icon'  => 'fa-book-open',
    ),
    array(
        'label' => 'Games & Digital Content',
        'color' => '#3498db',
        'icon'  => 'fa-gamepad',
    ),
    array(
        'label' => 'Promotions & Retail Programs',
        'color' => '#e74c3c',
        'icon'  => 'fa-bullhorn',
    ),
);
?>
<section class="et-license__categories" aria-labelledby="et-license-categories-title">
    <div class="et-license__section-inner center">
        <h2 class="et-license__section-title" id="et-license-categories-title">
            <span class="et-license__section-title-icon" aria-hidden="true">&#10022;</span>
            Licensing Categories
            <span class="et-license__section-title-icon" aria-hidden="true">&#10022;</span>
        </h2>

        <div class="et-license__categories-slider-wrap">
            <ul class="et-license__categories-grid et-license__categories-slider">
            <?php foreach ( $et_license_categories as $category ) : ?>
                <li
                    class="et-license__category-item"
                    style="--et-cat-color: <?php echo esc_attr( $category['color'] ); ?>;"
                >
                    <div class="et-license__category-card">
                        <span class="et-license__category-icon" aria-hidden="true">
                            <?php if ( $category['icon'] === 'egg' ) : ?>
                                <svg class="et-license__category-svg" viewBox="0 0 64 64" focusable="false" aria-hidden="true">
                                    <path fill="currentColor" d="M32 6c-10.5 0-19 16.8-19 33.5S21.5 62 32 62s19-8.9 19-22.5S42.5 6 32 6zm0 8c5.8 0 11 11.2 11 24.5S37.8 54 32 54s-11-4.7-11-15.5S26.2 14 32 14z"/>
                                    <path fill="currentColor" d="M28 30c-2 3-1.5 7 1.5 9s6 1.5 8-1.5c1.5-2 1-5-1-6.5-2.5-1.8-6.5-.5-8.5-1z" opacity=".85"/>
                                </svg>
                            <?php else : ?>
                                <i class="fas <?php echo esc_attr( $category['icon'] ); ?>"></i>
                            <?php endif; ?>
                        </span>
                        <span class="et-license__category-label"><?php echo esc_html( $category['label'] ); ?></span>
                    </div>
                </li>
            <?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>
