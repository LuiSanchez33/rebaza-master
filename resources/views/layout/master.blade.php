<?php
$currentUri = Request::path();
$linkTxt = 'English Version';
$localeChange = 'en';

if ($locale === 'en') {
    $localeChange = 'es';
    $linkTxt = 'Versión Español';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Rebaza, Alcazar & De Las Casas">

	<title>Rebaza, Alcazar @yield('title', '')</title>
	<link href="{{ asset('css/main.css') }}?c={{ time() }}" rel="stylesheet">
	<link href="{{ asset('css/style.css') }}?d={{ time() }}" rel="stylesheet">
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	  <![endif]-->
	<link rel="shortcut icon" type="images/ico" href="images/favicon.ico">
	</head>
	<body>
		<header class="main-header header-overlay">
			<div class="container">
				<div class="row">

					<div class="col-sm-12">
						<ul class="list-unstyled list-inline top-links">
							<li>
								<a href="{{ route('changeLocale') }}?locale={{ $localeChange }}">{{ $linkTxt }}</a>
							</li>
						</ul>
					</div>
					<div class="col-sm-12 col-xs-12 text-center center-block">
						<h1 class="main-title">
							<a href="{{ route('index') }}">
								<img src="{{ asset('images/logo.png') }}" alt="Rebaza, Alcázar &amp; De Las Casas" class="img-responsive">
							</a>
						</h1>
					</div>

				</div>
			</div>
			<nav id="nav" class="main-menu navbar flat">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="btn btn-navbar navbar-toggle flat animation" data-toggle="collapse" data-target=".navbar-cat-collapse">
							<span class="sr-only">Toggle Navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="collapse navbar-collapse navbar-cat-collapse">
						<ul class="nav navbar-nav">
							<li class="dropdown {{ !is_bool(array_search($currentUri, array_column($pages['estudios'], 'page_slug'))) ? 'active' : '' }}">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">{{ trans('links.nav_1') }}</a>
								<ul class="dropdown-menu">
								@foreach($pages['estudios'] as $page)
									<li class="{{ $currentUri === $page['page_slug'] ? 'active' : '' }}">
										<a href="{{ route('pagesByUrl', $page['page_slug']) }}">{{ $page['name_' . $locale] }}</a>
									</li>
								@endforeach
								</ul>
							</li>
							<li class="dropdown {{ !is_bool(array_search($currentUri, array_column($pages['areas'], 'page_slug'))) ? 'active' : '' }}">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">{{ trans('links.nav_2') }}</a>
								<ul class="dropdown-menu">
									@foreach($pages['areas'] as $page)
									<li class="{{ $currentUri === $page['page_slug'] ? 'active' : '' }}">
										<a href="{{ route('pagesByUrl', $page['page_slug']) }}">{{ $page['name_' . $locale] }}</a>
									</li>
									@endforeach
								</ul>
							</li>
							<li class="dropdown {{ ($currentUri == 'abogadosocios' || $currentUri == 'abogadoasociados' || $currentUri == 'abogadoconsultores' ) ? 'active' : '' }}">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">{{ trans('links.nav_3') }}</a>
								<ul class="dropdown-menu">
									<li class="{{ $currentUri === 'abogadosocios' ? 'active' : '' }}">
										<a href="{{ route('abogadosocios') }}">{{ trans('links.sub_3_1') }}</a>
									</li>
									<li class="{{ $currentUri === 'abogadoasociados' ? 'active' : '' }}">
										<a href="{{ route('abogadoasociados') }}">{{ trans('links.sub_3_2') }}</a>
									</li>
									<li class="{{ $currentUri === 'abogadoconsultores' ? 'active' : '' }}">
										<a style="border:none;" href="{{ route('abogadoconsultores') }}">{{ trans('links.sub_3_3') }}</a>
									</li>
								</ul>
							</li>
							<li class="{{ $currentUri === 'reconocimiento' ? 'active' : '' }}">
								<a href="{{ route('reconocimiento') }}">{{ trans('links.nav_4') }}</a>
							</li>
							<li class="{{ $currentUri === 'oficinas' ? 'active' : '' }}">
								<a href="{{ route('oficinas') }}">{{ trans('links.nav_5') }}</a>
							</li>
							<li class="{{ $currentUri === 'trabaja' ? 'active' : '' }}">
								<a href="{{ route('pagesByUrl', $pages['trabaja']['page_slug']) }}">{{ $pages['trabaja']['name_' .$locale] }}</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</header>
		<section class="search-area fix-bg">
			<div class="banners bg-uno"></div>
			<div class="banners bg-dos"></div>
		</section>
		@section('content')

		@show
		<footer class="news-event-teaser">
			<div class="container">
				<div class="col-sm-12" id="pie">
					<div id="pie_izq" class="col-sm-6">
						<span>
							&copy; Copyright Todos los Derechos Reservados &nbsp;
							@foreach($socialIcons as $social)
							<a href="{{ $social->link }}" target="_blank">
								<img src="{{ asset('images/' . $social->image) }}" style="width: 20px;height: 20px;">
							</a>
							@endforeach
						</span>
						<br>
						<span>Contacto: lorena.luna@rebaza-alcazar.com</span>
					</div>
					<div id="pie_der" class="col-sm-6">
						<span>Diseñado por <a href="http://www.agenciacranium.com/" target="_blank">Agencia Cranium</a></span>
					</div>
				</div>
			</div>
		</footer>
		@yield('scripts')
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-102418497-1', 'auto');
			ga('send', 'pageview');
		</script>
		<script src="{{ asset('js/jquery-1.11.3.min.js') }}"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('js/plugins/owl-carousel/owl.carousel.js') }}"></script>
		<script src="{{ asset('js/plugins/slick/slick.min.js') }}"></script>
		<script src="{{ asset('js/acordeon/jquery.accordion.js') }}"></script>
		<script src="{{ asset('js/acordeon/jquery.accordion.source.js') }}"></script>
		<script src="{{ asset('js/custom.js') }}"></script>
	</body>
</html>