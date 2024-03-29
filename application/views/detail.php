<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Kicau Mania</title>
	<!-- 
Journey Template 
http://www.templatemo.com/tm-511-journey
-->
	<!-- load stylesheets -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
	<!-- Google web font "Open Sans" -->
	<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css"> <!-- Font Awesome -->
	<link rel="stylesheet" href="<?=base_url('assets/utama/css/bootstrap.min.css')?>"> <!-- Bootstrap style -->
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/utama/css/datepicker.css')?>" />
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/utama/slick/slick.css')?>" />
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/utama/slick/slick-theme.css')?>" />
	<link rel="stylesheet" href="<?=base_url('assets/utama/css/templatemo-style.css')?>"> <!-- Templatemo style -->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
          <![endif]-->
</head>

<body>
	<div class="tm-main-content" id="top">

		<nav class="navbar navbar-expand-lg navbar-light bg-light" style="height: 100px;">
			<div class="row" style="width: 100%;">
				<div class="col-lg-6">
					<a class="navbar-brand pl-4" href="<?=base_url('/')?>">Kicau Mania</a>
				</div>
				<div class="col-lg-6">
					<a href="<?=base_url('home/hasil')?>" class="float-right"><button class="mt-2 btn btn-outline-success"
							type="button">Lihat Hasil</button></a>
				</div>
			</div>
		</nav>


		<div class="tm-page-wrap mx-auto">

			<section class="p-5 tm-container-outer tm-bg-gray">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 mx-auto tm-about-text-wrap text-center">
							<h2 class="text-uppercase mb-4"><strong><?=$post->title?></strong></h2>
                            <img src="<?=base_url('assets/post/'.$post->foto)?>" width="50%" alt="Image">
							<p class="mb-4 mt-4"><?=$post->deskripsi?></p>
                            <a href="<?=base_url('home')?>"><button class="mt-2 btn btn-outline-success"
							type="button">Kembali</button></a>
						</div>
					</div>
				</div>
			</section>

			<div class="tm-container-outer" id="tm-section-2">

				


			</div>

			<footer class="tm-container-outer">
				<p class="mb-0">Copyright © <span class="tm-current-year">2021</span> Tugas Akhir

					. Designed by <a rel="nofollow" href="http://www.google.com/+templatemo" target="_parent">Template
						Mo</a></p>
			</footer>
		</div>
	</div> <!-- .main-content -->

	<!-- load JS files -->
	<script src="{{asset('utama/js/jquery-1.11.3.min.js')}}"></script> <!-- jQuery (https://jquery.com/download/) -->
	<script src="{{asset('utama/js/popper.min.js')}}"></script> <!-- https://popper.js.org/ -->
	<script src="{{asset('utama/js/bootstrap.min.js')}}"></script> <!-- https://getbootstrap.com/ -->
	<script src="{{asset('utama/js/datepicker.min.js')}}"></script> <!-- https://github.com/qodesmith/datepicker -->
	<script src="{{asset('utama/js/jquery.singlePageNav.min.js')}}"></script>
	<!-- Single Page Nav (https://github.com/ChrisWojcik/single-page-nav) -->
	<script src="{{asset('utama/slick/slick.min.js')}}"></script> <!-- http://kenwheeler.github.io/slick/ -->
	<script src="{{asset('utama/js/jquery.scrollTo.min.js')}}"></script>
	<!-- https://github.com/flesler/jquery.scrollTo -->
	<script>
		/* Google Maps
        ------------------------------------------------*/
		var map = '';
		var center;

		function initialize() {
			var mapOptions = {
				zoom: 16,
				center: new google.maps.LatLng(37.769725, -122.462154),
				scrollwheel: false
			};

			map = new google.maps.Map(document.getElementById('google-map'), mapOptions);

			google.maps.event.addDomListener(map, 'idle', function () {
				calculateCenter();
			});

			google.maps.event.addDomListener(window, 'resize', function () {
				map.setCenter(center);
			});
		}

		function calculateCenter() {
			center = map.getCenter();
		}

		function loadGoogleMap() {
			var script = document.createElement('script');
			script.type = 'text/javascript';
			script.src =
				'https://maps.googleapis.com/maps/api/js?key=AIzaSyDVWt4rJfibfsEDvcuaChUaZRS5NXey1Cs&v=3.exp&sensor=false&' +
				'callback=initialize';
			document.body.appendChild(script);
		}

		/* DOM is ready
		------------------------------------------------*/
		$(function () {

			// Change top navbar on scroll
			$(window).on("scroll", function () {
				if ($(window).scrollTop() > 100) {
					$(".tm-top-bar").addClass("active");
				} else {
					$(".tm-top-bar").removeClass("active");
				}
			});

			// Smooth scroll to search form
			$('.tm-down-arrow-link').click(function () {
				$.scrollTo('#tm-section-search', 300, {
					easing: 'linear'
				});
			});

			// Date Picker in Search form
			var pickerCheckIn = datepicker('#inputCheckIn');
			var pickerCheckOut = datepicker('#inputCheckOut');

			// Update nav links on scroll
			$('#tm-top-bar').singlePageNav({
				currentClass: 'active',
				offset: 60
			});

			// Close navbar after clicked
			$('.nav-link').click(function () {
				$('#mainNav').removeClass('show');
			});

			// Slick Carousel
			$('.tm-slideshow').slick({
				infinite: true,
				arrows: true,
				slidesToShow: 1,
				slidesToScroll: 1
			});

			loadGoogleMap(); // Google Map                
			$('.tm-current-year').text(new Date().getFullYear()); // Update year in copyright           
		});

	</script>

</body>

</html>
