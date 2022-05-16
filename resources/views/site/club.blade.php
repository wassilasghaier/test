@extends('site.index')
@section('content')
 <!-- Project Start -->
 <section class="iq-project">
            <div class="container">
               <div class="row align-items-center">
                  <div class="col-lg-6 text-center">
                     <img src="{{url('/')}}/{{$club->photo}}" class="img-fluid" alt="image">
                     <div class="iq-objects-style-1">
                        <span class="iq-objects-01" data-bottom="transform:translatey(-50px)" data-top="transform:translatey(-50px);">
                        <img src="{{ asset('site/images/effect/01.jpg') }}" alt="drive02">
                        </span>
                        <span class="iq-objects-02" data-bottom="transform:translatey(50px)" data-top="transform:translatey(-100px);">
                        <img src="{{ asset('site/images/effect/02.jpg') }}" alt="drive02">
                        </span>
                        <span class="iq-objects-03" data-bottom="transform:translatex(50px)" data-top="transform:translatex(-100px);">
                        <img src="{{ asset('site/images/effect/03.jpg') }}" alt="drive02">
                        </span>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="title-box text-left">
                        <span class="text-warning">{{ $club->contrie->name}}</span>
                        <h2 class="title">{{ $club->name}}</h2>
                        <p class="mb-0">{{ $club->description}}</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="scrolling-text bottam right default">
               <div data-bottom="transform:translatex(300px)" data-top="transform:translatex(0);">{{ $club->name}}</div>
            </div>
        </section>
      <!-- Project End -->
@endsection