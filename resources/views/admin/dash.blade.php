@extends('admin.index')

@section('content')
<div class="container-fluid">
               <div class="row">
                  <div class="col-md-6 col-lg-3">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height overflow-hidden">
                        <div class="iq-card-body pb-0">
                           <div class="rounded-circle iq-card-icon iq-bg-primary"><i class="ri-group-line"></i></div>
                           <span class="float-right line-height-6">Utilisateurs</span>
                           <div class="clearfix"></div>
                           <div class="text-center">
                              <h2 class="mb-0"><span class="counter">{{$users}}</span><span></span></h2>
                           </div>
                        </div>
                        <div id="chart-1"></div>
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-3">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height overflow-hidden">
                        <div class="iq-card-body pb-0">
                           <div class="rounded-circle iq-card-icon iq-bg-warning"><i class="ri-group-line"></i></div>
                           <span class="float-right line-height-6">Coachs</span>
                           <div class="clearfix"></div>
                           <div class="text-center">
                              <h2 class="mb-0"><span></span><span class="counter">{{$coachs}}</span></h2>
                           </div>
                        </div>
                        <div id="chart-2"></div>
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-3">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height overflow-hidden">
                        <div class="iq-card-body pb-0">
                           <div class="rounded-circle iq-card-icon iq-bg-success"><i class="ri-group-line"></i></div>
                           <span class="float-right line-height-6">Total marches</span>
                           <div class="clearfix"></div>
                           <div class="text-center">
                              <h2 class="mb-0"><span class="counter">{{$marches}}</span><span></span></h2>
                           </div>
                        </div>
                        <div id="chart-3"></div>
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-3">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height overflow-hidden">
                        <div class="iq-card-body pb-0">
                           <div class="rounded-circle iq-card-icon iq-bg-danger"><i class="ri-shopping-cart-line"></i></div>
                           <span class="float-right line-height-6">Clubs</span>
                           <div class="clearfix"></div>
                           <div class="text-center">
                              <h2 class="mb-0"><span class="counter">{{$clubs}}</span><span></span></h2>
                           </div>
                        </div>
                        <div id="chart-4"></div>
                     </div>
                  </div>
                  
               </div>
               <div class="row">
                  <div class="col-lg-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Nouveau Utilisateur</h4>
                           </div>
                           <div class="iq-card-header-toolbar d-flex align-items-center">
                              
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div class="table-responsive">
                              <table class="table mb-0 table-borderless">
                                 <thead>
                                    <tr>
                                       <th scope="col">Non&Prénom</th>
                                       <th scope="col">Email</th>
                                       <th scope="col">Télèphone</th>
                                       <th scope="col">Valide</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 @foreach ($news as $new)
                                    <tr>
                                       <td>{{$new->name}}</td>
                                       <td>{{$new->email}}</td>
                                       <td>{{$new->phone}}</td>
                                       <td>{{$new->created_at->format('d m Y')}}</td>
                                    </tr>
                                 @endforeach
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
@endsection