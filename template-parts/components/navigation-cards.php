<section class="section section--<?php the_sub_field('background_color'); ?> pt<?php the_sub_field('top_spacing'); ?> pb<?php the_sub_field('bottom_spacing'); ?>">
  <!-- Begin Heading Block -->
  <?php get_template_part( 'template-parts/components/clone/heading-block' ); ?>
  <!-- End Heading Block -->
  <div class="row row-site column">
    <div class="card-list card-list--large <?php if (get_sub_field('columns') === "Two") : ?>card-list--2<?php elseif (get_sub_field('columns') === "Three") :?>card-list--3<?php elseif (get_sub_field('columns') === "Four") :?>card-list--4<?php endif; ?>">
      <?php if (have_rows('cards')) : while (have_rows('cards')) : the_row(); ?>
        <!-- Begin Card -->
        <div class="card-list__block">
          <div class="card">
            <div class="card__body">
              <?php if (get_sub_field('headline')) : ?>
              <h3 class="card__headline"><?php if (get_sub_field('link')) : ?><a <?php if (get_sub_field('link')['class']) : ?>class="<?php echo get_sub_field('link')['class']; ?>"<?php endif; ?> href="<?php echo get_sub_field('link')['url']; ?>" <?php if (get_sub_field('link')['target']) : ?>target="_blank"<?php endif; ?>><?php the_sub_field('headline'); ?></a><?php else : ?><?php the_sub_field('headline'); ?><?php endif; ?></h3>
              <?php endif; ?>
              <?php if (get_sub_field('overview')) : ?>
              <div class="card__overview">
                <p><?php the_sub_field('overview'); ?></p>
              </div>
              <?php endif; ?>
            </div>
            <?php if (get_sub_field('link')) : ?>
            <div class="card__action">
              <a <?php if (get_sub_field('link')['class']) : ?>class="<?php echo get_sub_field('link')['class']; ?>"<?php endif; ?> href="<?php echo get_sub_field('link')['url']; ?>" <?php if (get_sub_field('link')['target']) : ?>target="_blank"<?php endif; ?>><span><?php echo get_sub_field('link')['title']; ?></span></a>
            </div>
            <?php endif; ?>
          </div>
        </div>
        <!-- End Card -->
      <?php endwhile; endif; ?>
    </div>
  </div>
</section>
