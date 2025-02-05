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
					<div class="event-meta-item">
						<p class="heading">Datum</p>
						<p class="content">
							{{ $start_date }}
							@if (($start_time = get_field('event_date_start_time')) && !get_field('event_date_is_entire_day'))
							@ {{ $start_time }}
							@endif
							@endif
							@if ($end_date = get_field('event_date_end_date'))
							-
							{{ $end_date }}
							@if (($end_time = get_field('event_date_end_time')) && !get_field('event_date_is_entire_day'))
							@ {{ $end_time }}
							@endif
						</p>
					</div>
					@endif

					{{-- Event register deadline --}}
					@if (!get_field('event_register_no_deadline'))
					<div class="event-meta-item">
						<p class="heading">Registreren vanaf - tot</p>
						<p class="content">
							@if ($start_register = get_field('event_register_start_register'))
							{{ $start_register }}
							@endif
							@if ($end_register = get_field('event_register_end_register'))
							- {{ $end_register }}
							@endif
						</p>
					</div>
					@endif

					{{-- Declaratie tekst --}}
					@if ($declare_text = get_field('declare_text'))
					<div class="event-meta-item">
						<p class="heading">Declareren</p>
						<p class="content">{{ $declare_text }}</p>
					</div>
					@endif

					{{-- Dresscode tekst --}}
					@if ($dresscode = get_field('dresscode'))
					<div class="event-meta-item">
						<p class="heading">Dresscode</p>
						<p class="content">{{ $dresscode }}</p>
					</div>
					@endif

					{{-- Max. Capaciteit --}}
					@if ($max_cap = get_field('capacity'))
					<div class="event-meta-item">
						<p class="heading">Capaciteit</p>
						<p class="content">{{ $max_cap }}</p>
					</div>
					@endif

					{{-- Logistieke info --}}
					@if ($logistic_info = get_field('logistic_info'))
					<div class="event-meta-item">
						<p class="heading">Logistieke info</p>
						<p class="content">{{ $logistic_info }}</p>
					</div>
					@endif

					{{-- Categories --}}
					@if ($categories = get_the_terms(get_the_ID(), 'category-event'))
					<div class="event-meta-item">
						<p class="heading">Categories</p>
						<p class="content">
							@foreach ($categories as $cat)
							{{ $cat->name }}
							@endforeach
						</p>
					</div>
					@endif

					{{-- Location --}}
					@if ($location = get_the_terms(get_the_ID(), 'location'))
					<div class="event-meta-item">
						<p class="heading">Locatie</p>
						<p class="content">{{ $location[0]->name }}</p>
						@if ($google_maps = get_field('google_maps', 'location' . '_' . $location[0]->term_id))
						<pre>{{ var_dump($google_maps) }}</pre>
						@endif
					</div>
					@endif

					{{-- Partnerkantoren --}}
					@if ($partnerkantoren = get_field('event_partnerkantoren'))
					<div class="event-meta-item">
						<p class="heading">Partnerkantoren</p>
						<div class="sidebar-partnerkantoren">
							@foreach($partnerkantoren as $key => $kantoor_id)
							<a href="{{ get_permalink($kantoor_id) }}" class="kantoor-item">
								<div class="kantoor-logo">
									<img
										src="{{ wp_get_attachment_image_src( get_post_thumbnail_id($kantoor_id), 'single-post-thumbnail' )[0] }}"
										alt="{{ get_the_title($kantoor_id) }}">
								</div>
							</a>
							@endforeach
						</div>
					</div>
					@endif

					@if (is_already_registered_to_event(get_the_ID()))
						<p>Already registered</p>
					@elseif($show_register_button)
					<form action="" method="post">
						@csrf
						<!-- Bescherming tegen CSRF -->
						<input type="hidden" name="event_id" value="{{ get_the_ID() }}">
						<input type="hidden" name="user_id" value="{{ wp_get_current_user()->ID }}">
						<input type="hidden" name="user_name" value="{{ wp_get_current_user()->user_nicename }}">
						<input type="hidden" name="user_email" value="{{ wp_get_current_user()->user_email }}">
						<button type="submit" class="btn btn--orange-primary">Meld je aan</button>
						@if (isset($_GET['success']) && $_GET['success'] == 'true')
						<p class="success-message">Je aanmelding is succesvol verwerkt!</p>
						@endif
					</form>
					@endif

				</div>
			</div>
			@endwhile
		</div>
	</div>
</section>

@endsection