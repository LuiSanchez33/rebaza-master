@extends('layout.app')

@section('content')
	<?php
	$data = old('_data', json_decode($gallery->data, true));
	?>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-default">
					<div class="panel-heading">Galeria</div>
					<div class="panel-body">
						@include('errors.show-errors')
						<form action="{{ $action }}" class="form-horizontal" enctype="multipart/form-data" method="post">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							@if (isset($gallery->id))
								<input type="hidden" name="id" value="{{ $gallery->id }}">
							@endif
							<div class="form-group">
								<div class="col-sm-4">
									<input type="file" class="form-control" name="image">
									@if ($gallery->image)
										<img src="{{ asset('images/gallery/' . $gallery->image) }}" alt="Imagen - {{
										$gallery->name }}" class="img-responsive">
									@else
										<img src="{{ asset('images/nopicture.jpg') }}" alt="Imagen - nopicture.jpg" class="img-responsive center-block">
									@endif
								</div>
								<div class="col-sm-8">
									<div class="row">
										<div class="col-sm-12">
											<label class="col-sm-3 control-label">Nombre</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" name="name" value="{{ old
										('name', $gallery->name) }}" placeholder="Nombre">
											</div>
										</div>
										<br><br><br>
										<div class="col-sm-12">
											<label class="col-sm-3 control-label">Artista</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" name="_data[]" value="{{
												isset($data[0]) ? $data[0] : ''  }}">
											</div>
										</div>
										<br><br>
										<div class="col-sm-12">
											<label class="col-sm-3 control-label">Tipo Obra</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" name="_data[]" value="{{
												isset($data[1]) ? $data[1] : '' }}">
											</div>
										</div>
										<br><br>
										<div class="col-sm-12">
											<label class="col-sm-3 control-label">Medidas</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" name="_data[]" value="{{
												isset($data[2]) ? $data[2] : '' }}">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<hr>
									<button class="btn btn-lg btn-success pull-right">Guardar</button>
									<a href="{{ route('gaIndex') }}" class="btn btn-lg btn-danger
									pull-left">Cancelar</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection