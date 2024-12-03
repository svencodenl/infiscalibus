<div class="vacature-item">
	<div class="image">
		<img src="{{ $image }}" alt="{{ $title }}">
	</div>
	<div class="content">
		<div class="heading">
			<span>{{ $title }}</span>
		</div>
		<div class="meta">
			<div class="meta-item locations">
				<i><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"><path d="M80-120v-720h400v160h400v560H80Zm80-80h80v-80h-80v80Zm0-160h80v-80h-80v80Zm0-160h80v-80h-80v80Zm0-160h80v-80h-80v80Zm160 480h80v-80h-80v80Zm0-160h80v-80h-80v80Zm0-160h80v-80h-80v80Zm0-160h80v-80h-80v80Zm160 480h320v-400H480v80h80v80h-80v80h80v80h-80v80Zm160-240v-80h80v80h-80Zm0 160v-80h80v80h-80Z"/></svg></i>
				@foreach ($locations as $location)
					<span>{{ $location['name'] }}</span>
				@endforeach
			</div>
			<div class="meta-item hours">
				<i><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"><path d="m612-292 56-56-148-148v-184h-80v216l172 172ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-400Zm0 320q133 0 226.5-93.5T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 133 93.5 226.5T480-160Z"/></svg></i>
				<span>{{ $hours }} uur per week</span>
			</div>
		</div>
	</div>
	<i class="icon-circle"><svg
		xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="24px">
		<path d="M647-440H160v-80h487L423-744l57-56 320 320-320 320-57-56 224-224Z" />
	</svg></i>
	<a class="overlay-link" href="{{ $permalink }}"></a>
</div>