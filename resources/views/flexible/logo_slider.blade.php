@php
// Get all published posts from CPT partnerkantoor
$post_type = 'partnerkantoor';
$query = new WP_Query(array(
'post_type' => $post_type,
'post_status' => 'publish',
'posts_per_page' => -1
));

global $wp_post_types;
$cpt_label = &$wp_post_types[$post_type]->labels->name;
@endphp

<section class="logo-slider">
	<div class="container">
		<div class="heading-container">
			@if ($heading = get_sub_field('heading'))
			<h2 class="heading">{{ $heading }}</h2>
			@endif
			<button class="btn btn-ir"><a href="{{ get_post_type_archive_link($post_type) }}">Alle {{ $cpt_label }} <i><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="24px"><path d="M647-440H160v-80h487L423-744l57-56 320 320-320 320-57-56 224-224Z"/></svg></i> </a></button>
		</div>

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