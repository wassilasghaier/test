@extends('admin.index')
@section('content')
<div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
                  <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Liste Des Affectations</h4>
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
								 <th>Permission</th>
                                 <th>Role</th>
                                 <th>Action</th>
                               </tr>
                             </thead>
                             <tbody>
							 @foreach ($menus as $menu)
                               <tr>
                                 <td contenteditable="false">{{$menu->id}}</td>
                                 <td contenteditable="false">{{$menu->title}}</td>
								 <td contenteditable="false">{{$menu->listes}}</td>
                                 <td>
									   <div class="flex align-items-center list-user-action">
                                          <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Affecter" href="{{url('/admin/affectation/'.$menu->id.'/edit')}}"><i class="ri-exchange-line"></i></a>
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
