@extends('admin.index')
@section('content')
<div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
                  <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Liste Des Coachs</h4>
                           </div>
                        </div>
						@foreach (['danger', 'warning', 'success', 'info'] as $message)
                                       @if(Session::has($message))
                                        <div class="alert alert-{{ $message }}">
							              <p>{{ Session::get($message) }}</p>
							            </div>
                                      @endif
                        @endforeach
                        <div class="iq-card-body">
                           <div id="table" class="table-editable">
                           <div class="row justify-content-between">
                             <div class="col-sm-12 col-md-6 mb-3">
                                 <div id="user_list_datatable_info" class="dataTables_filter">
                                    <form class="mr-3 position-relative">
                                       <div class="form-group mb-0">
                                          <input type="search" class="form-control" id="exampleInputSearch" placeholder="chercher" aria-controls="user-list-table">
                                       </div>
                                    </form>
                                 </div>
                              </div>
                              <div class="col-sm-12 col-md-6">
                                 <span class="table-add float-right mb-3 mr-2">

                                    <a href="{{url('admin/coachs/create')}}" class="btn btn-sm iq-bg-success"><i
                                     class="ri-add-fill"><span class="pl-1">Ajouter Nouveau</span></i>
                                    </a>
                                 </span>
                              </div>
                           </div>
                           <table class="table table-bordered table-responsive-md table-striped text-center">
                             <thead>
                               <tr>
							             <th>#</th>
					                    <th>Nom & Prénom</th>
					                    <th>Email</th>
                                   <th>Télephone</th>
                                   <th>Club</th>
                                   <th>Role</th>
                                   <th>Statut</th>
                                   <th>Action</th>
                               </tr>
                             </thead>
                             <tbody>
							         @foreach ($coachs as $coach)
                               <tr>
                                  <td contenteditable="false">{{ $loop->index+1 }}</td>
                                  <td contenteditable="false">{{$coach->name}}</td>
								          <td contenteditable="false">{{$coach->email}}</td>
								          <td contenteditable="false">{{$coach->phone}}</td>
                                  <td  class= "text-center"contenteditable="false">{{$coach->club->name}}</td>
                                  <td>
                                     @if($coach->role == 'coach')
                                     <div class="badge badge-pill badge-info text-white">coach</div>
                                     @else
                                      <div class="badge badge-pill badge-warning text-white">super coach</div>
                                      @endif
                                  </td>
                                  <td>
                                     @if($coach->is_active == 1)
                                     <div class="badge badge-pill badge-success text-white">activé</div>
                                     @else
                                      <div class="badge badge-pill badge-danger text-white">déactivé</div>
                                      @endif
                                  </td>
                                  <td>
								                <div class="flex align-items-center list-user-action">
                                          <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Profil" href="{{url('/admin/coachs/profile/'.$coach->id)}}"><i class="ri-slideshow-4-line"></i></a>
                                          <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Modifier" href="{{url('/admin/coachs/edit/'.$coach->id)}}"><i class="ri-pencil-line"></i></a>
                                          <a data-toggle="tooltip" data-placement="top" title="" data-original-title="supprimer" href="{{url('/admin/coachs/delete/'.$coach->id)}}"><i class="ri-delete-bin-line"></i></a>
                                          <a data-toggle="tooltip" data-placement="top" title="" data-original-title="déactiver/activer" href="{{url('/admin/coachs/activate/'.$coach->id)}}"><i class="ri-user-unfollow-line"></i></a>
                                       </div>
                                 </td>
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
   </div>
@endsection