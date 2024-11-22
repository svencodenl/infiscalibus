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