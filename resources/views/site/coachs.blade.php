@extends('site.index')
@section('content')
<!-- Our Team start -->
    <section id="our-team" class="our-team">
        <div class="container">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="title-box text-center">
                        <span class="text-warning">Nos coachs</span>
                        <h2 class="title">Rencontrez la meilleure équipe</h2>
                     </div>
                  </div>
               </div>
            <div class="row">
               @foreach ($coachs as $coach)
                <div class="col-lg-3 col-md-6 mb-5">
                    <div class="iq-team">
                        <div class="iq-team-img">
                            @if($coach->gender == "Homme")
                            <img src="{{ asset('site/images/team/01.jpg') }}" class="img-fluid center-block" alt="coach">
                            @else
                            <img src="{{ asset('site/images/team/02.jpg') }}" class="img-fluid center-block" alt="coach">
                            @endif
                        </div>
                        <div class="iq-team-info text-center">
                           <h5>{{ $coach->name}}</h5>
                           <span class="team-post">{{ $coach->phone}}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
            <div class="scrolling-text bottam right default">
               <div data-bottom="transform:translatex(300px)" data-top="transform:translatex(0);"></div>
            </div>
    </section>
         <!-- Our Team  end -->
@endsection