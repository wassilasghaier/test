@extends('admin.index')
@section('content')
<div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
                  <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Liste ses opérations de multiplication</h4>
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
							   <th>Utilisateur</th>
                        <th>Avatar</th>
					           <th>operation</th>
                               <th>temps</th>
                               <th>date</th>
							   <th>Action</th>
                               </tr>
                             </thead>
                             <tbody>
						   @foreach ($operations as $operation)
				         <tr>
					     <td contenteditable="false">{{$operation->id}}</td>
					     <td contenteditable="false">{{$operation->user->name}}</td>
                    <td  class= "text-center"contenteditable="false"><img class="rounded-circle img-fluid avatar-40" src="{{$operation->user->image}}" alt="profile"> </td>
					     <td contenteditable="false"><div class="badge badge-pill badge-warning text-white">{{$operation->value}}</div></td></td>
                         <td contenteditable="false">{{$operation->time}}</td>
                         <td contenteditable="false">{{$operation->created_at}}</td>
						 <td>
						 <div class="flex align-items-center list-user-action">
						 <a data-toggle="tooltip" data-placement="top" title="" data-original-title="show" href="{{url('/admin/operations/multiplication/'.$operation->user_id)}}"><i class="ri-slideshow-4-line"></i></a>          
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