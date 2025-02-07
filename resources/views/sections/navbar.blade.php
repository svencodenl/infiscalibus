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
				<div class="nav-top-login">
					@if(is_user_logged_in())
					<a href="{{ wp_logout_url() }}"><i><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"><path d="M212.31-140Q182-140 161-161q-21-21-21-51.31v-535.38Q140-778 161-799q21-21 51.31-21h268.07v60H212.31q-4.62 0-8.46 3.85-3.85 3.84-3.85 8.46v535.38q0 4.62 3.85 8.46 3.84 3.85 8.46 3.85h268.07v60H212.31Zm436.92-169.23-41.54-43.39L705.08-450H363.85v-60h341.23l-97.39-97.38 41.54-43.39L820-480 649.23-309.23Z"/></svg></i>Logout</a>
						@if(array_intersect( ['administrator'], wp_get_current_user()->roles ))
						<a href="{{ get_admin_url() }}" target="_blank"><i><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"><path d="M480-450q-54.77 0-92.38-37.62Q350-525.23 350-580q0-54.77 37.62-92.38Q425.23-710 480-710q54.77 0 92.38 37.62Q610-634.77 610-580q0 54.77-37.62 92.38Q534.77-450 480-450Zm0-60q29.85 0 49.92-20.08Q550-550.15 550-580t-20.08-49.92Q509.85-650 480-650t-49.92 20.08Q410-609.85 410-580t20.08 49.92Q450.15-510 480-510Zm0 409.23q-129.77-35.39-214.88-152.77Q180-370.92 180-516v-230.15l300-112.31 300 112.31V-516q0 145.08-85.12 262.46Q609.77-136.16 480-100.77Zm0-378.85Zm0-315L240-705v189q0 57.08 16.35 110.39 16.34 53.3 45.42 99.46 40.46-20.62 84.73-32.23Q430.77-350 480-350t93.5 11.62q44.27 11.61 84.73 32.23 29.08-46.16 45.42-99.46Q720-458.92 720-516v-189l-240-89.62ZM480-290q-38.69 0-74.42 8.38-35.73 8.39-67.5 23.54 29.77 33.08 65.5 57.2Q439.31-176.77 480-164q40.69-12.77 76.23-36.88 35.54-24.12 65.31-57.2-31.77-15.15-67.31-23.54Q518.69-290 480-290Z"/></svg></i>Admin</a>
						@endif
					@else
					<a href="{{ wp_login_url() }}"><i><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"><path d="M479.62-140v-60h268.07q4.62 0 8.46-3.85 3.85-3.84 3.85-8.46v-535.38q0-4.62-3.85-8.46-3.84-3.85-8.46-3.85H479.62v-60h268.07Q778-820 799-799q21 21 21 51.31v535.38Q820-182 799-161q-21 21-51.31 21H479.62Zm-54.23-169.23-41.54-43.39L481.23-450H140v-60h341.23l-97.38-97.38 41.54-43.39L596.15-480 425.39-309.23Z"/></svg></i>Login</a>
					@endif
				</div>
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
				<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px">
					<path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" />
				</svg>
			</div>

			@if (has_nav_menu('primary_navigation'))
			<nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
				{{-- {!! wp_nav_menu(['name' => 'Mainmenu', 'sub_menu' => true, 'show_parent' => true, 'menu_class' => 'nav',
				'echo' => false]) !!} --}}
				<ul class="main-menu">
					@foreach ($nested_nav as $key => $menu_item)
					<li class="item {{ ($menu_item['childs']) ? 'parent' : '' }}">
						<a href="{{ $menu_item['item']->url ? $menu_item['item']->url : '#' }}"
							class="{{ get_field('is_button', $menu_item['item']->ID) ? 'btn btn--outline-orange-primary' : '' }}">{{
							$menu_item['item']->title }}</a>
						@if($menu_item['childs'])
						<svg class="chevron" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
							fill="#e8eaed">
							<path d="M504-480 320-664l56-56 240 240-240 240-56-56 184-184Z" />
						</svg>
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