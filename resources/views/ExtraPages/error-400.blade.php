@extends('layouts.master')

@section('content')

    <div class="container-fluid p-0">
        <div class="row no-gutters">
            <div class="col-sm-12 text-center">
                <div class="iq-error">
                    <h1>400</h1>
                    <h4 class="mb-0">Oops! This Page is Not Found.</h4>
                    <p>The requested page dose not exist.</p>
                    <a class="btn btn-primary mt-3" href={{route('dashboard-1')}}><i class="ri-home-4-line"></i>Back to Home</a>
                    <img src={{asset("assets/images/error/01.png")}} class="img-fluid iq-error-img" alt="">
                </div>
            </div>
        </div>
    </div>

@endsection
