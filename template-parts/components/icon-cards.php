<?php $ic_card_box = get_sub_field('card_box'); ?>
<section class="section section--<?php the_sub_field('background_color'); ?> pt<?php the_sub_field('top_spacing'); ?> pb<?php the_sub_field('bottom_spacing'); ?>">
  <!-- Begin Heading Block -->
  <?php get_template_part( 'template-parts/components/clone/heading-block' ); ?>
  <!-- End Heading Block -->
  <div class="row row-site column">
    <div class="row medium-up-2 <?php if (get_sub_field('columns') === "Three") : ?>large-up-3<?php elseif (get_sub_field('columns') === "Four") :?>xlarge-up-4<?php endif; ?> block-icon-list <?php if ($ic_card_box) : ?>block-icon-list--card<?php endif; ?>">
      <?php if (have_rows('icon_card')) : while (have_rows('icon_card')) : the_row(); ?>
        <!-- Begin Block Icon -->
        <div class="column column-block">
          <?php if (get_sub_field('link')) : ?>
          <a class="block-icon<?php if ($ic_card_box) : ?> block-icon--card<?php endif; ?> <?php echo get_sub_field('link')['class']; ?>" href="<?php echo get_sub_field('link')['url']; ?>" <?php if (get_sub_field('link')['target']) : ?>target="_blank"<?php endif; ?>>
          <?php else : ?>
          <div class="block-icon<?php if ($ic_card_box) : ?> block-icon--card<?php endif; ?>">
          <?php endif; ?>
            <?php if (get_sub_field('icon')) : ?>              
            <div class="block-icon__icons">
              <div class="block-icon__icon-inner">
                <div class="block-icon__icon"><span class="<?php the_sub_field('icon'); ?>"></span></div>
              </div>
            </div>
            <?php endif; ?>
            <?php if (get_sub_field('headline')) : ?>
            <h5 class="block-icon__title"><?php the_sub_field('headline'); ?></h5>
            <?php endif; ?>
            <?php if (get_sub_field('overview')) : ?>
            <p class="block-icon__overview"><?php the_sub_field('overview'); ?></p>
            <?php endif; ?>
            <?php if (get_sub_field('link') && get_sub_field('link')['title']) : ?>
            <span class="button"><?php echo get_sub_field('link')['title']; ?></span>
            <?php endif; ?>
          <?php if (get_sub_field('link')) : ?>
          </a>
          <?php else : ?>
          </div>
          <?php endif; ?>
        </div>
        <!-- End Block Icon -->
      <?php endwhile; endif; ?>
    </div>
  </div>
</section>
