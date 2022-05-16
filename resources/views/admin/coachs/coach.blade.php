@extends('admin.index')
@section('content')

    <div class="container-fluid">
        <div class="row row-eq-height">
                <!-- Content Top Banner Start -->
            <div class="col-lg-3 col-md-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height iq-profile-card text-center">
                           <div class="iq-card-body">
                            <div class="iq-team text-center p-0">
                                <img src="{{$user->image}}"
                                     class="img-fluid mb-3 avatar-120 rounded-circle" alt="">
                                <h4 class="mb-0">{{$user->name}}</h4>
                                <a href="#" class="d-inline-block w-100">{{$user->role}} </a>
                                <p class="mt-1">{{$user->email}} <br>
                                                {{$user->phone}}
                                </p>
                                <hr>
                                <ul class="list-inline mb-0 d-flex justify-content-between">
                                    <li class="list-inline-item">
                                        <h5>Marches</h5>
                                        <p class="text-success">{{$user->marches}}</p>
                                    </li>
                                    <li class="list-inline-item">
                                        <h5>Kilométrage</h5>
                                        <p class="text-success">{{$user->kl}}</p>
                                    </li>
                                    <li class="list-inline-item">
                                        <h5>Clubs</h5>
                                        <p class="text-success">{{$user->club->name}}</p>
                                    </li>
                                </ul>
                            </div>
                            <div id="Dash1BarChart"></div>
                            </div>
                        </div>
                    </div>
                

                </div>
            </div>
              
            </div>
    </div>

@endsection