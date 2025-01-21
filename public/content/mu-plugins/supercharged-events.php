<?php

// Register Events Registration CPT
add_action('init', function () {
	register_post_type('event_registration', [
		'label' => 'Aanmeldingen',
		'public' => false, // Alleen zichtbaar in het admin-dashboard
		'supports' => ['title', 'custom-fields'],
		'show_ui' => true, // Toon in de admin-interface
		'has_archive' => false,
	]);
});
