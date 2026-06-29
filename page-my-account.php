<?php
get_header();
the_post();
?>
    <div class="main">

        <div class="head head--account">
         <?php $bannerfield = get_field('add_new_banner_images');
        if($bannerfield =='yes'){
            $getbanner = get_field('banner_image');
            echo '<img src="'.$getbanner.'" />';
        }
        else{
?>
            <img src="<?php echo IMGEDIR.image_name($name)?>" />
            <?php } ?>
            <div class="head__title">My Account</div>
        </div>
        <div class="account">
            <div class="center">
                <div class="top">
                    <div class="text">Welcome to your account. Here you can manage all of your personal information and
                        orders.
                    </div>
                    <a href="/" class="button">Home</a>
                </div>

                    <?php
                    echo do_shortcode("[woocommerce_my_account]");
                    ?>

            </div>

        </div>

    </div>


<?php
get_footer();
