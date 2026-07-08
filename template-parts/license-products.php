<?php
/**
 * License page — Existing Products & Merchandise
 *
 * Fixed showcase of the six licensable merchandise categories (image + title +
 * short description). Uses theme-local imagery so the section always reflects
 * the approved design instead of the live WooCommerce egg-pack catalogue.
 */
$et_license_img = trailingslashit( get_template_directory_uri() ) . 'images/';

$et_license_products = array(
	array(
		'title'       => 'Character Caps',
		'description' => 'Fun and colorful caps featuring our characters.',
		'image'       => $et_license_img . 'toys_king_1.png',
	),
	array(
		'title'       => 'Plush Toys',
		'description' => 'Soft, high-quality plush toys kids love to cuddle.',
		'image'       => $et_license_img . 'toys_1.png',
	),
	array(
		'title'       => 'Surprise Eggs',
		'description' => 'Exciting surprises, toys and tasty treats inside.',
		'image'       => $et_license_img . 'distributor/king-egg.png',
	),
	array(
		'title'       => 'Product Packaging',
		'description' => 'Attractive packaging designed for retail success.',
		'image'       => $et_license_img . 'distributor/magik-egg.png',
	),
	array(
		'title'       => 'Retail Displays',
		'description' => 'Eye-catching displays that drive sales.',
		'image'       => $et_license_img . 'distributor/emoji-egg.png',
	),
	array(
		'title'       => 'Digital Games & Content',
		'description' => 'Engaging games and digital experiences for kids.',
		'image'       => $et_license_img . 'game_image_1.png',
	),
);
?>
<section class="et-license__products" aria-labelledby="et-license-products-title">
    <div class="et-license__section-inner center">
        <h2 class="et-license__section-title" id="et-license-products-title">
            <span class="et-license__section-title-icon" aria-hidden="true">&#10022;</span>
            Existing Products &amp; Merchandise
            <span class="et-license__section-title-icon" aria-hidden="true">&#10022;</span>
        </h2>

        <div class="et-license__products-panel">
            <div class="et-license__products-slider-wrap">
                <ul class="et-license__products-grid et-license__products-slider">
                <?php foreach ( $et_license_products as $item ) : ?>
                    <li class="et-license__product-item">
                        <div class="et-license__product-card">
                            <div class="et-license__product-image-wrap">
                                <img
                                    src="<?php echo esc_url( $item['image'] ); ?>"
                                    alt="<?php echo esc_attr( $item['title'] ); ?>"
                                    class="et-license__product-image"
                                    loading="lazy"
                                    decoding="async"
                                />
                            </div>
                            <div class="et-license__product-meta">
                                <h3 class="et-license__product-title"><?php echo esc_html( $item['title'] ); ?></h3>
                                <?php if ( ! empty( $item['description'] ) ) : ?>
                                    <p class="et-license__product-desc"><?php echo esc_html( $item['description'] ); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>
