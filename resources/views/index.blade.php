@extends('layouts.app')

@section('content')
	{{-- @include('partials.page-header') --}}
	<h1>index.blade.php</h1>

	@if (! have_posts())
		<x-alert type="warning">
			{!! __('Sorry, no results were found.', 'radicle') !!}
		</x-alert>

		{!! get_search_form(false) !!}
	@endif

	@while(have_posts()) @php(the_post())
	  	@includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
	@endwhile

	{!! get_the_posts_navigation() !!}
@endsection
