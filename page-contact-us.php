<?php
get_header();

$address = get_field('full_address', $post->ID);
$tel = get_field('telephone', $post->ID);
$mail = get_field('email', $post->ID);
?>
  <div class="main">

    <div class="head head--contact">
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
    <div class="contact-us">
      <div class="center">
        <div class="contact__form">

        <?php echo do_shortcode('[contact-form-7 id="352" title="Contact form"]')?>
        </div>
        <div class="contact__info">
          <div class="title">Contact information</div>
          <div class="contact-item"><div class="contact-icon"><svg xmlns="http://www.w3.org/2000/svg" class="icon"><use xlink:href="<?php echo TEMPLATEURI; ?>/svg/contact_icons.svg#location"></use></svg></div><div class="contact-text"><?php echo $address?></div></div>
          <div class="contact-item"><div class="contact-icon"><svg xmlns="http://www.w3.org/2000/svg" class="icon"><use xlink:href="<?php echo TEMPLATEURI; ?>/svg/contact_icons.svg#phone"></use></svg></div><div class="contact-text"><?php echo $tel?></div></div>
          <div class="contact-item"><div class="contact-icon"><svg xmlns="http://www.w3.org/2000/svg" class="icon"><use xlink:href="<?php echo TEMPLATEURI; ?>/svg/contact_icons.svg#email"></use></svg></div><div class="contact-text"><?php echo $mail?></div></div>
        </div>
      </div>
    </div>

  </div>
<?php get_footer();