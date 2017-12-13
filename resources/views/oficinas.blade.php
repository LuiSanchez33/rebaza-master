@extends('layout.master')

@section('title', '- Oficinas')

@section('content')
<section class="news-event-teaser section text-center-xs">
	<div class="container small">

		<div class="row">
			<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-3 col-xs-12">
						<article class="news-block">
							<img src="images/oficinas.jpg" alt="Oficinas" class="logo img-responsive">
						</article>
					</div>
					<div class="col-sm-9 col-xs-12">
						<article class="nes-block">
							<h4 class="text-bold titu">{{ trans('oficinas.title') }}</h4>
						</article>
						<div class="row">
						@foreach($offices as $office)
							<div class="col-sm-6 col-xs-12">
								<article class="news-block oficina">
									<p class="text-bold">{{ $office->place }}</p>
									<p>{!! nl2br($office['info_' . $locale]) !!}</p>
								</article>
							</div>
						@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection