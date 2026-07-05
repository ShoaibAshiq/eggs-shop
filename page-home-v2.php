<?php
/**
 * Template for Home v2 page (slug: home-v2)
 * Dedicated layout — keep WP editor empty.
 *
 * Approved section order:
 * 1. Hero
 * 2. Choose Your Egg World
 * 3. Best Sellers
 * 4. Stories That Teach & Inspire
 * 5. Watch & Learn
 * 6. Collect, Play & Learn
 * 7. Fun in Every Egg
 * 8. Why Parents Love Eggs Time + Certifications (one trust section)
 * 9. Join the Eggs Time Community
 * 10. Become an Eggs Time Distributor
 * 11. Interested in Our Products
 * 12. Learn and Joy + Eggs Time Games (footer stack)
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

        <?php get_template_part( 'template-parts/home-v2', 'fun-egg' ); ?>

        <?php get_template_part( 'template-parts/home-v2', 'parent-benefits' ); ?>

        <?php get_template_part( 'template-parts/home-v2', 'social' ); ?>

        <?php get_template_part( 'template-parts/home-v2', 'distributor' ); ?>

        <?php get_template_part( 'template-parts/home-v2', 'cta' ); ?>

        <?php get_template_part( 'template-parts/home-v2', 'games-extra' ); ?>
    </div>
</div>

<?php get_footer(); ?>
