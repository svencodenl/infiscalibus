{{-- props: $vacatures_list --}}

<section class="section section-vacatures-list">
	<div class="container">
		<div class="heading">
			<h2><strong>Vacatures</strong></h2>
		</div>
		<div class="vacature-list">
			@foreach ($vacatures_list as $item)
			<x-vacature-item
				:title="$item->post_title"
				:image="wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail' )[0]"
				:locations="get_field('locations', $item->ID)"
				:hours="get_field('hours_per_week', $item->ID)"
				:permalink="get_post_permalink($item->ID)"
			/>
			@endforeach
		</div>
		<div class="button-container">
			<button class="btn btn-ir"><a href="{{ get_post_type_archive_link('vacature') }}">Bekijk alle vacatures<i><svg
							xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="24px">
							<path d="M647-440H160v-80h487L423-744l57-56 320 320-320 320-57-56 224-224Z" />
						</svg></i></a></button>
		</div>
	</div>
</section>