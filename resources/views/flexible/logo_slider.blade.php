@php
// Get all published posts from CPT partnerkantoor
$query = new WP_Query(array(
'post_type' => 'partnerkantoor',
'post_status' => 'publish',
'posts_per_page' => -1
));
@endphp

<section class="logo-slider">
	<div class="container">
		@if ($heading = get_sub_field('heading'))
		<h2 class="heading">{{ $heading }}</h2>
		@endif

		<div class="logo-slider-container">
			<div class="logo-slider-container-inner">
				@while ($query->have_posts())
				@php $query->the_post(); $post_id = get_the_ID(); @endphp
				@if ($post_id % 2 == 0)
					@if ($image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' ))
					<div class="logo-slider-item">
						<img src="{{ $image[0] }}" alt="{{ get_the_title() }}">
						<a href="{{ get_permalink() }}"></a>
					</div>
					@endif
				@endif
				@endwhile
			</div>
		</div>
		<div class="logo-slider-container">
			<div class="logo-slider-container-inner">
				@while ($query->have_posts())
				@php $query->the_post(); $post_id = get_the_ID(); @endphp
				@if ($post_id % 2 != 0)
					@if ($image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' ))
					<div class="logo-slider-item">
						<img src="{{ $image[0] }}" alt="{{ get_the_title() }}">
						<a href="{{ get_permalink() }}"></a>
					</div>
					@endif
				@endif
				@endwhile
			</div>
		</div>
	</div>
</section>