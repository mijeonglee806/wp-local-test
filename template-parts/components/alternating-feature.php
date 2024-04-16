<!-- Begin Component - Alternating Feature -->
<section class="section featured-image-section section--<?php the_sub_field('background_color'); ?> pt<?php the_sub_field('top_spacing'); ?> pb<?php the_sub_field('bottom_spacing'); ?>">
  <div class="row row-site column">
    <div class="featured-image featured-image--<?php the_sub_field('image_align'); ?>">
      <div class="featured-image__content">
        <div class="featured-image__body">
          <?php if (get_sub_field('label')) : ?>
          <h2 class="featured-image__label label"><?php the_sub_field('label'); ?></h2>
          <?php endif; ?>
          <?php if (get_sub_field('headline')) : ?>
          <h3 class="featured-image__headline h1 <?php if (get_sub_field('label')) : ?>dark-blue<?php endif; ?>"><?php the_sub_field('headline'); ?></h3>
          <?php endif; ?>
          <?php if (get_sub_field('subheadline')) : ?>
          <h4 class="featured-image__subheadline subheader"><?php the_sub_field('subheadline'); ?></h4>
          <?php endif; ?>
          <?php if (get_sub_field('overview')) : ?>
          <div class="featured-image__overview">
            <?php the_sub_field('overview'); ?>
          </div>
          <?php endif; ?>
          <?php if (get_sub_field('button')) : ?>
          <div>
            <a class="button button--arrow <?php echo get_sub_field('button')['class']; ?>" href="<?php echo get_sub_field('button')['url']; ?>" <?php if (get_sub_field('button')['target']) : ?>target="_blank"<?php endif; ?>><?php echo get_sub_field('button')['title']; ?></a>
          </div>
          <?php endif; ?>
        </div>
      </div>
      <div class="featured-image__image">
        <img src="<?php echo get_sub_field('image')['url']; ?>" width="<?php echo get_sub_field('image')['width']; ?>" height="<?php echo get_sub_field('image')['height']; ?>" alt="<?php echo esc_attr(get_sub_field('image')['alt']); ?>" />
      </div>
    </div>
  </div>
</section>
<!-- End Component - Alternating Feature -->
