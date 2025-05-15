{{--
Template Name: Dashboard template
--}}

@php
$registrations = get_posts([
  'post_type' => 'event_registration',
  'post_status' => 'publish',
  'posts_per_page' => -1, // Retrieve all registrations
  'meta_query' => [
    'relation' => 'AND',
    [
      'key' => 'user_id',
      'value' => get_current_user_id(),
      'compare' => '='
    ],
    [
      // This subquery ensures we only get registrations for future events
      'relation' => 'EXISTS',
      [
        'key' => 'event_id',
        'compare' => 'EXISTS'
      ]
    ]
  ]
]);

// Filter registrations to only include those for future events
$future_registrations = [];
$today = date('Y-m-d');

foreach ($registrations as $registration) {
  $event_id = get_post_meta($registration->ID, 'event_id', true);
  if ($event_id) {
    $event_date = get_field('event_date_start_date', $event_id);
    if ($event_date) {
      // Convert DD/MM/YYYY to YYYY-MM-DD format for comparison
      $date_parts = explode('/', $event_date);
      if (count($date_parts) === 3) {
        $formatted_date = $date_parts[2] . '-' . $date_parts[1] . '-' . $date_parts[0];
        if ($formatted_date >= $today) {
          $future_registrations[] = $registration;
        }
      }
    }
  }
}
$registrations = $future_registrations;
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