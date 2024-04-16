<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta name="theme-color" content="<?php the_field('brand_primary_color', 'option'); ?>">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0" />
  <?php wp_head(); ?>
</head>

<body <?php custom_body_class(); ?>>
  <div class="root">
    <!-- Begin ADA Skip to Main Content -->
    <div class="ada-banner">
      <a class="skip-main" href="#main">Skip to main content</a>
    </div>
    <!-- End ADA Skip to Main Content -->
    <!--Begin Header-->
    <header class="header" role="banner">
      <div class="header__container">
        <!-- Begin Logo -->
        <a href="/" class="logo"><img alt="<?php the_field('name', 'option'); ?> Logo"
            src="/wp-content/uploads/wc0.png" width="180" height="54"></a>
        <!-- End Logo -->
        <!-- Begin Drawer -->
        <div class="drawer">
          <!-- Begin Main Menu -->
          <nav class="menu" aria-label="Main Menu" role="navigation">    
            <?php $mag_menu = mag_tree_menu('22'); ?>
            <ul>
              <?php foreach ($mag_menu as &$primary_menu_item) : ?>
                <li <?php echo mag_menu_classes($primary_menu_item); ?>><a <?php echo mag_menu_attributes($primary_menu_item); ?> href="<?php echo $primary_menu_item->url ?>"><?php echo $primary_menu_item->title; ?></a> 
                  <?php if ( in_array("mega-drop", $primary_menu_item->classes) ) : ?>
                    <div class="mega-menu">
                      <div class="mega-menu__inner">
                        <div class="row column">
                          <div class="mega-menu__row">
                            <div class="mega-menu__block mega-menu__block--card mega-menu__block--1">
                              <div class="mega-menu__card">
                                <h3 class="mega-menu__card-title">Headline</h3>
                                <div class="mega-menu__card-overview">
                                  <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore odit veritatis, repellendus debitis nisi sit sunt quasi expedita vitae ut, corporis, in placeat facere et blanditiis delectus odio cupiditate nesciunt!</p>
                                </div>
                                <div class="mega-menu__card-actions">
                                  <a class="button" href="#">Learn More</a>
                                </div>
                              </div>
                            </div>
                            <div class="mega-menu__block mega-menu__block--card mega-menu__block--2">
                              <div class="mega-menu__card">
                                <h3 class="mega-menu__card-title">Headline</h3>
                                <div class="mega-menu__card-overview">
                                  <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore odit veritatis, repellendus debitis nisi sit sunt quasi expedita vitae ut, corporis, in placeat facere et blanditiis delectus odio cupiditate nesciunt!</p>
                                </div>
                                <div class="mega-menu__card-actions">
                                  <a class="button" href="#">Learn More</a>
                                </div>
                              </div>
                            </div>
                            <div class="mega-menu__block mega-menu__block--card mega-menu__block--3">
                              <div class="mega-menu__card">
                                <h3 class="mega-menu__card-title">Headline</h3>
                                <div class="mega-menu__card-overview">
                                  <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore odit veritatis, repellendus debitis nisi sit sunt quasi expedita vitae ut, corporis, in placeat facere et blanditiis delectus odio cupiditate nesciunt!</p>
                                </div>
                                <div class="mega-menu__card-actions">
                                  <a class="button" href="#">Learn More</a>
                                </div>
                              </div>
                            </div>                           
                          </div>
                        </div>
                      </div>
                    </div>          
                  <?php elseif (!empty($primary_menu_item->wpse_children)) : ?>
                    <ul>
                      <?php foreach ($primary_menu_item->wpse_children as &$secondary_menu_item) : ?>
                        <li<?php echo mag_menu_classes($secondary_menu_item); ?>><a <?php echo mag_menu_attributes($secondary_menu_item); ?> href="<?php echo $secondary_menu_item->url ?>"><?php echo $secondary_menu_item->title; ?></a>
                        <?php if ( !empty($secondary_menu_item->wpse_children) ) : ?>
                          <ul>
                            <?php foreach ($secondary_menu_item->wpse_children as &$tertiary_menu_item) : ?>
                              <li<?php echo mag_menu_classes($tertiary_menu_item); ?>><a <?php echo mag_menu_attributes($tertiary_menu_item); ?> href="<?php echo $tertiary_menu_item->url ?>"><?php echo $tertiary_menu_item->title; ?></a></li>
                            <?php endforeach; ?>
                          </ul>
                        <?php endif; ?>
                        </li>
                      <?php endforeach; ?>
                    </ul>
                  <?php endif; ?>             
                </li>
              <?php endforeach; ?>
              </ul>          
          </nav>
          <!-- End Main Menu -->
          <!-- Begin Utiliy Links -->
          <div class="utility-links">
            <?php /* 
            <?php $mag_menu = mag_tree_menu('[ID]'); ?>
            <ul>
              <?php foreach ($mag_menu as &$primary_menu_item): ?>
                <li<?php echo mag_menu_classes($primary_menu_item); ?>><a class="button secondary" <?php echo mag_menu_attributes($primary_menu_item); ?> href="<?php echo $primary_menu_item->url ?>">
                    <?php echo $primary_menu_item->title; ?>
                  </a></li>
                <?php endforeach; ?>
            </ul>
            */ ?>
          </div>
          <!-- End Utiliy Links -->
        </div>
        <!-- End Drawer -->
      </div>
      <!-- Begin Drawer Toggle -->
      <button class="drawer-toggle reset" aria-label="Mobile Navigation"><span></span></button>
      <!-- End Drawer Toggle -->
    </header>
    <!--End Header-->
    <!--Begin Page Body-->
    <div class="wrapper">
      <!--Begin Main Body-->
      <main id="main" class="main" role="main" tabindex="-1">