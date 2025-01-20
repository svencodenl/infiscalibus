@php
$partnerkantoren = get_posts([
'post_type' => 'partnerkantoor',
'post_status' => 'publish',
'posts_per_page' => -1,
'orderby' => 'title',
'order' => 'ASC',
]);
@endphp

@extends('layouts.app')

@section('content')
@include('partials.page-header')

<div class="container">
	<div class="row">
		@foreach ($partnerkantoren as $key => $item)
		{{-- @includeFirst(['partials.content-' . get_post_type(), 'partials.content']) --}}
		<div class="col-md-4 col-6">
			<div class="card">
				<a href="{{ get_permalink($item->ID) }}">
					<div class="img-wrapper">
						@if ($image = get_the_post_thumbnail_url($item->ID) )
						<img src="{{ $image }}" alt="{{ get_the_title($item->ID) }}">
						@else
						<h3 class="heading">{{ get_the_title($item->ID) }}</h3>
						@endif
					</div>
				</a>
			</div>
		</div>
		@endforeach
	</div>
</div>

@endsection