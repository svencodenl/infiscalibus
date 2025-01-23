@php
$show_register_button = is_allowed_to_register_to_event(get_the_ID());
@endphp

@extends('layouts.app')

@section('content')
@include('partials.page-header')

<section class="section section-single-evenement">
	<div class="container">
		<div class="row">
			@while(have_posts()) @php(the_post())
			<div class="col-md-6">
				@includeFirst(['partials.content-page', 'partials.content'])
			</div>
			<div class="col-md-5 sidebar-container">
				<div class="sidebar-inner">
					{{-- Event date & time --}}
					@if ($start_date = get_field('event_date_start_date'))
					<p>Start:
						{{ $start_date }}
						@if (($start_time = get_field('event_date_start_time')) && !get_field('event_date_is_entire_day'))
						@ {{ $start_time }}
						@endif
					</p>
					@endif
					@if ($end_date = get_field('event_date_end_date'))
					<p>End:
						{{ $end_date }}
						@if (($end_time = get_field('event_date_end_time')) && !get_field('event_date_is_entire_day'))
						@ {{ $end_time }}
						@endif
					</p>
					@endif
					</p>

					{{-- Event register deadline --}}
					@if (!get_field('event_register_no_deadline'))
					@if ($start_register = get_field('event_register_start_register'))
					<p>Start register: {{ $start_register }}</p>
					@endif
					@if ($end_register = get_field('event_register_end_register'))
					<p>End register: {{ $end_register }}</p>
					@endif
					@endif

					{{-- Declaratie tekst --}}
					@if ($declare_text = get_field('declare_text'))
					<p>Declaratie tekst: {{ $declare_text }}</p>
					@endif

					{{-- Dresscode tekst --}}
					@if ($dresscode = get_field('dresscode'))
					<p>Dresscode: {{ $dresscode }}</p>
					@endif

					{{-- Max. Capaciteit --}}
					@if ($max_cap = get_field('capacity'))
					<p>Max capacity: {{ $max_cap }}</p>
					@endif

					{{-- Logistieke info --}}
					@if ($logistic_info = get_field('logistic_info'))
					<p>Logistic info: {{ $logistic_info }}</p>
					@endif

					{{-- Categories --}}
					@if ($categories = get_the_terms(get_the_ID(), 'category-event'))
					<p>Categories:
						@foreach ($categories as $cat)
						{{ $cat->name }}
						@endforeach
					</p>
					@endif

					{{-- Location --}}
					@if ($location = get_the_terms(get_the_ID(), 'location'))
					<p>Location: {{ $location[0]->name }}</p>
					@if ($google_maps = get_field('google_maps', 'location' . '_' . $location[0]->term_id))
					<pre>{{ var_dump($google_maps) }}</pre>
					@endif
					@endif

					{{-- Partnerkantoren --}}
					@if ($partnerkantoren = get_field('event_partnerkantoren'))
					<div class="sidebar-partnerkantoren">
						<p>Partnerkantoren:</p>
						@foreach($partnerkantoren as $key => $kantoor_id)
						<a href="{{ get_permalink($kantoor_id) }}" class="kantoor-item">
							<div class="kantoor-logo">
								<img src="{{ wp_get_attachment_image_src( get_post_thumbnail_id($kantoor_id), 'single-post-thumbnail' )[0] }}" alt="{{ get_the_title($kantoor_id) }}">
							</div>
						</a>
						@endforeach
					</div>
					@endif

					@if($show_register_button)
					<button class="btn btn--orange-primary">Register</button>
					@endif

				</div>
			</div>
			@endwhile
		</div>
	</div>
</section>

@endsection