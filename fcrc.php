<?php
/*Template Name: Free catalogue request confirmation*/
get_header();
?>
<div class="fcrcmd">
	<h2>Free catalogue request confirmation</h2>
    <hr>
    <h5>Congratulations! We will send you a catalog when it's available.</h5>
    <h4>Your catalogue is being sent to:</h4>
    <div class="fcrc-inner">
    	<!-- <script type="text/javascript">
			jQuery(document).ready(function() {
				var url = window.location.href;
				var urlstring = url.split("?text-927=")[1];
				var urlstring1 = urlstring.split("&text-993=")[1];
				var s = urlstring.substring(0, urlstring.indexOf('&text-993='));
				//var te = document.write(s);
				//console.log(s);

				var separray = s.split(',');
				var separray1 = urlstring1.split(',');
				
				/*var my_array = [];
				var my_array1 = [];
				var arrnum1 = separray.length;
				var arrnum2 = separray1.length;*/
				jQuery(separray).each(function(l,v){ 
					//console.log(v);
					jQuery(".fcrc-inner").append("<div class='inner-add'>"+jQuery.trim(v.replace(/%20/g, " "))+"</div>");
					//console.log(v);
					/*my_array.push(jQuery.trim(i.replace(/%20/g, " "))); */
				});
				jQuery(separray1).each(function(l,v){ 
					//console.log(v);
					jQuery(".fcrc-inner1").append("<div class='inner-add1'>"+jQuery.trim(v.replace(/%20/g, " "))+"</div>");
					//console.log(v);
					/*my_array.push(jQuery.trim(i.replace(/%20/g, " "))); */
				});
				//alert(arrnum1);
				/*for(var i=0; i<arrnum1; i++) {
					my_array.push(jQuery.trim(i.replace(/%20/g," ")));
				}
				console.log(my_array);*/
				/*jQuery(separray).each(function(l,v){ 
					my_array.push(jQuery.trim(i.replace(/%20/g, " "))); 
				});*/
				/*var arrnum = my_array.length;
				
				for(var i=0;i<=arrnum;i++) {
					jQuery(".fcrc-inner").text("Appended text"+my_array[i]+"");
				}*/
				/* console.log(my_array); */
				/*jQuery(".fcrc-inner").text("Appended text");*/
			});	
		</script> -->
    </div>
    <div class="fcrc-inner1">
    	<?php
    			if(isset($_GET['first-name']) && isset($_GET['last-name'])):
    					echo "<div class='inner-add1'>".$_GET['first-name']."&nbsp;".$_GET['last-name']."</div>";
    		    endif;

    		    if(isset($_GET['text-927']) && isset($_GET['text-993'])):
    					echo "<div class='inner-add1'>".$_GET['text-927']."&nbsp;".$_GET['text-993']."</div>";
    		    endif;
    		    if(isset($_GET['id:city']) && isset($_GET['postcode'])):
    		    		echo "<div class='inner-add1'>".$_GET['id:city']."&nbsp;".$_GET['postcode']."</div>";
    		    endif;

    	?></div>
    <div class="shopbtn"><a href="https://eggstime.com/products/">Continue Shopping</a></div>
</div>
<?php get_footer(); ?>