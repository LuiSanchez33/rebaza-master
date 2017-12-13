$(function() {

    "use strict";

    // Nombre de la carpeta donde esta alojada la web (Solo pruebas)
    // si se coloca en la misma public_html deberia ir vacio ''
    var ALT_PATH = '';

    function setLegend(position) {
        var data = legend[position];

        $('#title').html(data.title);
        $('#artist').html(data.artist);
        $('#type').html(data.type);
        $('#measure').html(data.measure);
    }

    function initialize() {
        var mapOptions = {
            zoom: 8,
            center: new google.maps.LatLng(17.421306, 78.457553),
            disableDefaultUI: true
        };
        var map = new google.maps.Map(document.querySelector('.map, .contact-page-map'), mapOptions);
    }


	// REMOVE # FROM URL
	$( 'a[href="#"]' ).click( function(e) {
		e.preventDefault();
	});

	// Tool Tip
	$('[data-toggle="tooltip"]').tooltip();

	// Special Offers Carousel
	var $carouselEspecial = $("#columna_premios");
	if ($carouselEspecial.length) {
		$carouselEspecial.owlCarousel({
			navigation : false,
			autoPlay: 3000, //Set AutoPlay to 3 seconds
			slideSpeed: 300,
			paginationSpeed : 400,
			singleItem : true,
			stopOnHover : false,
		});
	}


	// Special Offers Carousel
	var $carouselQuota = $("#columna_quota");
	if ($carouselQuota.length) {
		$carouselQuota.owlCarousel({
			navigation : false,
			autoPlay: 12000, //Set AutoPlay to 3 seconds
			slideSpeed: 300,
			paginationSpeed : 400,
			singleItem : true,
			stopOnHover : false,
		});
	}

	//MAGNIFIC POPUP
	var $galleryGrid = $(".gallery-grid");
	if ($galleryGrid.length) {
		$galleryGrid.magnificPopup({
			delegate: 'a.zoom',
			type: 'image',
			gallery: {
				enabled: true
			}
		});
	}

	// Date Picker
	var $datepicker = $(".datepickerInput");
	if ($datepicker.length) {
		$datepicker.datepicker({
			format: "dd/mm/yyyy"
		});
	}

	// Tabs Google Map Init
	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
		initialize();
	});

	// GOOGLE MAP
	var $google = $(".contact-page-map");
	if ($google.length) {
		$google.height(440);
		initialize();
		google.maps.event.addDomListener(window, 'load', initialize);
	}

	var $slickGallery = $('div.slick-gallery');
	if ($slickGallery.length) {
		$slickGallery.slick({
			infinite: true,
			slidesToShow: 7,
			slidesToScroll: 1,
			focusOnSelect: true,
			centerMode: true,
			responsive: [{
				breakpoint: 992,
				settings: {
					slidesToShow: 5
				}
			},
			{
				breakpoint: 767,
				settings: {
					slidesToShow: 1
				}
			}]
		});

		$slickGallery.on('afterChange', function(e, v) {
			var position = v.getCurrent();
			var $image = $(v.$slides.get(position)).children();
			var src = location.origin + ALT_PATH + '/images/gallery/' + $image.prop('src').split('/').pop();
			var $bgImage = $('img.bg-gallery');
			var $modalImage = $('img.modal-img-gallery');

			$bgImage.prop('src', src);
			$modalImage.prop('src', src);
			setLegend(position);
		});
		setLegend(0);
	}

	$('section.search-area').slick({
		infinite: true,
		speed: 500,
		fade: true,
		cssEase: 'linear',
		dots: false,
		autoplay: true,
		arrows: false
	});

	var $frmTrabaja = $('#frmTrabajaConNosotros');
	if ($frmTrabaja.length) {
		var $modal = $('#modalTerminos');
		var agreed = false;

		$('#isOk').click(function() {
			agreed = true;
			$modal.modal('hide');
		});
		$frmTrabaja.on('submit', function(e) {
			if (!agreed) {
				e.preventDefault();
				$modal.modal({backdrop: 'static', keyboard: false, show: true});

				return;
			}

			$('#btnEnviar').val('Enviando...').prop('disabled', true);
		});

		$modal.on('hidden.bs.modal', function(e) {
			if (agreed) {
				$frmTrabaja.submit();
			}
		});
	}
});