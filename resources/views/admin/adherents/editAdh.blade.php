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
                                    <form method="POST" action="{{ url('/admin/adherents/profile/edit'.$user->id) }}">
									    <input type="hidden" name="_method" value="PUT">
							             {{ csrf_field() }}
                                       <div class="form-group row align-items-center">
                                          <div class="col-md-12">
                                             <div class="profile-img-edit">
                                                <img class="profile-pic" src="{{$user->image}}" alt="profile-pic">
                                             </div>
                                          </div>
                                       </div>
                                       <div class=" row align-items-center">
                                          <div class="form-group col-sm-6">
                                             <label for="fname">Nom & Prenom:</label>
                                             <input type="text" class="form-control" id="fname" name="name" value = "{{$user->name}}">
                                          </div>
                                          <div class="form-group col-sm-6">
                                             <label for="cname">Role:</label>
                                             <input type="text" class="form-control" id="cname" value="Adh??rent" readonly>
                                          </div>
                                          <div class="form-group col-sm-6">
                                             <label for="lname">Email:</label>
                                             <input type="text" class="form-control" id="lname" name="email" value="{{$user->email}}">
                                          </div>
                                          <div class="form-group col-sm-6">
                                             <label for="uname">Cin:</label>
                                             <input type="number" class="form-control" id="uname" name="cin" value="{{$user->cin}}">
                                          </div>
                                          <div class="form-group col-sm-6">
                                             <label for="dob">Telephone:</label>
                                             <input type="number" class="form-control" id="dob" name="phone" value="{{$user->phone}}">
                                          </div>
                                            <div class="form-group col-sm-6">
                                              <label for="dob">Date de naissance:</label>
                                              <input type="date" class="form-control" id="dob" name="date_birth" value="{{$user->date_birth}}">
                                            </div>
                                            <div class="form-group col-sm-6">
                                             <label for="exampleFormControlSelect2">Liste des pays</label>
                                             <select class="form-control contrie" id="" name="contrie_id">
                                                 <option value="{{$club->contrie_id}}"> {{$club->contrie->name}} </option>
												            @foreach($contries as $contrie)
										                  <option value="{{ $contrie->id }}">{{ $contrie->name }}</option>
                                                @endforeach
                                             </select>
                                            </div>
                                            <div class="form-group col-sm-6">
                                             <label for="exampleFormControlSelect2">Liste des clubs</label>
                                             <select class="form-control clubs" id="" name="club_id">
                                                <option value="{{$user->club_id}}"> {{$user->club->name}} </option>
                                             </select>
                                            </div>
                                            <div class="form-group col-sm-6">
                                             <label for="dob">ID adh??sion:</label>
                                             <input type="text" class="form-control" id="dob"  value="{{$user->uuid}}" readonly>
                                            </div>
                                             <div class="form-group">
                                                <div class="form-check">
                                                   <div class="custom-control custom-radio">
                                                      <input type="radio" id="customRadio1" name="gender" value="Homme" class="custom-control-input" {{ ($user->gender=="Homme")? "checked" : "" }}>
                                                      <label class="custom-control-label" for="customRadio1"> Homme </label>
                                                   </div>
                                                   <div class="custom-control custom-radio">
                                                      <input type="radio" id="customRadio2" name="gender" value="Femme" class="custom-control-input" {{ ($user->gender=="Femme")? "checked" : "" }}>
                                                      <label class="custom-control-label" for="customRadio2"> Femme</label>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="form-group col-sm-12">
                                             <label>Addresse:</label>
                                             <textarea class="form-control" name="addresse" rows="5" value="" style="line-height: 22px;">
                                             {{$user->adresse}}
                                             </textarea>
                                            </div>
                                          <div class="form-group col-sm-12">
                                            <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
                                            <button type="reset" class="btn iq-bg-danger">Annuler</button>
                                          </div>
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