@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Testimonio</div>
                    <div class="panel-body">
                        @include('errors.show-errors')
                        <form action="{{ $action }}" class="form-horizontal" enctype="multipart/form-data" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            @if (isset($quote->id))
                                <input type="hidden" name="id" value="{{ $quote->id }}">
                            @endif
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="name" value="{{ old('name', $quote->name) }}" placeholder="Nombre del abogado">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="col-sm-3 control-label">Cargo</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="rol_es" value="{{ old('rol_es', $quote->rol_es) }}" placeholder="Español">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="col-sm-3 control-label">Job</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="rol_en" value="{{ old('rol_en', $quote->rol_en) }}" placeholder="Inglés">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <hr>
                                    <h3>Contenido en Español</h3>
                                    <textarea name="message_es" id="message_es" class="form-control" rows="4">{{ old('message_es', $quote->message_es) }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <hr>
                                    <h3>Contenido en Inglés</h3>
                                    <textarea name="message_en" id="message_en" class="form-control" rows="4">{{ old('message_en', $quote->message_en) }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <a href="{{ route('quoteIndex') }}" class="btn btn-lg btn-danger pull-left">Cancelar</a>
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