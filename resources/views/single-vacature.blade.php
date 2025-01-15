@extends('layouts.app')

@section('content')
@include('partials.page-header')

<section class="section section-single-vacature">
	<div class="container">
		<div class="row">
			@while(have_posts()) @php(the_post())
			<div class="col-md-3 sidebar">
				<div class="sidebar-inner">
					@if($matching_kantoor = get_field( "matching_partnerkantoor", get_the_ID() ))
					<div class="image">
						<img src="{{ wp_get_attachment_image_src( get_post_thumbnail_id($matching_kantoor), 'single-post-thumbnail' )[0] }}" alt="{{ get_the_title($matching_kantoor) }}">
					</div>
					@endif
					@if ($locations = get_field('locations', get_the_ID()))
					<div class="meta-item locations">
						<i><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"><path d="M80-120v-720h400v160h400v560H80Zm80-80h80v-80h-80v80Zm0-160h80v-80h-80v80Zm0-160h80v-80h-80v80Zm0-160h80v-80h-80v80Zm160 480h80v-80h-80v80Zm0-160h80v-80h-80v80Zm0-160h80v-80h-80v80Zm0-160h80v-80h-80v80Zm160 480h320v-400H480v80h80v80h-80v80h80v80h-80v80Zm160-240v-80h80v80h-80Zm0 160v-80h80v80h-80Z"/></svg></i>
						@foreach ($locations as $location)
							<span>{{ $location['name'] }}</span>
						@endforeach
					</div>
					@endif
					@if ($hours = get_field('hours_per_week', get_the_ID()))
					<div class="meta-item hours">
						<i><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"><path d="m612-292 56-56-148-148v-184h-80v216l172 172ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-400Zm0 320q133 0 226.5-93.5T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 133 93.5 226.5T480-160Z"/></svg></i>
						<span>{{ $hours }} uur per week</span>
					</div>
					@endif
					@if ($link = get_field('link', get_the_ID()))
					<a href="{{ $link }}" target="_blank" class="meta-item btn btn--outline-orange-primary">
						<i><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h560v-280h80v280q0 33-23.5 56.5T760-120H200Zm188-212-56-56 372-372H560v-80h280v280h-80v-144L388-332Z"/></svg></i>
						Solliciteer nu!
					</a>
					@endif
				</div>
			</div>
			<div class="col-md-9 content">
				@includeFirst(['partials.content-page', 'partials.content'])
			</div>
			@endwhile
		</div>
	</div>
</section>

@endsection