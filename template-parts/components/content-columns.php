<section class="section section--<?php the_sub_field('background_color'); ?> pt<?php the_sub_field('top_spacing'); ?> pb<?php the_sub_field('bottom_spacing'); ?>">
  <!-- Begin Heading Block -->
  <?php get_template_part( 'template-parts/components/clone/heading-block' ); ?>
  <!-- End Heading Block -->
  <div class="row row-site column">
    <div class="row text-grid-col<?php if (get_sub_field('columns') === "Two") : ?> medium-up-2 text-grid-col--2<?php else : ?> large-up-3 text-grid-col--3<?php endif; ?>">
      <?php if (have_rows('column')) : while (have_rows('column')) : the_row(); ?>
        <div class="columns">
          <div class="text-grid-col__block">
            <?php if (get_sub_field('headline')) : ?>
            <h3><?php the_sub_field('headline'); ?></h3>
            <?php endif; ?>
            <?php the_sub_field('overview'); ?>
            <?php if (get_sub_field('link')) : ?>
            <a class="text-button text-button--arrow <?php echo get_sub_field('link')['class']; ?>" href="<?php echo get_sub_field('link')['url']; ?>" <?php if (get_sub_field('link')['target']) : ?>target="_blank"<?php endif; ?>><?php echo get_sub_field('link')['title']; ?></a>
            <?php endif; ?>
          </div>
        </div>
      <?php endwhile; endif; ?>
    </div>
  </div>
</section>
