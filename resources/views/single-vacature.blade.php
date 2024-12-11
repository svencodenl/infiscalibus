@extends('layouts.app')

@section('content')
@include('partials.page-header')

<div class="container">
@while(have_posts()) @php(the_post())
<pre>single-vacature.blade.php</pre>
{{ get_the_title() }}
@endwhile
</div>

@endsection

