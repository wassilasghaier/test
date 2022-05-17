<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Kolnanemchiw</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="{{asset('/soft/images/favicon.png')}}"/>
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{asset('/site/css/bootstrap.min.css')}}">
      <!-- Style CSS -->
      <link rel="stylesheet" href="{{asset('/site/css/animate.css')}}">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="{{asset('/site/css/typography.css')}}">
      <!-- Style CSS -->
      <link rel="stylesheet" href="{{asset('/site/css/style.css')}}">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="{{asset('/site/css/responsive.css')}}">
   </head>

   <body>
      <!-- Page Content  -->
      <div class="main-content">     
         @yield('content')	
      </div>
      <!-- page Content -->
      <!-- Custom JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="{{ asset('site/js/jquery-1.11.1.min.js') }}" ></script>
      <!-- popper  -->
      <script src="{{ asset('site/js/popper.min.js') }}"></script>
      <!--  bootstrap -->
      <script src="{{ asset('site/js/bootstrap.min.js') }}" ></script>
      <!-- Appear JavaScript -->
      <script src="{{ asset('site/js/appear.js') }}"></script>
      <!-- Mega menu JavaScript -->
      <script src="{{ asset('site/js/mega_menu.min.js') }}"></script>
      <!-- Count Down JavaScript -->
      <script src="{{ asset('site/js/countdown.min.js') }}"></script>
      <!-- Owl Carousel JavaScript -->
      <script src="{{ asset('site/js/owl.carousel.min.js') }}"></script>
      <!-- Magnific Popup JavaScript -->
      <script src="{{ asset('site/js/jquery.magnific-popup.min.js') }}"></script>
      <!--  Counter -->
      <script src="{{ asset('site/js/jquery.countTo.js') }}" ></script>
     
      <!-- Isotope JavaScript -->
      <script src="{{ asset('site/js/isotope.pkgd.min.js') }}"></script>
      <!-- Retina JavaScript -->
      <script src="{{ asset('site/js/retina.min.js') }}"></script>
      <!--  Custom -->
      <script src="{{ asset('site/js/custom.js') }}" ></script>
   </body>
</html>
