{{--
    Template Name: Homepage template
--}}

@extends('layouts.app')

@section('content')
  @while (have_posts())
    @php(the_post())
    <section class="">
      @include('partials.homepage-header')
      <div class="container">
        {{-- @if ($hero = get_field('hero'))
				@if ($image = $hero['image'])
					<img src="{{ $image['url'] }}" alt="{{ $image['title'] }}">
				@endif
			@endif --}}

        @include('partials.content-page')
      </div>
    </section>
  @endwhile
@endsection
