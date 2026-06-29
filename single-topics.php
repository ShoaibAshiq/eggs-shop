<?php get_header(); ?>
<script>
$( document ).ready(function() {
    if($(window).width() <= 767){
    $("#topics_sidebar").hide();
}

  $("#sidebar_burger_menu").click(function(){
    $("#topics_sidebar").slideToggle();
  });
});
</script>
		   <div id='sidebar_burger_menu'>
		        <div class='burgermenu'></div>
                <div class='burgermenu'></div>
                <div class='burgermenu'></div>
            </div>
  <div id='topics_sidebar'> <?php if ( is_active_sidebar( 'topics-sidebar' ) ) { ?>
                <ul id="sidebar">
                    <?php //dynamic_sidebar('topics-sidebar'); ?>
                </ul>
            <?php } ?>
                        <?php echo do_shortcode('[get_topics_taxonomies]'); ?>
           <?php echo do_shortcode('[getrecentopics]'); ?>

          </div>
    <div class="blogtopic">

      <div class="centertopic">
		  <?php
		  // Start the loop.
		  while ( have_posts() ) : the_post();
				// Include the single post content template.
				 get_template_part( 'template-parts/content', 'topics' );
				

			  // End of the loop.
		  endwhile;
		  ?>


      </div>
    </div>
  </div>
  <!-- END site-content -->

<?php
get_footer();
