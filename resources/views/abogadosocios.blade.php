@extends('layout.master')

@section('title', '- Abogados Socios')

@section('content')
<section class="news-event-teaser section">
	<div class="container small">

		<div class="row">
			<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-3 col-xs-12">
						<article class="news-block">
							<img src="images/abogados.jpg" alt="Abogados" class="logo img-responsive">
						</article>
					</div>
					<div class="col-sm-9 col-xs-12">
						<article class="news-block">
							<h6 class="text-normal text-bold">{{ trans('abogadoSocios.title') }}</h6>
							<h4 class="text-normal text-bold">
								{!! trans('abogadoSocios.sub_title') !!}
							</h4>
						</article>
					</div>
					<div class="col-sm-9 col-xs-12">
                        <ul class="news-block">
                            @foreach($socios as $socio)
                            <li class="col-md-6 col-sm-12">
                                <a href="#{{ str_slug($socio->name, '_') }}" data-toggle="modal">{{ $socio->name }}</a>
                                <div>{{ $socio->email }}</div>
                            </li>
                            @endforeach
                        </ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@foreach($socios as $socio)
<div class="modal fade" id="{{ str_slug($socio->name, '_') }}" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content row">
			<div class="modal-header">
				<h6 class="sinespacio pull-left">{{ $socio->name }} <small>{{ $socio['job_' . $locale] }}</small></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4">
                        <article class="news-socios">
                            <img src="{{ asset('images/abogados/' . $socio->image) }}" alt="Image" class="img-responsive">
                            @if ($socio->download_cv_es != '' || $socio->download_cv_en != '')
                            <p class="txtblue text-bold">
                                <a target="_blank" href="{{ asset('abogados_cv/' . $socio['download_cv_' . $locale]) }}">{{ $socio['download_txt_' . $locale] }}</a>
                            </p>
                            @endif
                        </article>
                    </div>
                    <div class="col-sm-8">
                        <ul class="accordion">
							<?php
							$values = [
								'es' => ['Áreas', 'Educación', 'Distinciones', 'Idiomas'],
								'en' => ['Practices', 'Education', 'Distinctions', 'Languages']
							];
							$listItems = json_decode($socio['list_' . $locale], true);
							?>
                            @foreach($values[$locale] as $v => $list)
                            <li class="current">
                                <a href="#">{{ $list }}</a>
                                <div class="bloqueMostrar" style="display: none;">
                                    <ul style="display: none;">
                                    @if (!empty($listItems[$v]['items_' . $locale]))
                                        @foreach($listItems[$v]['items_' . $locale] as $item)
                                            <li><p>{!! $item !!}</p></li>
                                        @endforeach
                                    @endif
                                    </ul>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        <div class="col-sm-12">
                            <div class="news-socios">
                                {!! $socio['info_' . $locale] !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="news-socios">
                            {!! $socio['text_' . $locale] !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection