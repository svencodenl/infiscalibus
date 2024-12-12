<section class="text-image">
	<div class="container">
		<div class="row">
			<div class="col-md-6 text-{{ get_sub_field('text_alignment') }}">{!! get_sub_field('text') !!}</div>
			<div class="col-md-6"><img src="{{ get_sub_field('image')['url'] }}" alt="{{ get_sub_field('image')['title'] }}"></div>
		</div>
	</div>
</section>