@extends('admin.index')
@section('content')
<div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
                  <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Affectation des Coachs</h4>
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
                              <th>Club</th>
                              <th>Affecter</th>
                               </tr>
                             </thead>
                             <tbody>
							 @foreach ($coachs as $coach)
                               <tr>
                                 <td contenteditable="false">{{ $loop->index+1 }}</td>
                                 <td  class= "text-center"contenteditable="false"><img class="rounded-circle img-fluid avatar-40" src="{{$coach->image}}" alt="profile"> </td>
                                 <td contenteditable="false">{{$coach->name}}</td>
								 <td contenteditable="false">{{$coach->email}}</td>
								 <td contenteditable="false">{{$coach->phone}}</td>
                                 @if($coach->club_id != null)
                                 <td contenteditable="false"> {{$coach->club->name}} </td>
                                 @else
                                 <td contenteditable="false"> --- </td>
                                 @endif
                                 <td>
								    <div class="flex align-items-center list-user-action">
                                        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="show" href="{{url('/admin/coachs/affect/'.$coach->id)}}"><i class="ri-slideshow-4-line"></i></a>
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