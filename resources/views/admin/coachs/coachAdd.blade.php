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
                                       <h4 class="card-title">Ajouter Un Coach</h4>
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
                                             <label for="fname">Nom</label>
                                             <input type="text" class="form-control" name="firstname" id="fname">
											            <span class="text-danger">@error('firstname'){{ $message }} @enderror</span>
                                          </div>
                                          <div class="form-group col-sm-6">
                                             <label for="fname">Prénom</label>
                                             <input type="text" class="form-control" name="lastname" id="fname">
											             <span class="text-danger">@error('lastname'){{ $message }} @enderror</span>
                                          </div>
                                          <div class="form-group col-sm-6">
                                             <label for="fname">Cin</label>
                                             <input type="number" class="form-control" name="cin" id="fname">
											             <span class="text-danger">@error('cin'){{ $message }} @enderror</span>
                                          </div>
                                          <div class="form-group col-sm-6">
                                             <label for="lname">Email</label>
                                             <input type="email" class="form-control" name="email" id="lname">
											            <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                                          </div>
                                          <div class="form-group col-sm-6">
                                             <label for="lname">Télèphone</label>
                                             <input type="tel" class="form-control" name="phone" id="lname"  required>
											            <span class="text-danger">@error('phone'){{ $message }} @enderror</span>
                                          </div>
                                          <div class="form-group col-sm-6">
                                              <label for="dob">Date de naissance:</label>
                                              <input type="date" class="form-control" id="dob" name="date_birth">
                                              <span class="text-danger">@error('date_birth'){{ $message }} @enderror</span>
                                            </div>
                                            <div class="form-group col-sm-6">
                                             <label for="exampleFormControlSelect2">Liste des pays</label>
                                             <select class="form-control contrie" id="" name="contrie_id">
                                             <option value="">séléctionner un pays</option>
												            @foreach($contries as $contrie)
										                    <option value="{{ $contrie->id }}">{{ $contrie->name }}</option>
                                                @endforeach
                                             </select>
                                            </div>
                                            <div class="form-group col-sm-6">
                                             <label for="exampleFormControlSelect2">Liste des clubs</label>
                                             <select class="form-control clubs" id="" name="club_id">
                                                <option value="">séléctionner un club</option>
                                             </select>
                                             <span class="text-danger">@error('club_id'){{ $message }} @enderror</span>
                                            </div>
										            <div class="form-group col-sm-6">
                                             <label for="lname">Mot de Passe</label>
                                             <input type="password" class="form-control" name="password" id="lname">
											              <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                                          </div>
                                          <div class="form-group col-sm-6">
                                             <label for="lname">Confirmer mot de passe</label>
                                             <input type="password" class="form-control" name="cpassword" id="lname">
											             <span class="text-danger">@error('cpassword'){{ $message }} @enderror</span>
                                          </div>
                                          <div class="form-group col-sm-6">
                                             <label for="exampleFormControlSelect2">Liste des roles</label>
                                             <select class="form-control" id="" name="role_id">
										                    <option value="1" selected>coach</option>
                                                  <option value="4">super coach</option>
                                             </select>
                                          </div>
                                          <div class="form-group col-sm-6">
                                             <label for="exampleFormControlSelect2">Liste des genres</label>
                                             <select class="form-control" id="" name="gender">
										                    <option value="Homme" selected>Homme</option>
                                                  <option value="Femme">Femme </option>
                                             </select>
                                          </div>
                                          <div class="form-group col-sm-12">
                                             <label>Addresse:</label>
                                             <textarea class="form-control" name="addresse" rows="5" value="" style="line-height: 22px;">
                                             </textarea>
                                          </div>
                                       <button type="submit" class="btn btn-primary mr-2">Ajouter</button>
                                       <button type="reset" class="btn iq-bg-danger">Annuler</button>
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
