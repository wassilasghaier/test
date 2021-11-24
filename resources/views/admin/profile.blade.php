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
                                    <form>
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
                                             <input type="text" class="form-control" id="fname" value = "{{$user->name}}" readonly>
                                          </div>
                                          <div class="form-group col-sm-6">
                                             <label for="cname">Role:</label>
                                             <input type="text" class="form-control" id="cname" value="Parent" readonly>
                                          </div>
                                          <div class="form-group col-sm-6">
                                             <label for="lname">Email:</label>
                                             <input type="text" class="form-control" id="lname" value="{{$user->email}}" readonly>
                                          </div>
                                          <div class="form-group col-sm-6">
                                             <label for="uname">UserName:</label>
                                             <input type="text" class="form-control" id="uname" value="{{$user->username}}" readonly>
                                          </div>
                                          <div class="form-group col-sm-6">
                                             <label for="dob">Telephone:</label>
                                             <input type="text" class="form-control" id="dob"  value="{{$user->phone}}" readonly>
                                          </div>
                                          <div class="form-group col-sm-6">
                                             <label for="dob">Date de naissance:</label>
                                             <input type="date" class="form-control" id="dob" value="{{$user->date_birth}}" readonly>
                                          </div>
                                          
                                          <div class="form-group col-sm-12">
                                             <label>Address:</label>
                                             <textarea class="form-control" name="address" rows="5" value="" style="line-height: 22px;" readonly>
                                             {{$user->adresse}}
                                             </textarea>
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