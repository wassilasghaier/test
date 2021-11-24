@extends('layouts.master')

@section('content')
   
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12 col-lg-6">
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title">Slides only</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                   <p>Here’s a carousel with slides only. Note the presence of the <code>.d-block</code> and <code>.img-fluid</code> on carousel images to prevent browser default image alignment.</p>
                   <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                      <div class="carousel-inner">
                         <div class="carousel-item active">
                            <img src={{asset("assets/images/small/img-1.jpg")}} class="d-block w-100" alt="#">
                         </div>
                         <div class="carousel-item">
                            <img src={{asset("assets/images/small/img-1.jpg")}} class="d-block w-100" alt="#">
                         </div>
                         <div class="carousel-item">
                            <img src={{asset("assets/images/small/img-1.jpg")}} class="d-block w-100" alt="#">
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-sm-12 col-lg-6">
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title">Slides With Controls</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                   <p>Here’s a carousel with slides only. Note the presence of the <code>.d-block</code> and <code>.img-fluid</code> on carousel images to prevent browser default image alignment.</p>
                   <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                      <div class="carousel-inner">
                         <div class="carousel-item active">
                            <img src={{asset("assets/images/small/img-1.jpg")}} class="d-block w-100" alt="#">
                         </div>
                         <div class="carousel-item">
                            <img src={{asset("assets/images/small/img-1.jpg")}} class="d-block w-100" alt="#">
                         </div>
                         <div class="carousel-item">
                            <img src={{asset("assets/images/small/img-1.jpg")}} class="d-block w-100" alt="#">
                         </div>
                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                      </a>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-sm-12 col-lg-6">
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title">Slides With Indicators</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                   <p>Here’s a carousel with slides only. Note the presence of the <code>.d-block</code> and <code>.img-fluid</code> on carousel images to prevent browser default image alignment.</p>
                   <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                      <ol class="carousel-indicators">
                         <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                         <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                         <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                      </ol>
                      <div class="carousel-inner">
                         <div class="carousel-item active">
                            <img src={{asset("assets/images/small/img-1.jpg")}} class="d-block w-100" alt="#">
                         </div>
                         <div class="carousel-item">
                            <img src={{asset("assets/images/small/img-1.jpg")}} class="d-block w-100" alt="#">
                         </div>
                         <div class="carousel-item">
                            <img src={{asset("assets/images/small/img-1.jpg")}} class="d-block w-100" alt="#">
                         </div>
                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                      </a>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-sm-12 col-lg-6">
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title">Slides With Captions</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                   <p>Here’s a carousel with slides only. Note the presence of the <code>.d-block</code> and <code>.img-fluid</code> on carousel images to prevent browser default image alignment.</p>
                   <div class="bd-example">
                      <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                         <ol class="carousel-indicators">
                            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                         </ol>
                         <div class="carousel-inner">
                            <div class="carousel-item active">
                               <img src={{asset("assets/images/small/img-1.jpg")}} class="d-block w-100" alt="#">
                               <div class="carousel-caption d-none d-md-block">
                                  <h4 class="text-white">First slide label</h4>
                                  <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                               </div>
                            </div>
                            <div class="carousel-item">
                               <img src={{asset("assets/images/small/img-1.jpg")}} class="d-block w-100" alt="#">
                               <div class="carousel-caption d-none d-md-block">
                                  <h4 class="text-white">Second slide label</h4>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                               </div>
                            </div>
                            <div class="carousel-item">
                               <img src={{asset("assets/images/small/img-1.jpg")}} class="d-block w-100" alt="#">
                               <div class="carousel-caption d-none d-md-block">
                                  <h4 class="text-white">Third slide label</h4>
                                  <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                               </div>
                            </div>
                         </div>
                         <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                         <span class="sr-only">Previous</span>
                         </a>
                         <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                         <span class="carousel-control-next-icon" aria-hidden="true"></span>
                         <span class="sr-only">Next</span>
                         </a>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-sm-12 col-lg-6">
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title">Slides With Crossfade</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                   <p>Here’s a carousel with slides only. Note the presence of the <code>.d-block</code> and <code>.img-fluid</code> on carousel images to prevent browser default image alignment.</p>
                   <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                      <div class="carousel-inner">
                         <div class="carousel-item active">
                            <img src={{asset("assets/images/small/img-1.jpg")}} class="d-block w-100" alt="#">
                         </div>
                         <div class="carousel-item">
                            <img src={{asset("assets/images/small/img-1.jpg")}} class="d-block w-100" alt="#">
                         </div>
                         <div class="carousel-item">
                            <img src={{asset("assets/images/small/img-1.jpg")}} class="d-block w-100" alt="#">
                         </div>
                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                      </a>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
@endsection
