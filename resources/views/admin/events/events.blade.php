@extends('admin.index')
@section('content')
            <div class="container-fluid"> 
                <div class="row">
	               <div class="col-lg-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Liste des Evenements</h4>
                           </div>
                           <div class="iq-card-header-toolbar d-flex align-items-center">
						         <span class="table-add float-right mb-3 mr-2">
                              <a href="{{url('/admin/events/create')}}" class="btn btn-sm iq-bg-success"><i
                                 class="ri-add-fill"><span class="pl-1">Ajouter Nouveau</span></i>
                               </a>
                           </span>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div class="table-responsive">
						            <table class="table mb-0">
                                 <thead class="thead-light">
                                    <tr>
									            <th scope="col">No.</th>
                                       <th scope="col">Nom</th>
                                       <th scope="col">Endroit</th>
                                       <th scope="col">Date</th>
                                       <th scope="col">Heure</th>
                                       <th scope="col">kilometrage</th>
                                       <th scope="col">participants</th>
                                       <th scope="col">Categorie</th>
                                       <th scope="col">club</th>
                                       
                                       <th scope="col">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
								    @foreach ($events as $event)
                                 <tr>
                                    <td>{{$loop->index + 1 }}</td>
                                    <td>{{$event->name}}</td>
                                    <td>{{$event->place}}</td>
                                    <td>{{$event->date}}</td>
                                    <td>{{$event->time}}</td>
                                    <td>{{$event->kilometrage}}</td>
                                    <td>{{$event->participants}}</td>
                                    <td>{{$event->categorie->name}}</td>
                                    @if($event->club_id != null)
                                    <td>{{$event->club->name}}</td>
                                    @else
                                    <td>---</td>
                                    @endif
                                    <td>
                                       <div class="flex align-items-center list-user-action">
                                        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{url('/admin/events/'.$event->id.'/edit')}}" ><i class="ri-pencil-line"></i></a>
                                        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="{{url('/admin/events/delete/'.$event->id)}}"><i class="ri-delete-bin-line"></i></a>
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
            </div>
@endsection

				