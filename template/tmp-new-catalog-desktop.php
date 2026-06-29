<?php
/*
*	Template name: New Catalog desktop
*/
get_header(); ?>


<script>
jQuery(document).ready(function(){
var curswi=jQuery( window ).width();
if(curswi < 767) {
	window.location.href = "http://eggstime.com/digital-catalogue-mobile/";
}
});

jQuery( window ).resize(function() {
  var curswi=jQuery( window ).width();
if(curswi < 767) {
	window.location.href = "http://eggstime.com/digital-catalogue-mobile/";
}
});

</script>



  <div class="main newcatalogue">
   <div class="head head--new-catalog">
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
	<!-- <div class="page__title_new-catalog"><?php //the_title(); ?></div>-->
	<div class="page-container-new-catalog">


<?php
global $wp;
$actual_link =  home_url( $wp->request );
$args = array(
  'numberposts' => -1,
  'post_type'   => 'cus_catalog',
  'orderby'    => 'menu_order',
  'sort_order' => 'asc'
  
);
 
$all_catalog = get_posts( $args );

?>

<div class="container">

 <?php 
	$selected_catalog = $_GET['slideid'];
	If (!empty($selected_catalog)){
		$main_catalog_id = $selected_catalog;
	}else{
		$main_catalog_id = $all_catalog[0]-> ID;
	}
 $desktop_slider = get_field( "desktop_catalog", $main_catalog_id );
 $mobile_slider = get_field( "mobile_catalog", $main_catalog_id );
 ?>
 <div class="new-catalog-top-heading">Our Catalog</div>
 
 <?php
 
 echo "<div class='desktop_main_slider desktop-slider'>" . do_shortcode( $desktop_slider ). "</div>";
 ?>
	<div class="row">
	 <div class="new-catalog-bottom-heading">all look catalogs</div>
		<div class="MultiCarousel" data-items="1,2,3,4" data-slide="1" id="MultiCarousel"  data-interval="1000">
            <div class="MultiCarousel-inner">
			<?php 		
			foreach($all_catalog as $catalog){
	 //$catalog -> post_title;
	$image_url =  wp_get_attachment_image_src( get_post_thumbnail_id( $catalog->ID ), 'single-post-full' );

?>
                <div class="item">
                    <div class="pad15">
					<a href="<?php echo $actual_link . "?slideid=" . $catalog -> ID; ?>" class="catalogsliderlink">
						<img class="catalogsliderimage" src="<?php echo $image_url[0]; ?>">
						<span class="catalogslidertitle"><?php echo $catalog -> post_title; ?></span>
					</a>
                    </div>
                </div>
<?php

}

?>
            </div>
            <button class="btn  leftLst"><</button>
            <button class="btn  rightLst">></button>
        </div>
	</div>

</div>


<style>
.MultiCarousel { float: left; overflow: hidden; padding: 15px; width: 100%; position:relative; }
    .MultiCarousel .MultiCarousel-inner { transition: 1s ease all; float: left; }
        .MultiCarousel .MultiCarousel-inner .item { float: left;}
        .MultiCarousel .MultiCarousel-inner .item > div { text-align: center; padding:10px; margin:30px; color:#000;}
    .MultiCarousel .leftLst, .MultiCarousel .rightLst { position:absolute; border-radius:50%;top:calc(50% - 20px);background: white;border: 1px solid black; }
    .MultiCarousel .leftLst { left:0; }
    .MultiCarousel .rightLst { right:0; }
	.catalogslidertitle { font-weight: bold; }
	.new-catalog-top-heading { text-align: center;font-size: 22px;text-transform: uppercase;margin: 50px 0 20px 0;color: #0099D2;font-weight: bold; }
	.new-catalog-bottom-heading { text-align: center;font-size: 22px;text-transform: uppercase;margin: 50px 0 -15px 0;color: #0099D2;font-weight: bold; }
    
        .MultiCarousel .leftLst.over, .MultiCarousel .rightLst.over { pointer-events: none; background:#ccc; }
		@media all and (min-width:770px){
			.mobile_main_slider{
				display : none;
			}
		}
		@media all and (max-width:769px){
			.desktop_main_slider{
				display : none;
			}
		}
	</style>

<script>
$(document).ready(function () {
    var itemsMainDiv = ('.MultiCarousel');
    var itemsDiv = ('.MultiCarousel-inner');
    var itemWidth = "";

    $('.leftLst, .rightLst').click(function () {
        var condition = $(this).hasClass("leftLst");
        if (condition)
            click(0, this);
        else
            click(1, this)
    });

    ResCarouselSize();

    $(window).resize(function () {
        ResCarouselSize();
    });

    //this function define the size of the items
    function ResCarouselSize() {
        var incno = 0;
        var dataItems = ("data-items");
        var itemClass = ('.item');
        var id = 0;
        var btnParentSb = '';
        var itemsSplit = '';
        var sampwidth = $(itemsMainDiv).width();
        var bodyWidth = $('body').width();
        $(itemsDiv).each(function () {
            id = id + 1;
            var itemNumbers = $(this).find(itemClass).length;
            btnParentSb = $(this).parent().attr(dataItems);
            itemsSplit = btnParentSb.split(',');
			//alert(itemsSplit);
            $(this).parent().attr("id", "MultiCarousel" + id);


            if (bodyWidth >= 1200) {
                incno = itemsSplit[3];
                itemWidth = sampwidth / incno;
            }
            else if (bodyWidth >= 992) {
                incno = itemsSplit[2];
                itemWidth = sampwidth / incno;
            }
            else if (bodyWidth >= 768) {
                incno = itemsSplit[1];
                itemWidth = sampwidth / incno;
            }
            else {
                incno = itemsSplit[0];
                itemWidth = sampwidth / incno;
            }
            $(this).css({ 'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers });
            $(this).find(itemClass).each(function () {
                $(this).outerWidth(itemWidth);
            });

            $(".leftLst").addClass("over");
            $(".rightLst").removeClass("over");

        });
    }


    //this function used to move the items
    function ResCarousel(e, el, s) {
        var leftBtn = ('.leftLst');
        var rightBtn = ('.rightLst');
        var translateXval = '';
        var divStyle = $(el + ' ' + itemsDiv).css('transform');
        var values = divStyle.match(/-?[\d\.]+/g);
        var xds = Math.abs(values[4]);
        if (e == 0) {
            translateXval = parseInt(xds) - parseInt(itemWidth * s);
            $(el + ' ' + rightBtn).removeClass("over");

            if (translateXval <= itemWidth / 2) {
                translateXval = 0;
                $(el + ' ' + leftBtn).addClass("over");
            }
        }
        else if (e == 1) {
            var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
            translateXval = parseInt(xds) + parseInt(itemWidth * s);
            $(el + ' ' + leftBtn).removeClass("over");

            if (translateXval >= itemsCondition - itemWidth / 2) {
                translateXval = itemsCondition;
                $(el + ' ' + rightBtn).addClass("over");
            }
        }
        $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
    }

    //It is used to get some elements from btn
    function click(ell, ee) {
        var Parent = "#" + $(ee).parent().attr("id");
        var slide = $(Parent).attr("data-slide");
        ResCarousel(ell, Parent, slide);
    }

});
</script>	
	</div>
  </div>
<?php
get_footer();
