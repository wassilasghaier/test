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
                                       <h4 class="card-title">Ajouter un nouveau Club</h4>
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
								            <form method="POST" action="{{ url('/admin/clubs/create') }}" enctype="multipart/form-data">
							                  {{ csrf_field() }}
                                       <div class="row justify-content-center">
                                          <div class="form-group col-sm-12 col-lg-12">
                                             <label for="fname">Nom du Club</label>
                                             <input type="text" class="form-control" name="name" id="fname" placeholder="Nom" required = "required" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))'>
											            <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                                          </div>
                                          <div class="form-group col-sm-12 col-lg-12">
                                             <label for="fname">Code du Club</label>
                                             <input type="number" class="form-control" name="code" id="fname" placeholder="Code" required = "required"s>
											            <span class="text-danger">@error('code'){{ $message }} @enderror</span>
                                          </div>
										            <div class="form-group col-sm-12 col-lg-12">
                                             <label for="exampleFormControlSelect2">Pays</label>
                                             <select class="form-control" id="exampleFormControlSelect2" name="contrie_id">
													      @foreach($contries as $contrie)
										                   <option value="{{ $contrie->id }}">{{ $contrie->name }}</option>
                                              @endforeach
                                             </select>
                                          </div>
                                          <div class="form-group col-sm-12 col-lg-12">
                                             <label for="fname">Description</label>
                                             <textarea class="form-control" name="description" id="summernote" required = "required"></textarea>
											            <span class="text-danger">@error('description'){{ $message }} @enderror</span>
                                          </div>
                                          <div class="form-group col-sm-12 col-lg-12">
                                             <label for="fname">Date de cr??ation Club</label>
                                             <input type="date" class="form-control" name="date_creation" id="fname" required = "required">
											            <span class="text-danger">@error('date_creation'){{ $message }} @enderror</span>
                                          </div>
                                          <div class="form-group col-sm-12 col-lg-12">
                                             <label for="fname">Date de debut des marches</label>
                                             <input type="date" class="form-control" name="date_debutmarhe" id="fname" required = "required">
											            <span class="text-danger">@error('date_debutmarhe'){{ $message }} @enderror</span>
                                          </div>
                                          <div class="form-group col-sm-12 col-lg-12">
                                             <label for="fname">Nombre des adh??rents</label>
                                             <input type="number" class="form-control" name="nb_adherent" id="fname" placeholder="10" required = "required">
											            <span class="text-danger">@error('nb_adherent'){{ $message }} @enderror</span>
                                          </div>
                                          <div class="form-group col-sm-12 col-lg-12">
                                            <div class="custom-file">
                                               <input type="file" class="custom-file-input" id="evt_image" name="photo">
                                               <label class="custom-file-label" for="customFile">Chosire une image (png,jpg,jpeg)</label>
                                             </div>
                                             <span class="text-danger">@error('photo'){{ $message }} @enderror</span>
                                          </div>
                                          <div class="col-sm-12 col-lg-12">
                                          <img src="{{ url('/') }}/soft/images/placeholder.png" id="evt-img-tag" width="200px"/>
                                          </div>
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
