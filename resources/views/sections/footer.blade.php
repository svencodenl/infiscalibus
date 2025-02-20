@php
$menuLocations = get_nav_menu_locations(); // Get our nav locations (set in our theme, usually functions.php)
$copyright_nav_guest = wp_get_nav_menu_items($menuLocations['copyright_navigation']);
$copyright_nav_logged_in = wp_get_nav_menu_items($menuLocations['copyright_logged_in_navigation']);
$copyright_nav = is_user_logged_in() ? $copyright_nav_logged_in : $copyright_nav_guest;
@endphp

<footer class="footer">
	<div class="container d-flex justify-content-center">
		<div class="footer-banner" @if($image=get_field('banner_image', 'option' )['url'])
			style="background-image: url({{ $image }})" @endif>
			@if($text = get_field('banner_text', 'option'))
			<h3 class="heading">{{ $text }}</h3>
			@endif
			@if($button = get_field('banner_button', 'option'))
			<a href="{{ $button['link'] }}"><button class="btn btn--orange-primary">{{ $button['label'] }}</button></a>
			@endif
		</div>
	</div>
	<div class="footer-content">
		<div class="container">
			<div class="col-25 footer-col-logo">
				@if($logo = get_field('logo_light', 'option')['url'])
				<img src="{{ $logo }}" alt="F.S.V. In Fiscalibus">
				@endif
			</div>
			<div class="col-25 footer-col-sitemap">
				@if($column1_heading = get_field('footer_menu_column_1_heading', 'option'))
				<p>{{ $column1_heading }}</p>
				@endif
				@if($column1_items = get_field('footer_menu_column_1_item', 'option'))
				<ul>
					@foreach ($column1_items as $item)
					<li><a href="{{ $item['link'] }}">{{ $item['title'] }}</a></li>
					@endforeach
				</ul>
				@endif
			</div>
			<div class="col-25 footer-col-actueel">
				@if($column2_heading = get_field('footer_menu_column_2_heading', 'option'))
				<p>{{ $column2_heading }}</p>
				@endif
				@if($column2_items = get_field('footer_menu_column_2_item', 'option'))
				<ul>
					@foreach ($column2_items as $item)
					<li><a href="{{ $item['link'] }}">{{ $item['title'] }}</a></li>
					@endforeach
				</ul>
				@endif
			</div>
			<div class="col-25 footer-col-contact">
				<p>Contact</p>
				<ul>
					@if($address_title = get_field('adres_title', 'option' ))
					<li>{{ $address_title }}</li>
					@endif
					@if($address_street = get_field('adres_street', 'option' ))
					<li>{{ $address_street }}</li>
					@endif
					@if(($address_zipcode = get_field('adres_zipcode', 'option' )) AND ($address_city = get_field('adres_city',
					'option' )))
					<li>{{ $address_zipcode }}, {{ $address_city }}</li>
					@endif
				</ul>
			</div>
			<div class="col-25 footer-col-socials">
				<p>Socials</p>
				<ul>
					@if(($linkedin_name = get_field('linkedin_name', 'option' )) AND ($linkedin_url = get_field('linkedin_link',
					'option' )))
					<li><a href="{{ $linkedin_url }}" target="_blank">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="24px" height="24px" class="linkedin-logo">
								<path
									d="M41,4H9C6.24,4,4,6.24,4,9v32c0,2.76,2.24,5,5,5h32c2.76,0,5-2.24,5-5V9C46,6.24,43.76,4,41,4z M17,20v19h-6V20H17z M11,14.47c0-1.4,1.2-2.47,3-2.47s2.93,1.07,3,2.47c0,1.4-1.12,2.53-3,2.53C12.2,17,11,15.87,11,14.47z M39,39h-6c0,0,0-9.26,0-10 c0-2-1-4-3.5-4.04h-0.08C27,24.96,26,27.02,26,29c0,0.91,0,10,0,10h-6V20h6v2.56c0,0,1.93-2.56,5.81-2.56 c3.97,0,7.19,2.73,7.19,8.26V39z" />
							</svg>
							<span>{{ $linkedin_name }}</span>
						</a></li>
					@endif
					@if(($instagram_name = get_field('instagram_name', 'option' )) AND ($instagram_url =
					get_field('instagram_link', 'option' )))
					<li><a href="{{ $instagram_url }}" target="_blank">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24px" height="24px" class="instagram-logo">
								<path
									d="M 8 3 C 5.239 3 3 5.239 3 8 L 3 16 C 3 18.761 5.239 21 8 21 L 16 21 C 18.761 21 21 18.761 21 16 L 21 8 C 21 5.239 18.761 3 16 3 L 8 3 z M 18 5 C 18.552 5 19 5.448 19 6 C 19 6.552 18.552 7 18 7 C 17.448 7 17 6.552 17 6 C 17 5.448 17.448 5 18 5 z M 12 7 C 14.761 7 17 9.239 17 12 C 17 14.761 14.761 17 12 17 C 9.239 17 7 14.761 7 12 C 7 9.239 9.239 7 12 7 z M 12 9 A 3 3 0 0 0 9 12 A 3 3 0 0 0 12 15 A 3 3 0 0 0 15 12 A 3 3 0 0 0 12 9 z" />
							</svg>
							<span>{{ $instagram_name }}</span>
						</a></li>
					@endif
				</ul>
			</div>
		</div>
	</div>
	<div class="footer-copyright">
		<div class="copyright-text">
			<p>&copy; {{ date('Y') }} F.S.V. In Fiscalibus</p>
		</div>
		<div class="copyright-links">
			@foreach ($copyright_nav as $navitem)
			<a href="{{ $navitem->url }}">{{ $navitem->title }}</a>
			@endforeach
		</div>
	</div>
</footer>