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
                                       <th scope="col">Nom</th>
                                       <th scope="col">Endroit</th>
                                       <th scope="col">Date Et Heure</th>
                                       <th scope="col">km</th>
                                       <th scope="col">Participants</th>
                                       <th scope="col">Categorie</th>
                                       <th scope="col">club</th>
                                       <th scope="col">Statut</th>
                                       <th scope="col">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
								          @foreach ($events as $event)
                                 <tr>
                                    <td>{{$event->name}}</td>
                                    <td>{{$event->place}}</td>
                                    <td>{{$event->date}} {{$event->time}}</td>
                                    <td>{{$event->kilometrage}}</td>
                                    <td>{{$event->participants}}</td>
                                    <td>{{$event->categorie->name}}</td>
                                    @if($event->club_id != null)
                                    <td>{{$event->club->name}}</td>
                                    @else
                                    <td>---</td>
                                    @endif
                                    
                                    <td>
                                     @if($event->isCancled == 1)
                                       <div class="badge badge-pill badge-info text-white">actif</div>
                                     @else
                                      <div class="badge badge-pill badge-danger text-white">annulé</div>
                                      @endif
                                    </td>
                                    
                                    <td>
                                       <div class="flex align-items-center list-user-action">
                                        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Modiffier" href="{{url('/admin/events/'.$event->id.'/edit')}}" ><i class="ri-pencil-line"></i></a>
                                        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Supprimer" href="{{url('/admin/events/delete/'.$event->id)}}"><i class="ri-delete-bin-line"></i></a>
                                        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="dupliquer" href="{{url('/admin/events/'.$event->id.'/duplicate')}}" ><i class="ri-file-copy-line"></i></a>
                                        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Annuler" href="{{url('/admin/events/cancel/'.$event->id)}}"><i class="ri-close-circle-line"></i></a>
                                       </div>
                                    </td>
                                 </tr>
									       @endforeach
                                 </tbody>
                              </table>  
                              
                           </div>
                           
                        </div>
                        <div class="iq-card-footer">
                           <div class="d-flex justify-content-center">
                              {!! $events->links() !!}
                           </div>
                        </div>
                       
                     </div>
                  </div>
	            </div>
            </div>
@endsection

				