@extends('layout.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">INICIO</div>

                <div class="panel-body">
                    <form action="{{ route('updateHomeInfo') }}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label>Titulo Español</label>
                            <input type="text" class="form-control" name="name_es" value="{{ old('name_es', $homePage->name_es) }}">
                        </div>
                        <div class="form-group">
                            <label>Titulo Inglés</label>
                            <input type="text" class="form-control" name="name_en" value="{{ old('name_en', $homePage->name_en) }}">
                        </div>
                        <div class="form-group">
                            <h4>Contenido Español</h4>
                            <textarea name="text_es" id="text_es" class="paq_descripcion">{!! old('text_es', $homePage->text_es) !!}</textarea>
                        </div>
                        <hr>
                        <div class="form-group">
                            <h4>Contenido Inglés</h4>
                            <textarea name="text_en" id="text_en" class="paq_descripcion">{!! old('text_en', $homePage->text_en) !!}</textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-lg btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
