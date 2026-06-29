<?php
/**
 * Template for License page (slug: license)
 * Replaces default page.php head banner + title — no conflicts.
 */
get_header();
?>

<div class="main main--license">
    <div class="et-license">

        <?php get_template_part( 'template-parts/license', 'hero' ); ?>

        <?php get_template_part( 'template-parts/license', 'brands' ); ?>

        <?php get_template_part( 'template-parts/license', 'products' ); ?>

        <?php get_template_part( 'template-parts/license', 'categories' ); ?>

        <?php get_template_part( 'template-parts/license', 'info' ); ?>

        <?php get_template_part( 'template-parts/license', 'contact' ); ?>

        <?php get_template_part( 'template-parts/license', 'cta' ); ?>

    </div>
</div>

<?php get_footer(); ?>
