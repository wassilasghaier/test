
@extends('admin.index')
@section('content')
            <div class="container-fluid"> 
                <div class="row">
	               <div class="col-lg-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Liste des Packs</h4>
                           </div>
                           <div class="iq-card-header-toolbar d-flex align-items-center">
						   <span class="table-add float-right mb-3 mr-2">
                              <a href="{{url('/admin/pack/create')}}" class="btn btn-sm iq-bg-success"><i
                                 class="ri-add-fill"><span class="pl-1">Ajouter Nouveau</span></i>
                               </a>
                           </span>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div class="table-responsive">
						   <table class="table mb-0 table-borderless">
                                 <thead>
                                    <tr>
									<th scope="col">Pack No.</th>
                                       <th scope="col">Titre</th>
                                       <th scope="col">Période</th>
                                       <th scope="col">Prix</th>
                                       <th scope="col">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
								 @foreach ($packs as $pack)
                                    <tr>
									
									  <td>{{$pack->id}}</td>
					                  <td>{{$pack->name}}</td>
					                  <td>{{$pack->period}}</td>
                                      <td>{{$pack->price}}</td>
                                      <td>
									  <div class="flex align-items-center list-user-action">
								          <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{url('/admin/packs/'.$pack->id.'/edit')}}" ><i class="ri-pencil-line"></i></a>
                                          <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="{{url('/admin/packs/delete/'.$pack->id)}}"><i class="ri-delete-bin-line"></i></a>
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

				