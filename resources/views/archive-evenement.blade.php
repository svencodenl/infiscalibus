@extends('layouts.app')

@section('content')
@include('partials.page-header')

<section class="section section-evenementen">
	<div class="container">
	@while(have_posts()) @php(the_post())
		<a href="{{ get_post_permalink() }}">{{ the_title() }}</a>
	@endwhile
	</div>
</section>

@endsection

