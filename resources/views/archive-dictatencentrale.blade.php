@extends('layouts.app')

@section('content')
@include('partials.page-header')

<section class="section section-dictatencentrale">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="col-12 col-md-9">
				@while(have_posts()) @php(the_post())
				@if ($file = get_field('file', get_the_ID()))
				<a href="{{ $file['url'] }}" title="Download {{ get_the_title() }}">
					<div class="download-item d-flex align-items-center justify-content-between">
						<div class="content">
							<p class="heading">{{ get_the_title() }}</p>
							<div class="meta">
								@if ($vak = get_the_terms(get_the_ID(), 'vak-dictatencentrale'))
								<div class="meta-item">
									<svg xmlns="http://www.w3.org/2000/svg" height="18px" viewBox="0 -960 960 960" width="18px"><path d="M480-120 200-272v-240L40-600l440-240 440 240v320h-80v-276l-80 44v240L480-120Zm0-332 274-148-274-148-274 148 274 148Zm0 241 200-108v-151L480-360 280-470v151l200 108Zm0-241Zm0 90Zm0 0Z"/></svg>
									<span>{{ $vak[0]->name }}</span>
								</div>
								@endif
								@if ($type = get_the_terms(get_the_ID(), 'type-dictatencentrale'))
								<div class="meta-item">
									<svg xmlns="http://www.w3.org/2000/svg" height="18px" viewBox="0 -960 960 960" width="18px"><path d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h440q19 0 36 8.5t28 23.5l216 288-216 288q-11 15-28 23.5t-36 8.5H160Zm0-80h440l180-240-180-240H160v480Zm220-240Z"/></svg>
									<span>{{ $type[0]->name }}</span>
								</div>
								@endif
							</div>
						</div>
						<button class="btn btn-ir">
							Download
							<i><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px">
									<path
										d="M480-320 280-520l56-58 104 104v-326h80v326l104-104 56 58-200 200ZM240-160q-33 0-56.5-23.5T160-240v-120h80v120h480v-120h80v120q0 33-23.5 56.5T720-160H240Z" />
								</svg></i>
						</button>
					</div>
				</a>
				@endif
				@endwhile
			</div>
		</div>
	</div>
</section>


@endsection