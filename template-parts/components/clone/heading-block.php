<?php if (get_sub_field('label') || get_sub_field('headline') || get_sub_field('subheadline') || get_sub_field('overview') || get_sub_field('button')) : ?>
<div class="heading-block mb<?php the_sub_field('hb_bottom_spacing'); ?>">
  <div class="row row-site column">
    <div class="row">
      <div class="medium-11 large-10 xlarge-9 xxlarge-8 medium-centered column">
        <?php if (get_sub_field('label')) : ?>
        <h2 class="label label"><?php the_sub_field('label'); ?></h2>
        <?php endif; ?>
        <?php if (get_sub_field('headline')) : ?>
        <h3 class="h1 <?php if (get_sub_field('label')) : ?>dark-blue<?php endif; ?>"><?php the_sub_field('headline'); ?></h3>
        <?php endif; ?>
        <?php if (get_sub_field('subheadline')) : ?>
        <h4 class="<?php if (get_sub_field('overview')) : ?>h3<?php endif; ?> subheader"><?php the_sub_field('subheadline'); ?></h4>
        <?php endif; ?>
        <?php if (get_sub_field('overview')) : ?>
        <div class="heading-block__overview">
          <?php the_sub_field('overview'); ?>
        </div>
        <?php endif; ?>
        <?php if (get_sub_field('cta_title') || get_sub_field('button') || get_sub_field('button_secondary')) : ?>
        <div class="heading-block__cta">
          <?php if (get_sub_field('cta_title')) : ?>
          <h5 class="h4 mb4"><?php the_sub_field('cta_title'); ?></h5>
          <?php endif; ?>
          <?php if (get_sub_field('button')) : ?>
          <a class="button button--arrow <?php echo get_sub_field('button')['class']; ?>" href="<?php echo get_sub_field('button')['url']; ?>" <?php if (get_sub_field('button')['target']) : ?>target="_blank"<?php endif; ?>><?php echo get_sub_field('button')['title']; ?></a>
          <?php endif; ?>
          <?php if (get_sub_field('button_secondary')) : ?>
          <a class="button secondary button--arrow <?php echo get_sub_field('button_secondary')['class']; ?>" href="<?php echo get_sub_field('button_secondary')['url']; ?>" <?php if (get_sub_field('button_secondary')['target']) : ?>target="_blank"<?php endif; ?>><?php echo get_sub_field('button_secondary')['title']; ?></a>
          <?php endif; ?>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
