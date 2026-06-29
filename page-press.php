<?php
get_header(); ?>

  <div class="main">

    <div class="head head--press">
<?php $bannerfield = get_field('add_new_banner_images');
        if($bannerfield =='yes'){
            $getbanner = get_field('banner_image');
            echo '<img src="'.$getbanner.'" />';
        }
        else{
?>
            <img src="<?php echo IMGEDIR.image_name($name)?>" />
            <?php } ?>
            <div class="head__title"><?php the_title() ?></div>
    </div>
    <div class="slider slider--press">
      <div class="center">
		     <?php echo do_shortcode( '[custom-slider category="26" wrapper_class="slider-slick-3"]' ); ?>
      </div>
    </div>
  </div>
<?php get_footer();






