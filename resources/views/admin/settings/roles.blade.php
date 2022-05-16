@extends('admin.index')

@section('content')
<div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
                  <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Roles</h4>
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
                                 <th>label</th>
                                 <th>Description</th> 
                                </tr>
                              </thead>
                              <tbody>
							                  @foreach ($roles as $role)
                                  <tr>
                                    <td contenteditable="false">{{$role->id}}</td>
                                    <td contenteditable="false">{{$role->name}}</td>
								                    <td contenteditable="false">{{$role->description}}</td>          
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