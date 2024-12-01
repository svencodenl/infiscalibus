{{--
    Template Name: Homepage template
--}}

@extends('layouts.app')

@section('content')
  @while (have_posts())
    @php(the_post())
    <section class="">
      @include('partials.homepage-header')
      @include('flexible.flexible-content')
      {{-- <div class="container">
        @include('partials.content-page')
      </div> --}}
    </section>
  @endwhile
@endsection
