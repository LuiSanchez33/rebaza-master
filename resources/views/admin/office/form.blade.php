@extends('layout.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-default">
					<div class="panel-heading">Oficina</div>
					<div class="panel-body">
						@include('errors.show-errors')
						<form action="{{ $action }}" class="form-horizontal" enctype="multipart/form-data" method="post">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							@if (isset($office->id))
								<input type="hidden" name="id" value="{{ $office->id }}">
							@endif
							<div class="form-group">
								<div class="col-sm-12 col-lg-6">
									<input type="text" class="form-control" name="place" value="{{ old('place',
									$office->place) }}" placeholder="Lugar">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<div class="alert alert-info no-margin-bottom">
										<strong>Para una buena visualización en la web, no pasar las 6 lineas de texto</strong>
									</div>
								</div>
								<div class="col-sm-6">
									<h3>Dirección en Español</h3>
									<textarea name="info_es" id="info_es" class="form-control" rows="5">{{ old('info_es', $office->info_es) }}</textarea>
								</div>
								<div class="col-sm-6">
									<h3>Dirección en Inglés</h3>
									<textarea name="info_en" id="info_en" class="form-control" rows="5">{{ old('info_en', $office->info_en) }}</textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<a href="{{ route('officesIndex') }}" class="btn btn-lg btn-danger pull-left">Cancelar</a>
									<button class="btn btn-lg btn-success pull-right">Guardar</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection