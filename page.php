<?php
get_header(); ?>
  <div class="main">
    <div class="head head--<?php echo $name ?>">
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


	  <?php if ( have_posts() ) : ?>


		  <?php
		  // Start the Loop.
		  while ( have_posts() ) : the_post();


			  get_template_part( 'template-parts/content', 'page-' . $name );

			  // End the loop.
		  endwhile;

	  else :
		  get_template_part( 'template-parts/content', 'none' );

	  endif;

	  ?>
  </div>
<?php
get_footer();
