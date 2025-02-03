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

// Handle event registration
add_action('init', function () {
	// Controleer of het een POST-verzoek is
	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['event_id'])) {
		// Sanitize input
		$event_id = intval($_POST['event_id']);
		$user_id = sanitize_text_field($_POST['user_id']);
		$user_name = sanitize_text_field($_POST['user_name']);
		$user_email = sanitize_email($_POST['user_email']);

		// Controleer of de verplichte velden zijn ingevuld
		if ($event_id && $user_name && $user_email) {
			// Controleer of de gebruiker al geregistreerd is voor dit evenement
			$existing_registration = get_posts([
				'post_type' => 'event_registration',
				'meta_query' => [
					[
						'key' => 'event_id',
						'value' => $event_id,
						'compare' => '='
					],
					[
						'key' => 'user_email',
						'value' => $user_email,
						'compare' => '='
					]
				]
			]);

			if ($existing_registration) {
				wp_die('Je bent al geregistreerd voor dit evenement.');
			}

			// Sla de aanmelding op
			$registration_id = wp_insert_post([
				'post_type' => 'event_registration',
				'post_title' => $user_name,
				'post_status' => 'publish',
				'meta_input' => [
					'event_id' => $event_id,
					'user_email' => $user_email,
				],
			]);

			// Feedback aan de gebruiker
			if ($registration_id) {
				wp_redirect(add_query_arg('success', 'true', get_permalink($event_id)));
				exit;
			} else {
				wp_die('Er ging iets mis bij het opslaan van de aanmelding.');
			}
		}
	}
});

add_filter('manage_event_registration_posts_columns', function ($columns) {
	$columns['event'] = 'Evenement';
	$columns['email'] = 'E-mail';
	return $columns;
});

add_action('manage_event_registration_posts_custom_column', function ($column, $post_id) {
	if ($column === 'event') {
		$event_id = get_post_meta($post_id, 'event_id', true);
		echo get_the_title($event_id);
	}
	if ($column === 'email') {
		echo get_post_meta($post_id, 'user_email', true);
	}
}, 10, 2);
