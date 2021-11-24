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
                                       <h4 class="card-title">Changer Mot de passe</h4>
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
                                    <form method="POST" action="{{ url('/admin/setting') }}">
							               {{ csrf_field() }}
                                       <div class=" row align-items-center">
                                          <div class="form-group col-sm-12">
                                             <label for="fname">Ancien mot de passe:</label>
                                             <input type="password" class="form-control" id="fname"  name="oldpwd" required>
                                             <span class="text-danger">@error('oldpwd'){{ $message }} @enderror</span>
                                          </div>
                                          <div class="form-group col-sm-12">
                                             <label for="cname">Nouveau mot de passe</label>
                                             <input type="password" class="form-control" id="cname"  name="newpwd" required>
                                             <span class="text-danger">@error('newpwd'){{ $message }} @enderror</span>
                                          </div>
                                          <div class="form-group col-sm-12">
                                             <label for="lname">Confirme mot de passe:</label>
                                             <input type="password" class="form-control" id="lname" name="confirme" required>
                                             <span class="text-danger">@error('confirme'){{ $message }} @enderror</span>
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