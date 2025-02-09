{{--
Template Name: Dashboard template
--}}

@php
$registrations = get_posts([
  'post_type' => 'event_registration',
  'posts_per_page' => -1, // Retrieve all registrations
  'meta_query' => [
    [
      'key' => 'user_id',
      'value' => get_current_user_id(),
      'compare' => '='
    ]
  ]
]);
@endphp

@extends('layouts.app')

@section('content')
@while (have_posts())
@include('partials.page-header')
@php(the_post())
<section class="section section-dashboard">
  <div class="container">
    <div class="dashboard-grid">
      @if($pages = get_field('dashboard_links', 'option' ))
      @foreach ($pages as $page)
      <x-vacature-item title="{{ $page['page']['title'] }}" permalink="{{ $page['page']['url'] }}" />
      @endforeach
      @endif
    </div>
    <div class="dashboard-events">
      <h3 class="heading">Aangemelde evenementen</h3>
      @if (count($registrations) > 0)
      <div class="event-slider-container">
        <div class="event-slider-container-inner">
          {{-- Get all registrations of user --}}
          @foreach ($registrations as $registration)
          {{-- Per registration get the Event --}}
          @if ($event = get_post(get_post_meta($registration->ID, 'event_id', true)))
            <x-event-item :event="$event" />
          @endif
          @endforeach
        </div>
      </div>
      @else
      <p class="text--text-muted">Je bent niet aangemeld voor evenementen</p>
      @endif
    </div>
  </div>
</section>
@endwhile
@endsection