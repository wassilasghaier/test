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
      <link rel="stylesheet" href="{{asset('/soft/css/bootstrap.min.css')}}">
      <!-- Typography CSS -->
      <link rel="stylesheet" href="{{asset('/soft/css/typography.css')}}">
      <!-- Style CSS -->
      <link rel="stylesheet" href="{{asset('/soft/css/style.css')}}">
      <!-- Responsive CSS -->
      <link rel="stylesheet" href="{{asset('/soft/css/responsive.css')}}">
       <!-- summernote -->
       <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
 

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
      <!-- Wrapper Start -->
      <div class="wrapper">
         <!-- Sidebar  -->
         <div class="iq-sidebar">
            <div class="iq-sidebar-logo d-flex justify-content-between">
               <a href="/">
               <img src="#" class="img-fluid" alt="">
               <span>Kolnanemchiw</span>
               </a>
               <div class="iq-menu-bt align-self-center">
                  <div class="wrapper-menu">
                     <div class="line-menu half start"></div>
                     <div class="line-menu"></div>
                     <div class="line-menu half end"></div>
                  </div>
               </div>
            </div>
            <div id="sidebar-scrollbar">
               <nav class="iq-sidebar-menu">
                  <ul id="iq-sidebar-toggle" class="iq-menu">
                     <li class="iq-menu-title"><i class="ri-separator"></i><span>Administration</span></li>
                     <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                        <a href="{{ url('admin/dashboard')}}" class="iq-waves-effect collapsed"><i class="ri-home-4-line"></i><span>Dashboard</span></a>
                     </li>
                     <li class="{{ Request::is('/admin/stat*') ? 'active' : '' }}">
                        <a href="{{ url('/admin/stat')}}" class="iq-waves-effect collapsed"><i class="ri-bar-chart-2-line"></i><span>Statistiques</span></a>
                     </li>
                     <!-- <li>
                        <a href="#user-info" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><i class="ri-user-line"></i><span>Gestion Profiles</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="user-info" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li class="{{ Request::is('admin/roles') ? 'active' : '' }}"><a href="{{ url('admin/roles')}}">Roles</a></li>
                           <li class="{{ Request::is('admin/permissions') ? 'active' : '' }}"><a href="{{ url('/admin/permissions')}}">Permissions</a></li>
                           <li class="{{ Request::is('admin/affectation') ? 'active' : '' }}"><a href="{{ url('/admin/affectation')}}">Affectation</a></li>
                        </ul>
                     </li>-->
                     
                     <li>
                        <a href="#ecommerce" class="iq-waves-effect collapsed"  data-toggle="collapse" aria-expanded="false"><i class="ri-menu-3-line"></i><span>Gestion utilisateurs</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="ecommerce" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li class="{{ Request::is('admin/users') ? 'active' : '' }}"><a href="{{ url('admin/users')}}" class="iq-waves-effect collapsed"><i class="ri-user-line"></i><span>Utilisateur simple</span></a></li>
                           <li class="{{ Request::is('admin/adherents') ? 'active' : '' }}"><a href="{{url('admin/adherents')}}" class="iq-waves-effect collapsed"><i class="ri-user-follow-line"></i><span>Adhérents</span></a></li>
                           <li class="{{ Request::is('admin/coachs') ? 'active' : '' }}"><a href="{{ url('admin/coachs')}}" class="iq-waves-effect collapsed"><i class="ri-user-star-line"></i><span>Coachs</span></a></li>
                           <li class="{{ Request::is('admin/demandes') ? 'active' : '' }}"><a href="{{ url('admin/demandes')}}" class="iq-waves-effect collapsed"><i class="ri-file-copy-2-line"></i><span>Validation d'adhésion</span></a></li>              
                        </ul>
                     </li>
                    
                     <li class="iq-menu-title"><i class="ri-separator"></i><span>Clubs</span></li> 
                     <li class="{{ Request::is('admin/clubs') ? 'active' : '' }}">
                        <a href="{{ url('admin/clubs')}}" class="iq-waves-effect collapsed"><i class="ri-group-line"></i><span>Clubs</span></a> </li> 
                        <!--<li class="{{ Request::is('admin/coachs/affected') ? 'active' : '' }}"><a href="{{ url('admin/coachs/affected')}}" class="iq-waves-effect collapsed"><i class="ri-user-shared-line"></i><span>Affectation des coachs</span></a></li> -->
                        
                     <li>
                     <li class="iq-menu-title"><i class="ri-separator"></i><span>Evénements</span></li> 
                     <li class="{{ Request::is('admin/events') ? 'active' : '' }}">
                        <a href="{{ url('admin/events')}}" class="iq-waves-effect collapsed"><i class="ri-walk-line"></i><span>Evénements</span></a> </li>             
                     <li> 
                     <li class="iq-menu-title"><i class="ri-separator"></i><span>Gestion des pages</span></li> 
                     <li class="{{ Request::is('admin/pages') ? 'active' : '' }}"><a href="{{ url('admin/pages/1/edit')}}"><i class="ri-book-open-line"></i><span>A propos</span></a></li>
                     <li class="{{ Request::is('admin/news') ? 'active' : '' }}"><a href="{{ url('admin/news')}}" class="iq-waves-effect collapsed"><i class="ri-newspaper-line"></i><span>Actualités</span></a> </li>    
                     <li>
                        <a href="{{ url('admin/clubs')}}" class="iq-waves-effect collapsed"><i class="ri-group-line"></i><span>Clubs</span></a> </li>          
                     </li>
                     
                     
                     
                    
                     
                  </ul>
               </nav>
               <div class="p-3"></div>
            </div>
         </div>
         <!-- TOP Nav Bar -->
         <div class="iq-top-navbar">
            <div class="iq-navbar-custom">
               <div class="iq-sidebar-logo">
                  <div class="top-logo">
                     <a href="/" class="logo">
                     <img src="{{asset('/soft/images/logo.png')}}" class="img-fluid" alt="">
                     <span>Kolnanemchiw</span>
                     </a>
                  </div>
               </div>
               <div class="navbar-breadcrumb">
                  <h5 class="mb-0">Dashboard</h5>
                  <nav aria-label="breadcrumb">
                     <ul class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Kolnanemchiw</li>
                     </ul>
                  </nav>
               </div>
               <nav class="navbar navbar-expand-lg navbar-light p-0">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="ri-menu-3-line"></i>
                  </button>
                  <div class="iq-menu-bt align-self-center">
                     <div class="wrapper-menu">
                        <div class="line-menu half start"></div>
                        <div class="line-menu"></div>
                        <div class="line-menu half end"></div>
                     </div>
                  </div>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav ml-auto navbar-list">
                        <li class="nav-item">
                           <a class="search-toggle iq-waves-effect" href="#"><i class="ri-search-line"></i></a>
                           <form action="#" class="search-box">
                              <input type="text" class="text search-input" placeholder="Type here to search..." />
                           </form>
                        </li>
                        <li class="nav-item">
                           <a href="#" class="search-toggle iq-waves-effect">
                              <i class="ri-notification-2-line"></i>
                              <span class="bg-danger dots"></span>
                           </a>
                         
                        </li>
                        <li class="nav-item iq-full-screen"><a href="#" class="iq-waves-effect" id="btnFullscreen"><i class="ri-fullscreen-line"></i></a></li>
                     </ul>
                  </div>
                  <ul class="navbar-list">
                     <li>
                        <a href="#" class="search-toggle iq-waves-effect bg-primary text-white"><img src="{{asset('/soft/images/user/1.jpg')}}" class="img-fluid rounded" alt="user"></a>
                        <div class="iq-sub-dropdown iq-user-dropdown">
                           <div class="iq-card iq-card-block iq-card-stretch iq-card-height shadow-none m-0">
                              <div class="iq-card-body p-0 ">
                                 <div class="bg-primary p-3">
                                    <h5 class="mb-0 text-white line-height">Bienvenu Admin</h5>
                                    <span class="text-white font-size-12">Available</span>
                                 </div>
                                 <a href="{{ url('/admin/profile')}}" class="iq-sub-card iq-bg-primary-hover">
                                    <div class="media align-items-center">
                                       <div class="rounded iq-card-icon iq-bg-primary">
                                          <i class="ri-file-user-line"></i>
                                       </div>
                                       <div class="media-body ml-3">
                                          <h6 class="mb-0 ">Mon profile</h6>
                                          <p class="mb-0 font-size-12">Voir Détail Profile</p>
                                       </div>
                                    </div>
                                 </a>
                                 <a href="{{ url('/admin/profile/edit')}}" class="iq-sub-card iq-bg-primary-success-hover">
                                    <div class="media align-items-center">
                                       <div class="rounded iq-card-icon iq-bg-success">
                                          <i class="ri-profile-line"></i>
                                       </div>
                                       <div class="media-body ml-3">
                                          <h6 class="mb-0 ">Edit Profile</h6>
                                          <p class="mb-0 font-size-12">Modifier Détail Personnels.</p>
                                       </div>
                                    </div>
                                 </a>
                                 <a href="{{ url('/admin/setting') }}" class="iq-sub-card iq-bg-primary-danger-hover">
                                    <div class="media align-items-center">
                                       <div class="rounded iq-card-icon iq-bg-danger">
                                          <i class="ri-account-box-line"></i>
                                       </div>
                                       <div class="media-body ml-3">
                                          <h6 class="mb-0 ">Settings</h6>
                                          <p class="mb-0 font-size-12">Gerer les paramétres de votre compte.</p>
                                       </div>
                                    </div>
                                 </a>
                                 <div class="d-inline-block w-100 text-center p-3">
                                    <a class="iq-bg-danger iq-sign-btn" href="{{ route('auth.logout') }}" role="button">Sign out<i class="ri-login-box-line ml-2"></i></a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </li>
                  </ul>
               </nav>
            </div>
         </div>
         <!-- TOP Nav Bar END -->
         <!-- Page Content  -->
         <div id="content-page" class="content-page">
           @yield('content')	
         </div>
      </div>
      <!-- Wrapper END -->
      <!-- Footer -->
      <footer class="bg-white iq-footer">
         <div class="container-fluid">
            <div class="row">
               
            </div>
         </div>
      </footer>
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
      <!-- Custom JavaScript -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
      <!-- Summernote -->
      <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
      <!-- Custom JavaScript -->
      <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0-Kc_lroLnh-k2j194eWExpk7P94FU9o&libraries=places&callback=initialize" async defer></script>
      <script src="{{ asset('soft/js/mapInput.js') }}"></script>
      <script>
         function readURL(input) {
            if (input.files && input.files[0]) {
             var reader = new FileReader();
             reader.onload = function (e) {
             $('#evt-img-tag').attr('src', e.target.result);
             }
             reader.readAsDataURL(input.files[0]);
             }      
         }
         $("#evt_image").change(function(){
         readURL(this);
         });
      </script>
      <script>
      $(document).ready(function(){

         $(document).on('change','.cat',function(){ 
            var cat_id=$(this).val();
            if(cat_id == 1)
            { 
               $('.coachs').css("visibility", "visible"); 
            }
            else{ 
               $('.coachs').css("visibility", "hidden"); 
            } 
         });
         $(document).on('change','.contrie',function(){
            var contrie_id=$(this).val();
            console.log(contrie_id);
            var op=" ";
            $.ajax({
             type:'get',
             url:"{{ url('/admin/clubsbycnt') }}/"+contrie_id,
             dataType:'json',
             success:function(data){
               console.log(data);
               op+='<option value="" selected>Sélectionner un club</option>'
               for(var i=0;i<data.length;i++){
                 op+='<option value="'+data[i].id+'">'+data[i].name+'</option>';
               }
               $('.clubs').html(" ");
               $('.clubs').append(op);
              },
              error:function(){
              }
            });
         });
         $(document).on('change','.clubs',function(){
           var club_id=$(this).val();
           var op=" ";
           $.ajax({
            type:'get',
            url:"{{ url('/admin/coachbyclub') }}/"+club_id,
            dataType:'json',
            success:function(data){
             op+='<option value="" selected>Sélectionner un coach</option>'
             for(var i=0;i<data.length;i++){
             op+='<option value="'+data[i].id+'">'+data[i].name+'</option>';
            }
            $('.coachs').html(" ");
            $('.coachs').append(op);
            },
             error:function(){
            }
            });
         });
         $('#summernote').summernote()   

      });
      </script>
      <script>
      </script>
   </body>
</html>
