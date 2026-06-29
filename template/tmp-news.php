<?php
/*
*	Template name: News
*/
get_header(); ?>
  <div class="main">
   <div class="head head--news">
       <?php $bannerfield = get_field('add_new_banner_images');
        if($bannerfield =='yes'){
            $getbanner = get_field('banner_image');
            echo '<img src="'.$getbanner.'" />';
        }
        else{
?>
            <img src="<?php echo IMGEDIR.image_name($name)?>" />
            <?php } ?>
        
        <div class="head__title"><?php the_title(); ?></div>
    </div>
	<div class="page__title_news"><?php the_title(); ?></div>
	<div class="page-container-news">
		<?php 
			$args = array(
				'post_type' => 'post',
				'category_name' => 'news'
			);

			$query = new WP_Query( $args );


			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					?>
						<div class="post-news">
							<?php the_post_thumbnail('full'); ?>
							<div class="news-meta"><?php the_field('new_date_address'); ?></div>
							<h3><?php the_title(); ?></h3>
							<div class="excerpt-news">
								<?php the_excerpt(); ?>
							</div>							
							<a class="button" href="<?php the_permalink(); ?>">read more</a>
						</div>
					<?php
				
				}
			} else {
				
			}
			
			wp_reset_postdata();
		?>
	</div>
  </div>
<?php
get_footer();
