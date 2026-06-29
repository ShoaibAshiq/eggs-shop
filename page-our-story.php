<?php
get_header(); ?>
  <div class="main">

    <div class="head head--about">
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
    <div class="about_us">
      <div class="center">
		  <?php
		  // Start the loop.
		  while ( have_posts() ) : the_post();

			  // Include the page content template.
		  get_template_part( 'template-parts/content', 'page-our-story' );


			  // If comments are open or we have at least one comment, load up the comment template.
			  if ( comments_open() || get_comments_number() ) {
				  comments_template();
			  }

			  // End of the loop.
		  endwhile;
		  ?>
        <div class="menu_block">

	        <?php

          $main = [
	          'theme_location'  => 'blog_menu',
	          'walker' => new Custom_Walker_Nav_Menu_blog,
          ];
          wp_nav_menu( $main);?>

        </div>
      </div>
    </div>

  </div>
<?php get_footer();