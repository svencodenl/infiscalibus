<?php

/**
 * Removes some menus by page.
 */
if (! function_exists('deregister_post_type')) {
  function wpdocs_remove_menus()
  {
    remove_menu_page('edit.php'); // Posts
    remove_menu_page('edit-comments.php'); // Comments
  }
}
add_action('admin_menu', 'wpdocs_remove_menus');

/**
 * Adds the option to get nested menu items to wp_nav_menu function
 */
if ( ! function_exists( 'recursive_mitems_to_array' ) ) {
  /**
   * @param $items
   * @param int $parent
   *
   * @return array
   */
  function recursive_mitems_to_array( $items, $parent = 0 )
  {
      $bundle = [];
      foreach ( $items as $item ) {
          if ( $item->menu_item_parent == $parent ) {
              $child               = recursive_mitems_to_array( $items, $item->ID );
              $bundle[ $item->ID ] = [
                  'item'   => $item,
                  'childs' => $child
              ];
          }
      }

      return $bundle;
  }
}