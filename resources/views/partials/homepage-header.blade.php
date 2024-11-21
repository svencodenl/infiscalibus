<section class="hero">
  @if ($hero = get_field('hero'))
  <div class="hero__bg">
    @if ($image = $hero['image'])
    <img src="{{ $image['url'] }}" alt="{{ $image['title'] }}">
    @endif
  </div>
  <div class="hero__content">
    @if ($title = $hero['title'])
    <h1>{{ $title }}</h1>
    @endif
    @if ($button = $hero['button'])
    <button>{{ var_dump($button) }}</button>
    @endif
  </div>
  @endif
</section>