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

	<div id="primary" class="content-area">
		<main id="main" class="site-main as_on_press" role="main">
		   
		   <div class="head head--products">
            <img src="http://eggstime.com/wp-content/uploads/2019/05/News.jpg">          
            <div class="head__title">PRESS</div>
        </div>
		   
		   
           <div class='as_on_press_content'>
		<?php if ( have_posts() ) : ?>
			
			<div class="as_on_press-page-title">Press</div>
			
			<?php
			// Start the Loop.
			
			while ( have_posts() ) : the_post();
			?>
			
			
			
			<div class="as_on_press-single-press">
				<div class="as_on_press-image-part">
					<img src="<?php echo get_the_post_thumbnail_url(); ?>" class="as_on_press-single-press-image">
				</div>
				<div class="as_on_press-content-part">
					<div class="as_on_press-date">
						<?php echo get_the_date(); ?>
					</div>
					<div class="as_on_press-title">
						<?php echo get_the_title(); ?>
					</div>
					<div class="as_on_press-exerpt desktop">
						<?php echo substr(wp_strip_all_tags(get_the_excerpt()), 0, 500) . "..."; ?>
					</div>					
					<div class="as_on_press-exerpt mobile">
						<?php echo substr(wp_strip_all_tags(get_the_excerpt()), 0, 360) . "..."; ?>
					</div>
					<div class="as_on_press-readmore">
						<a class="as_on_press-button" href='<?php echo get_field( "press_link" );?>'>Read More</a>
					</div>
				</div>
			</div>







			  <?php  endwhile;

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
