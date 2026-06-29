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
		<?php if ( have_posts() ) : ?>

      <div class="about">
        <div class="center--type2">
          <div class="inner">
            <div class="about__img" style="background-image: url('images/about_img.jpg')"></div>
            <div class="about__info">
              <div class="about__title">Aliquam dictum enim posuere tincidunt Lorem ipsum Quisque vitae elit dapibus sollicitudinante</div>
              <div class="about__text">
                Vestibulum pellentesque consectetur nisi. Vivamus elit purus, fermentum eu placerat at, sagittis eget sapien. Etiam efficitur posuere elit a auctor. Pellentesque non enim id felis finibus posuere ut sit amet ante. Curabitur cursus diam ut cursus mattis. Etiam nec est feugiat, gravida ante ac, sodales orci. Proin aliquam, libero et finibus ornare, erat nulla efficitur tortor, a fermentum erat nunc sit amet velit. Pellentesque consequat turpis nisi. Nullam accumsan interdum metus eleifend accumsan. Sed varius diam eu ex egestas imperdiet. Mauris cursus nulla at erat commodo dapibus. Phasellus ornare justo risus. Mauris dapibus, eros vitae porttitor congue, nibh lacus convallis velit, sed sagittis nisi ex quis enim.
              </div>
              <div class="about__title">Lorem ipsum Quisque</div>
              <div class="about__text">
                Sed vulputate risus nulla, quis vestibulum justo volutpat at. In hac habitasse platea dictumst. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc iaculis congue euismod. Sed in ipsum sed neque sollicitudin cursus. Nullam accumsan interdum metus eleifend accumsan. Sed varius diam eu ex egestas imperdiet. Mauris cursus nulla at erat commodo dapibus. Phasellus ornare justo risus. Nullam accumsan interdum metus eleifend accumsan. Sed varius diam eu ex egestas imperdiet. Mauris cursus nulla at erat commodo dapibus.
              </div>
              <a href="#" class="button">Read more</a>
            </div>
          </div>
        </div>
      </div>
          <div class="stories">
            <div class="center--type2">
              <div class="stories__items">

				  <?php while ( have_posts() ) : the_post(); ?>


					  <?php get_template_part( 'template-parts/content', 'page-story' ); ?>

				  <?php endwhile; // end of the loop. ?>


              </div>
            </div>
          </div>

		<?php endif; ?>
    </div>

  </div>
<?php get_footer();