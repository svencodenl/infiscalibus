<div class="hero w-100">
  @if ($hero = get_field('hero'))
    @if ($image = $hero['image'])
      <img src="{{ $image['url'] }}" alt="{{ $image['title'] }}">
    @endif
  @endif
</div>
