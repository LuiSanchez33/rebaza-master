@extends('layout.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">OFICINAS &nbsp; | &nbsp; <a href="{{ route('addOffice') }}" class="btn
				btn-primary">Nueva	Oficina</a></div>

				<div class="panel-body list-offices">
					<div class="row">
					@foreach($offices as $office)
						<div class="col-sm-4">
							<div class="thumbnail">
								<div class="info-content">
									{!! nl2br($office->info_es) !!}
								</div>
								<div class="caption">
									<hr>
									<h4>{{ $office->place }}</h4>
									<div>
										<a href="{{ route('editOffice', $office->id) }}" class="btn btn-primary" role="button">Editar</a>
										<a href="{{ route('deleteOffice', $office->id) }}" class="btn btn-danger confirm-delete" role="button">Eliminar</a>
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
</div>
@endsection
