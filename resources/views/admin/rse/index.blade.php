@extends('layout.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">GALERIA RSE &nbsp; | &nbsp; <a href="{{ route('rseCreate') }}" class="btn btn-primary">Nuevo</a></div>

				<div class="panel-body list-gallery">
					<div class="col-sm-3">
						<div class="thumbnail">
							<?php $gallery = $galleries->shift(); ?>
							<div style="background-image: url('{{ asset("images/responsabilidad/" . $gallery->image) }}')" class="image-content"></div>
							<div class="caption">
								<h5>{{ $gallery->link }}</h5>
								<div>
									<hr>
									<a href="{{ route('rseShow', $gallery->id) }}" class="btn btn-primary" role="button">Editar</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-9 rse-gallery-content">
					@if (!$galleries->isEmpty())
						<div class="row">
						@foreach($galleries as $gallery)
							<div class="col-sm-4">
								<div class="thumbnail">
									<div style="background-image: url('{{ asset("images/responsabilidad/" . $gallery->image) }}')" class="image-content gallery-height"></div>
									<div class="caption">
										<h5>{{ $gallery->link }}</h5>
										<div>
											<hr>
											<a href="{{ route('rseShow', $gallery->id) }}" class="btn btn-primary" role="button">Editar</a>
											<a href="{{ route('rseDelete', $gallery->id) }}" class="btn btn-danger confirm-delete pull-right" role="button">
												<i class="glyphicon glyphicon-trash"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						@endforeach
						</div>
					@else
						<h5 class="text-center">No hay resultados que mostrar, <a href="{{ route('rseCreate') }}">agregue uno</a></h5>
					@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
