@extends('layout.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Abogado</div>

                <div class="panel-body list-articles">
                    @include('errors.show-errors')
                    <form action="{{ $action }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @if (isset($lawyer->id))
                            <input type="hidden" name="id" value="{{ $lawyer->id }}">
                        @endif
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-4">
                                    <input type="file" name="image" class="form-control">
                                    @if ($lawyer->image)
                                        <img src="{{ asset('images/abogados/' . $lawyer->image) }}" alt="Imagen - {{ $lawyer->name }}" class="img-responsive">
                                    @else
                                        <img src="{{ asset('images/nopicture.jpg') }}" alt="Imagen - nopicture.jpg" class="img-responsive center-block">
                                    @endif
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <div class="row">
                                            <label for="type" class="col-sm-2 control-label"><strong>Seccion</strong></label>
                                            <div class="col-sm-6">
                                                <select name="type" id="type" class="form-control">
                                                    <?php $typeOld = old('type', $lawyer->type) ?>
                                                    @foreach($types as $type)
                                                        <option value="{{ $type['id'] }}" {{ $typeOld == $type['id'] ? 'selected' : '' }}>{{ $type['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label for="name" class="col-sm-2 control-label"><strong>Nombre</strong></label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $lawyer->name) }}" placeholder="Nombre">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label for="correo" class="col-sm-2 control-label"><strong>Correo</strong></label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="correo" name="email" value="{{ old('email', $lawyer->email) }}" placeholder="Correo">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs">
                            <li role="preseqntation" class="active">
                                <a href="#tab_es" aria-controls="tab_es" role="tab" data-toggle="tab">Español</a>
                            </li>
                            <li role="presentation">
                                <a href="#tab_en" aria-controls="tab_en" role="tab" data-toggle="tab">Inglés</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="tab_es">
                                <div class="form-group">
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="#">
                                                <span>Cv</span>
                                                @if ($lawyer->download_cv_es !== '' && !is_null($lawyer->download_cv_es))
                                                    <span>
                                                        <a href="{{ asset('abogados_cv/' . $lawyer->download_cv_es) }}">
                                                            {{ $lawyer->download_cv_es }}
                                                            <i class="glyphicon glyphicon-download-alt"></i>
                                                        </a>
                                                    </span>
                                                    &nbsp;
                                                    <a href="{{ route('destroyLawyerCv', [$lawyer->id, 'es']) }}" class="btn btn-xs btn-danger confirm-delete" role="button">
                                                        ELIMINAR CV <i class="glyphicon glyphicon-remove"></i>
                                                    </a>
                                                @endif
                                            </label>
                                            <input type="file" name="download_cv_es" class="form-control">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="#">Cargo</label>
                                            <input type="text" class="form-control" name="job_es" value="{{ old('job_es', $lawyer->job_es) }}">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row" data-lang="es" style="background-color: #f7f7f7; padding: 20px 15px">
                                    <div class="content-data_es hidden">
                                        <?php $list_es = old('list_es', $lawyer->list_es)?>
                                        @if ($list_es != '')
                                        <?php $i_es = 1 ?>
                                        @foreach (json_decode($list_es, true) as $list)
                                            <input type="hidden" name="test_es[list_{{ $i_es  }}]" id="list_es{{ $i_es }}" class="title_val" value="{{ $list['list'] }}">

                                            @if (!empty($list['items_es']))
                                                <?php $il_es = 1 ?>
                                                @foreach($list['items_es'] as $item)
                                                    <input type="hidden" name="items_es[list_{{ $i_es }}][]" id="item{{ $i_es  }}_es{{ $il_es }}" class="item_val_{{ $i_es }}" value="{{ $item }}">
                                                    <?php $il_es++ ?>
                                                @endforeach
                                            @endif
                                            <?php $i_es++ ?>
                                        @endforeach
                                        @endif
                                    </div>
                                    <ul class="list-test_es list-unstyled">
                                        <?php $lista = json_decode($list_es, true)?>
                                        <li id="li_title_es1" data-id="1">
                                            <strong>Áreas</strong>
                                            <div class="list-actions-buttons">
                                                <input type="button" class="btn btn-xs btn-primary btn-add-item" data-id="1" value="Agregar Item">
                                            </div>
                                            <ul class="content-items">
                                                @if ($lista)
												<?php $n_item_es = 1 ?>
                                                @foreach($lista[0]['items_es'] as $item)
                                                    <li>
                                                        <div class="col-sm-10 txt-item">{!! $item !!}</div>
                                                        <div class="col-sm-12 edit-input hidden">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control input-sm">
                                                                <div class="input-group-btn">
                                                                    <button type="button" class="btn-sm btn btn-success btn-save-edit-list">Guardar</button>
                                                                    <button type="button" class="btn-sm btn btn-danger btn-cancel-edit-list">Cancelar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2 content-edit">
                                                            <a href="#" class="btn-add-link-item" data-id="1" id="txt_item1_es{{ $n_item_es }}" data-item="{{ $n_item_es }}">Link</a> |
                                                            <a href="#" class="btn-delete-item-created" data-id="1" data-item="{{ $n_item_es }}">Elminar</a> |
                                                            <a href="#" class="btn-edit-item" data-id="1" data-item="{{ $n_item_es }}">Editar</a>
                                                        </div>
                                                    </li>
													<?php $n_item_es++ ?>
                                                @endforeach
                                                @endif
                                            </ul>
                                            <ul class="hidden form-group-sm">
                                                <li>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <input type="button" class="btn btn-sm btn-success btn-create-item" value="Agregar">
                                                    <input type="button" class="btn btn-sm btn-del-item" value="Cancelar">
                                                </li>
                                            </ul>
                                        </li>
                                        <li id="li_title_es2" data-id="2">
                                            <strong>Educación</strong>
                                            <div class="list-actions-buttons">
                                                <input type="button" class="btn btn-xs btn-primary btn-add-item" data-id="2" value="Agregar Item">
                                            </div>
                                            <ul class="content-items">
                                                @if ($lista)
												<?php $n_item_es = 1 ?>
                                                @foreach($lista[1]['items_es'] as $item)
                                                    <li>
                                                        <div class="col-sm-10 txt-item">{!! $item !!}</div>
                                                        <div class="col-sm-12 edit-input hidden">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control input-sm">
                                                                <div class="input-group-btn">
                                                                    <button type="button" class="btn-sm btn btn-success btn-save-edit-list">Guardar</button>
                                                                    <button type="button" class="btn-sm btn btn-danger btn-cancel-edit-list">Cancelar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2 content-edit">
                                                            <a href="#" class="btn-add-link-item" id="txt_item2_es{{ $n_item_es }}" data-id="2" data-item="{{ $n_item_es }}">Link</a> |
                                                            <a href="#" class="btn-delete-item-created" data-id="2" data-item="{{ $n_item_es }}">Elminar</a> |
                                                            <a href="#" class="btn-edit-item" data-id="2" data-item="{{ $n_item_es }}">Editar</a>
                                                        </div>
                                                    </li>
													<?php $n_item_es++ ?>
                                                @endforeach
                                                @endif
                                            </ul>
                                            <ul class="hidden form-group-sm">
                                                <li>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <input type="button" class="btn btn-sm btn-success btn-create-item" value="Agregar">
                                                    <input type="button" class="btn btn-sm btn-del-item" value="Cancelar">
                                                </li>
                                            </ul>
                                        </li>
                                        <li id="li_title_es3" data-id="3">
                                            <strong>Distinciones</strong>
                                            <div class="list-actions-buttons">
                                                <input type="button" class="btn btn-xs btn-primary btn-add-item" data-id="3" value="Agregar Item">
                                            </div>
                                            <ul class="content-items">
                                                @if ($lista)
												<?php $n_item_es = 1 ?>
                                                @foreach($lista[2]['items_es'] as $item)
                                                    <li>
                                                        <div class="col-sm-10 txt-item">{!! $item !!}</div>
                                                        <div class="col-sm-12 edit-input hidden">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control input-sm">
                                                                <div class="input-group-btn">
                                                                    <button type="button" class="btn-sm btn btn-success btn-save-edit-list">Guardar</button>
                                                                    <button type="button" class="btn-sm btn btn-danger btn-cancel-edit-list">Cancelar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2 content-edit">
                                                            <a href="#" class="btn-add-link-item" id="txt_item3_es{{ $n_item_es }}" data-id="3" data-item="{{ $n_item_es }}">Link</a> |
                                                            <a href="#" class="btn-delete-item-created" data-id="3" data-item="{{ $n_item_es }}">Elminar</a> |
                                                            <a href="#" class="btn-edit-item" data-id="3" data-item="{{ $n_item_es }}">Editar</a>
                                                        </div>
                                                    </li>
													<?php $n_item_es++ ?>
                                                @endforeach
                                                @endif
                                            </ul>
                                            <ul class="hidden form-group-sm">
                                                <li>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" placeholder="Escriba aquí...">
                                                    </div>
                                                    <input type="button" class="btn btn-sm btn-success btn-create-item" value="Agregar">
                                                    <input type="button" class="btn btn-sm btn-del-item" value="Cancelar">
                                                </li>
                                            </ul>
                                        </li>
                                        <li id="li_title_es4" data-id="4">
                                            <strong>Idiomas</strong>
                                            <div class="list-actions-buttons">
                                                <input type="button" class="btn btn-xs btn-primary btn-add-item" data-id="4" value="Agregar Item">
                                            </div>
                                            <ul class="content-items">
                                                @if ($lista)
												<?php $n_item_es = 1 ?>
                                                @foreach($lista[3]['items_es'] as $item)
                                                    <li>
                                                        <div class="col-sm-10 txt-item">{!! $item !!}</div>
                                                        <div class="col-sm-12 edit-input hidden">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control input-sm">
                                                                <div class="input-group-btn">
                                                                    <button type="button" class="btn-sm btn btn-success btn-save-edit-list">Guardar</button>
                                                                    <button type="button" class="btn-sm btn btn-danger btn-cancel-edit-list">Cancelar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2 content-edit">
                                                            <a href="#" class="btn-add-link-item" id="txt_item4_es{{ $n_item_es }}" data-id="4" data-item="{{ $n_item_es }}">Link</a> |
                                                            <a href="#" class="btn-delete-item-created" data-id="4" data-item="{{ $n_item_es }}">Elminar</a> |
                                                            <a href="#" class="btn-edit-item" data-id="4" data-item="{{ $n_item_es }}">Editar</a>
                                                        </div>
                                                    </li>
													<?php $n_item_es++ ?>
                                                @endforeach
                                                @endif
                                            </ul>
                                            <ul class="hidden form-group-sm">
                                                <li>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <input type="button" class="btn btn-sm btn-success btn-create-item" value="Agregar">
                                                    <input type="button" class="btn btn-sm btn-del-item" value="Cancelar">
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <h3>Información Contacto</h3>
                                    <textarea name="info_es" id="info_es" class="form-control txt-lawyers">{{ old('info_es', $lawyer->info_es) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <hr>
                                    <h3>Detalle</h3>
                                    <textarea name="text_es" id="text_es" class="form-control txt-lawyers">{{ old('text_es', $lawyer->text_es) }}</textarea>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_en">
                                <div class="form-group">
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="#">
                                                <span>Cv</span>
                                                @if ($lawyer->download_cv_en !== '' && !is_null($lawyer->download_cv_en))
                                                    <span>
                                                        <a href="{{ asset('abogados_cv/' . $lawyer->download_cv_en) }}">
                                                            {{ $lawyer->download_cv_en }}
                                                            <i class="glyphicon glyphicon-download-alt"></i>
                                                        </a>
                                                    </span>
                                                    &nbsp;
                                                    <a href="{{ route('destroyLawyerCv', [$lawyer->id, 'en']) }}" class="btn btn-xs btn-danger confirm-delete" role="button">
                                                        ELIMINAR CV <i class="glyphicon glyphicon-remove"></i>
                                                    </a>
                                                @endif
                                            </label>
                                            <input type="file" name="download_cv_en" class="form-control">
                                        </div>
                                        <div class="col-sm-6">
                                            <label for="#">Job</label>
                                            <input type="text" class="form-control" name="job_en" value="{{ old('job_en', $lawyer->job_en) }}">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row" data-lang="en" style="background-color: #f7f7f7; padding: 20px 15px">
                                    <div class="content-data_en hidden">
                                        <?php $list_en = old('list_en', $lawyer->list_en); ?>
                                        @if ($list_en != '')
                                            <?php $i_en = 1 ?>
                                            @foreach (json_decode($list_en, true) as $list)
                                                <input type="hidden" name="test_en[list_{{ $i_en  }}]" id="list_en{{ $i_en }}" class="title_val" value="{{ $list['list'] }}">

                                                @if (!empty($list['items_en']))
                                                    <?php $il_en = 1 ?>
                                                    @foreach($list['items_en'] as $item)
                                                        <input type="hidden" name="items_en[list_{{ $i_en }}][]" id="item{{ $i_en }}_en{{ $il_en }}" class="item_val_{{ $i_en }}" value="{{ $item }}">
                                                        <?php $il_en++ ?>
                                                    @endforeach
                                                @endif
                                                <?php $i_en++ ?>
                                            @endforeach
                                        @endif
                                    </div>
                                    <ul class="list-test_en list-unstyled">
                                    <?php
                                        $id_en = 1;
                                        $values = ['Practices', 'Education', 'Distinctions', 'Languages'];
                                        $listItems = json_decode($list_en, true);
                                    ?>
                                    @foreach ($values as $v => $list)
                                        <li id="li_title_en{{ $id_en }}" data-id="{{ $id_en }}">
                                            <strong>{{ $list }}</strong>
                                            <div class="list-actions-buttons">
                                                <input type="button" class="btn btn-xs btn-primary btn-add-item"
                                                       data-id="{{ $id_en }}" value="Agregar Item">
                                            </div>
                                            <ul class="content-items">
                                            @if (!empty($listItems[$v]['items_en']))
                                                <?php $n_item_en = 1 ?>
                                                @foreach($listItems[$v]['items_en'] as $item)
                                                    <li>
                                                        <div class="col-sm-10 txt-item">{!! $item !!}</div>
                                                        <div class="col-sm-12 edit-input hidden">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control input-sm">
                                                                <div class="input-group-btn">
                                                                    <button type="button" class="btn-sm btn btn-success btn-save-edit-list">Guardar</button>
                                                                    <button type="button" class="btn-sm btn btn-danger btn-cancel-edit-list">Cancelar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2 content-edit">
                                                            <a href="#" class="btn-add-link-item" id="txt_item{{ $id_en }}_en{{ $n_item_en }}" data-id="{{ $id_en }}" data-item="{{ $n_item_en }}">Link</a> |
                                                            <a href="#" class="btn-delete-item-created" data-id="{{ $id_en }}" data-item="{{ $n_item_en }}">Elminar</a> |
                                                            <a href="#" class="btn-edit-item" data-id="{{ $id_en }}" data-item="{{ $n_item_en }}">Editar</a>
                                                        </div>
                                                    </li>
                                                    <?php $n_item_en++ ?>
                                                @endforeach
                                            @endif
                                            </ul>
                                            <ul class="hidden form-group-sm">
                                                <li>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <input type="button" class="btn btn-sm btn-success btn-create-item" value="Agregar">
                                                    <input type="button" class="btn btn-sm btn-del-item" value="Cancelar">
                                                </li>
                                            </ul>
                                        </li>
                                        <?php $id_en++ ?>
                                    @endforeach
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group">
                                    <h3>Info Contact</h3>
                                    <textarea name="info_en" id="info_en" class="form-control txt-lawyers">{{ old('info_en', $lawyer->info_en) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <hr>
                                    <h3>Details</h3>
                                    <textarea name="text_en" id="text_en" class="form-control txt-lawyers">{{ old('text_en', $lawyer->text_en) }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <a href="{{ route('lawyers', $lawyer->type) }}" class="btn btn-danger pull-left btn-lg">Cancelar</a>
                            <button class="btn btn-primary btn-lg pull-right">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="add-link-item" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 id="modal-title-item" class="modal-title"></h4>
            </div>
            <form action="#">
                <div class="modal-body">
                    <div class="form-group-sm">
                        <strong id="modal-item-txt"></strong>
                    </div>
                    <div class="form-group-sm">
                        <input type="url" class="form-control" placeholder="http://" id="txt-item-url">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('lawyers_js')
    <script>
        var $listContent = $('.list-test_es, .list-test_en');

        $listContent.on('click', '.btn-del-title', function (e) {
            e.preventDefault();
            var id = $(e.currentTarget).data('id');
            var lang = $(e.currentTarget).closest('.form-group').data('lang');

            $('#list_' + lang+ id).remove();
            $(e.currentTarget).closest('li').remove();
        });

        $listContent.on('click', '.btn-add-item', function (e) {
            e.preventDefault();
            var $button = $(e.currentTarget);
            $button.addClass('hidden');

            $button.closest('li').find('ul.form-group-sm').removeClass('hidden');
        });

        $listContent.on('click', '.btn-del-item', function (e) {
            e.preventDefault();
            var $li = $(e.currentTarget).parent();
            $li.children(':text').val('');

            $li.closest('ul').addClass('hidden').parent().find('.btn-add-item').removeClass('hidden');
        });

        $listContent.on('click', '.btn-create-item', function (e) {
            e.preventDefault();
            var $input = $(e.currentTarget).closest('ul').find(':text');
            var id = $(e.currentTarget).closest('ul').closest('li').data('id');
            var lang = $(e.currentTarget).closest('.form-group').data('lang');

            if ($input.val().length >= 2) {
                var $content = $('.content-data_' + lang);
                var nValues = $content.children('.item_val_' + id).length;
                var total = (nValues + 1);
                var item_id = '' + id + '_' + lang + total;
                var hiddenInput = '<input type="hidden" name="items_' + lang + '[list_' + id +'][]" id="item' + item_id + '" class="item_val_'+ id +'" value="' + $input.val() + '">';
                var listItem = '<li><div class="col-sm-10 txt-item">' + $input.val() + '</div>' +
                    '<div class="col-sm-12 edit-input hidden"><div class="input-group">'+
					    '<input type="text" class="form-control input-sm">'+
					    '<div class="input-group-btn">'+
					        '<button type="button" class="btn-sm btn btn-success btn-save-edit-list">Guardar</button>'+
					        '<button type="button" class="btn-sm btn btn-danger btn-cancel-edit-list">Cancelar</button>'+
                        '</div>'+
					'</div></div>'+
                    '<div class="col-sm-2 content-edit"><a href="#" class="btn-add-link-item" id="txt_item'+ item_id+'" data-id="'+ id +'" data-item="'+total +'">Link</a> | ' +
                    '<a href="#" class="btn-delete-item-created" data-id="'+ id + '" data-item="' + total + '">Elminar</a> | ' +
                    '<a href="#" class="btn-edit-item" data-id="'+ id + '" data-item="' + total + '">Editar</a></div></li>';

                $input.closest('ul').prev('.content-items').append(listItem);
                $('#li_title_' + lang + id + ' .btn-del-title').addClass('hidden');
                $content.append(hiddenInput);
                $input.val('');
            }
        });

        $listContent.on('click', '.btn-delete-item-created', function (e) {
            e.preventDefault();
            var id = $(e.currentTarget).data('id');
            var item = $(e.currentTarget).data('item');
            var lang = $(e.currentTarget).closest('.form-group').data('lang');
            var ul = $(e.currentTarget).closest('ul');
            $('#item'+ id +'_' + lang + item).remove();
            $(e.currentTarget).closest('li').remove();

            // Revisa si hay un item mas de la lista, asi muestra el boton de eliminar lista
            if (ul.children('li').length === 0) {
                $('#li_title_' + lang + id + ' .btn-del-title').removeClass('hidden');
            }
        });

        // EDIT btn-edit-item
        var params = {
        	link: '',
        	id: 0,
        	id_item: 0
        };
        $listContent.on('click', '.btn-edit-item', function (e) {
            e.preventDefault();
            var $button = $(e.currentTarget);
            var $li = $button.closest('li');

            params.id = $button.data('id');
            params.id_item = $button.data('item');

            if ($li.children('.txt-item').children('a').length) {
				params.link = $li.children('.txt-item').children('a').prop('href');
            }
            $li.children('.txt-item').addClass('hidden');
			$li.find('.edit-input').removeClass('hidden').find('input').val($li.children('.txt-item').text().trim());
            $('#tab_es, #tab_en').find('.content-edit').addClass('hidden');
        });

        $listContent.on('click', '.btn-save-edit-list', function (e) {
            e.preventDefault();

            var $content = $(e.currentTarget).parents('.input-group');
            var value = $content.children('input').val();
            var lang = $(e.currentTarget).closest('.form-group').data('lang');

            if (params.link != '') {
				value = '<a href="' + params.link + '">' + value + '</a>';
            }
            $('#item' + params.id + '_' + lang + params.id_item).val(value);
			$(e.currentTarget).closest('li').children('.txt-item').html(value);

			showListContent($(e.currentTarget).closest('li'));
		});

        $listContent.on('click', '.btn-cancel-edit-list', function (e) {
            e.preventDefault();
            showListContent($(e.currentTarget).closest('li'));
        });

        // Link
        $listContent.on('click', '.btn-add-link-item', function (e) {
            e.preventDefault();
            var id = $(e.currentTarget).data('id');
            var item_id = $(e.currentTarget).data('item');
            var list = $(e.currentTarget).closest('ul').parent().children('strong').text().trim();
            var item = $(e.currentTarget).closest('li').find('.txt-item').html().trim();
            var lang = $(e.currentTarget).closest('.form-group').data('lang');
            var $modal = $('#add-link-item');

            if (item.indexOf('href=') != -1) {
                $('#txt-item-url').val(item.split('"')[1]);
            }

            $('#modal-item-txt').html(item);
            $('#modal-title-item').text(list);
            $('#txt-item-url').data('id', id).data('item', item_id).data('lang', lang);
            $modal.modal('show');
        });

        $('#add-link-item form').on('submit', function (e) {
            e.preventDefault();
            var $form = $(e.currentTarget);
            var item_id = $('#txt-item-url').data('item');
            var id = $('#txt-item-url').data('id');
            var lang = $('#txt-item-url').data('lang');
            var href = $form.find('input').val();
            var item_a = '';
            if (href == '') {
                item_a = $('#modal-item-txt').text().trim();
            } else {
                item_a = '<a href="' + href + '">' + $('#modal-item-txt').text().trim() + '</a>';
            }

            $('#txt_item' + id + '_' + lang + item_id).closest('li').find('.txt-item').html(item_a);
            $('#item'+ id + '_' + lang + item_id).val(item_a);

            $('#add-link-item').modal('hide');
            $('#txt-item-url').val('');
        });

        function showListContent($li) {
            $li.children('.txt-item').removeClass('hidden');
			$li.children('.edit-input').addClass('hidden')
			$('#tab_es, #tab_en').find('.content-edit').removeClass('hidden');

			params.id_item = '';
			params.link = '';
			params.id = '';
        }
    </script>
@endsection