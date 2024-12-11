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
		<div class="container d-flex">
			<div class="col-25">Logo</div>
			<div class="col-25">Sitemap</div>
			<div class="col-25">Actueel</div>
			<div class="col-25">Adres</div>
			<div class="col-25">Socials</div>
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