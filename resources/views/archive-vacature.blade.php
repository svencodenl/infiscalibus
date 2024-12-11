@extends('layouts.app')

@section('content')
@include('partials.page-header')

<div class="container">
@while(have_posts()) @php(the_post())
	@if($matching_kantoor = get_field( "matching_partnerkantoor", get_the_ID() ))
		<x-vacature-item 
			:title="get_the_title()"
			:image="wp_get_attachment_image_src( get_post_thumbnail_id($matching_kantoor), 'single-post-thumbnail' )[0]"
			:locations="get_field('locations', get_the_ID())" :hours="get_field('hours_per_week', get_the_ID())"
			:permalink="get_post_permalink(get_the_ID())" />
	@endif
@endwhile
</div>

@endsection

