@php
// Get all published posts from CPT partnerkantoor
$post_type = 'evenement';
$args = array(
'post_type' => $post_type,
'post_status' => 'publish',
'meta_key' => 'event_date_start_date',
'orderby' => 'meta_value',
'order' => 'ASC',
'posts_per_page' => 3
);
$posts = get_posts($args);

global $wp_post_types;
$cpt_label = &$wp_post_types[$post_type]->labels->name;
@endphp

<section class="event-slider">
	<div class="container">
		<div class="heading-container">
			@if ($heading = get_sub_field('heading'))
			<h2 class="heading">{{ $heading }}</h2>
			@endif

			<button class="btn btn-ir">
				<a href="{{ get_post_type_archive_link($post_type) }}">
					Alle {{ $cpt_label }}
					<i><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="24px">
							<path d="M647-440H160v-80h487L423-744l57-56 320 320-320 320-57-56 224-224Z" />
						</svg></i>
				</a>
			</button>
		</div>

		<div class="event-slider-container">
			<div class="event-slider-container-inner">
				@foreach ($posts as $event)
					<x-event-item :event="$event" />
				@endforeach
			</div>
		</div>
	</div>
</section>