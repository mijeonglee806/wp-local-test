<?php get_header(); ?>
<?php if (have_posts()):
    while (have_posts()):
        the_post(); ?>
        <!-- Begin Hero -->
        <?php get_template_part('template-parts/components/hero'); ?>
        <!-- End Hero -->
        <!-- Begin Components -->
        <?php get_template_part('template-parts/components/loop'); ?>
        <!-- End Components -->
    <?php endwhile; endif; ?>
<?php get_footer(); ?>