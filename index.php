<?php
get_header(); ?>
<div class="main">
  <!-- THE site-content -->
  <div class="stories">
    <div class="center--type2">
      <div class="stories__items">
		  <?php
		  // Start the loop.
		  while ( have_posts() ) : the_post();?>
		  <div class="item"><?php
			  // Include the single post content template.
			  get_template_part( 'template-parts/content', 'single' );
      ?>
      </div>
		  <?php endwhile;?>


      </div>
    </div>
  </div>
</div>
<!-- END site-content -->

get_footer();
