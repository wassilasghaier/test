@extends('admin.index')

@section('content')
<div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
                  <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Liste Des Permissions</h4>
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
                              <a href="{{url('admin/permissions/create')}}" class="btn btn-sm iq-bg-success"><i
                                 class="ri-add-fill"><span class="pl-1">Ajouter Nouveau</span></i>
                               </a>
                           </span>
                           <table class="table table-bordered table-responsive-md table-striped text-center">
                             <thead>
                               <tr>
                                 <th>#</th>
                                 <th>Titre</th>
                                 <th>Action</th>
                               </tr>
                             </thead>
                             <tbody>
							 @foreach ($menus as $menu)
                               <tr>
                                 <td contenteditable="false">{{$menu->id}}</td>
                                 <td contenteditable="false">{{$menu->title}}</td>
                                 <td>
								 <span class="table-remove"> <a href="{{url('/admin/permissions/'.$menu->id.'/edit')}}"
                                       class="btn iq-bg-info btn-rounded btn-sm my-0">Modifier</a></span>
                                   <span class="table-remove"><a href="{{url('/admin/permissions/delete/'.$menu->id)}}" 
                                       class="btn iq-bg-danger btn-rounded btn-sm my-0">Supprimer</a></span>
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