@extends('layout.master')

@section('title', '- Formulario')

@section('content')
<section class="news-event-teaser section text-center-xs">
	<div class="container small">

		<div class="row">
			<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-3 col-xs-12">
						<article class="news-block ">
							<img src="images/trabajaconnosotros.png" alt="Trabaja Con Nosotros" class="logo img-responsive">
						</article>
					</div>
					<div class="col-sm-8 col-md-6">
						<article class="nes-block">
							<h2 class="text-wnormal text-bold titu">Formulario</h2>
							@if (count($errors) > 0)
								<div class="alert alert-danger">
									<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
									</ul>
								</div>
							@endif
							@if (\Session::has('success'))
								<div class="alert alert-success">{{ session('success') }}</div>
							@endif
							<form method="post" enctype="multipart/form-data" action="{{ route('sendCv') }}" class="form-horizontal" id="frmTrabajaConNosotros">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="form-group">
									<label for="nombre" class="col-sm-2 control-label">Nombre:</label>
									<div class="col-sm-10">
										<input class="form-control" name="nombre" id="nombre" type="text" value="{{ old('nombre') }}" required>
									</div>
								</div>
								<div class="form-group">
									<label for="correo" class="col-sm-2 control-label">Correo:</label>
									<div class="col-sm-10">
										<input class="form-control" name="correo" id="correo" type="email" value="{{ old('correo') }}" required>
									</div>
								</div>

								<div class="form-group">
									<label for="cv" class="col-sm-2 control-label">Cv:</label>
									<div class="col-sm-10">
										<input type="file" class="form-control" id="cv" name="cv" required>
										<span class="help-block">* Sólo podrán subir archivos pdf</span>
									</div>
								</div>

								<div class="form-group">
									<label for="mensaje" class="control-label col-sm-12" style="text-align: left">Mensaje:</label>
									<div class="col-sm-12">
										<textarea class="form-control" rows="5" name="mensaje" id="mensaje" required>{{ old('mensaje') }}</textarea>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12">
										<input type="submit" class="btn btn-primary" id="btnEnviar" name="btnEnviar" value="Enviar" />
									</div>
								</div>
							</form>
						</article>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="modal fade" tabindex="-1" role="dialog" id="modalTerminos">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Terminnos y Condiciones</h4>
			</div>
			<div class="modal-body">
				<p>Mediante el envío de su información, está autorizando expresamente a Rebaza & Alcázar S.Civil de R.L. el tratamiento de sus datos personales para las finalidades dadas a conocer en la Política de Privacidad y Protección de Datos Personales que está disponible <a href="https://drive.google.com/file/d/0B8ifxhMM61zuXzF4d3F1cHRWQ2s/view" style="color: #36A9E1; text-decoration: underline;" target="_blank">en este enlace</a></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">No Enviar</button>
				<button type="button" class="btn btn-primary" id="isOk">Entendido y Enviar Cv</button>
			</div>
		</div>
	</div>
</div>
@endsection