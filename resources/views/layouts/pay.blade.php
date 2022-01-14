<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{config('app.name','Pos System')}}</title>
    <meta name="description" content="Lyfplus Web App for doctors" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="author" content="Felix Mgeni">
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->


    <!--begin::Page Vendors Styles(used by this page)-->
    @yield('page_css')
    <!--end::Page Vendors Styles-->

     <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{url('/')}}/assets/plugins/global/plugins.bundle15aa.css?v=7.2.2" rel="stylesheet" type="text/css" />
    <link href="{{url('/')}}/assets/plugins/custom/prismjs/prismjs.bundle15aa.css?v=7.2.2" rel="stylesheet" type="text/css" />
    <link href="{{url('/')}}/assets/css/style.bundle15aa.css?v=7.2.2" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="{{url('/')}}/assets/css/themes/layout/header/base/light15aa.css?v=7.2.2" rel="stylesheet" type="text/css" />
    <link href="{{url('/')}}/assets/css/themes/layout/header/menu/light15aa.css?v=7.2.2" rel="stylesheet" type="text/css" />
    <link href="{{url('/')}}/assets/css/themes/layout/brand/dark15aa.css?v=7.2.2" rel="stylesheet" type="text/css" />
    <link href="{{url('/')}}/assets/css/themes/layout/aside/dark15aa.css?v=7.2.2" rel="stylesheet" type="text/css" />
    <!--end::Layout Themes-->
    <livewire:styles />
    <!--end::Layout Themes-->

    <link rel="shortcut icon" href="https://entityskin.co.tz/logo.png" />


</head>

	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">


		
		@yield('content')
		<!--end::Main-->


		<!-- begin::User Panel-->
		{{-- @include('pages.includes.user_panel') --}}
		<!-- end::User Panel-->


		<!--begin::Quick Cart-->
        @include('pages.includes.quick_cart')
		<!--end::Quick Cart-->


		<!--begin::Quick Panel-->
		@include('pages.includes.quick_panel')
		<!--end::Quick Panel-->


		<!--begin::Chat Panel-->
		@include('pages.includes.chat_panel')
		<!--end::Chat Panel-->


		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop">
			<span class="svg-icon">
				<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Navigation/Up-2.svg-->
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24" />
						<rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
						<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
					</g>
				</svg>
				<!--end::Svg Icon-->
			</span>
		</div>
		<!--end::Scrolltop-->


        @include('pages.includes.sweetnot')
        <script>
            function f(x) {
                Swal.fire({
                    position:"top-right",
                    icon:"success",
                    title: x,
                    showConfirmButton:!1,
                    timer:2000
                    }
                )
            }

            function save(y) {
                Swal.fire({
                    title:"Auto close alert!",
                    text:"Saving Contacts in "+y+", Please Wait",
                    allowOutsideClick: false,
                // timer:5e3,
                onOpen:function(){
                    Swal.showLoading()
                }})
            }

        </script>

        @include('scripts.ga-analytics')

        <!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="{{url('/')}}/assets/plugins/global/plugins.bundle15aa.js?v=7.2.2"></script>
		<script src="{{url('/')}}/assets/plugins/custom/prismjs/prismjs.bundle15aa.js?v=7.2.2"></script>
		<script src="{{url('/')}}/assets/js/scripts.bundle15aa.js?v=7.2.2"></script>
		<!--end::Global Theme Bundle-->

        <!--begin::Page Scripts(used by this page)-->
		<script src="{{url('/')}}/assets/js/pages/features/miscellaneous/sweetalert215aa.js?v=7.2.2"></script>
		<!--end::Page Scripts-->

        <!--begin::Page Scripts(used by this page)-->
		<script src="{{url('/')}}/assets/js/pages/features/miscellaneous/bootstrap-notify15aa.js?v=7.2.2"></script>
		<!--end::Page Scripts-->

        <livewire:scripts />

        @yield('page_js')

	</body>
	<!--end::Body-->

</html>
