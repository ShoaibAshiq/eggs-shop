<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 */

?>
<?php get_template_part( 'template-parts/footer', 'site' ); ?>
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
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=<?php echo defined('GOOGLE_MAPS_API_KEY') ? GOOGLE_MAPS_API_KEY : ''; ?>"></script>
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

</style>
</body>
</html>
