@extends('layouts.app')

@section('content')
    @while(have_posts()) @php(the_post())
        @include('partials.page-header')
        <section class="section content-page">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-8">
                        @includeFirst(['partials.content-page', 'partials.content'])
                    </div>
                </div>
            </div>
        </section>
        @include('flexible.flexible-content')
    @endwhile
@endsection
