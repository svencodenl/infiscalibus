@php
$menuLocations = get_nav_menu_locations(); // Get our nav locations (set in our theme, usually functions.php)
$primary_nav_guest = wp_get_nav_menu_items($menuLocations['primary_navigation']);
$primary_nav_logged_in = wp_get_nav_menu_items($menuLocations['logged_in_navigation']);
$primary_nav = is_user_logged_in() ? $primary_nav_logged_in : $primary_nav_guest;
$nested_nav = recursive_mitems_to_array($primary_nav);
@endphp

<div class="navbar">
	@if (has_nav_menu('top_navigation'))
	<div class="navbar-top">
		<div class="container navbar-top-inner">
			<nav class="nav-top" aria-label="{{ wp_get_nav_menu_name('top_navigation') }}">
				{!! wp_nav_menu(['theme_location' => 'top_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
			</nav>
		</div>
		<div class="corner outline left"><svg width="20" height="20" viewBox="0 0 101 101" fill="none"
				xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" clip-rule="evenodd" d="M101 0H0V101H1C1 45.7715 45.7715 1 101 1V0Z">
				</path>
				{{-- <path d="M1 101C1 45.7715 45.7715 1 101 1" stroke="#1d3155"></path> --}}
			</svg>
		</div>
		<div class="corner outline right"><svg width="20" height="20" viewBox="0 0 101 101" fill="none"
				xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" clip-rule="evenodd" d="M101 0H0V101H1C1 45.7715 45.7715 1 101 1V0Z">
				</path>
				{{-- <path d="M1 101C1 45.7715 45.7715 1 101 1" stroke="#1d3155"></path> --}}
			</svg>
		</div>
	</div>
	@endif
	<div class="navbar-main">
		<div class="container navbar-main-inner">
			<div class="left-side">
				<a class="logo" href="{{ home_url('/') }}">
					@if($logo_light = get_field('logo_light', 'option')['url'])
					<img class="logo-light" src="{{ $logo_light }}" alt="F.S.V. In Fiscalibus">
					@endif
					@if($logo_dark = get_field('logo_regular', 'option')['url'])
					<img class="logo-dark" src="{{ $logo_dark }}" alt="F.S.V. In Fiscalibus">
					@endif
				</a>
				@if (($notification = get_field('menu_notification', 'option')) && $notification['active'])
				<a class="menu-notification" href="{{ $notification['link'] }}">
					{{ $notification['text'] }}
					<i><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="24px">
						<path d="M647-440H160v-80h487L423-744l57-56 320 320-320 320-57-56 224-224Z" />
					</svg></i>
				</a>
				@endif
			</div>

			<div class="mobile-handler">
				<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg>
			</div>

			@if (has_nav_menu('primary_navigation'))
			<nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
				{{-- {!! wp_nav_menu(['name' => 'Mainmenu', 'sub_menu' => true, 'show_parent' => true, 'menu_class' => 'nav', 'echo' => false]) !!} --}}
				<ul class="main-menu">
					@foreach ($nested_nav as $key => $menu_item)
					<li class="item {{ ($menu_item['childs']) ? 'parent' : '' }}">
						<a href="{{ $menu_item['item']->url ? $menu_item['item']->url : '#' }}" class="{{ get_field('is_button', $menu_item['item']->ID) ? 'btn btn--outline-orange-primary' : '' }}">{{ $menu_item['item']->title }}</a>
						@if($menu_item['childs'])
						<svg class="chevron" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z"/></svg>
						<div class="menu-childs-container">
							<ul class="menu-childs">
								@foreach($menu_item['childs'] as $childKey => $child_item)
								<li class="item child">
									<a href="{{ $child_item['item']->url }}">{{ $child_item['item']->title }}</a>
								</li>
								@endforeach
							</ul>
						</div>
						@endif
					</li>
					@endforeach
				</ul>
				<div class="navbar-top-mobile">
					{!! wp_nav_menu(['theme_location' => 'top_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
				</div>
			</nav>
			@endif
		</div>
	</div>
</div>