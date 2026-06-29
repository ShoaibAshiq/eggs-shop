<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 */

$about = [
	'theme_location'  => 'about_menu',
	'walker' => new Custom_Walker_Nav_Menu_Top,
];
$support = [
	'theme_location'  => 'support_menu',
	'walker' => new Custom_Walker_Nav_Menu_Top,
];

?>
<footer class="footer <?= ($post->post_name == 'games')? 'footer_games': ''?>">
    <div class="center row_top1">
        <div class="footer__columns">
        <div class="footer__support footer__accordion-item">
            <button type="button" class="title footer__accordion-toggle" aria-expanded="false" aria-controls="footer-panel-support">
                <span class="footer__accordion-icon footer__accordion-icon--support" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 11v3a2 2 0 0 0 2 2h1"/><path d="M21 11v3a2 2 0 0 1-2 2h-1"/><path d="M5 14v-4a7 7 0 0 1 14 0v4"/><path d="M12 17v3"/></svg>
                </span>
                <span class="footer__accordion-label">Support</span>
                <span class="footer__accordion-chevron" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg>
                </span>
            </button>
            <div class="footer__accordion-panel" id="footer-panel-support">
            <ul>
	            <?php wp_nav_menu($support)?>
            </ul>
            </div>
        </div>

        <div class="footer__about footer__accordion-item">
            <button type="button" class="title row_top3 footer__accordion-toggle" aria-expanded="false" aria-controls="footer-panel-about">
                <span class="footer__accordion-icon footer__accordion-icon--about" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 10v6"/><path d="M12 7h.01"/></svg>
                </span>
                <span class="footer__accordion-label">About Us</span>
                <span class="footer__accordion-chevron" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg>
                </span>
            </button>
            <div class="footer__accordion-panel" id="footer-panel-about">
            <ul>
                <?php wp_nav_menu($about)?>
            </ul>
            </div>
        </div>

        <div class="footer__business footer__accordion-item">
            <button type="button" class="title footer__accordion-toggle" aria-expanded="false" aria-controls="footer-panel-business">
                <span class="footer__accordion-icon footer__accordion-icon--business" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 3h12l4 7-10 11L2 10z"/><path d="M12 22V10"/><path d="M2 10h20"/></svg>
                </span>
                <span class="footer__accordion-label">Business &amp; Partnerships</span>
                <span class="footer__accordion-chevron" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg>
                </span>
            </button>
            <div class="footer__accordion-panel" id="footer-panel-business">
            <ul>
                <li>Licensing Opportunities</li>
                <li>Influencers &amp; Creators</li>
                <li><a href="<?php echo esc_url( home_url( '/resale/' ) ); ?>">Resellers &amp; Distributors</a></li>
            </ul>
            </div>
        </div>
        
        <div class="br_cat footer__accordion-item">
			<button type="button" class="title row_top2 footer__accordion-toggle" aria-expanded="false" aria-controls="footer-panel-catalogue">
                <span class="footer__accordion-icon footer__accordion-icon--catalogue" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 11h3l4-8v18l-4-8H3z"/><path d="M11 9a4 4 0 0 1 4 4"/><path d="M15 13h2a2 2 0 0 0 2-2v0a2 2 0 0 0-2-2h-2"/></svg>
                </span>
                <span class="footer__accordion-label">Want to hear more from us?</span>
                <span class="footer__accordion-chevron" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg>
                </span>
            </button>
            <div class="footer__accordion-panel" id="footer-panel-catalogue">
				<ul>
					<li><a href="https://eggstime.com/catalogue-request/">Request a catalogue</a></li>
					<li><a href="https://eggstime.com/digital-catalogue/">Browse a digital catalogue</a></li>
				</ul>
            </div>
        </div>

        <div class="footer__social foot_icon_top footer__accordion-item">
            <button type="button" class="title row_top4 footer__accordion-toggle" aria-expanded="false" aria-controls="footer-panel-social">
                <span class="footer__accordion-icon footer__accordion-icon--social" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </span>
                <span class="footer__accordion-label">Connect With Us</span>
                <span class="footer__accordion-chevron" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg>
                </span>
            </button>
            <div class="footer__accordion-panel" id="footer-panel-social">
            <div class="icons">
                <a href="https://www.youtube.com/channel/UC__ZaY9WHmlVMAJiLjXOwRQ" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 30 30">
                        <path d="M28,12.82q0-.78-.12-2a18,18,0,0,0-.31-2.14,3.37,3.37,0,0,0-1-1.78,3.09,3.09,0,0,0-1.81-.84A95.19,95.19,0,0,0,15,5.71a95.18,95.18,0,0,0-9.74.36,3.06,3.06,0,0,0-1.8.84,3.39,3.39,0,0,0-1,1.78,16.06,16.06,0,0,0-.33,2.14Q2,12,2,12.82T2,15q0,1.39,0,2.18t.12,2a18,18,0,0,0,.31,2.14,3.37,3.37,0,0,0,1,1.78,3.09,3.09,0,0,0,1.81.84,95.09,95.09,0,0,0,9.74.36,95.09,95.09,0,0,0,9.74-.36,3.06,3.06,0,0,0,1.8-.84,3.39,3.39,0,0,0,1-1.78,16.07,16.07,0,0,0,.33-2.14q.11-1.2.12-2T28,15Q28,13.61,28,12.82Zm-7.85,3-7.43,4.64a.83.83,0,0,1-.49.15,1,1,0,0,1-.45-.12.86.86,0,0,1-.48-.81V10.36a.86.86,0,0,1,.48-.81.87.87,0,0,1,.94,0l7.43,4.64a.92.92,0,0,1,0,1.57Z"/>
                    </svg>
                </a>
                <a href="https://www.facebook.com/eggstime" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 30 30">
                        <path d="M21,3H17.89c-3.5,0-5.76,2.32-5.76,5.91v2.72H9a.49.49,0,0,0-.49.49v3.95a.49.49,0,0,0,.49.49h3.13v10a.49.49,0,0,0,.49.49H16.7a.49.49,0,0,0,.49-.49v-10h3.66a.49.49,0,0,0,.49-.49V12.12a.49.49,0,0,0-.49-.49H17.19V9.32c0-1.11.26-1.67,1.71-1.67H21a.49.49,0,0,0,.49-.49V3.49A.49.49,0,0,0,21,3Z"/>

                    </svg>
                </a>
                <a href="https://www.pinterest.com/eggstime" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 30 30">
                        <path d="M24.22,9.67c-.66-4.74-5.38-7.16-10.42-6.59-4,.45-8,3.67-8.13,8.28-.1,2.81.7,4.92,3.37,5.52,1.16-2.05-.37-2.5-.61-4-1-6.07,7-10.22,11.19-6,2.9,2.94,1,12-3.68,11-4.47-.9,2.19-8.09-1.38-9.5C11.67,7.3,10.13,12,11.5,14.27,10.7,18.26,9,22,9.66,27c2.28-1.66,3-4.82,3.68-8.13,1.15.7,1.76,1.42,3.22,1.53C22,20.82,25,15,24.22,9.67Z"/>

                    </svg>
                </a>
                <a href="https://twitter.com/sweets_choice" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 30 30">
                        <path d="M27,7.56a9.83,9.83,0,0,1-2.83.78,4.94,4.94,0,0,0,2.16-2.72,9.93,9.93,0,0,1-3.13,1.2,4.93,4.93,0,0,0-8.39,4.49A14,14,0,0,1,4.67,6.15,4.93,4.93,0,0,0,6.2,12.72,4.92,4.92,0,0,1,4,12.11v.06A4.93,4.93,0,0,0,7.91,17a5,5,0,0,1-1.3.17,4.73,4.73,0,0,1-.93-.09,4.93,4.93,0,0,0,4.6,3.42,9.88,9.88,0,0,1-6.11,2.1A10.46,10.46,0,0,1,3,22.53a13.92,13.92,0,0,0,7.55,2.22,13.91,13.91,0,0,0,14-14l0-.64A9.83,9.83,0,0,0,27,7.56Z"/>

                    </svg>
                </a>
                <a href="https://www.instagram.com/eggs_time/" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 30 30">
                        <path class="cls-1" d="M20.92,9.92a.85.85,0,0,1-.85-.85V7.38a.85.85,0,0,1,.85-.85h1.69a.85.85,0,0,1,.85.85V9.08a.85.85,0,0,1-.85.85Z"/><path class="cls-1" d="M15,11.77a3.2,3.2,0,0,0-1.67.48,1.6,1.6,0,0,1,.48-.08,1.64,1.64,0,1,1-1.64,1.64,1.62,1.62,0,0,1,.08-.48A3.19,3.19,0,0,0,11.77,15,3.23,3.23,0,1,0,15,11.77Z"/><path class="cls-1" d="M15,9.92A5.08,5.08,0,1,1,9.92,15,5.08,5.08,0,0,1,15,9.92m0-1.69A6.77,6.77,0,1,0,21.77,15,6.78,6.78,0,0,0,15,8.23Z"/><path class="cls-1" d="M21.88,4H8.13A4.12,4.12,0,0,0,4,8.13V21.88A4.12,4.12,0,0,0,8.13,26H21.88A4.12,4.12,0,0,0,26,21.88V8.13A4.12,4.12,0,0,0,21.88,4Zm2.43,7.62H18.78a5.08,5.08,0,1,1-7.55,0H5.69V8.13A2.44,2.44,0,0,1,8.13,5.69H21.88a2.44,2.44,0,0,1,2.43,2.43Z"/>

                    </svg>
                </a>
                <!--<a href="https://plus.google.com/u/2/108549065340904683135" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 30 30">
                        <path d="M10.82,16.85H15.2a5.56,5.56,0,1,1-1.51-6,.6.6,0,0,0,.82,0l1.61-1.51a.6.6,0,0,0,0-.87,8.93,8.93,0,0,0-6-2.45A9,9,0,1,0,18.9,15.5c0-.06,0-2.06,0-2.06H10.82a.6.6,0,0,0-.6.6v2.2A.6.6,0,0,0,10.82,16.85Z"/><path d="M26.32,13.65V11.5A.52.52,0,0,0,25.8,11H24a.53.53,0,0,0-.53.53v2.15H21.31a.53.53,0,0,0-.53.53V16a.53.53,0,0,0,.53.53h2.15v2.15a.53.53,0,0,0,.53.53H25.8a.52.52,0,0,0,.53-.53V16.51h2.15A.53.53,0,0,0,29,16V14.17a.53.53,0,0,0-.53-.53Z"/>

                    </svg>
                </a>-->
                <a href="<?php echo get_permalink(353)?>">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 30 30">
                        <path d="M26,20.5a2.73,2.73,0,0,1-.35,1.32L18.7,14.05l6.87-6A2.73,2.73,0,0,1,26,9.5v11Zm-11-5L24.56,7.1a2.72,2.72,0,0,0-1.31-.35H6.75a2.71,2.71,0,0,0-1.31.35ZM17.67,15l-2.21,1.94a.69.69,0,0,1-.9,0L12.33,15l-7,7.87a2.72,2.72,0,0,0,1.45.42h16.5a2.72,2.72,0,0,0,1.45-.42ZM4.43,8A2.73,2.73,0,0,0,4,9.5v11a2.72,2.72,0,0,0,.35,1.32L11.3,14Z"/>

                    </svg>
                </a>
            </div>
            <div class="copyright">
                <p>Copyright© <?php echo date('Y')?> Sweets Choice</p>
                <p>All rights reserved. Copying any part of this website without written permission from the owner is a
                    violation of federal law and may result in criminal prosecution and civil liability</p>
              <script id="godaddy-security-s" src="https://cdn.sucuri.net/badge/badge.js" data-s="208" data-i="3364697c3a1670b429275defa4cf407458f424099d" data-p="l" data-c="l" data-t="g"></script>
                          </div>
            </div>
        </div>
        </div>

        <div class="footer__form footform_btm footer__newsletter">
            <div class="footer__newsletter-head">
                <span class="footer__accordion-icon footer__accordion-icon--coupons" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M22 7l-10 7L2 7"/></svg>
                </span>
                <div class="footer__newsletter-text">
                    <p class="footer__newsletter-title">Get Coupons, New Product Releases &amp; More</p>
                    <p class="footer__newsletter-sub">Sign up and be the first to know!</p>
                </div>
            </div>
            <?php echo do_shortcode('[mc4wp_form id="494"]')?>
        </div>
    </div>
</footer>
</div>

<?php wp_footer(); ?>

<div id="upload_photo" class="upload_photo">
  <div class="upload_overlay"></div>
  <div class="upload">
    <div class="close_btn"></div>
    <div class="layout choose_source">

      <div class="title">Upload your content from</div>

	        <?php echo do_shortcode( '[image_form]' );?>

      </div>
    </div>

  </div>
</div>
<div class="scroll-button"></div>
<?php
	global $wp_query;
	$current_cat_slug = $wp_query->query_vars['product_cat'];

	$category = get_term_by( 'slug', $current_cat_slug, 'product_cat' );

	if (is_product()) {
		$toys_product = false;
		$product_id = get_the_id();
		$product_cats = get_the_terms( $product_id, 'product_cat' );
		foreach ($product_cats as $product_cat) {
			if(($product_cat->slug == 'toys') || ($product_cat->parent == 53)){
				$toys_product = true;
			}
		}
	}

	if(($current_cat_slug == 'toys') || ($category->parent == 53) || !empty($toys_product) ){ ?>
		<script type="text/javascript">
			jQuery('li.menu-item').removeClass('current_page_parent');
			jQuery('.menu-item-37233').addClass('current_page_parent');
		</script>
	<?php }
?>
<script src="https://www.youtube.com/player_api" type="text/javascript"></script>
<script>
jQuery(document).ready(function(){

	jQuery('select.country').val('United States').hide().trigger('change');
	jQuery('select#business_country').val('United States').hide().trigger('change');

   jQuery(".desktop-slider .slidesjs-next.slidesjs-navigation").click(function(){
            var slide_nm = jQuery('.desktop-slider .slidesjs-pagination-item a.active').text();
		 
			if(slide_nm == 1){
				var cur_nm = '1';
			}else if(slide_nm == 2){
				var cur_nm = '2-3';
			}else if(slide_nm == 3){
				var cur_nm = '4-5';
			}else if(slide_nm == 4){
				var cur_nm = '6-7';
			}else if(slide_nm == 5){
				var cur_nm = '8-9';
			}else if(slide_nm == 6){
				var cur_nm = '10-11';
			}else if(slide_nm == 7){
				var cur_nm = '12-13';
			}else if(slide_nm == 8){
				var cur_nm = '14-15';
			}else if(slide_nm == 9){
				var cur_nm = '16-17';
			}else if(slide_nm == 10){
				var cur_nm = '18-19';
			}else if(slide_nm == 11){
				var cur_nm = '20-21';
			}else if(slide_nm == 12){
				var cur_nm = '22-23';
			}else if(slide_nm == 13){
				var cur_nm = '24-25';
			}else if(slide_nm == 14){
				var cur_nm = '26-27';
			}else if(slide_nm == 15){
				var cur_nm = '28-29';
			}else if(slide_nm == 16){
				var cur_nm = '30-31';
			}else if(slide_nm == 17){
				var cur_nm = '32-33';
			}else if(slide_nm == 18){
				var cur_nm = '34-35';
			}else if(slide_nm == 19){
				var cur_nm = '36-37';
			}else if(slide_nm == 20){
				var cur_nm = '38-39';
			}else if(slide_nm == 21){
				var cur_nm = '40';
			}
			jQuery('.cur-nm').text(cur_nm);
    });
    
    jQuery(".desktop-slider .slidesjs-previous.slidesjs-navigation").click(function(){
        
    var slide_nm = jQuery('.desktop-slider .slidesjs-pagination-item a.active').text();
		   
			if(slide_nm == 1){
				var cur_nm = '1';
			}else if(slide_nm == 2){
				var cur_nm = '2-3';
			}else if(slide_nm == 3){
				var cur_nm = '4-5';
			}else if(slide_nm == 4){
				var cur_nm = '6-7';
			}else if(slide_nm == 5){
				var cur_nm = '8-9';
			}else if(slide_nm == 6){
				var cur_nm = '10-11';
			}else if(slide_nm == 7){
				var cur_nm = '12-13';
			}else if(slide_nm == 8){
				var cur_nm = '14-15';
			}else if(slide_nm == 9){
				var cur_nm = '16-17';
			}else if(slide_nm == 10){
				var cur_nm = '18-19';
			}else if(slide_nm == 11){
				var cur_nm = '20-21';
			}else if(slide_nm == 12){
				var cur_nm = '22-23';
			}else if(slide_nm == 13){
				var cur_nm = '24-25';
			}else if(slide_nm == 14){
				var cur_nm = '26-27';
			}else if(slide_nm == 15){
				var cur_nm = '28-29';
			}else if(slide_nm == 16){
				var cur_nm = '30-31';
			}else if(slide_nm == 17){
				var cur_nm = '32-33';
			}else if(slide_nm == 18){
				var cur_nm = '34-35';
			}else if(slide_nm == 19){
				var cur_nm = '36-37';
			}else if(slide_nm == 20){
				var cur_nm = '38-39';
			}else if(slide_nm == 21){
				var cur_nm = '40';
			}
			jQuery('.cur-nm').text(cur_nm);
        
    });
    
     jQuery(".mobile-slider .slidesjs-next.slidesjs-navigation").click(function(){
         var slide_nm = jQuery('.mobile-slider .slidesjs-pagination-item a.active').text();
            var cur_nm = slide_nm;
			jQuery('.cur-nm').text(cur_nm);
         
     });
    jQuery(".mobile-slider .slidesjs-previous.slidesjs-navigation").click(function(){
          var slide_nm = jQuery('.mobile-slider .slidesjs-pagination-item a.active').text();
          var cur_nm = slide_nm;
			jQuery('.cur-nm').text(cur_nm);
         
     });
});

if(jQuery(document).width() < 767)
{
	jQuery(".updatebtn-wrap").before(jQuery(".discount .total"));
	jQuery(".total div").css({"width":"45%","display":"inline-block","left":"0","position":"relative","font-size":"25px","font-family":"'ubuntu', sans-serif","font-weight":"700"});
	jQuery(".total").css({"width":"100%","display":"inline-block","border-top":"1px solid #ddd","top":"10px","position":"relative","padding":"15px"});
	jQuery(".total span.woocommerce-Price-amount.amount").css({"color":"#219cc1","font-size":"25px","font-weight":"700","font-family":"'Ubuntu', sans-serif"});
}
    jQuery("#payment").insertBefore(jQuery(".customer__address") );
    jQuery("input#place_order").insertAfter(jQuery(".customer__address") );
    jQuery("#woo_additional_terms_field").insertAfter(jQuery(".customer__address") );
    jQuery('#guest_shopping').click(function() {
        if (jQuery(this).is(':checked')) {
           
            jQuery("input[name='input_guest_billing']").val("1");
        }else{
            jQuery("input[name='input_guest_billing']").val("0");
        }
    });
/*jQuery(".qty").change(function(){

	var url = "<?php echo admin_url('admin-ajax.php'); ?>";
	var qty = jQuery(this).val();
	var cart_item = jQuery(this).attr("name");

	var ret = cart_item.split("cart[");
	var str1 = ret[0];
	var str2 = ret[1];
	var str = str2.split("]");
	var str21 = str[0];
	var str22 = str[1];

	var cart_item_key = str21;

		jQuery.ajax({
		type:"post",
		url: url,
		data:{action:'update_cart',qty:qty,cart_item_key:cart_item_key},
		success:function(res){
			jQuery(".cart-popup-wrapper .cart__badge").html(res);
			jQuery.ajax({
				type:"post",
				url: url,
				data:{action:'refreshed_cart'},
				success:function(res){
					
					jQuery(".cart-popup .shopping").html(res);
					
				},error:function(error){
					alert('error');
				}
			});
		}
	});
	
});*/
</script>
<script>
 	jQuery(".custcuntroy").change(function(){
        var country_name = jQuery(this).val();
		var url = "<?= admin_url('admin-ajax.php');?>";
        jQuery.ajax({
        	type:'post',
        	url:url,
        	data:{action:'country_wise_state',country_name:country_name},
        	success:function(res){
			
        
        	jQuery('select[name="statefromdb"]').html(res);
            }
        });
    });

		jQuery(document).ready(function(){
	    jQuery( "input#phone_no" ).attr("pattern", '[0-9]+');
	    jQuery("input#phone_no ,input#fax_no , input#federal_tax , input#DUNSnumber , #phone , #phone1 , #contact , #shipping_phone , #billing_phone").on("keypress keyup blur",function (event) {    
           jQuery(this).val(jQuery(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
        
        jQuery("input#phone_no ,#phone , #phone1 , #contact , #shipping_phone ,#billing_phone").on("keypress keyup blur",function (event) {    
          if($(event.target).prop('value').length>=10){
            if(event.keyCode!=32){
            return false
            } 
        }
        });
		jQuery(".widgettitle").click(function() {
			//jQuery('#sidebar-primary ul').hide();
			//jQuery('.widgettitle.active').removeClass('active');
			//jQuery(this).next('ul').show();
			//jQuery(this).addClass('active');
			jQuery(this).next('ul').toggleClass('ul-show');
			jQuery(this).toggleClass('active');
		});

		jQuery(".woocommerce-ordering .orderby").click(function() {
			jQuery(this).addClass('active');
		});

		document.querySelector('.custom-select-wrapper').addEventListener('click', function() {
		    this.querySelector('.custom-select').classList.toggle('open');
		});

		for (const option of document.querySelectorAll(".custom-option")) {
			option.addEventListener('click', function() {
			    if (!this.classList.contains('selected')) {
			        this.parentNode.querySelector('.custom-option.selected').classList.remove('selected');
			        this.classList.add('selected');
			        var orderby = jQuery('.custom-option.selected').attr('data-value');
			        jQuery('#custom_orderby').val(orderby);
			        jQuery('.woocommerce-ordering.custom').submit();
			    }
			})
		}


		jQuery(".bapf_head h3").click(function() {
			jQuery(this).parent().next().toggleClass('ul-show');
			jQuery(this).parent().toggleClass('active');
		});
	});

	jQuery(window).bind("load", function() {
		jQuery('.slider--product').css('float','right');
		jQuery('.slider--product').css('width','70%');
		jQuery('.reset_variations').css('visibility','hidden');

		var current_cat = '<?php echo $current_cat_slug; ?>';
		jQuery(".cat-item."+current_cat).addClass('woocommerce-widget-layered-nav-list__item--chosen chosen');

		jQuery( "li.woocommerce-widget-layered-nav-list__item--chosen.chosen" ).parent('ul').addClass('ul-show');
		jQuery( "li.woocommerce-widget-layered-nav-list__item--chosen.chosen" ).parent('ul').prev('.widgettitle').addClass('active');
		//jQuery( "li.woocommerce-widget-layered-nav-list__item--chosen.chosen" ).parent('ul').show();

		var variation_name = jQuery( "li.variable-item.image-variable-item" ).first().attr('title');
		jQuery("span.woo-selected-variation-item-name").text(': ' + variation_name);

		jQuery(".toys-sidebar li.woocommerce-widget-layered-nav-list__item.wc-layered-nav-term").prepend('<input type="checkbox" class="attr-checkbox">');


		jQuery('.attr-checkbox').click(function(){
		    if(jQuery(this).prop("checked") == true){
				var location_href = jQuery(this).next('a').attr('href');
		        window.location.href=location_href;
				jQuery(this).next('a').addClass('test');
		    }
		    else if(jQuery(this).prop("checked") == false){
		        //console.log("Checkbox is unchecked.");
		    }
		});

		jQuery( "li.woocommerce-widget-layered-nav-list__item--chosen.chosen .attr-checkbox").attr('checked', 'checked');
		jQuery( "li.woocommerce-widget-layered-nav-list__item--chosen.chosen .attr-checkbox").attr("disabled", true);
	});
</script>
<script type="text/javascript" src="path/to/jquery"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyACE70q8QLyJic_JvX8AehoS5_L-NMHWRw"></script> 
<script type="text/javascript">
 jQuery(document).ready(function() {
    jQuery(".billing_input #billing_address , .billing_input #city , .billing_input #zip_code , .billing_input #state ").change(function() {
        var city = jQuery('#city').val();
        var address = jQuery('#billing_address').val();
        var zip_code = jQuery('#zip_code').val();
        var state = $("#state").children(":selected").val();
        // send API request
        Locale = 'en';
        $.ajax({
            url: 'https://api.address-validator.net/api/verify',
            type: 'POST',
            data: {
                StreetAddress: address,
                City: city,
                PostalCode: zip_code,
                State: state,
                CountryCode: 'US',

                APIKey: 'av-05f2af03c4a9f36a47da72f36fcfb299'
            },
            dataType: 'json',
            success: function(json) {
               // console.log(json);
                // check API result
                if (typeof(json.status) != "undefined") {

                    status = json.status;

                 
                    if (status == "INVALID" || status == "SUSPECT") {

                        $('.button-block input.has-spinner.button').attr('disabled', 'disabled');
                        if (!jQuery('.form_validation').length) {
                            $('.first_tittle').append("<div class='form_validation'></div>");
                        }
                        $('.form_validation').html("<p class='form-error-show'>Please Enter a Valid Address</p>");

                    } else {

                        $('.button-block input.has-spinner.button').removeAttr("disabled");
                        $('.form_validation').html("");
                    }

                

                    formattedaddress = json.formattedaddress;
                }
            }
        });

    });

     jQuery(".owner_business #own_address , .owner_business #business_city , .owner_business #business_zip ,  .owner_business #business_state  ").change(function() {
        var business_city = jQuery('#business_city').val();
        var own_address = jQuery('#own_address').val();
        var business_zip = jQuery('#business_zip').val();
        var business_state = $("#business_state").children(":selected").val();
        // send API request
        Locale = 'en';
        $.ajax({
            url: 'https://api.address-validator.net/api/verify',
            type: 'POST',
            data: {
                StreetAddress: own_address,
                City: business_city,
                PostalCode: business_zip,
                State: business_state,
                CountryCode: 'US',

                APIKey: 'av-05f2af03c4a9f36a47da72f36fcfb299'
            },
            dataType: 'json',
            success: function(json) {
              // console.log(json);
                // check API result
                if (typeof(json.status) != "undefined") {

                    status = json.status;

                    if (status == "INVALID" || status == "SUSPECT") {

                        $('.button-block input.has-spinner.button').attr('disabled', 'disabled');
                        if (!jQuery('.business_form_validation').length) {
                            $('.business_tittle').append("<div class='business_form_validation'></div>");
                        }
                        $('.business_form_validation').html("<p class='form-error-show'>Please Enter a Valid Address</p>");

                    } else {

                        $('.button-block input.has-spinner.button').removeAttr("disabled");
                        $('.business_form_validation').html("");
                    }

                    formattedaddress = json.formattedaddress;
                }
            }
        });

    });
});
function initialize() {
var input = document.getElementById('shipping_address_1');
var options = {
  componentRestrictions: {country: "us"}
 };
new google.maps.places.Autocomplete(input,options);
}

function initializes() {
var input1 = document.getElementById('billing_address_1');
var options = {
  componentRestrictions: {country: "us"}
 };
new google.maps.places.Autocomplete(input1,options);
}

function initializes_billing() {
var input1 = document.getElementById('billing_address');
var options = {
  componentRestrictions: {country: "us"}
 };
new google.maps.places.Autocomplete(input1,options);
}

function initializes_resale() {
var input1 = document.getElementById('own_address');
var options = {
  componentRestrictions: {country: "us"}
 };
new google.maps.places.Autocomplete(input1,options);
}
function initializes_address() {
var input1 = document.getElementById('address');
var options = {
  componentRestrictions: {country: "us"}
 };
new google.maps.places.Autocomplete(input1,options);
}
function initializes_suplier() {
var input1 = document.getElementById('supplier_address');
var options = {
  componentRestrictions: {country: "us"}
 };
new google.maps.places.Autocomplete(input1,options);
}
function initializes_home() {
var input1 = document.getElementById('home_address');
var options = {
  componentRestrictions: {country: "us"}
 };
new google.maps.places.Autocomplete(input1,options);
}


jQuery(document).ready(function(){

	setInterval(function(){
		var shipping_address = jQuery('#shipping_address_1').val();
		if(shipping_address){
    		if(shipping_address.indexOf(',') > 0){
                var shipping_address_full = shipping_address.split(',');
    		    var shipping_address_1 = shipping_address_full[0];
                jQuery('#shipping_address_1').val(shipping_address_1);
    		}
		}
		
		var resale_billing_address = jQuery('#billing_address').val();
		if(resale_billing_address){
    		if(resale_billing_address.indexOf(',') > 0){
                var resale_billing_full = resale_billing_address.split(',');
    		    var resale_billing_1 = resale_billing_full[0];
                jQuery('#billing_address').val(resale_billing_1);
    		}
		}
		
			var resale_own_address = jQuery('#own_address').val();
		if(resale_own_address){
    		if(resale_own_address.indexOf(',') > 0){
                var resale_own_full = resale_own_address.split(',');
    		    var resale_own_full1 = resale_own_full[0];
                jQuery('#own_address').val(resale_own_full1);
    		}
		}
      
      
	});
	
if ($(window).width() < 768) {
  $(".king_egg").attr('src', '/wp-content/uploads/2022/05/01.png');    
  $(".magik_egg").attr('src', '/wp-content/uploads/2022/05/02.png');    
  $(".skazka_egg").attr('src', '/wp-content/uploads/2022/05/03.png');    
  $(".happy_egg").attr('src', '/wp-content/uploads/2022/05/04-2.png');    
  $(".lucky_egg").attr('src', '/wp-content/uploads/2022/05/05.png');    
  $(".emoji_egg").attr('src', '/wp-content/uploads/2022/05/06-2.png');    
}

});

google.maps.event.addDomListener(window, 'load', initialize);   
google.maps.event.addDomListener(window, 'load', initializes);   
google.maps.event.addDomListener(window, 'load', initializes_billing);   
google.maps.event.addDomListener(window, 'load', initializes_resale);   
google.maps.event.addDomListener(window, 'load', initializes_home);   
google.maps.event.addDomListener(window, 'load', initializes_suplier);   
google.maps.event.addDomListener(window, 'load', initializes_address);   
</script>
<style type="text/css">

	.toycatitem {
		margin: 1% 1% 3% 1%;
	}

	@media screen and (max-width: 1023px) {
		footer.footer .footer__columns .title,
		footer.footer .footer__columns .footer__accordion-toggle {
			text-transform: none !important;
			font-size: 15px !important;
			font-weight: 600 !important;
			color: #204d88 !important;
		}

		footer.footer .footer__accordion-toggle {
			display: flex !important;
			flex-direction: row !important;
			flex-wrap: nowrap !important;
			align-items: center !important;
			justify-content: space-between !important;
			gap: 12px !important;
			padding: 16px 0 14px !important;
		}

		footer.footer .footer__accordion-icon {
			display: inline-flex !important;
			align-items: center !important;
			justify-content: center !important;
			flex: 0 0 36px !important;
			width: 36px !important;
			height: 36px !important;
			min-width: 36px !important;
			max-width: 36px !important;
			border-radius: 50% !important;
			color: #fff !important;
		}

		footer.footer .footer__accordion-icon svg {
			width: 18px !important;
			height: 18px !important;
		}

		footer.footer .footer__accordion-icon--support { background: #e74c3c !important; }
		footer.footer .footer__accordion-icon--about { background: #f39c12 !important; }
		footer.footer .footer__accordion-icon--business { background: #27ae60 !important; }
		footer.footer .footer__accordion-icon--catalogue { background: #3498db !important; }
		footer.footer .footer__accordion-icon--social { background: #8e44ad !important; }
		footer.footer .footer__accordion-icon--coupons { background: #ff6b8a !important; }

		footer.footer .footer__columns > .footer__accordion-item {
			border-bottom: 1px solid rgba(30, 58, 95, 0.22) !important;
		}

		footer.footer .footer__accordion-label {
			flex: 1 1 auto !important;
			min-width: 0 !important;
		}

		footer.footer .footer__accordion-chevron {
			display: inline-flex !important;
			align-items: center !important;
			justify-content: center !important;
			flex: 0 0 28px !important;
			width: 28px !important;
			height: 28px !important;
			min-width: 28px !important;
			max-width: 28px !important;
			overflow: hidden !important;
		}

		footer.footer .footer__accordion-chevron svg {
			display: block !important;
			width: 16px !important;
			height: 16px !important;
			min-width: 16px !important;
			max-width: 16px !important;
			max-height: 16px !important;
		}

		footer.footer .footer__accordion-toggle::before {
			display: none !important;
			content: none !important;
		}

		footer.footer .footer__support .footer__accordion-toggle:after,
		footer.footer .footer__about .footer__accordion-toggle:after,
		footer.footer .footer__business .footer__accordion-toggle:after,
		footer.footer .br_cat .footer__accordion-toggle:after,
		footer.footer .footer__social .footer__accordion-toggle:after {
			display: none !important;
			content: none !important;
		}
	}

	@media screen and (min-width: 1024px) {
		footer.footer .footer__accordion-icon {
			display: none !important;
		}

		footer.footer .footer__newsletter-head {
			display: none !important;
		}

		footer.footer .footer__form .title {
			display: block !important;
		}

		footer.footer .footer__form.footform_btm {
			border-top: 0 !important;
		}

		footer.footer .footer__accordion-chevron {
			display: none !important;
			width: 0 !important;
			height: 0 !important;
			margin: 0 !important;
			padding: 0 !important;
			overflow: hidden !important;
			visibility: hidden !important;
		}

		footer.footer .footer__accordion-toggle {
			display: block !important;
			border: 0 !important;
			background: transparent !important;
			box-shadow: none !important;
			-webkit-appearance: none !important;
			appearance: none !important;
			padding: 0 !important;
			text-transform: uppercase !important;
			color: #000 !important;
			font-weight: 700 !important;
			font-family: inherit !important;
			pointer-events: none !important;
			cursor: default !important;
		}

		footer.footer .footer__accordion-label {
			display: inline !important;
		}

		footer.footer .footer__columns > .footer__accordion-item {
			border-bottom: none !important;
		}

		footer.footer .footer__accordion-panel {
			display: block !important;
		}

		footer.footer .footer__support .footer__accordion-toggle:after,
		footer.footer .footer__about .footer__accordion-toggle:after,
		footer.footer .footer__business .footer__accordion-toggle:after,
		footer.footer .br_cat .footer__accordion-toggle:after,
		footer.footer .footer__social .footer__accordion-toggle:after {
			display: block !important;
			content: '' !important;
			width: 100% !important;
			max-width: 100% !important;
			margin: 0 !important;
			padding-top: 14px !important;
			border-bottom: 1px solid #ff1849 !important;
		}

		footer.footer .footer__accordion-toggle {
			display: block !important;
		}

		footer.footer .center {
			display: block !important;
		}

		footer.footer .footer__columns {
			display: grid !important;
			grid-template-columns: minmax(0, 0.85fr) minmax(0, 1fr) minmax(0, 1.15fr) minmax(0, 1.3fr) minmax(0, 2fr) !important;
			gap: 16px 20px !important;
			width: 100% !important;
			align-items: start !important;
		}

		footer.footer .footer__columns > div {
			width: 100% !important;
			max-width: none !important;
			margin: 0 !important;
			left: 0 !important;
			display: block !important;
			float: none !important;
			vertical-align: top !important;
			min-width: 0 !important;
			overflow: visible !important;
		}

		footer.footer .footer__columns .title,
		footer.footer .footer__columns .footer__accordion-toggle {
			font-size: 14px !important;
			white-space: nowrap !important;
			line-height: 1.3 !important;
			overflow-wrap: normal !important;
			word-break: keep-all !important;
		}

		footer.footer .footer__accordion-label {
			white-space: nowrap !important;
		}

		footer.footer .footer__business {
			padding-bottom: 0 !important;
		}

		footer.footer .footer__form.footform_btm {
			display: block !important;
			width: 100% !important;
			max-width: 100% !important;
			margin: 50px auto 0 !important;
			padding: 0 15px !important;
			text-align: center !important;
			clear: both !important;
			left: auto !important;
			float: none !important;
			font-size: 14px !important;
		}

		footer.footer .footer__form .form,
		footer.footer .footer__form form {
			display: flex !important;
			justify-content: center !important;
			align-items: center !important;
			flex-wrap: nowrap !important;
			max-width: 560px !important;
			margin: 0 auto !important;
		}

		footer.footer .footer__form input[type="text"],
		footer.footer .footer__form input[type="email"] {
			margin-bottom: 0 !important;
			margin-right: 19px !important;
			max-width: 395px !important;
		}
	}

	/* Age Verifier popup — override broken wp-custom-css on catalogue-request */
	#av-wrap,
	#av-overlay-wrap {
		position: fixed !important;
		inset: 0 !important;
		width: 100% !important;
		height: 100% !important;
		z-index: 9999999 !important;
		background: rgba(0, 0, 0, 0.65) !important;
		overflow-y: auto !important;
	}

	#av-inner-scroll-wrap {
		display: table !important;
		width: 100% !important;
		height: 100% !important;
		min-height: 100vh !important;
	}

	#av-inner {
		display: table-cell !important;
		vertical-align: middle !important;
		text-align: center !important;
	}

	#av-content {
		display: inline-block !important;
		width: 100% !important;
		max-width: 520px !important;
		height: auto !important;
		margin: 20px auto !important;
		padding: 28px 24px 24px !important;
		background: #fff !important;
		border: 3px solid #9cc300 !important;
		border-radius: 12px !important;
		box-sizing: border-box !important;
		color: #000 !important;
	}

	div#av-title {
		margin: 0 0 12px !important;
		padding: 0 !important;
		font-size: 22px !important;
		text-align: center !important;
		color: #000 !important;
	}

	div#av-text {
		margin: 0 0 20px !important;
		padding: 0 !important;
		font-size: 15px !important;
		text-align: center !important;
		color: #000 !important;
	}

	#form-birthday,
	div#form-birthday {
		height: auto !important;
		margin: 0 !important;
		padding: 0 !important;
		background: transparent !important;
	}

	#form-birthday-inner {
		display: flex !important;
		flex-wrap: nowrap !important;
		justify-content: center !important;
		gap: 8px !important;
		width: 100% !important;
		height: auto !important;
		overflow: visible !important;
	}

	.birthday-select-wrap {
		float: none !important;
		flex: 1 1 0 !important;
		min-width: 0 !important;
		max-width: 150px !important;
		height: auto !important;
		margin: 0 !important;
		border: none !important;
		background: transparent !important;
		overflow: visible !important;
		position: relative !important;
	}

	#av-wrap .chosen-container {
		width: 100% !important;
		height: 45px !important;
		position: relative !important;
	}

	#av-wrap .chosen-container .chosen-single,
	#av-wrap a.chosen-single {
		height: 45px !important;
		border: 1px solid #9cc300 !important;
		border-radius: 4px !important;
		background: #fff !important;
	}

	#av-wrap .chosen-container .chosen-drop {
		display: none !important;
		position: absolute !important;
		top: calc(100% + 2px) !important;
		left: 0 !important;
		width: 100% !important;
		z-index: 10000001 !important;
		background: #fff !important;
		border: 1px solid #9cc300 !important;
	}

	#av-wrap .chosen-container.chosen-with-drop .chosen-drop {
		display: block !important;
	}

	#av-wrap select.birthday-select,
	#av-wrap select#av_verify_d,
	#av-wrap select#av_verify_m,
	#av-wrap select#av_verify_y {
		display: none !important;
		position: absolute !important;
		left: -9999px !important;
		opacity: 0 !important;
		pointer-events: none !important;
	}

	.chosen-container .chosen-single span,
	a.chosen-single span {
		line-height: 45px !important;
	}

	a.chosen-single b {
		top: 50% !important;
		transform: translateY(-50%) !important;
	}

	#av-submit,
	div#av-submit {
		position: static !important;
		display: inline-block !important;
		width: auto !important;
		min-width: 160px !important;
		height: 48px !important;
		margin: 16px auto 0 !important;
		padding: 0 32px !important;
		top: auto !important;
		left: auto !important;
		line-height: 48px !important;
		font-size: 18px !important;
		background: #9cc300 !important;
		color: #fff !important;
		border-radius: 6px !important;
		clear: both !important;
	}

	@media screen and (max-width: 520px) {
		#av-content {
			max-width: calc(100% - 30px) !important;
			padding: 22px 16px 18px !important;
		}

		#form-birthday-inner {
			flex-wrap: wrap !important;
		}

		.birthday-select-wrap {
			flex: 1 1 100% !important;
			width: 100% !important;
			max-width: 100% !important;
		}
	}

	/* Footer column headings — must load last */
	@media screen and (max-width: 1023px) {
		footer.footer .footer__columns .footer__accordion-toggle {
			font-size: 15px !important;
			font-weight: 600 !important;
			text-transform: none !important;
			white-space: normal !important;
			overflow-wrap: break-word;
		}

		footer.footer .footer__form .title {
			font-size: 15px !important;
			font-weight: 700 !important;
			text-transform: none !important;
			text-align: center !important;
		}
	}

	@media screen and (min-width: 1024px) {
		footer.footer .footer__columns .footer__accordion-toggle {
			font-size: 14px !important;
			white-space: nowrap !important;
			overflow-wrap: normal !important;
			text-transform: uppercase !important;
			color: #000 !important;
			font-weight: 700 !important;
		}

		footer.footer .footer__accordion-label {
			white-space: nowrap !important;
		}

		footer.footer .footer__form .title {
			text-transform: uppercase !important;
			text-align: center !important;
			color: #000 !important;
		}
	}

	@media screen and (min-width: 1280px) {
		footer.footer .footer__columns .footer__accordion-toggle {
			font-size: 15px !important;
		}
	}

	@media screen and (min-width: 1440px) {
		footer.footer .footer__columns .footer__accordion-toggle {
			font-size: 15px !important;
		}
	}
</style>
</body>
</html>
