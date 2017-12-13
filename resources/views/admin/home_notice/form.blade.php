@extends('layout.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					@if (session()->has('error'))
						<div class="alert alert-danger">
							{{ session('error') }}
						</div>
					@endif
					<div class="panel-heading">Nuevo Articulo</div>

					<div class="panel-body">
						<form action="{{ $action }}" method="post" enctype="multipart/form-data">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" value="2" name="status">
							<input type="type" name="title_es" class="hidden" value=" ">
							<input type="type" name="title_en" class="hidden" value=" ">
							@if (isset($notice->id))
								<input type="hidden" name="id" value="{{ $notice->id }}">
							@endif
							<div class="form-group">
								<h4>En Español</h4>
								<div class="controls">
									<textarea name="desc_es" class="paq_descripcion">{{ old('info_en', $notice->desc_es) }}</textarea>
								</div>
								<hr>
								<h4>En Inglés</h4>
								<div class="controls">
									<textarea name="desc_en" class="paq_descripcion">{{ old('info_en', $notice->desc_en) }}</textarea>
								</div>
							</div>
							<div class="form-group">
								<a href="{{ route('home') }}" class="btn btn-danger">Cancelar</a>
								<button class="btn btn-primary">Agregar</button>
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>
@endsection
