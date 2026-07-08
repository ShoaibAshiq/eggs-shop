<?php
/**
 * License page — Pre-footer CTA banner
 */

$et_license_cta_characters = function_exists( 'et_get_license_cta_characters' )
	? et_get_license_cta_characters()
	: array();
?>
<section class="et-license__cta" aria-labelledby="et-license-cta-title">
	<div class="et-license__cta-confetti" aria-hidden="true"></div>
	<div class="et-license__cta-inner center">
		<div class="et-license__cta-layout">
			<div class="et-license__cta-content">
				<h2 class="et-license__cta-title" id="et-license-cta-title">
					Ready to License <span class="et-license__cta-highlight">Eggs Time?</span>
				</h2>
				<p class="et-license__cta-text">
					Contact our licensing team to discuss partnership opportunities.
				</p>
			</div>

			<?php if ( ! empty( $et_license_cta_characters ) ) : ?>
				<div class="et-license__cta-visual" aria-hidden="true">
					<ul class="et-license__cta-cast">
						<?php foreach ( $et_license_cta_characters as $character ) : ?>
							<?php
							$cast_key = isset( $character['key'] ) ? (string) $character['key'] : 'character';
							?>
							<li class="et-license__cta-cast-item et-license__cta-cast-item--<?php echo esc_attr( $cast_key ); ?>">
								<img
									src="<?php echo esc_url( $character['image'] ); ?>"
									alt="<?php echo esc_attr( $character['name'] ); ?>"
									class="et-license__cta-cast-img"
									loading="lazy"
									decoding="async"
								/>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
