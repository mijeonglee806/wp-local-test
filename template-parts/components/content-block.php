<!-- Begin Content Block -->
<section class="section section--<?php the_sub_field('background_color'); ?> pt<?php the_sub_field('top_spacing'); ?> pb<?php the_sub_field('bottom_spacing'); ?>">
  <div class="row row-site column">
    <?php if (get_sub_field('full_width')) : ?>
      <?php the_sub_field('content'); ?>
    <?php else : ?>
      <div class="row">
        <div class="medium-11 large-10 xlarge-9 xxlarge-8 medium-centered column article">
          <?php the_sub_field('content'); ?>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>
<!-- End Content Block -->
