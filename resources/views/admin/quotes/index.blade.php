@extends('layout.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">Testimonios - <a href="{{ route('quoteAdmin') }}"
                                                        class="btn btn-sm btn-default">Nuevo</a></div>
                <div class="panel-body">
                    <div class="col-sm-12 list-quotes">
                    @foreach($quotes as $quote)
                        <div class="row">
                            <div class="padded">
                                <blockquote>
                                    {{ $quote->message_es }}
                                    <h5>{{ $quote->name }} <small>{{ $quote->rol_es }}</small></h5>
                                </blockquote>
                                <div>
                                    <a href="{{ route('quoteEdit', $quote->id) }}" class="btn btn-primary" role="button">Editar</a>
                                    <a href="{{ route('quoteDelete', $quote->id) }}" class="btn btn-danger confirm-delete" role="button">Eliminar</a>
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