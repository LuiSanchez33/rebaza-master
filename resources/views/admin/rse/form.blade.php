@extends('layout.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Galeria RSE</div>
				<div class="panel-body">
					@include('errors.show-errors')
					<form action="{{ $action }}" class="form-horizontal" enctype="multipart/form-data" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						@if (isset($rseGallery->id))
							<input type="hidden" name="id" value="{{ $rseGallery->id }}">
						@endif
						<div class="form-group">
							<div class="col-sm-12">
								<input type="url" class="form-control" name="link" value="{{ old('link', $rseGallery->link) }}" placeholder="Dirección Url">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<input type="file" class="form-control" name="image">
								@if ($rseGallery->image)
									<img src="{{ asset('images/responsabilidad/' . $rseGallery->image) }}" alt="Imagen - {{ $rseGallery->name }}" class="img-responsive">
								@else
									<img src="{{ asset('images/nopicture.jpg') }}" alt="Imagen - nopicture.jpg" class="img-responsive center-block">
								@endif
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
								<hr>
								<button class="btn btn-lg btn-success pull-right">Guardar</button>
								<a href="{{ route('rseIndex') }}" class="btn btn-lg btn-danger pull-left">Cancelar</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection