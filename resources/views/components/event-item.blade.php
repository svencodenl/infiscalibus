@if ($event)
<div class="event-item">
	<div class="img-wrapper">
		@if ($image = wp_get_attachment_image_src( get_post_thumbnail_id( $event->ID ), 'single-post-thumbnail' ))
			<img src="{{ $image[0] }}" alt="{{ get_the_title($event->ID) }}">
		@elseif ($logo = get_field('logo_regular', 'option')['url'])
			<img src="{{ $logo }}" alt="Logo" class="logo">
		@endif
	</div>

	<div class="content">
		<h4 class="heading">{{ $event->post_title }}</h4>
		<div class="meta">
			@if ($categories = get_the_terms($event->ID, 'category-event'))
			<div class="meta-item meta-categories">
				@foreach($categories as $cat)
				<div class="category">{{ $cat->name }}</div>
				@endforeach
			</div>
			@endif
			@if ($date = get_field('event_date_start_date', $event->ID))
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

	<a class="overlay-link" href="{{ get_permalink($event->ID) }}"></a>
</div>
@endif