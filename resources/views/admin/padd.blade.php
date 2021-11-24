@extends('admin.index')
@section('content')
<div class="container-fluid">
               <div class="row justify-content-center">
                  <div class="col-lg-8">
                     <div class="iq-edit-list-data">
                        <div class="tab-content">
                           <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                               <div class="iq-card">
                                 <div class="iq-card-header d-flex justify-content-center">
                                    <div class="iq-header-title">
                                       <h4 class="card-title">Ajouter Permission</h4>
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
                                    <form method="POST" action="{{ url('/admin/permissions/create') }}">
							           {{ csrf_field() }}
                                       <div class="row justify-content-center">
                                          <div class="form-group col-sm-12 col-lg-6">
                                             <label for="fname">titre</label>
                                             <input type="text" class="form-control" name="title" id="fname" required = "required" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))'>
											 <span class="text-danger">@error('title'){{ $message }} @enderror</span>
                                          </div>
                                       </div>
									   <div class="row justify-content-center">
                                       <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
                                       <button type="reset" class="btn iq-bg-danger">Cancle</button>
									   </div>
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
