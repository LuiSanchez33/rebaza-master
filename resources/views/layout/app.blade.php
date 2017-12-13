<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Rebaza Admin</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<!-- <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'> -->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<style>
		.list-articles > .row + .row {
			margin-top: 15px;
			border-top: 1px solid #ccc;
			padding-top: 15px;
		}
		.content-items li {
			padding: 5px 0;
			overflow: hidden;
		}
		.content-items li+li {
			border-top: 1px solid #d7d7d7;
		}
		.list-test_es > li, .list-test_en >li {
			display: block;
			margin-bottom: 20px;
			overflow: hidden;
		}
		.list-actions-buttons {
			display: inline-block;
		}
		.image-content {
			height: 300px;
			background-repeat: no-repeat;
			background-position: 50% 50%;
			background-size: cover;
		}
		.image-content.gallery-height {
			height: 210px !important;
		}
		.padded {
			padding-top: 15px;
			padding-bottom: 15px;
		}
		.list-quotes .row+.row {
			border-top: 1px solid #d2d2d2;
		}
		blockquote small {
			display: inline-block;
		}
		.list-offices .info-content {
			padding: 10px;
		}
		.list-offices .caption hr {
			margin-top: 5px;
		}
		.no-margin-bottom {
			margin-bottom: 0 !important;
		}
		.list-gallery .caption h4 {
			height: 38px;
		}
		.item-deleted {
			border-color: red;
			opacity: .6;
		}
		.rse-gallery-content {
			border: 1px solid #ccc;
			border-radius: 4px;
			padding-top: 15px;
			background-color: whitesmoke;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/" target="_blank">Rebaza Web</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				@if (Auth::check())
				<ul class="nav navbar-nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Home <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="{{ route('home') }}">Experiencia Reciente</a></li>
							<li><a href="{{ route('quoteIndex') }}">Quotes</a></li>
							<li><a href="{{ route('articles', 2) }}">Ultimas Noticias</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="{{ route('othersIndex') }}">Imagenes redes sociales y Otros</a></li>
						</ul>
					</li>
					<li><a href="{{ route('pageIndex', 'estudio') }}">Estudio</a></li>
					<li><a href="{{ route('pageIndex', 'areas') }}">Areas</a></li>
					<li><a href="{{ route('lawyers', 1) }}">Abogados</a></li>
					<li><a href="{{ route('articles', 1) }}">Reconocimientos y noticias</a></li>
					<li><a href="{{ route('officesIndex') }}">Oficinas</a></li>
					<li><a href="{{ route('areaShow', ['trabaja', 30]) }}">Trabaja con nosotros</a></li>
					<li><a href="{{ route('gaIndex') }}">Galería</a></li>
					<li><a href="{{ route('rseIndex') }}">RSE</a></li>
				</ul>
				@endif

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::check())
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ route('logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	@yield('content')

	<!-- Scripts -->
	<script src="{{ asset('js/jquery-1.11.3.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('js/tinymce.min.js') }}"></script>
	<script type="text/javascript">
	    tinymce.DOM.addClass(tinymce.DOM.select('table'), 'table table-bordered');
	    tinymce.init({
			selector: '.paq_descripcion, .txt-lawyers',
			menubar: 'format table',
	        height: 350,
			style_formats: [
				{title: 'Color Celeste', inline: 'span', styles: { color: '#36A9E1' }},
				{title: 'Color Gris', inline: 'span', styles: { color: '#999999' }},
				{title: 'Parrafo', block: 'p'},

				{ title: 'Headers', items: [
					{title: 'Header 3', block: 'h3'},
					{title: 'Header 4', block: 'h4'},
					{title: 'Header 5', block: 'h5'},
					{title: 'Header 6', block: 'h6'}
				]},
				{ title: 'Containers', items: [
					{ title: 'div', block: 'div', wrapper: true, merge_siblings: false},
					{ title: 'section', block: 'section', wrapper: true, merge_siblings: false },
					{ title: 'article', block: 'article', wrapper: true, merge_siblings: false },
					{ title: 'blockquote', block: 'blockquote', wrapper: true }
				] }
			],
			plugins: 'preview table lists code link paste contextmenu',
			paste_word_valid_elements: "b,strong,i,em,h1,h2,h3,h4,h5,h6,ul,ol,p,a",
	        toolbar: 'undo redo bold italic strikethrough fontsizeselect link | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat preview code',
			fontsize_formats: '8px 10px 11px 12px 13px 14px 16px 18px 24px',
	        content_css: ['/css/bootstrap.min.css', '/css/tinymce-custom.css'],
	        init_instance_callback: function (editor) {
	            editor.on('BeforeSetContent', function (e) {
	                if (e.content.match('table')) {
	                    e.content = '<div class="table-responsive"><table class="mce-item-table table table-bordered">' + $(e.content).html() + '</table></table>';
					} else {
	                    e.content = e.content + '';
					}
	            });
	        },
			contextmenu: 'bold italic link strikethrough | removeformat | formats'
		});
	    $('div.container').on('click', '.confirm-delete', function (e) {
	    	var type = $(e.currentTarget).data('role');
	    	var confirmMessage = 'Seguro de eliminar esto?';

	    	if (type === 'inactivate') {
				confirmMessage = 'Seguro de inactivarlo?';
			}
			if (!confirm(confirmMessage)) {
                e.preventDefault();
			}
        });

	    $('#lawyer-type').on('change', function (e) {
			var value = $(e.currentTarget).val();
			var url = (location.origin + location.pathname).split('/');
			url = url.slice(0, 5);
			url.push(value);
			url = url.join('/');

            location.assign(url);
        });
	</script>
	@yield('lawyers_js')
</body>
</html>
