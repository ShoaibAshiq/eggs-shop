<?php
get_header(); ?>
  <div class="main">
    <div class="banner">
		<?php echo do_shortcode( '[custom-slider category="15" wrapper_class="banner__slick"]' ); ?>
    </div>
    <div class="news">
      <div class="center">
        <div class="title">Latest News</div>
	      <?php echo do_shortcode( '[category-post  post_type="front-page" category="last-news"  limit="1"]' ); ?>
      </div>
    </div>
	<div class="newlogoslider">
	<?php echo do_shortcode( '[wonderplugin_carousel id="2"]' ); ?>
	</div>
    <div class="slider slider--channel">
      <div class="center">
        <div class="title"><a href="https://www.youtube.com/channel/UC__ZaY9WHmlVMAJiLjXOwRQ" target="_blank"><span></span>eggs time channel</a></div>
		  <?php echo do_shortcode( '[custom-slider category="18" wrapper_class="slider-slick-2"]' ); ?>
      </div>
    </div>
    <div class="slider slider--stories">
      <div class="center">
        <div class="title"><a href="https://eggstime.com/learn/" class="hporstry">Our stories</a></div>
		  <?php echo do_shortcode( '[custom-slider category="17" wrapper_class="slider-slick-1"]' ); ?>
      </div>
    </div>
    <div class="slider slider--channel customer">
      <div class="center">
        <div class="title">Customers Videos</div>
		  <?php echo do_shortcode( '[custom-slider category="892" wrapper_class="slider-slick-2"]' ); ?>
      </div>
    </div>
    <div class="safety">
      <div class="center">
      <!--  <div class="title title--large">Committed to Keeping Children Safe</div> -->
		<div class="mainsliderarea">
			<div class="mainsliderareainner left">
			<span class="mainsliderareainnertitle">Committed to Keeping Children Safe</span>
				<?php echo do_shortcode( '[wonderplugin_carousel id="3"]' ); ?>
			</div>
			<div class="mainsliderareainner right">
			<span class="mainsliderareainnertitle">Member of:</span>
				<?php echo do_shortcode('[wonderplugin_carousel id="5"]'); ?>
			</div>
		</div>
     <!--   <div class="safety__items" >
			<?php //echo do_shortcode( '[category-post post_type="front-page" category="committed-to-keeping-children-safe" limit="7"]' ); ?>
			<?php //echo do_shortcode( '[wonderplugin_carousel id="2"]' ); ?>
        </div> -->
		
		<?php //echo "<br>". do_shortcode( "[carousel_slide id='6938']" ); ?>
        <div class="support" style="width: 100%;display: inline-block;">
          <div class="support__title">Proud Supporter of:</div>
          <div class="support__items">
			  <?php echo do_shortcode( '[category-post post_type="front-page" category="proudly-support-of" limit="1"]' ); ?>
          </div>
        </div>
      </div>
    </div>
    <div class="inside">
      <div class="center">
        <!--<div class="title">Learn and Enjoy !<br>find the game inside the eggs!
        </div>-->
        <style>.inside__img div {
    padding-bottom: 38.6% !important;
}
.safety .item:last-child {
    margin: 0 !important;
}
.safety .item:last-child .item__logo {
    padding-top: 7px !important;
}
</style>
		  <?php echo do_shortcode( '[category-post post_type="front-page" limit="1" category="learn-and-joy"]' ); ?>
      </div>
    </div>
<?php //echo do_shortcode('[image_form]')?>
    <div class="games">
      <div class="center">
        <div class="row footer-align">
          <div class="games__item col-xs-12 col-md-4">
            <div class="title"><a href="<?php echo  get_permalink('617')?>">Eggs time Games</a></div>
            <div class="subtitle">
              Start exploring this fun and<br>educational world
            </div>
            <?php echo do_shortcode( '[category-post post_type="front-page" category="eggs-time-game-app" limit="1"]');?>
            <div class="games__badges">
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              <span></span>
              <span></span>
            </div>
          </div>
          <div class="slider-slick-4 slider col-xs-12 col-md-7">
		        <?php echo do_shortcode( '[category-post category="games-front" post_type="post" ]'  ); ?>
          </div>

<!--	         --><?php //echo do_shortcode( '[category-post post_type="front-page" limit="2" category="eggs-time-games"]' ); ?>
        </div>
      </div>
    </div>
  </div>
<?php
get_footer();