@extends('layout.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 col-lg-10 col-lg-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">OTROS</div>

				<div class="panel-body list-others">
					@include('errors.show-errors')
					<h2>
						Página de Inicio -
						<a href="#modal-others-img" class="btn btn-sm btn-primary" data-type="1" data-toggle="modal">Nueva imagen</a>
					</h2>
					@foreach($sidebarImages as $images)
						<div class="col-sm-3">
							<div class="thumbnail">
								<div style="background-image: url('{{ asset("images/" . $images->image) }}'); height: 190px" class="image-content"></div>
								<div class="caption">
									<div>
										<hr>
										<a href="#modal-others-img" class="btn btn-primary" data-toggle="modal" data-type="1" data-id="{{ $images->id }}" data-img="{{ $images->image }}">Editar</a>
										{{--<a href="{{ route('othersDelete', $images->id) }}" class="btn btn-danger
									confirm-delete pull-right" role="button">Eliminar</a> --}}
									</div>
								</div>
							</div>
						</div>
					@endforeach
					<div class="clearfix"></div>
					<hr>
					<h2>Iconos Redes -
						<a href="#modal-others-img" class="btn btn-sm btn-primary" data-type="2" data-toggle="modal">Nuevo icono</a>
					</h2>
					@foreach($socialIcons as $icon)
						<div class="col-sm-2">
							<div class="thumbnail">
								<a href="{{ $icon->link }}">
									<img src="{{ asset("images/" . $icon->image) }}" class="img-responsive center-block" width="30">
								</a>
								<div class="caption">
									<div>
										<hr>
										<a href="#modal-others-img" class="btn btn-sm btn-primary" data-type="2" data-id="{{ $icon->id }}" data-img="{{ $icon->image }}" data-toggle="modal" role="button">
											<i class="glyphicon glyphicon-pencil"></i>
										</a>
										<a href="{{ route('othersDelete', $icon->id) }}" class="btn btn-sm btn-danger confirm-delete pull-right" role="button">
											<i class="glyphicon glyphicon-trash"></i>
										</a>
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

<div class="modal fade" tabindex="-1" role="dialog" id="modal-others-img">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form action="#" class="form-horizontal" enctype="multipart/form-data" method="post" data-action="{{ route('othersUpdate', ':ID') }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="type" id="image_type">
				<div class="modal-header">
					<h4 class="modal-title"></h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-12">
							<input type="file" name="image" class="form-control">
							<div id="only-icon" class="hidden">
								<br>
								<input type="url" class="form-control" name="link" placeholder="http://example.com" disabled>
							</div>
						</div>
						<div class="col-sm-12" id="others-current-image">
							<h3 class="page-header text-center text-primary">Imagen actual</h3>
							<img src="#" alt="" class="img-responsive center-block" data-url="{{ asset("images/:IMG") }}">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary">Guardar</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection

@section('lawyers_js')
<script>
	var createRoute = '{{ route('othersStore') }}';

	$('#modal-others-img').on('show.bs.modal', function (e) {
		var id = $(e.relatedTarget).data('id');
		var img_name = $(e.relatedTarget).data('img');
		var link = $(e.relatedTarget).closest('.thumbnail').children('a').prop('href');
		var type = $(e.relatedTarget).data('type');
		var $form = $(e.currentTarget).find('form');
		var img = $form.find('img').data('url');
		var action = $form.data('action');

		if (img_name && id) {
			$('#others-current-image').removeClass('hidden');
			$form.prop('action', action.replace(':ID', id));
			$form.find('img').prop('src', img.replace(':IMG', img_name));
			$('#only-icon input').val(link);
		} else {
			$form.prop('action', createRoute)[0].reset();
			$('#others-current-image').addClass('hidden');
		}

		$('#image_type').val(type);
		if (type == 2) {
			$('#only-icon').removeClass('hidden').find('input').prop('disabled', false);
		} else {
			$('#only-icon').addClass('hidden').find('input').prop('disabled', true);
		}
	});
</script>
@endsection