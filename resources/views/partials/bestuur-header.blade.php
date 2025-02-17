@php
$post_type_name = get_post_type(get_the_ID());
$post_type_label = get_post_type_object($post_type_name)->labels->singular_name;
@endphp

<section class="section hero-bestuur hero-dark">
  <div class="container">
    <div class="text">
      <x-breadcrumbs />
      <h1 class="heading">
        {{ $post_type_label }}
      </h1>
      @if ($text = get_field('bestuur_text', 'option'))
        {!! $text !!}
      @endif
    </div>
  </div>
</section>