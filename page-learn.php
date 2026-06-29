<?php
/**
 * Template Name: Learn Page
 * PHP 8.3 Compatible
 */

get_header();

// Get banner image
$banner_field = get_field( 'add_new_banner_images' );
$banner_image = '';

if ( $banner_field === 'yes' ) {
    $banner_image = get_field( 'banner_image' );
} elseif ( function_exists( 'image_name' ) && isset( $name ) ) {
    $banner_image = IMGEDIR . image_name( $name );
}
?>

<div class="main">
    <div class="head head--learn">
        <?php if ( $banner_image ) : ?>
            <img src="<?php echo esc_url( $banner_image ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" />
        <?php endif; ?>
        <div class="head__title"><?php the_title(); ?></div>
    </div>
    
    <div class="learn">
        <div class="learn__stories">
            <div class="center center--type2">
                <div class="title">Stories</div>
                
                <!-- King Egg Stories -->
                <div class="logo logo--king" style="background-image: url('<?php echo esc_url( home_url( '/wp-content/uploads/2019/01/king.png' ) ); ?>')"></div>
                <div class="items items-king">
                    <?php
                    if ( is_active_sidebar( 'stories-king-eggs' ) ) {
                        dynamic_sidebar( 'stories-king-eggs' );
                    }
                    ?>
                </div>
                
                <!-- Magik Egg Stories -->
                <div class="logo logo--magik" style="background-image: url('<?php echo esc_url( home_url( '/wp-content/uploads/2019/01/magik.png' ) ); ?>')"></div>
                <div class="items items-magik">
                    <?php
                    if ( is_active_sidebar( 'stories-magik-eggs' ) ) {
                        dynamic_sidebar( 'stories-magik-eggs' );
                    }
                    ?>
                </div>
                
                <!-- Lucky Egg Stories -->
                <div class="logo logo--lucky" style="background-image: url('<?php echo esc_url( home_url( '/wp-content/uploads/2019/01/lucky-1.png' ) ); ?>')"></div>
                <div class="items items-lucky">
                    <?php
                    if ( is_active_sidebar( 'stories-lucky-eggs' ) ) {
                        dynamic_sidebar( 'stories-lucky-eggs' );
                    }
                    ?>
                </div>
                
                <!-- Happy Egg Stories -->
                <div class="logo logo--happy" style="background-image: url('<?php echo esc_url( home_url( '/wp-content/uploads/2019/01/happy.png' ) ); ?>')"></div>
                <div class="items items-happy">
                    <?php
                    if ( is_active_sidebar( 'stories-happy-eggs' ) ) {
                        dynamic_sidebar( 'stories-happy-eggs' );
                    }
                    ?>
                </div>
            </div>
        </div>
        
        <!-- Games Section (Commented Out) -->
        <!--
        <div class="learn__games">
            <div class="center center--type2">
                <div class="title">Games</div>
                <div class="items">
                    <?php
                    // if ( is_active_sidebar( 'games' ) ) {
                    //     dynamic_sidebar( 'games' );
                    // }
                    ?>
                </div>
            </div>
        </div>
        -->
    </div>
</div>

<?php get_footer(); ?>