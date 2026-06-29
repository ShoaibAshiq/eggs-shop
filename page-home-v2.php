<?php
/**
 * Template for Home v2 page (slug: home-v2)
 * Dedicated layout — keep WP editor empty.
 */
get_header();
?>

<div class="main main--home-v2">
    <div class="et-home">

        <?php get_template_part( 'template-parts/home-v2', 'hero' ); ?>

        <div class="et-home__bg-band et-home__bg-band--playful">
            <?php get_template_part( 'template-parts/home-v2', 'characters' ); ?>

            <?php get_template_part( 'template-parts/home-v2', 'best-sellers' ); ?>
        </div>

        <?php get_template_part( 'template-parts/home-v2', 'stories' ); ?>

        <?php get_template_part( 'template-parts/home-v2', 'youtube' ); ?>

        <?php get_template_part( 'template-parts/home-v2', 'products' ); ?>

        <?php get_template_part( 'template-parts/home-v2', 'parent-benefits' ); ?>

        <?php get_template_part( 'template-parts/home-v2', 'parent-trust' ); ?>

        <?php get_template_part( 'template-parts/home-v2', 'distributor' ); ?>

        <?php get_template_part( 'template-parts/home-v2', 'social' ); ?>

        <?php get_template_part( 'template-parts/home-v2', 'cta' ); ?>

    </div>
</div>

<?php get_footer(); ?>
