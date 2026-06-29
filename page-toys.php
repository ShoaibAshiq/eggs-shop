<?php
get_header(); ?>

  <div class="main">

    <div class="head">
            <?php $bannerfield = get_field('add_new_banner_images');
            if($bannerfield =='yes'){
                $getbanner = get_field('banner_image');
                echo '<img src="'.$getbanner.'" />';
            }
            else{ ?>
                <img src="<?php echo IMGEDIR.image_name($name)?>" />
                <?php } ?>
              
            <div class="head__title"><?php the_title(); ?></div>
        </div>
    <div class="woocommerce-notices-wrapper"></div>
    <div class="products-list">
      <div class="center">
        <div class="items">
          <?php 
            $args = array(
                'post_type'  => 'product',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'terms' => 53,
                        'operator' => 'IN',
                    ),
                ),
            );
            $the_query = new WP_Query( $args );

            while ( $the_query->have_posts() ) : $the_query->the_post();
                $product_id = get_the_id();
                $big_src = get_the_post_thumbnail_url($product_id);
                $class_name = get_field('class_name', $product_id);
                $bg_color = get_field('background_color', $product_id); ?>

                <div class="item <?php echo $class_name; ?>" onclick="location.href='<?php echo site_url().'/product-category/toys'; ?>'"
                     style="background-color: <?php echo $bg_color; ?>; background-image:url(<?php echo $big_src; ?>)">
                    <a href="<?php echo site_url().'/product-category/toys'; ?>" class="button button--white">Buy</a>
                </div>
            <?php endwhile;
            wp_reset_query();
          ?>
        </div>
      </div>
    </div>
  </div>
<?php get_footer();