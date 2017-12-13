@extends('layout.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">GALERIA &nbsp; | &nbsp; <a href="{{ route('addGallery') }}" class="btn
					btn-primary">Nuevo</a></div>

					<div class="panel-body list-gallery">
					@foreach($galleries as $gallery)
						<div class="col-sm-4">
							<div class="thumbnail">
								<div style="background-image: url('{{ asset("images/gallery/" . $gallery->image) }}')" class="image-content gallery-height"></div>
								<div class="caption">
									<h4>{{ $gallery->name }}</h4>
									<div>
										<hr>
										<a href="{{ route('editGallery', $gallery->id) }}" class="btn btn-primary" role="button">Editar</a>
										<a href="{{ route('deleteGallery', $gallery->id) }}" class="btn btn-danger
										confirm-delete pull-right" role="button">Eliminar</a>
									</div>
								</div>
							</div>
						</div>
					@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
