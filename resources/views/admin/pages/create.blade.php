@extends('layout.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">PAGINAS - <strong>{{ strtoupper($type) }}</strong></div>
                <div class="panel-body">
                    @include('errors.show-errors')
                    <form action="{{ $action }}" class="form-horizontal" enctype="multipart/form-data" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @if (isset($page->id))
                            <input type="hidden" name="id" value="{{ $page->id }}">
                        @endif
                        <input type="hidden" value="{{ strtoupper($type) }}" name="type">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label class="col-sm-12">Imagen</label>
                                    <div class="col-sm-12">
                                        <input type="file" class="form-control" name="image">
                                        @if ($page->image)
                                            <img src="{{ asset('images/' . strtolower($page->type) . '/' . $page->image) }}" alt="Imagen - {{ $page->name }}" class="img-responsive">
                                        @else
                                            <img src="{{ asset('images/nopicture.jpg') }}" alt="Imagen - nopicture.jpg" class="img-responsive center-block">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div>
                                        <label class="col-sm-3 control-label">Url</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="page_slug" value="{{ old('page_slug', $page->page_slug) }}">
                                        </div>
                                        <div class="clearfix"></div>
                                        <hr>
                                    </div>
                                    <div>
                                        <label class="col-sm-3 control-label">Titulo (Español)</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="name_es" value="{{ old('name_es', $page->name_es) }}">
                                        </div>
                                        <div class="clearfix"></div>
                                        <br>
                                    </div>
                                    <label class="col-sm-3 control-label">Titulo (Inglés)</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="name_en" value="{{ old('name_en', $page->name_en) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <hr>
                                <h3>Contenido en Español</h3>
                                <textarea name="text_es" id="text_es" class="paq_descripcion">{{ old('text_es', $page->text_es) }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <hr>
                                <h3>Contenido en Inglés</h3>
                                <textarea name="text_en" id="text_en" class="paq_descripcion">{{ old('text_en', $page->text_en) }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                @if ($type !== 'trabaja')
                                    <a href="{{ route('pageIndex', $type) }}" class="btn btn-lg btn-danger pull-left">Cancelar</a>
                                @endif
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