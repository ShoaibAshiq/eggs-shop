<?php
add_shortcode( 'custom-slider', 'custom_slider' );
add_shortcode( 'custom-cart', 'custom_cart' );
add_shortcode( 'category-post', 'keeping_children_safe' );
function keeping_children_safe( $atts, $content = NULL ) {
	extract( shortcode_atts( [
		"category"  => '',
		"post_type" => '',
		"post_name" => '',
		"limit" => '',

	], $atts ) );

	$category  = ( ! empty( $category ) ) ? trim( $category ) : '';
	$post_type = ( ! empty( $post_type ) ) ? trim( $post_type ) : '';
	$post_name = ( ! empty( $post_name ) ) ? trim( $post_name ) : '';
	$limit     = ! empty( $limit ) ? $limit : '-1';

	ob_start();
	global $post;
	if ( $category == 'games-front' ) {
		$cat = 'games';
	} else {
		$cat = $category;
	}

	$orderby = 'date';
	$order   = 'DESC';
	$args    = [
		'post_type'      => $post_type,
		'category_name'  => $cat,
		'order'          => $order,
		'posts_per_page' => $limit,
	];
	if($category == 'user-photo-'.$post_name){
    $category = 'user-photo';
	}

	$query      = new WP_Query( $args );
	$post_count = $query->post_count;
	if ( $query->have_posts() ) :
		while ( $query->have_posts() ) : $query->the_post();
			$img                                 = get_post_featured_image( $post->ID, 'full', TRUE );
			$gallery_image                       = get_field( 'image_gallery' );
			$name                                = $post->post_name;
			switch ( $category ) {
				case 'last-news':
					?>
					<div class="item">
						<div class="item__images">
							<?php if ( count( $gallery_image ) ):
								foreach ( $gallery_image as $img ):
								 
								    if($img['title'] == 'king_egg-12'){
								         $url = site_url( '/products/big-king-egg/' );
								         $class = "king_egg";
								    }
								     elseif($img['title'] == 'magik_egg'){
								         $url = site_url( '/products/giant-magik-egg/' );
								         $class = "magik_egg";
								    }
								    elseif($img['title'] == 'happy_egg'){
								         $url = site_url( '/products/happy-egg-surprises-gummies-vitamin-c-toy/' );
								          $class = "happy_egg";
								    }
								     elseif($img['title'] == 'Lucky Egg Surprises with Multivitamin Gummies and Surprise Toy'){
								         $url = site_url( '/products/lucky-egg-surprises-multivitamin-gummies-toy/' );
								          $class = "lucky_egg";
								    }
								   elseif($img['title'] == 'emoji'){
								         $url = site_url( '/products/emoji-egg/' );
								         $class = "emoji_egg";
								    }
								     elseif($img['title'] == 'skazka'){
								         $url = site_url( '/products/skazka-egg/' );
								          $class = "skazka_egg";
								    }
								    ?>
								<div class="image_url"><a href="<?php echo $url; ?>"><img class = "<?php echo $class; ?>" src="<?php echo $img['url'] ?>" /></a></div>
								<?php endforeach;
							endif;
							?>
						</div>
						<div class="item__info">
							<div class="item__title"><?php echo the_title(); ?></div>
							<p class="item__text">
								<?php  echo strip_tags( get_the_content() ); ?>
							</p>
							<a href="<?php echo get_permalink( '339' ); ?>"
							   class="button hometopreadmore">Read More</a><a style="margin:15px;" href="https://eggstime.com/as_on_press/" class="button hometopasonpress">AS ON PRESS</a>
						</div>
					</div>
					<?php
					break;
				case 'committed-to-keeping-children-safe':
					?>

					<?php if ( $name == 'kids-safety-certified' ): ?>
                        <a href="https://www.kidsafeseal.com/certifiedproducts/eggstime.html" target="_blank" rel="noopener"  class="item">
                            <img class="item__logo"
                                 src="https://www.kidsafeseal.com/sealimage/202086142965616237/eggstime_large_darktm.png"
                                 alt="EggsTime.com is certified by the kidSAFE Seal Program."
                                 border="0"
                            />
                            <div class="text"><?php echo the_title(); ?></div>
                        </a>
							<?php else:?>
                      <div class="item">
							<img class="item__logo"
							     src="<?php echo $img ?>" />
						<div class="text"><?php echo the_title(); ?></div>
                      </div>
			      <?php endif;?>
					<?php
					break;
				case 'proudly-support-of':
					?>
					<div class="item">
						<img class="item__logo" src="<?php echo $img ?>" />
					</div>
					<?php
					break;
				case 'learn-and-joy':
					?>
					<div class="inside__img"
					     style="background-image: url('<?php echo $img ?>');">
						<div></div>
					</div>
					<?php
					break;
				case 'eggs-time-games':
					$url = get_field( 'game_url', $post->ID )
					?>
					<div class="games__item col-xs-12 col-md-4">
						<div class="game_img"
						     style="background-image: url('<?php echo $img ?>')">
							<a target="_blank" href="<?php echo $url ?>">
								<div></div>
							</a>

						</div>
					</div>
					<?php
					break;
				case 'learn-games':
					$url = get_field( 'game_url', $post->ID )
					?>
					<div class="item">
						<div class="item__img"
						     style="background-image: url('<?php echo $img ?>'"></div>
						<a target="_blank" href="<?php echo $url ?>" class="button">Play</a>
					</div>
					<?php
					break;
				case 'games':
					$url = get_field( 'game_url', $post->ID );
					$img_game_bg  =  get_field( 'game_images_background', $post->ID ) ;
					?>
					<div class="game <?php echo  $name  ?>" style="background-image: url(<?php echo $img_game_bg ?>)">
                        <div class="description">
                            <a href="<?php echo $url ?>" class="button-game">play</a>
                            <span class="game-name"><?php echo $post->post_title ?></span>
                        </div>
					</div>
					<?php
					break;
				case 'user-photo':
        ?>
					<div class="testewt" >
						<img src="<?php echo $img; ?>">
					</div>
					<?php
					break;

				case 'eggs-time-game-app':
					$icon_game_playmarket = get_field( 'icon_game_playmarket', $post->ID );
					$link_for_game_on_playmarket = get_field( 'link_for_game_on_playmarket', $post->ID );
					$icon_game_ios               = get_field( 'icon_game_ios', $post->ID );
					$link_for_game_on_app_store  = get_field( 'link_for_game_on_app_store', $post->ID );
					?>
					<div class="games__icons">
						<a href="<?php echo $link_for_game_on_playmarket ?>"
						   style="background-image:url(<?php echo $icon_game_playmarket['url'] ?>); background-size: 100%;"></a>
						<a href="<?php echo $link_for_game_on_app_store ?>"
						   style="background-image:url(<?php echo $icon_game_ios['url'] ?>); background-size: 100%;"></a>
					</div>
					<div class="games__market">
						<a href="<?php echo $link_for_game_on_playmarket ?>"
						   class="playmarket"></a>
						<a href="<?php echo $link_for_game_on_app_store ?>"
						   class="appstore"></a>
					</div>
					<?php
					break;
				case 'games-front':
					$url = get_field( 'game_url', $post->ID )
					?>

					<a target="_blank" href="<?php echo $url ?>"> <img class=""
					                                                   src="<?php echo $img ?>">
						</img>
					</a>
					<?php
					break;
				case 'stories-lucky-eggs':
				case 'stories-king-eggs':
				case 'stories-happy-eggs':
				case 'stories-magik-eggs':
					$url = get_field( 'story_video_url', $post->ID )
					?>

					<div class="item">
						<div class="item__img" style="background-image: url('<?php echo $img ?>');"></div>
						<?php if(!empty($url)):?>
							<a href="<?php echo $url ?>" class="button fancybox">Watch</a>
						<?php else:?>
							<a href="#"class="button coming_soon">Coming Soon</a>
						<?php endif;?>
					</div>
					<?php
					break;
			}

		endwhile;
	endif;

	wp_reset_query();

	return ob_get_clean();

}
function custom_slider( $atts, $content = NULL ) {
	extract( shortcode_atts( [
		"limit"             => '-1',
		"category"          => '',
		"show_content"      => 'true',
		"dots"              => 'true',
		"arrows"            => 'true',
		"autoplay"          => 'true',
		"autoplay_interval" => '3000',
		"speed"             => '300',
		"fade"              => 'false',
		"sliderheight"      => '',
		"rtl"               => '',
		"wrapper_class"     => '',
		"item_class"        => '',
	], $atts ) );


	$limit             = ! empty( $limit ) ? $limit : '-1';
	$cat               = ( ! empty( $category ) ) ? explode( ',', $category ) : '';
	$show_content      = ( $show_content == 'false' ) ? FALSE : TRUE;
	$dots              = ( $dots == 'false' ) ? 'false' : 'true';
	$arrows            = ( $arrows == 'false' ) ? 'false' : 'true';
	$autoplay          = ( $autoplay == 'false' ) ? 'false' : 'true';
	$autoplay_interval = ( ! empty( $autoplay_interval ) ) ? $autoplay_interval : 3000;
	$speed             = ( ! empty( $speed ) ) ? $speed : 300;
	$fade              = ( $fade == 'true' ) ? 'true' : 'false';
	$sliderheight      = ( ! empty( $sliderheight ) ) ? $sliderheight : '';
	$slider_height_css = ( ! empty( $sliderheight ) ) ? "style='height:{$sliderheight}px;'" : '';
	$wrapper_class     = ( ! empty( $wrapper_class ) ) ? trim( $wrapper_class ) : '';

	// For RTL
	if ( empty( $rtl ) && is_rtl() ) {
		$rtl = 'true';
	} elseif ( $rtl == 'true' ) {
		$rtl = 'true';
	} else {
		$rtl = 'false';
	}

	// Enqueus required script
	wp_register_script( 'scripts', get_template_directory( 'eggs-shop' ) . '/js/eggs-shop.js', [ 'jquery' ], WPSISAC_VERSION, TRUE );
	wp_register_script( 'wpsisac-public-script', WPSISAC_URL . 'assets/js/wpsisac-public.js', [ 'jquery' ], WPSISAC_VERSION, TRUE );
	wp_enqueue_script( 'wpos-slick-jquery' );
	wp_enqueue_script( 'wpsisac-public-script' );
	wp_enqueue_script( 'scripts' );

	// Slider configuration
	$slider_conf = compact( 'dots', 'arrows', 'autoplay', 'autoplay_interval', 'fade', 'speed', 'rtl' );

	ob_start();

	global $post;
	$unique    = wpsisac_get_unique();
	$post_type = 'slick_slider';
	$orderby   = 'date';
	$order     = 'DESC';

	$args = [
		'post_type'      => $post_type,
		'orderby'        => $orderby,
		'order'          => $order,
		'posts_per_page' => $limit,

	];
	if ( $cat != "" ) {
		$args['tax_query'] = [
			[
				'taxonomy' => 'wpsisac_slider-category',
				'field'    => 'id',
				'terms'    => $cat,
			],
		];
	}
	$query      = new WP_Query( $args );
	$post_count = $query->post_count;
	if ( $query->have_posts() ) :
		$form = "";
		?>
		<div id="<?php echo $wrapper_class ?>-slick-slider-<?php echo $unique; ?>"
		     class="<?php echo $wrapper_class ?>">
			<?php while ( $query->have_posts() ) :
				$query->the_post();
				$slider_img = get_post_featured_image( $post->ID, 'full', TRUE );
				$sliderurl  = get_post_meta( get_the_ID(), 'wpsisac_slide_link', TRUE ); ?>

				<?php switch ( $category ) {
				case '15':
					?>
					<div class="slide"
					     style="background-image: url(<?php echo $slider_img; ?>)"></div>
					<?php
					break;

                case '892':
				case '18':
				case '17': 
				    //echo get_the_ID();
			//	echo get_field( 'want_to_add_instagram_video', get_the_ID());
			//	echo get_field('embed_code_for_instagram_video', get_the_ID());
			if(get_field( 'want_to_add_instagram_video', get_the_ID()) == 'yes'){
			    ?>
			    	<div><a id="tip5" href="#login_form<?php echo get_the_ID(); ?>" class="fancybox" onclick="">
							<div class="slide_img"
							     style="background-image:url(<?php echo $slider_img; ?>);"></div>
						</a>
					</div>
					<?php 
					$form = $form . '
					<div class="test" style="display:none"><div id="login_form'.get_the_ID().'">' . get_field("embed_code_for_instagram_video", get_the_ID()) . '</div></div>';
?>
			    <?php
			}
			else{
				
				?>
					<div><a href="<?php echo $sliderurl ?>" class="fancybox"
					        onclick="">
							<div class="slide_img"
							     style="background-image:url(<?php echo $slider_img; ?>);"></div>
						</a>
					</div>
					<?php }
					break;

				case '26':
					?>
					<div>
						<div class="slide_img"><img src="<?php echo $slider_img; ?>"/></div>
						<div class="button-block">
							<a href="<?php echo $slider_img; ?>"
							   class="button button--zoom fancybox" onclick="">
								<div></div>
							</a>
							<a href="<?php echo $slider_img; ?>"
							   download="<?php echo $slider_img; ?>" class="button">Download</a>
						</div>
					</div>
					<?php
					break;
				case '32':
					?>
					<div
						style="background-image:url('<?php echo $slider_img; ?>');"></div>
					<?php
					break;
			}
			endwhile; ?>
		</div>
		<?php
		echo $form;
		?>
			           
			           
			           
			           
					   
	<?php endif;


	wp_reset_query();

	return ob_get_clean();
}


function custom_cart(){


if (!defined('ABSPATH')) {
	exit;
}

    wc_print_notices();
    remove_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');
    remove_action('woocommerce_proceed_to_checkout', 'woocommerce_button_proceed_to_checkout', 20);
    do_action('woocommerce_before_cart');
?>
<form class="woocommerce-cart-form" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
	<?php do_action('woocommerce_before_cart_table'); ?>
  <div class="shopping__items">
      <span class="recently">recently added item(s)</span>
	  <?php do_action('woocommerce_before_cart_contents'); ?>
	  <?php
          foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item):
          $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
          $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

          if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) :
          $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
	  ?>
    <div class="item <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">
        <?php $thumbnail = wp_get_attachment_image_src($_product->get_image_id(), 'full');  ?>
        <div class="cart-image">
            <img src="<?php echo $thumbnail[0]; ?>"/>
        </div>
        <div class="item__info-popup">
           <div class="item__title">
              <?php
                      if (!$product_permalink) {
                          echo apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key) . '&nbsp;';
                      } else {
                          echo apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s</a>', esc_url($product_permalink), $_product->get_name()),  $cart_item, $cart_item_key);
                      }
                  ?>
              <span><?php the_field('weight', $_product->get_id()); ?></span>
           </div>
           <div class="item__price-popup">
              <span class="text">Price</span>
              <?php echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key); ?>
           </div>
           <div class="item__details">
               <span class="text">Qty</span>
                 <div class="quantity">
                   <?php
                          if ($_product->is_sold_individually()) {
                            $product_quantity = sprintf('1 <input type="hidden" name="cart[%s][qty]" value="1" \/>', $cart_item_key);
                          } else {
                            $product_quantity = woocommerce_quantity_input(array(
                              'input_name' => "cart[{$cart_item_key}][qty]",
                              'input_value' => $cart_item['quantity'],
                              'max_value' => $_product->get_max_purchase_quantity(),
                              'min_value' => '0',
                            ), $_product, false);
                          }
                          echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item);
                      ?>
                 </div>
                 <!--<input type="submit" class="button" name="update_cart" value="<?php esc_attr_e('Update', 'woocommerce'); ?>"/>-->
				 <span class="price items-subtotal"><?php
                        echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key);
                        ?> </span>
           </div>
           
           <div class="operations">
                <?php
              echo apply_filters('woocommerce_cart_item_remove_link', sprintf(
                '<a href="%s" aria-label="%s" data-product_id="%s" data-product_sku="%s">
                                            <svg xmlns="http://www.w3.org/2000/svg">
                                                <use xlink:href="%s/svg/checkout_icons.svg#delete"></use>
                                            </svg>
                                            Remove item
                                        </a>',
                esc_url(WC()->cart->get_remove_url($cart_item_key)),
                __('Remove this item', 'woocommerce'),
                esc_attr($product_id),
                esc_attr($_product->get_sku()),
                TEMPLATEURI
              ), $cart_item_key);
              ?>
           </div>
        </div>
    </div>
    <?php endif; endforeach; ?>
	<?php do_action('woocommerce_cart_contents'); ?>
  </div>
  <div class="cart-bottom">
    <div class="total">
       <span>cart subtotal:</span>
       <div class="total_value">
           <?php echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_cart_total()); ?>
       </div>
    </div>
    <a href="<?php echo wc_get_cart_url() ?>" class="button">checkout</a>


  </div>
    <?php wp_nonce_field( 'woocommerce-cart' ); ?>
	<?php do_action('woocommerce_after_cart_table'); ?>
</form>

<?php do_action('woocommerce_after_cart');

}