<?php

namespace App;

function title(): string
{
	$title = '';

    if (is_home()) {
        $title = get_bloginfo('name');
    }

    if (is_archive()) {
			$postType = get_queried_object();
			$title = esc_html($postType->labels->name);
    }

    if (is_singular()) {
        $title = single_post_title('', false);
    }

    return $title . ' - ' . get_bloginfo('name');
}