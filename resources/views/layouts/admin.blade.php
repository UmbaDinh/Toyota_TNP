<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- PAGE TITLE HERE -->
    <title>Toyota TNP</title>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png/x-icon" href="{{ asset('ad_as/images/admin/favicon.png') }}">
    <link href="{{ asset('ad_as/vendor/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('ad_as/vendor/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('ad_as/vendor/nouislider/nouislider.min.css') }}">
	<link href="{{ asset('ad_as/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
	{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"> --}}
	<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <!-- Style css -->
    <link href="{{ asset('ad_as/css/style.css') }}" rel="stylesheet">
	<!-- CSS Thong Bao-->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
	<!-- Default theme Thong Bao -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
	<!-- SweetAlert2 -->
	<script src="{{ asset('ad_as/js/sweetalert2/sweetalert2.all.js') }}"></script>
	<script src="{{ asset('ad_as/js/initSweetAlert.js') }}"></script>
	@stack('stylesheets')
</head>

<body>
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->
    <div id="main-wrapper">
        @include('layouts.inc.admin.navbar')

        @include('layouts.inc.admin.sidebar')

        @yield('content')

        <div class="footer">
            <div class="copyright">
                <p>Copyright © Nguyễn Đỉnh &amp;  <a href="#" target="_blank">Năm</a> 2023</p>
            </div>
        </div>
    </div>


    <!-- Required vendors -->
    <script src="{{ asset('ad_as/vendor/global/global.min.js') }}"></script>
	<script src="{{ asset('ad_as/vendor/chart.js/Chart.bundle.min.js') }}"></script>
	<script src="{{ asset('ad_as/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>
	<script src="{{ asset('ad_as/vendor/apexchart/apexchart.js') }}"></script>
    <script src="{{ asset('ad_as/vendor/peity/jquery.peity.min.js') }}"></script>
	<script src="{{ asset('ad_as/vendor/owl-carousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('ad_as/js/custom.min.js') }}"></script>
	<script src="{{ asset('ad_as/js/dlabnav-init.js') }}"></script>
	<script src="{{ asset('ad_as/js/demo.js') }}"></script>
    <script src="{{ asset('ad_as/js/styleSwitcher.js') }}"></script>
    <script src="{{ asset('ad_as/js/toastr.min.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('ad_as/js/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <script src="{{ asset('ad_as/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('ad_as/js/plugins-init/datatables.init.js') }}"></script>
	{{--  --}}
	<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
	<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>

	<script>
		function cardsCenter()
		{
			
			/*  testimonial one function by = owl.carousel.js */
			jQuery('.card-slider').owlCarousel({
				loop:true,
				margin:0,
				nav:true,
				//center:true,
				slideSpeed: 3000,
				paginationSpeed: 3000,
				dots: true,
				navText: ['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],
				responsive:{
					0:{
						items:1
					},
					576:{
						items:1
					},	
					800:{
						items:1
					},			
					991:{
						items:1
					},
					1200:{
						items:1
					},
					1600:{
						items:1
					}
				}
			})
		}
		
		jQuery(window).on('load',function(){
			setTimeout(function(){
				cardsCenter();
			}, 1000); 
		});
		
	</script>
	@stack('script')
</body>
</html>