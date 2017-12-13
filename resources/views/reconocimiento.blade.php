@extends('layout.master')

@section('title', '- Reconocimientos y Noticias')

@section('content')
<section class="wow news-event-teaser section">
	<div class="container">

		<div class="row wow">
			<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-3 col-xs-12">
						<article class="news-block">
							<img src="{{ asset('images/reconocimiento.jpg') }}" alt="Reconocimiento" class="logo img-responsive">
						</article>
					</div>
					<div class="col-sm-9 col-xs-12">
						<h6 class="text-bold titu">Reconocimientos y Noticias</h6>
						<div class="row content-articles">
							<div class="col-sm-6">
							@foreach($articles->toArray()['data'] as $i => $article)
								@if ($i%2 == 0)
									<article>
									@if ($article['title_' . $locale] != '')
									<h6>{{ $article['title_' . $locale] }}</h6>
									@endif
									{!! $article['desc_' . $locale] !!}
									</article>
								@endif
							@endforeach
							</div>
							<div class="col-sm-6">
							@foreach($articles->toArray()['data'] as $i => $article)
								@if ($i%2 == 1)
									<article>
									@if ($article['title_' . $locale] != '')
										<h6>{{ $article['title_' . $locale] }}</h6>
									@endif
									{!! $article['desc_' . $locale] !!}
									</article>
								@endif
							@endforeach
							</div>
						</div>
                        {!! $articles->render() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection