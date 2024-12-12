<footer class="footer">
	<div class="container d-flex justify-content-center">
		<div class="footer-banner" 
			@if($image = get_field('banner_image', 'option')['url']) style="background-image: url({{ $image }})" @endif
		>
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
			<div class="col-25 footer-col-sitemap">Sitemap</div>
			<div class="col-25 footer-col-actueel">Actueel</div>
			<div class="col-25 footer-col-contact">Contact</div>
			<div class="col-25 footer-col-socials">Socials</div>
		</div>
	</div>
	<div class="footer-copyright">
		<div class="copyright-text">
			<p>&copy; {{ date('Y') }} F.S.V. In Fiscalibus</p>
		</div>
		<div class="copyright-links">
			<a href="#">Algemene voorwaarden</a>
			<a href="#">Privacy policy</a>
			<a href="#">Disclaimer</a>
		</div>
	</div>
</footer>