@extends('admin.index')

@section('content')
<div class="container-fluid">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="iq-edit-list-data">
                        <div class="tab-content">
                           <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                               <div class="iq-card">
                                 <div class="iq-card-header d-flex justify-content-between">
                                    <div class="iq-header-title">
                                       <h4 class="card-title">Ajouter Role</h4>
                                    </div>
                                 </div>
                                 <div class="iq-card-body">
								   @foreach (['danger', 'warning', 'success', 'info'] as $message)
                                       @if(Session::has($message))
                                        <div class="alert alert-{{ $message }}">
							              <p>{{ Session::get($message) }}</p>
							            </div>
                                      @endif
                                   @endforeach
                                    <form method="POST" action="{{ url('/admin/roles/create') }}">
							           {{ csrf_field() }}
                                       <div class=" row align-items-center">
                                          <div class="form-group col-sm-6">
                                             <label for="fname">Nom</label>
                                             <input type="text" class="form-control" name="name" id="fname" required = "required" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))'>
											 <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                                          </div>
                                          <div class="form-group col-sm-6">
                                             <label for="lname">Description</label>
                                             <input type="text" class="form-control" name="description" id="lname" required = "required" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))'>
											 <span class="text-danger">@error('description'){{ $message }} @enderror</span>
                                          </div>
                                       </div>
                                       <button type="submit" class="btn btn-primary mr-2">Ajouter</button>
                                       <button type="reset" class="btn iq-bg-danger">Cancle</button>
                                    </form>
                                 </div>
                              </div>
                           </div>                        
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
</div>
@endsection
