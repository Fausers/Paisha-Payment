<!DOCTYPE html>
<html lang="en">

<head>

	<title>{{config('app.name')}}</title>
	<!-- META -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Kwa Habari na Makala za Kiuchumi na Maendeleo zinazotathmini vyanzo vya Kitaifa, Kimataifa, Siasa, Biashara, Burudani na Michezo." >
	<!--::::: FABICON ICON :::::::-->
	<link rel="icon" href="{{url('/')}}/images/Mwangaza Logo.png">
	<!--::::: ALL CSS FILES :::::::-->
	<link rel="stylesheet" href="{{url('/')}}/mwangaza/assets/css/plugins/bootstrap.min.css">
	<link rel="stylesheet" href="{{url('/')}}/mwangaza/assets/css/plugins/animate.min.css">
	<link rel="stylesheet" href="{{url('/')}}/mwangaza/assets/css/plugins/fontawesome.css">
	<link rel="stylesheet" href="{{url('/')}}/mwangaza/assets/css/plugins/modal-video.min.css">
	<link rel="stylesheet" href="{{url('/')}}/mwangaza/assets/css/plugins/owl.carousel.css">
	<link rel="stylesheet" href="{{url('/')}}/mwangaza/assets/css/plugins/slick.css">
	<link rel="stylesheet" href="{{url('/')}}/mwangaza/assets/css/plugins/stellarnav.css">
	<link rel="stylesheet" href="{{url('/')}}/mwangaza/assets/css/theme.css">
</head>

<body class="theme-1">

    @include('mwangaza.partials.header')

	<!--::::: POST CAROUSEL AREA START  :::::::-->
	@yield('content')
	<!--::::: FOOTER AREA START :::::::-->
	@include('mwangaza.partials.footer')
	<!--::::: FOOTER AREA END :::::::-->
	<!--::::: ALL JS FILES :::::::-->
	<script async
		src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5933586687618362"
		crossorigin="anonymous">
	</script>
	<script src="{{url('/')}}/mwangaza/assets/js/plugins/jquery.2.1.0.min.js"></script>
	<script src="{{url('/')}}/mwangaza/assets/js/plugins/bootstrap.min.js"></script>
	<script src="{{url('/')}}/mwangaza/assets/js/plugins/jquery.nav.js"></script>
	<script src="{{url('/')}}/mwangaza/assets/js/plugins/jquery.waypoints.min.js"></script>
	<script src="{{url('/')}}/mwangaza/assets/js/plugins/jquery-modal-video.min.js"></script>
	<script src="{{url('/')}}/mwangaza/assets/js/plugins/owl.carousel.js"></script>
	<script src="{{url('/')}}/mwangaza/assets/js/plugins/popper.min.js"></script>
	<script src="{{url('/')}}/mwangaza/assets/js/plugins/circle-progress.js"></script>
	<script src="{{url('/')}}/mwangaza/assets/js/plugins/slick.min.js"></script>
	<script src="{{url('/')}}/mwangaza/assets/js/plugins/stellarnav.js"></script>
	<script src="{{url('/')}}/mwangaza/assets/js/plugins/wow.min.js"></script>
	<script src="{{url('/')}}/mwangaza/assets/js/main.js"></script>
</body>

</html>
