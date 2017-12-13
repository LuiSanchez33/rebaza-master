@extends('layout.master')

@section('title', '- Responsabilidad Social Empresarial')

@section('content')
	<?php $gallery = $rseGalleries->shift(); ?>
<div id="cont_contenido" class="container">
	<div class="col-sm-12">
		<div class="col-sm-3">
			<a href="{{ route('galeria') }}">
				<img src="images/responsabilidad/{{ $gallery->image }}" width="205" height="376" class="img-responsive" alt="{{ $gallery->name }}">
			</a>
		</div>
		<div class="col-sm-9">
			<h2>Responsabilidad Social Empresarial</h2>
			<div class="col-sm-12">
				@foreach($rseGalleries as $i => $gallery)
					@if ($i%3 == 0)
					<div class="row mb50">
					@endif
						<div class="col-sm-4">
							<a href="{{ $gallery->link }}" target="_blank">
								<img src="images/responsabilidad/{{ $gallery->image }}" class="img-responsive" alt="{{ $gallery->image }}">
							</a>
						</div>
					@if (($i+1) % 3 == 0)
					</div>
					@endif
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection