@extends('layouts.app')

@section('content')
@include('partials.page-header')

<section class="section section-evenementen">
	<div class="container">
		<div class="event-slider-container">
			<div class="event-slider-container-inner">
				@while(have_posts()) @php(the_post())
				<x-event-item :event="get_post()" />
			@endwhile
			</div>
		</div>
	</div>
</section>

@endsection

