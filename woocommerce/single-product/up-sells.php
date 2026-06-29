<?php
/**
 * Single Product Up-Sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/up-sells.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     3.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

if ($upsells) : ?>
    <section class="related_wrap">
        <div class="center">
            <div class="title"><?php esc_html_e('RELATED ITEMS', 'woocommerce') ?></div>
            <div class="row products-list">
                <?php foreach ($upsells as $key => $upsell) : ?>

                    <?php
                    $bg_color = get_field('background_color', $upsell->get_id());
	                  $button = get_field('class_name', $upsell->get_id());
                    $big_src = wp_get_attachment_url(get_post_thumbnail_id($upsell->get_id()));
                    ?>
                    <div class="col-md-6 related__item item <?php echo $button?>" id="<?php echo $key; ?>"  style="background-color: <?php echo $bg_color; ?>; background-image:url(<?php echo $big_src; ?>)">
                        <style>
                            .related_wrap .related__item[id="<?php echo $key; ?>"]{
                                background-color: <?php echo $bg_color; ?>; 
                                background-image:url(<?php echo $big_src; ?>)
                            }
                        </style>
                        <a href="<?php the_permalink($upsell->get_id()) ?>" class="button button--white">Buy</a>
                    </div>


                <?php endforeach; ?>

            </div>
        </div>
    </section>


<?php endif;

wp_reset_postdata();
?>

<script>
jQuery( document ).ready(function() {
  jQuery('.row.products-list').slick({
    infinite: true, arrows: true,
    dots: false,
    arrows: true,
    slidesToShow: 4, 
    slidesToScroll: 1, 
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    }
  ]
   
  });
});
</script>
