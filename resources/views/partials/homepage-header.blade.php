<section class="hero-homepage">
  @if ($hero = get_field('hero'))
  <div class="hero-bg">
    @if ($image = $hero['image'])
    <img src="{{ $image['url'] }}" alt="{{ $image['title'] }}">
    @endif
  </div>
  <div class="hero-content container">
    <div class="hero-content-inner">
      @if ($title = $hero['title'])
      <h1>{{ $title }}</h1>
      @endif
      @if (($button = $hero['button']) && ($title = $hero['button']['title']) && ($url = $hero['button']['url']))
      <button class="btn btn--orange-primary"><a href="{{ $url }}" target="{{ $button['target'] ?: '_blank' }}">{{ $title }}</a></button>
      @endif
    </div>
  </div>
  @endif
</section>