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
                           <div class="rounded-circle iq-card-icon iq-bg-success"><i class="ri-walk-line"></i></div>
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
                           <div class="rounded-circle iq-card-icon iq-bg-danger"><i class="ri-footprint-line"></i></div>
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
                              <h4 class="card-title">Liste des Evenements</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div class="table-responsive">
						            <table class="table mb-0">
                                 <thead class="thead-light">
                                    <tr>
                                       <th scope="col">Date</th>
                                       <th scope="col">Heure</th>
                                       <th scope="col">Titre</th>
                                       <th scope="col">Endroit</th>
                                       <th scope="col">Club</th>
                                       <th scope="col">Type</th>
                                       <th scope="col">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
								         @foreach ($events as $event)
                                 <tr>
                                    <td>{{$event->date}}</td>
                                    <td>{{$event->time}}</td>
                                    <td>{{$event->name}}</td>
                                    <td>{{$event->place}}</td>
                                    @if($event->club_id != null)
                                    <td>{{$event->club->name}}</td>
                                    @else
                                    <td>---</td>
                                    @endif
                                    <td>{{$event->categorie->name}}</td>
                                    <td>
                                       <div class="flex align-items-center list-user-action">
                                        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Modifier" href="{{url('/admin/events/'.$event->id.'/edit')}}" ><i class="ri-pencil-line"></i></a>
                                        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Supprimer" href="{{url('/admin/events/delete/'.$event->id)}}"><i class="ri-delete-bin-line"></i></a>
                                       </div>
                                    </td>
                                  </tr>
									@endforeach
                              </tbody>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
             <!--  <div class="row">
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
                                
                                    <tr>
                                     
                                    </tr>
                                 
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>-->
@endsection