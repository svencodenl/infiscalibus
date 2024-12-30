@php
$bestuur_items = get_posts([
'post_type' => 'bestuur',
'post_status' => 'publish',
'posts_per_page' => -1,
'orderby' => 'date',
'order' => 'DESC',
]);
@endphp

@extends('layouts.app')

@section('content')
@include('partials.bestuur-header')

<section class="section section-bestuur">
	<div class="container">
		<div class="row">
			<div class="col-md-3 anchor-nav">
				<h4 class="heading">Besturen</h4>
				<div class="anchors">
					@foreach ($bestuur_items as $key => $item)
					<a class="anchor-item" href="#{{ str_replace(" ", "-", get_the_title($item->ID)) }}">{{ get_the_title($item->ID) }}</a>
					@endforeach
				</div>
			</div>
			<div class="col-md-9 bestuur-items">
				@foreach ($bestuur_items as $key => $item)
				<div class="bestuur-item" id="{{ str_replace(" ", "-", get_the_title($item->ID)) }}">
					<div class="img-wrapper">
						@if ($image = get_the_post_thumbnail_url($item->ID) )
						<img src="{{ $image }}" alt="{{ get_the_title($item->ID) }}">
						@endif
						@if ($image_text = get_field('image_text', $item->ID))
						<div class="image-text">
							<span>{{ $image_text }}</span>
						</div>
						@endif
					</div>
					<div class="text">
						<div class="heading-wrapper">
							<h3 class="heading">{{ get_the_title($item->ID) }}</h3>
							@if ($key == 0) <span class="label">Huidig bestuur</span> @endif
						</div>
						<div class="content">
							{!! get_the_content($item->ID) !!}
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</section>

@endsection