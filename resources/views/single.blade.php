@php
$vacature_posts = get_posts([
    'post_type' => 'vacature',
    'post_status' => 'publish',
    'posts_per_page' => -1,
]);

$vacatures_list = [];

foreach ($vacature_posts as $item) {
    $vacature_matching_id = get_field( "matching_partnerkantoor", $item->ID );
    if (intval($vacature_matching_id) === get_the_ID()) {
        array_push($vacatures_list, $item);
    }
};
@endphp

@extends('layouts.app')

@section('content')
@while(have_posts()) @php(the_post())
@includeFirst(['partials.content-single-' . get_post_type(), 'partials.content-single'])
@if (!empty($vacatures_list))
    @include('partials.vacatures-list', ['vacatures_list' => $vacatures_list])
@endif
@endwhile
@endsection