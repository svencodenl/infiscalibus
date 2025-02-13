<section class="text-image">
	<div class="container">
		<div class="row">
			@if ($text = get_sub_field('text'))
				<div class="col-md-6 content text-{{ get_sub_field('text_alignment') }}">{!! $text !!}</div>
			@endif
			@if ($image = get_sub_field('image'))
				<div class="col-md-6"><img src="{{ $image['url'] }}" alt="{{ $image['title'] }}"></div>
			@endif
		</div>
	</div>
</section>