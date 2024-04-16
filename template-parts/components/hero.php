<?php
  // Define header image variable
  $hero_image = "";

  // Setup Page Headers for Taxonomy Pages
  $id_term = "";
  if (is_tax()) {
    $id_term = get_queried_object();
  }

  // Hero Fields
  $hero_background = get_field('hero_settings', $id_term)['background'];
  $hero_h1_tag = get_field('hero_settings', $id_term)['h1'];
  $hero_video_background = get_field('hero_video_background', $id_term);
  $hero_image_background = get_field('hero_image_background', $id_term);
  $hero_label = get_field('hero_label', $id_term);
  $hero_headline = get_field('hero_headline', $id_term);
  $hero_subheadline = get_field('hero_subheadline', $id_term);
  $hero_overview = get_field('hero_overview', $id_term);
  $hero_button = get_field('hero_button', $id_term);
  //pretty_dump($hero_image_background);
  $hlt = "span";
  $hht = "h1";
  $hsht = "h2";
  if ($hero_h1_tag === "Label") {
    $hlt = "h1";
    $hht = "h2";
    $hsht = "h3";
  }

?>
<section class="hero">
  <div class="hero__bg" <?php if ($hero_image_background && $hero_background === "Image") : ?>style="background-image:url('<?php echo $hero_image_background['url']; ?>')<?php endif; ?>">
    <?php if ($hero_background === "Video" && $hero_video_background) : ?>
    <video autoplay="" loop="" muted="" playsinline="" class="hero__bg-video" poster="">
      <source src="<?php echo $hero_video_background['url']; ?>" type="video/mp4">
    </video>
    <?php endif; ?>
  </div>
  <div class="hero__container">
    <div class="hero__body">
      <div class="row row-site column">
        <?php if ($hero_label) : ?>
          <<?php echo $hlt; ?> class="hero__label label label--secondary"><?php echo $hero_label; ?></<?php echo $hlt; ?>>
        <?php endif; ?>
        <?php if ($hero_headline) : ?>
          <<?php echo $hht; ?> class="hero__headline page-title"><?php echo $hero_headline; ?></<?php echo $hht; ?>>
        <?php elseif (get_the_title()) : ?>
          <<?php echo $hht; ?> class="hero__headline page-title"><?php the_title(); ?></<?php echo $hht; ?>>
        <?php else : ?>
          <<?php echo $hht; ?> class="hero__headline page-title"><?php echo get_bloginfo(); ?></<?php echo $hht; ?>>
        <?php endif; ?>
        <?php if ($hero_subheadline) : ?>
          <<?php echo $hsht; ?> class="hero__subheadline"><?php echo $hero_subheadline; ?></<?php echo $hsht; ?>>
        <?php endif; ?>
        <?php if ($hero_overview) : ?>
          <p class="hero__overview"><?php echo $hero_overview; ?></p>
        <?php endif; ?>
        <?php if ($hero_button) : ?>
          <div class="hero__action">
            <a class="button secondary button--arrow <?php echo $hero_button['class']; ?>" href="<?php echo $hero_button['url']; ?>" <?php if ($hero_button['target']) : ?>target="_blank"<?php endif; ?>><?php echo $hero_button['title']; ?></a>
          </div>
        <?php endif; ?>
      </div>
    </div>

  </div>
</section>
