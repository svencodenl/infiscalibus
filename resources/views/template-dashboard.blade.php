{{--
    Template Name: Dashboard template
--}}

@extends('layouts.app')

@section('content')
  @while (have_posts())
  @include('partials.page-header')
    @php(the_post())
    <section class="section section-dashboard">
      <div class="container">
        <div class="dashboard-grid">
          <x-vacature-item title="Declaratie formulier (form)" />
          <x-vacature-item title="Dictatencentrale" permalink="/dictatencentrale" />
          <x-vacature-item title="Ideeënbus (form)" />
          <x-vacature-item title="Extern contactpersoon" />
          <x-vacature-item title="Gegevens aanpassen (form)" />
          <x-vacature-item title="Lidmaatschap opzeggen (form)" />
        </div>
      </div>
    </section>
  @endwhile
@endsection
