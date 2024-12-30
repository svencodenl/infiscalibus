@extends('layouts.app')

@section('content')
@include('partials.page-header')

<div class="container">
	<div class="row">
		@while(have_posts()) @php(the_post())
		{{-- @includeFirst(['partials.content-' . get_post_type(), 'partials.content']) --}}
		<div class="col-md-4 col-6">
			<div class="card">
				<a href="{{ get_permalink() }}">
					<div class="img-wrapper">
						@if ($image = get_the_post_thumbnail_url() )
						<img src="{{ $image }}" alt="{{ get_the_title() }}">
						@else
						<h3 class="heading">{{ get_the_title() }}</h3>
						@endif
					</div>
				</a>
			</div>
		</div>
		@endwhile
	</div>
</div>

@endsection