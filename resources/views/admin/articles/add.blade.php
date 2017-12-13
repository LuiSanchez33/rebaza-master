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
                    <form action="{{ route('storeArticle') }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" value="1" name="status">
                        <div class="form-group">
                            <label for="title" class="control-label">Titulo</label>
                            <div class="controls">
                                <input type="text" name="title_es" id="title" class="form-control" placeholder="En Español">
                            </div>
                            <div class="controls">
                                <input type="text" name="title_en" class="form-control" placeholder="En Inglés">
                            </div>
                        </div>
                        <div class="form-group">
                            <h4>En Español</h4>
                            <div class="controls">
                            	<textarea name="desc_es" class="paq_descripcion"></textarea>
							</div>
                            <hr>
                            <h4>En Inglés</h4>
                            <div class="controls">
                                <textarea name="desc_en" class="paq_descripcion"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <a href="{{ route('articles', 1) }}" class="btn btn-danger">Cancelar</a>
                        	<button class="btn btn-primary">Agregar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection