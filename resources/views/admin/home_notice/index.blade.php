@extends('layout.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">NOTICIAS HOME&nbsp; | &nbsp; <a href="{{ route('addNotice') }}" class="btn btn-primary">Nueva Noticia</a></div>

					<div class="panel-body list-articles">
						@foreach($articles as $article)
							<div class="row">
								<div class="col-sm-12">
									{!! $article->desc_es !!}
									<div>
										<a href="{{ route('editNotice', $article->id) }}" class="btn btn-success btn-sm">Editar</a>
										<a href="{{ route('deleteArticle', $article->id) }}" class="btn btn-danger btn-sm confirm-delete">Eliminar</a>
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
