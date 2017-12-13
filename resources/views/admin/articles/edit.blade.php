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
                <div class="panel-heading">Editar Articulo</div>

                <div class="panel-body">
                    <form action="{{ route('updateArticle', $article->id) }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        {{--<div class="form-group">
                            <label for="imagen" class="control-label">Imagen</label>
                            <div class="row">
                                <div class="col-sm-4">
                                @if ($article->imagen != '')
                                    <img src="{{ asset('images/articles/' . $article->imagen) }}" alt="{{ $article->imagen }}" class="img-responsive">
                                @else
                                    <img src="{{ asset('images/nopictured.jpg') }}" alt="not picture" class="img-responsive">
                                @endif
                                </div>
                                <div class="col-sm-8">
                                    <input type="file" name="imagen" id="imagem" class="form-control">
                                    <hr>
                                    <div class="checkbox" style="font-weight: bold">
                                        <label class="text-bold text-danger">
                                            <input type="checkbox" name="delete_picture"> ELIMINAR IMAGEN
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>--}}
                        <div class="form-group">
                            <label for="title" class="control-label">Titulo</label>
                            <div class="controls">
                                <input type="text" value="{{ $article->title_es }}" name="title_es" id="title" class="form-control" placeholder="En Español">
                            </div>
                            <div class="controls">
                                <input type="text" value="{{ $article->title_en }}" name="title_en" class="form-control" placeholder="En Inglés">
                            </div>
                        </div>
                        <div class="form-group">
                            <h4>En Español</h4>
                            <div class="controls">
                                <textarea name="desc_es" class="paq_descripcion">{{ $article->desc_es }}</textarea>
                            </div>
                            <hr>
                            <h4>En Inglés</h4>
                            <div class="controls">
                                <textarea name="desc_en" class="paq_descripcion">{{ $article->desc_en }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <a href="{{ route('articles', 1) }}" class="btn btn-danger">Cancelar</a>
                            <button class="btn btn-primary">Actualizar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection