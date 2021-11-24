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
                                       <h4 class="card-title">Ajouter Coach</h4>
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
                                    <form method="POST" action="{{ url('admin/coachs/create') }}">
							           {{ csrf_field() }}
                                       <div class=" row align-items-center">
                                          <div class="form-group col-sm-6">
                                             <label for="fname">Nom & Prenom</label>
                                             <input type="text" class="form-control" name="name" id="fname">
											 <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                                          </div>
                                          <div class="form-group col-sm-6">
                                             <label for="lname">Email</label>
                                             <input type="email" class="form-control" name="email" id="lname">
											 <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                                          </div>
										  <div class="form-group col-sm-6">
                                             <label for="lname">Mot de Passe</label>
                                             <input type="text" class="form-control" name="password" id="lname">
											 <span class="text-danger">@error('password'){{ $message }} @enderror</span>
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
