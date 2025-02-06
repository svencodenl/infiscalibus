<section class="simple-text">
	<div class="container">
		<div class="row align-{{ get_sub_field('container_alignment') }}">
			@if ($text = get_sub_field('text'))
				<div class="{{ get_sub_field('text_width') }}">{!! $text !!}</div>
			@endif
		</div>
	</div>
</section>