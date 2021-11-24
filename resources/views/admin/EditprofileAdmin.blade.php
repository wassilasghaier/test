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
                                       <h4 class="card-title">Informations Personnels</h4>
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
                                    <form method="POST" action="{{ url('/admin/profile/edit') }}">
							               {{ csrf_field() }}
                                       <div class="form-group row align-items-center">
                                          <div class="col-md-12">
                                             <div class="profile-img-edit">
                                                <img class="profile-pic" src="{{asset('/soft/images/user/11.png')}}" alt="profile-pic">
                                             </div>
                                          </div>
                                       </div>
                                       <div class=" row align-items-center">
                                          <div class="form-group col-sm-12">
                                             <label for="fname">Nom & Prenom:</label>
                                             <input type="text" class="form-control" id="fname" value = "{{$data->name}}" name="name" required>
                                          </div>
                                          <div class="form-group col-sm-12">
                                             <label for="cname">Role:</label>
                                             <input type="text" class="form-control" id="cname" value="Administrateur" readonly>
                                          </div>
                                          <div class="form-group col-sm-12">
                                             <label for="lname">Email:</label>
                                             <input type="text" class="form-control" id="lname" value="{{$data->email}}" name="email" required>
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