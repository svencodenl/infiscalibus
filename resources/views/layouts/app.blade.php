<!doctype html>
<html @php(language_attributes())>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @php(do_action('get_header'))
  @php(wp_head())
  @include('utils.styles')
</head>

<body @php(body_class()) google-key="{{ env('GOOGLE_MAPS_KEY') }}">
  @php(wp_body_open())

  <div id="app">
    @include('sections.navbar')
    
    <main id="main">
      @yield('content')
      @include('sections.footer')
    </main>

  </div>

  @php(do_action('get_footer'))
  @php(wp_footer())
  @include('utils.scripts')
</body>

</html>