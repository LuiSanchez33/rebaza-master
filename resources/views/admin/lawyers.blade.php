@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="col-sm-3">
                            <select class="form-control" id="lawyer-type">
                                <option value="1" {{ $type == 1 ? 'selected' : '' }}>SOCIOS</option>
                                <option value="2" {{ $type == 2 ? 'selected' : '' }}>ASOCIADOS</option>
                                <option value="3" {{ $type == 3 ? 'selected' : '' }}>CONSULTORES</option>
                            </select>
                        </div>
                        | &nbsp; <a href="{{ route('addLawyer', $type) }}" class="btn btn-primary">Nuevo Abogado</a></div>

                    <div class="col-sm-12">
                        {!! $lawyers->render() !!}
                    </div>
                    <div class="panel-body list-articles">
                        <div class="row">
                        @foreach($lawyers as $lawyer)
                            <div class="col-sm-4">
                                <div class="thumbnail {{ $lawyer->deleted_at ? 'item-deleted' : '' }}">
                                    <div style="background-image: url('{{ asset('images/abogados/' . $lawyer->image) }}')" class="image-content"></div>
                                    <div class="caption">
                                        <h4>{{ $lawyer->name }}</h4>
                                        <p><strong>{{ $lawyer->job_es }}</strong></p>
                                        <p><small>Ultima actualización: {{ $lawyer->updated_at }}</small></p>
                                        <div>
                                            <a href="{{ route('showLawyer', $lawyer->id) }}" class="btn btn-success btn-sm">Editar</a>
                                            @if ($lawyer->deleted_at)
                                                <a href="{{ route('activateLawyer', $lawyer->id) }}" class="btn btn-warning btn-sm activate-lawyer">Activar</a>
                                            @else
                                                <a href="{{ route('inactivateLawyer', $lawyer->id) }}" class="btn btn-danger btn-sm confirm-delete" data-role="inactivate">Inactivar</a>
                                            @endif
                                            <a href="{{ route('destroyLawyer', $lawyer->id) }}" class="btn btn-danger btn-sm confirm-delete pull-right" title="Eliminar Definitivamente">
                                                <i class="glyphicon glyphicon-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                        {!! $lawyers->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
