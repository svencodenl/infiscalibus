@php
// Get all published posts from CPT partnerkantoor
$post_type = 'partnerkantoor';
$args = array(
'post_type' => $post_type,
'post_status' => 'publish',
'orderby' => 'rand',
'posts_per_page' => -1
);
$posts = get_posts($args);

global $wp_post_types;
$cpt_label = &$wp_post_types[$post_type]->labels->name;
@endphp

<section class="logo-slider">
	<div class="container">
		<div class="heading-container">
			@if ($heading = get_sub_field('heading'))
			<h2 class="heading">{{ $heading }}</h2>
			@endif

			<a href="{{ get_post_type_archive_link($post_type) }}">
				<button class="btn btn-ir">
					Alle {{ $cpt_label }}
					<i><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="24px"><path d="M647-440H160v-80h487L423-744l57-56 320 320-320 320-57-56 224-224Z" /></svg></i>
				</button>
			</a>
		</div>
		<div class="logo-slider-container">
			<div class="logo-slider-container-inner">
				@foreach ($posts as $post)
				@if ($post->ID % 2 == 0)
				@if ($image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ))
				<div class="logo-slider-item">
					<img src="{{ $image[0] }}" alt="{{ get_the_title() }}">
					<a class="overlay-link" href="{{ get_permalink() }}"></a>
				</div>
				@endif
				@endif
				@endforeach
			</div>
		</div>
		<div class="logo-slider-container">
			<div class="logo-slider-container-inner">
				@foreach ($posts as $post)
				@if ($post->ID % 2 != 0)
				@if ($image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ))
				<div class="logo-slider-item">
					<img src="{{ $image[0] }}" alt="{{ get_the_title() }}">
					<a class="overlay-link" href="{{ get_permalink() }}"></a>
				</div>
				@endif
				@endif
				@endforeach
			</div>
		</div>
	</div>
</section>