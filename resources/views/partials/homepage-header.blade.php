<section class="hero">
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
      @if ($button = $hero['button'])
      <button class="btn btn--orange-primary"><a href="{{ $button['url'] }}" target="{{ $button['target'] }}">{{ $button['title'] }}</a></button>
      @endif
    </div>
  </div>
  @endif
</section>