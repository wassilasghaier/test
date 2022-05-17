@extends('admin.index')
@section('content')
<div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
                  <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Liste Des Utilisateurs simple (membres)</h4>
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
                           <table class="table table-bordered table-responsive-md table-striped text-center">
                              <thead>
                                 <tr>
							              <th>#</th>
                                   <th>avatar</th>
					                    <th>Nom & Prénom</th>
					                    <th>email</th>
                                   <th>phone</th>
                                   <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody>
							            @foreach ($parents as $parent)
                                 <tr>
                                    <td contenteditable="false">{{ $loop->index+1 }}</td>
                                    <td  class= "text-center"contenteditable="false"><img class="rounded-circle img-fluid avatar-40" src="{{$parent->image}}" alt="profile"> </td>
                                    <td contenteditable="false">{{$parent->name}}</td>
								            <td contenteditable="false">{{$parent->email}}</td>
								            <td contenteditable="false">{{$parent->phone}}</td>
                                    <td>
								               <div class="flex align-items-center list-user-action">
								                  <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Détail" href="{{url('/admin/users/profile/'.$parent->id)}}"><i class="ri-slideshow-4-line"></i></a>
                                          <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Supprimer" href="{{url('/admin/users/delete/'.$parent->id)}}"><i class="ri-delete-bin-line"></i></a>
                                          <a data-toggle="tooltip" data-placement="top" title="" data-original-title="déactiver/activer" href="{{url('/admin/users/activate/'.$parent->id)}}"><i class="ri-user-unfollow-line"></i></a>
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
                              {!! $parents->links() !!}
                           </div>
                        </div>

                  </div>
            </div>
         </div>
         
      </div>
   </div>
@endsection