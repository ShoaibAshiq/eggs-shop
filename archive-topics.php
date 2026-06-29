<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>
<script>
$( document ).ready(function() {
    if($(window).width() <= 767){
    $("#topics_sidebar").hide();
}

  $("#sidebar_burger_menu").click(function(){
    $("#topics_sidebar").slideToggle();
  });

$('#toggle').on('click', function() {
    $(this).children().toggleClass('active');
    $('#A').toggleClass('active');
    $('.topics .center').toggleClass('active');
});
});
</script>
	<div id="primary" class="content-area">
		<main id="main" class="site-main topics" role="main">
		   <div id='sidebar_burger_menu'>
		        <div class='burgermenu'></div>
                <div class='burgermenu'></div>
                <div class='burgermenu'></div>
</div>
        <div id='topics_sidebar'> <?php if ( is_active_sidebar( 'topics-sidebar' ) ) { ?>
                <ul id="sidebar">
                    <?php //dynamic_sidebar('topics-sidebar'); ?>
                </ul> <?php } ?>
                <?php echo do_shortcode('[get_topics_taxonomies]'); ?>
                <?php echo do_shortcode('[getrecentopicsall]'); ?>

           
          </div>
           <div class='topics_content'>
		<?php if ( have_posts() ) : ?>

		<!-- 	<header class="page-header">
				<?php
					//the_archive_title( '<h1 class="page-title">', '</h1>' );
					//the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header> .page-header -->
		
			<!--<div id='A'> <?php //if ( is_active_sidebar( 'topics-sidebar' ) ) { ?>
                <ul id="sidebar">
                    <?php //dynamic_sidebar('topics-sidebar'); ?>
                </ul>
            <?php //} ?>
            </div>-->
			
           <!-- <div id='B'><div id='toggle'><img src='http://eggstime.com/wp-content/uploads/2019/03/cross.jpg'></div></div>-->
			<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();?>
			<?php $txtalign = get_field('text_alignment') ?>
			<?php 
			if(get_field('mobile_banner') != NULL){
			    $mobilebanner = get_field('mobile_banner');
			}else{
			    $mobilebanner = get_the_post_thumbnail_url();
			}
			
			    if($txtalign=='left'){
			?>
		
        <div class='mobile_banner right'><img src="<?php echo $mobilebanner; ?>" ></div>
			<div class='center left' id='topicsactive' style='background-image:url(<?php echo get_the_post_thumbnail_url();?>);background-size:cover;'>
    			<div class="topic_wrapper_left" >
    			    <div class="topic_title" style="color:<?php if(get_field('color_of_title'))echo get_field('color_of_title');?>">
    			        <?php echo get_the_title(); ?>
    			    </div>
    			    <div class="topic_description">
    			        <?php echo substr(strip_tags(get_field('text_on_banner'),'<p><span>'), 0, 450) . "..."; ?>
    			    </div>
    			    <div class="topic_readmore">
    			        <a class="button" href='<?php echo get_the_permalink();?>'>Read More</a>
    			    </div>
    			</div>
		    </div>
		    <div style="clear:both"></div>
		    <?php 
			    } 
			    if($txtalign=='right'){
			?>
			<div class='mobile_banner left'><img src="<?php echo $mobilebanner; ?>"></div>
		    <div class='center right' id='topicsactive' style='background-image:url(<?php echo get_the_post_thumbnail_url();?>);background-size:cover;display: table-footer-group;'>
    			<div class="topic_wrapper_right" >
    			    <div class="topic_title" style="color:<?php if(get_field('color_of_title'))echo get_field('color_of_title');?>">
    			        <?php echo get_the_title(); ?>
    			    </div>
    			    <div class="topic_description">
    			        <?php echo substr(strip_tags(get_field('text_on_banner'),'<p><span>'), 0, 450) . "..."; ?>
    			    </div>
    			    <div class="topic_readmore">
    			        <a class="button" href='<?php echo get_the_permalink();?>'>Read More</a>
    			    </div>
    			</div>
		    </div>
			<div style="clear:both"></div>
		    <?php } ?>
			<?php
			    endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'twentysixteen' ),
				'next_text'          => __( 'Next page', 'twentysixteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
			) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
        </div>
		</main><!-- .site-main -->
	</div><!-- .content-area -->
<div style="clear:both"></div>
<?php //get_sidebar(); ?>
<?php get_footer(); ?>
