@if (have_rows('flexible_content'))
	@while (have_rows('flexible_content'))
		@php (the_row())
		@includeIf('flexible.' . get_row_layout())
	@endwhile
@endif