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
                                       <h4 class="card-title">Affectation</h4>
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
								   <form method="POST" action="{{ url('/admin/clubs/affect/'.$user->id) }}">
                                   <input type="hidden" name="_method" value="PUT">
							       {{ csrf_field() }}
                                       <div class="row justify-content-center">
                                          <div class="form-group col-sm-12 col-lg-12">
                                             <label for="fname">Coach</label>
                                             <input type="text" class="form-control" name="name" id="fname" value = "{{$user->name}}" required = "required" readonly>
											 <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                                          </div>
                                          @if($user->club_id != null)
                                          <div class="form-group col-sm-12 col-lg-12">
                                             <label for="exampleFormControlSelect2">Liste des clubs</label>
                                             <select class="form-control" id="exampleFormControlSelect2" name="club_id">
                                             <option value="{{ $user->club_id }}">{{ $user->club->name }}</option>
												@foreach($clubs as $club)
										         <option value="{{ $club->id }}">{{ $club->name }}</option>
                                                @endforeach
                                             </select>
                                          </div>
                                          @else
                                            <div class="form-group col-sm-12 col-lg-12">
                                             <label for="exampleFormControlSelect2">Liste des clubs</label>
                                             <select class="form-control" id="exampleFormControlSelect2" name="club_id">
												@foreach($clubs as $club)
										         <option value="{{ $club->id }}">{{ $club->name }}</option>
                                                @endforeach
                                             </select>
                                            </div>
                                           @endif
                                           </div>
									        <div class="row justify-content-center">
                                                <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
                                                <button type="reset" class="btn iq-bg-danger">Annuler</button>
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
