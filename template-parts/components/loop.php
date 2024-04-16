<?php if (have_rows('components')) : while (have_rows('components')) : the_row(); ?>

<?php if (get_row_layout() == 'heading_block') : ?>
  <?php get_template_part( 'template-parts/components/heading-block' ); ?>
<?php elseif (get_row_layout() == 'two_column_heading_block') : ?>
  <?php get_template_part( 'template-parts/components/two-column-heading-block' ); ?>
<?php elseif (get_row_layout() == 'content_block') : ?>
  <?php get_template_part( 'template-parts/components/content-block' ); ?>
<?php elseif (get_row_layout() == 'alternating_feature') : ?>
  <?php get_template_part( 'template-parts/components/alternating-feature' ); ?>
<?php elseif (get_row_layout() == 'content_columns') : ?>
  <?php get_template_part( 'template-parts/components/content-columns' ); ?>
<?php elseif (get_row_layout() == 'icon_cards') : ?>
  <?php get_template_part( 'template-parts/components/icon-cards' ); ?>
<?php elseif (get_row_layout() == 'navigation_cards') : ?>
  <?php get_template_part( 'template-parts/components/navigation-cards' ); ?>
<?php elseif (get_row_layout() == 'article_cards') : ?>
  <?php get_template_part( 'template-parts/components/article-cards' ); ?>
<?php elseif (get_row_layout() == 'checkmark_columns') : ?>
  <?php get_template_part( 'template-parts/components/checkmark-columns' ); ?>
<?php elseif (get_row_layout() == 'global_component') : ?>
  <?php get_template_part( 'template-parts/components/global-component' ); ?>
<?php elseif (get_row_layout() == 'custom') : ?>
  <?php get_template_part( 'template-parts/components/custom' ); ?>
<?php endif; ?>

<?php endwhile; endif; ?>
