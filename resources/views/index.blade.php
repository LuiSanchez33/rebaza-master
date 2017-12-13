@extends('layout.master')

@section('content')

<section class="news-event-teaser section">
	<div class="container small">
		<div class="row">
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-6 col-xs-12">
                        <article class="news-block">
                            <h6 class="text-normal text-bold sinespacioti">{{ $homeData['name_' . $locale] }}</h6>
                            <div class="content-text">
                                <div class="sinespacio">{!! $homeData['text_' . $locale] !!}</div>
                            </div>
                        </article>
                    </div>
                    <div class="navbarbarra col-sm-6 col-xs-12">
                        <article class="news-block">
                            <h6 class="text-normal text-bold sinespacioti">{{ trans('index.title2') }}</h6>
                            @foreach($articles as $article)
                                <div class="seccion-row">
                                    @if (trim($article['title_' . $locale]) != '')
                                        <h6>{{ $article['title_' . $locale] }}</h6>
                                    @endif
                                    <div class="content-text">
                                        {!! $article['desc_' . $locale] !!}
                                    </div>
                                </div>
                            @endforeach
                        </article>
                    </div>
                </div>
                <div class="row">
                    <div class="lema" id="columna_quota">
                        @foreach($quotes as $quote)
                        <div class="item">
                            <article class="news-block col-sm-12">
                                <h5 class="text-justify">
                                    {{ $quote['message_' . $locale] }}
                                    <br>{{ $quote['name'] }} <span>{{ $quote['rol_' . $locale] }}</span>
                                </h5>
                            </article>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-sm-2 col-sm-offset-1">
                <div class="col-sm-12" >
                    <h2 class="text-center small text-bold">
                      <a href="{{ url('galeria') }}">{{ trans('index.galery') }}</a>
                      <br><a href="{{ url('responsabilidadsocial') }}">RSE</a>
                      <br><a target="_blank" href="https://aplicaciones.rebaza-alcazar.com/Citrix/XenApp/auth/login.aspx">RAD Login</a>
                    </h2>
                    @foreach($sidebarImages as $image)
                        <article class="news-block">
                            <img src="images/{{ $image->image }}" alt="{{ $image->image }}" class="img-responsive" alt="{{ $image->image }}">
                        </article>
                    @endforeach
                </div>
                <div class="col-sm-12">
                    <div class="row">
                      <div id="columna_premios">
                        <div class="item">
                          <a target="_blank" class="active img-responsive" href="http://www.chambersandpartners.com/Latin-America/Firms/103699-71778">
                            <img src="images/premios/premio_chambers.jpg" class="img-responsive">
                          </a>
                        </div>
                        <div class="item">
                          <a target="_blank" href="http://www.latinlawyer.com/firms/1181/ll250/rebaza-alcazar-de-las-casas-abogados-financieros/#pp7">
                            <img src="images/premios/premio_ll.jpg" class="img-responsive">
                          </a>
                        </div>
                        <div class="item">
                          <a target="_blank" href="http://whichlawyer.practicallaw.com/which/reference.do?ref=4-105-0841">
                            <img src="images/premios/premio_plc.jpg" class="img-responsive">
                          </a>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
	    </div>
    </div>
</section>

@endsection