<?php

/**
 * Add / remove user roles
 */
add_action('init', function () {
  add_role(
    'reunist', // Role slug
    'Reunist', // Display name
    [
      'read'         => true,  // Can read content
    ]
  );

  foreach (['editor', 'author', 'contributor', 'viewer'] as $role) {
    remove_role($role);
  }

  // Reset roles
  // if ( !function_exists( 'populate_roles' ) ) {
  //   require_once( ABSPATH . 'wp-admin/includes/schema.php' );
  // }

  // populate_roles();
});


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
if (! function_exists('recursive_mitems_to_array')) {
  /**
   * @param $items
   * @param int $parent
   *
   * @return array
   */
  function recursive_mitems_to_array($items, $parent = 0)
  {
    $bundle = [];
    foreach ($items as $item) {
      if ($item->menu_item_parent == $parent) {
        $child               = recursive_mitems_to_array($items, $item->ID);
        $bundle[$item->ID] = [
          'item'   => $item,
          'childs' => $child
        ];
      }
    }

    return $bundle;
  }
}

/**
 * Restricts access to pages with certain templates based on conditions
 */
add_action('template_redirect', function () {
  // Get the current page template
  $current_template = basename(get_page_template());

  //
  // Restrict if not logged in
  //
  // $restricted_templates = ['template-dashboard.blade.php'];
  $restricted_templates = [''];

  // Check if the user is not logged in and is accessing a restricted template
  if (!is_user_logged_in() && in_array($current_template, $restricted_templates)) {
    wp_redirect(wp_login_url(home_url())); // Redirect to the login page
    exit;
  }


  //
  // Restrict if reunist role after log in
  //
  $user = wp_get_current_user();

  $restricted_templates_reunist = ['template-custom.blade.php'];

  // Check if user is logged in, user has reunist role and is accessing a restricted template
  if (is_user_logged_in() && in_array('reunist', (array) $user->roles) && in_array($current_template, $restricted_templates_reunist)) {
    wp_redirect(wp_login_url(home_url())); // Redirect to the login page
    exit;
  }
});
