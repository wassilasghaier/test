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
                           <span class="table-add float-right mb-3 mr-2">
                              <a href="{{url('admin/coachs/create')}}" class="btn btn-sm iq-bg-success"><i
                                 class="ri-add-fill"><span class="pl-1">Ajouter Nouveau</span></i>
                               </a>
                           </span>
                           <table class="table table-bordered table-responsive-md table-striped text-center">
                             <thead>
                               <tr>
							   <th>#</th>
                        <th>Avatar</th>
					          <th>Nom & Prénom</th>
					          <th>Email</th>
                              <th>Phone</th>
                              <th>Action</th>
                               </tr>
                             </thead>
                             <tbody>
							 @foreach ($enfants as $enfant)
                               <tr>
                                 <td contenteditable="false">{{ $loop->index+1 }}</td>
                                 <td  class= "text-center"contenteditable="false"><img class="rounded-circle img-fluid avatar-40" src="{{$enfant->image}}" alt="profile"> </td>
                                 <td contenteditable="false">{{$enfant->name}}</td>
								 <td contenteditable="false">{{$enfant->email}}</td>
								 <td contenteditable="false">{{$enfant->phone}}</td>
                                 <td>
								 <div class="flex align-items-center list-user-action">
                                          <a data-toggle="tooltip" data-placement="top" title="" data-original-title="show" href="{{url('/admin/coachs/profile/'.$enfant->id)}}"><i class="ri-slideshow-4-line"></i></a>
                                          <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="{{url('/admin/coachs/delete/'.$enfant->id)}}"><i class="ri-delete-bin-line"></i></a>
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