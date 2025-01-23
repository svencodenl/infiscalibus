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
				@foreach ($posts as $post)
				@if ($image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ))
				<div class="event-slider-item">
					<div class="img-wrapper">
						<img src="{{ $image[0] }}" alt="{{ get_the_title($post->ID) }}">
					</div>

					<div class="content">
						<h4 class="heading">{{ $post->post_title }}</h4>
						<div class="meta">
							@if ($categories = get_the_terms($post->ID, 'category-event'))
							<div class="meta-item meta-categories">
								@foreach($categories as $cat)
								<div class="category">{{ $cat->name }}</div>
								@endforeach
							</div>
							@endif
							@if ($date = get_field('event_date_start_date', $post->ID))
							<div class="meta-item meta-date">
								<p class="date">{{ $date }}</p>
								<button class="btn btn-io">
									<i><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="24px">
											<path d="M647-440H160v-80h487L423-744l57-56 320 320-320 320-57-56 224-224Z"></path>
										</svg></i>
								</button>
							</div>
							@endif
						</div>
					</div>

					<a class="overlay-link" href="{{ get_permalink($post->ID) }}"></a>
				</div>
				@endif
				@endforeach
			</div>
		</div>
	</div>
</section>