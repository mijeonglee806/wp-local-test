<?php
/**********************
* Custom Tree Menu Function Object
  -- custom function for outputting WP menus in recursive format
  -- see cacher for additional instructions and usage https://snippets.cacher.io/snippet/d9bf3ae291349fe158c2
**********************/
function mag_tree_object(array &$elements, $parentId = 0)
{
    $branch = array();
    foreach ($elements as &$element) {
        if ($element->menu_item_parent == $parentId) {
            $children = mag_tree_object($elements, $element->ID);
            if ($children)
                $element->wpse_children = $children;

            $branch[$element->ID] = $element;
            unset($element);
        }
    }
    return $branch;
}

function mag_menu_attributes($menu_item)
{
    $attributes = !empty($menu_item->attr_title) ? ' title="' . esc_attr($menu_item->attr_title) . '"' : '';
    $attributes .= !empty($menu_item->target) ? ' target="' . esc_attr($menu_item->target) . '"' : '';
    $attributes .= !empty($menu_item->xfn) ? ' rel="' . esc_attr($menu_item->xfn) . '"' : '';
    return $attributes;
}

function mag_menu_classes($menu_item)
{
    $class_names = join(' ', $menu_item->classes);
    $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
    return $class_names;
}

function mag_tree_menu($menu_id)
{
    $items = wp_get_nav_menu_items($menu_id);
    return $items ? mag_tree_object($items, 0) : null;
}


/* Example Usage:

// Example markup for basic menu. '24' is the menu ID. Can also use menu slug but ID tends to be easier to grab

<?php $mag_menu = mag_tree_menu( '24' ); ?>
 
<ul>
<?php foreach ($mag_menu as &$primary_menu_item) : ?>
  <li<?php echo mag_menu_classes($primary_menu_item); ?>><a <?php echo mag_menu_attributes($primary_menu_item); ?> href="<?php echo $primary_menu_item->url ?>"><?php echo $primary_menu_item->title; ?></a>
  <?php if ( !empty($primary_menu_item->wpse_children) ) : ?>
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

// Example markup for mega menu.

<?php $mag_menu = mag_tree_menu( 'main-menu' ); ?>
 
<ul>
<?php foreach ($mag_menu as &$primary_menu_item) : ?>
  <li <?php echo mag_menu_classes($primary_menu_item); ?>><a <?php echo mag_menu_attributes($primary_menu_item); ?> href="<?php echo $primary_menu_item->url ?>"><?php echo $primary_menu_item->title; ?></a>
  <?php if ( !empty($primary_menu_item->wpse_children) ) : ?>
    <?php if ( in_array("mega-drop", $primary_menu_item->classes) ) : ?>
      <div class="mega-menu">
        <div class="mega-menu__inner">
          <div class="mega-menu__nav">
            <ul>
              <?php foreach ($primary_menu_item->wpse_children as &$secondary_menu_item) : ?>
                <li<?php echo mag_menu_classes($secondary_menu_item); ?>><a <?php echo mag_menu_attributes($secondary_menu_item); ?> href="<?php echo $secondary_menu_item->url ?>"><?php echo $secondary_menu_item->title; ?></a>
                <?php if ( !empty($secondary_menu_item->wpse_children) ) : ?>
                  <div class="mega-menu__nav-sub">
                    <ul>
                      <?php foreach ($secondary_menu_item->wpse_children as &$tertiary_menu_item) : ?>
                        <li<?php echo mag_menu_classes($tertiary_menu_item); ?>><a <?php echo mag_menu_attributes($tertiary_menu_item); ?> href="<?php echo $tertiary_menu_item->url ?>"><span><?php echo $tertiary_menu_item->title; ?></span> <?php echo $tertiary_menu_item->description; ?></a></li>
                      <?php endforeach; ?>
                    </ul>
                  </div>
                <?php endif; ?>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>
    <?php else : ?>
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
  <?php endif; ?>
  </li>
<?php endforeach; ?>
</ul>

*/