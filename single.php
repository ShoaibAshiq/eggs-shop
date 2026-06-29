<?php get_header(); 

$news = has_category('news', get_the_ID());

?>
  <div class="main">
  <?php if(!$news): ?>
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
	<?php else: ?>
	<div class="head head--news-inner">
	    <?php $bannerfield = get_field('add_new_banner_images');
        if($bannerfield =='yes'){
            $getbanner = get_field('banner_image');
            echo '<img src="'.$getbanner.'" />';
        }
        else{
?>
            	<img src="<?php echo IMGEDIR.image_name('news-inner')?>" />
            <?php } ?>

        <!--<div class="head__title">News</div> -->
        <?php 
        if(get_the_ID() == 2466){
            echo "<h3 class='head__title news_2466' style='text-align:center;'>Welcome To Visit Us</h3>";  
        }
        ?>
        
    </div>
	<?php endif; ?>
    <div class="blog blog--king  <?php if($news): ?>news-blog<?php endif; ?>">

      <div class="center">
		  <?php
		  // Start the loop.
		  while ( have_posts() ) : the_post();
		  
			if(has_category('news')){
				 get_template_part( 'template-parts/content', 'news' );
			}else{
				// Include the single post content template.
				 get_template_part( 'template-parts/content', 'single' );
			}			

			  // End of the loop.
		  endwhile;
		  ?>


      </div>
    </div>
  </div>
  <!-- END site-content -->

<?php
get_footer();
