@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">ARTICULOS &nbsp; | &nbsp; <a href="{{ route('addArticle') }}" class="btn btn-primary">Nuevo Articulo</a></div>

                    <div class="panel-body list-articles">
                        @foreach($articles as $article)
                            <div class="row">
                                {{--<div class="col-sm-3">
                                    @if ($article->imagen != '')
                                    <img src="{{ asset('images/articles/' . $article->imagen) }}" alt="{{ $article->imagen }}" class="img-responsive">
                                    @else
                                        <img src="{{ asset('images/nopictured.jpg') }}" alt="Not picture" class="img-responsive">
                                    @endif
                                </div>--}}
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            @if ($article->title_es != '')
                                                <h4>{{ $article->title_es }}</h4>
                                            @endif
                                        </div>
                                        <div class="col-sm-12">
                                            {!! $article->desc_es !!}
                                            <div>
                                                <a href="{{ route('editArticle', $article->id) }}" class="btn btn-success btn-sm">Editar</a>
                                                <a href="{{ route('deleteArticle', $article->id) }}" class="btn btn-danger btn-sm confirm-delete">Eliminar</a>
                                            </div>
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
@endsection
