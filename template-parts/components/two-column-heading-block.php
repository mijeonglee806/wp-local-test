<section class="section section--<?php the_sub_field('background_color'); ?> pt<?php the_sub_field('top_spacing'); ?> pb<?php the_sub_field('bottom_spacing'); ?>">
  <div class="two-col-heading-block">
    <div class="row row-site column">
      <div class="two-col-heading-block__left">
        <?php if (get_sub_field('left_headline')) : ?>
        <h3 class="h1 mb2"><?php the_sub_field('left_headline'); ?></h3>
        <?php endif; ?>
        <?php if (get_sub_field('left_overview')) : ?>
        <div class="two-col-heading-block__overview">
          <p><?php the_sub_field('left_overview'); ?></p>
        </div>
        <?php endif; ?>
        <?php if (get_sub_field('left_button')) : ?>
        <div class="two-col-heading-block__action mt3">
          <a class="button button--arrow <?php echo get_sub_field('left_button')['class']; ?>" href="<?php echo get_sub_field('left_button')['url']; ?>" <?php if (get_sub_field('left_button')['target']) : ?>target="_blank"<?php endif; ?>><?php echo get_sub_field('left_button')['title']; ?></a>
        </div>
        <?php endif; ?>
      </div>
      <div class="two-col-heading-block__right">
        <div class="two-col-heading-block__overview">
          <?php if (get_sub_field('right_headline')) : ?>
          <h3><?php the_sub_field('right_headline'); ?></h3>
          <?php endif; ?>
          <?php if (get_sub_field('right_overview')) : ?>
          <p><?php the_sub_field('right_overview'); ?></p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
