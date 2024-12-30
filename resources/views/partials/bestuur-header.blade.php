@php
$post_type_name = get_post_type(get_the_ID());
$post_type_label = get_post_type_object($post_type_name)->labels->singular_name;
@endphp

<section class="section hero-bestuur">
  <div class="container">
    <div class="text">
      <div class="breadcrumbs">
        <a href="/">
          <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px">
            <path
              d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z" />
          </svg>
        </a>
      </div>
      <h1 class="heading">
        {{ $post_type_label }}
      </h1>
      @if (has_excerpt())
      <p>{{ get_the_excerpt() }}</p>
      @endif
    </div>
  </div>
</section>