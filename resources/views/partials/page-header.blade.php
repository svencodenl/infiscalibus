<section class="section hero-default">
  <div class="container">
    <div class="text">
      <x-breadcrumbs />
      <h1 class="heading">
        {{ $title }}
      </h1>
      @if (has_excerpt())
      <p>{{ get_the_excerpt() }}</p>
      @endif
    </div>
    @if (($image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail' )) && !is_archive())
    <div class="image">
      <img src="{{ $image[0] }}" alt="{{ $title }}">
    </div>
    @endif
  </div>
</section>