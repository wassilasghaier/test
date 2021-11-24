<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>kolnanemchiw</title>
      <!-- Favicon -->
      <link rel="shortcut icon" href="{{asset('/soft/images/favicon.ico')}}"/>
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{asset('/soft/css/bootstrap.min.css')}}">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="{{asset('/soft/css/typography.css')}}">
      <!-- Style CSS -->
      <link rel="stylesheet" href="{{asset('/soft/css/style.css')}}">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="{{asset('/soft/css/responsive.css')}}">
   </head>
   <body>
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">
            <div class="loader">
               <div class="cube">
                  <div class="sides">
                     <div class="top"></div>
                     <div class="right"></div>
                     <div class="bottom"></div>
                     <div class="left"></div>
                     <div class="front"></div>
                     <div class="back"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- loader END -->
        <!-- Sign in Start -->
        <section class="sign-in-page bg-white">
    <div class="container-fluid p-0">
        <div class="row no-gutters">
            <div class="col-sm-6 align-self-center">
                <div class="sign-in-from">
                    <h1 class="mb-0">Authentification</h1>
                    <p>Entrez votre adresse e-mail et votre mot de passe pour accéder au panneau d'administration.</p>
                    <form class="mt-4" action="{{ route('auth.check') }}" method="post">
                    @if(Session::get('fail'))
                     <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                     </div>
                      @endif
                      @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Adresse Email</label>
                            <input type="email" name="email" class="form-control mb-0" id="exampleInputEmail1" placeholder="Email">
                            <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mot De Passe</label>
                            <input type="password" name="password" class="form-control mb-0" id="exampleInputPassword1" placeholder="Mot de passe">
                            <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                        </div>
                        <div class="d-inline-block w-100">
                            <button type="submit" class="btn btn-primary float-right">Authentification</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-6 text-center">
                <div class="sign-in-detail text-white" style="background: url(/soft/images/login/home.jpeg) no-repeat 0 0; background-size: cover;">
                    <div class="owl-carousel" data-autoplay="true" data-loop="true" data-nav="false" data-dots="true" data-items="1" data-items-laptop="1" data-items-tab="1" data-items-mobile="1" data-items-mobile-sm="1" data-margin="0">
                        <div class="item">
                            <img src="{{asset('soft/images/login/logo-clubdemarche.png')}}" class="img-fluid mb-4" alt="logo">
                            <h4 class="mb-1 text-white">Gérer vos affaires</h4>
                            
                        </div>
                        <div class="item">
                            <img src="{{asset('soft/images/login/logo-clubdemarche.png')}}" class="img-fluid mb-4" alt="logo">
                            <h4 class="mb-1 text-white">Gérer vos utilisateurs</h4>
                            
                        </div>
                        <div class="item">
                            <img src="{{asset('soft/images/login/logo-clubdemarche.png')}}" class="img-fluid mb-4" alt="logo">
                            <h4 class="mb-1 text-white">Gérer vos évenements </h4>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
        <!-- Sign in END -->
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="{{ asset('soft/js/jquery.min.js') }}"></script>
      <script src="{{ asset('soft/js/popper.min.js') }}"></script>
      <script src="{{ asset('soft/js/bootstrap.min.js') }}"></script>
      <!-- Appear JavaScript -->
      <script src="{{ asset('soft/js/jquery.appear.js') }}"></script>
      <!-- Countdown JavaScript -->
      <script src="{{ asset('soft/js/countdown.min.js') }}"></script>
      <!-- Counterup JavaScript -->
      <script src="{{ asset('soft/js/waypoints.min.js') }}"></script>
      <script src="{{ asset('soft/js/jquery.counterup.min.js') }}"></script>
      <!-- Wow JavaScript -->
      <script src="{{ asset('soft/js/wow.min.js') }}"></script>
      <!-- Apexcharts JavaScript -->
      <script src="{{ asset('soft/js/apexcharts.js') }}"></script>
      <!-- Slick JavaScript -->
      <script src="{{ asset('soft/js/slick.min.js') }}"></script>
      <!-- Select2 JavaScript -->
      <script src="{{ asset('soft/js/select2.min.js') }}"></script>
      <!-- Owl Carousel JavaScript -->
      <script src="{{ asset('soft/js/owl.carousel.min.js') }}"></script>
      <!-- Magnific Popup JavaScript -->
      <script src="{{ asset('soft/js/jquery.magnific-popup.min.js') }}"></script>
      <!-- Smooth Scrollbar JavaScript -->
      <script src="{{ asset('soft/js/smooth-scrollbar.js') }}"></script>
      <!-- Chart Custom JavaScript -->
      <script src="{{ asset('soft/js/chart-custom.js') }}"></script>
      <!-- Custom JavaScript -->
      <script src="{{ asset('soft/js/custom.js') }}"></script>
   </body>
</html>