
@extends('admin.index')
@section('content')
            <div class="container-fluid"> 
                <div class="row">
	               <div class="col-lg-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Liste des Clubs</h4>
                           </div>
                           <div class="iq-card-header-toolbar d-flex align-items-center">
						   <span class="table-add float-right mb-3 mr-2">
                              <a href="{{url('/admin/clubs/create')}}" class="btn btn-sm iq-bg-success"><i
                                 class="ri-add-fill"><span class="pl-1">Ajouter Nouveau</span></i>
                               </a>
                           </span>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div class="table-responsive">
						            <table class="table table-bordered table-responsive-md table-striped text-center">
                                 <thead>
                                    <tr>
                                       <th scope="col">Uuid</th>
                                       <th scope="col">Nom</th>
                                       <th scope="col">Pays</th>
                                       <th scope="col">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
								          @foreach ($clubs as $club)
                                 <tr>
                                    <td>{{$club->uuid}}</td>
                                    <td>{{$club->name}}</td>
                                    <td>{{$club->contrie->name}}</td>
                                    <td>
                                       <div class="flex align-items-center list-user-action">
                                        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Modifier" href="{{url('/admin/clubs/'.$club->id.'/edit')}}" ><i class="ri-pencil-line"></i></a>
                                        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Supprimer" href="{{url('/admin/clubs/delete/'.$club->id)}}"><i class="ri-delete-bin-line"></i></a>
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
                              {!! $clubs->links() !!}
                           </div>
                        </div>
                     </div>
                  </div>
	            </div>
            </div>
@endsection

				