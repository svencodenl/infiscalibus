<div id="breadcrumbs">
	<span>
		<span class="breadcrumbs-home">
			<a href="/">
				<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px">
					<path
						d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z" />
				</svg>
			</a>
		</span>
	</span>
	<span>
		<span> / </span>
	</span>
	@if ( function_exists('yoast_breadcrumb') )
	{{ yoast_breadcrumb() }}
	@endif
</div>