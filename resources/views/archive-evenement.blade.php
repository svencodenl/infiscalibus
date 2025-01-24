@php
// Get all published posts from CPT
$post_type = 'evenement';
$args = array(
'post_type' => $post_type,
'post_status' => 'publish',
'meta_key' => 'event_date_start_date',
'orderby' => 'meta_value',
'order' => 'ASC',
);
$posts = get_posts($args);
@endphp

@extends('layouts.app')

@section('content')
@include('partials.page-header')

<section class="section section-evenementen">
	<div class="container">
		<div class="event-slider-container">
			<div class="event-slider-container-inner">
				@foreach ($posts as $event)
					<x-event-item :event="$event" />
				@endforeach
			</div>
		</div>
	</div>
</section>

@endsection

