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
                                       <h4 class="card-title">Modifier Évènement</h4>
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
								            <form method="POST" action="{{ url('/admin/events/'.$event->id) }}" enctype="multipart/form-data">
                                            <input type="hidden" name="_method" value="PUT">
							                  {{ csrf_field() }}
                                           <div class="row justify-content-center">
                                            <div class="form-group col-sm-12 col-lg-12">
                                             <label for="fname">Nom  de l'évènement</label>
                                             <input type="text" class="form-control" name="name" id="fname" placeholder="Nom de l'évènement" value="{{ $event->name }}">
											    <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                                            </div>
										            <div class="form-group col-sm-12 col-lg-12">
                                             <label for="exampleFormControlSelect2">Liste des catégories</label>
                                             <select class="form-control" id="exampleFormControlSelect2" name="categorie_id">
												         @foreach($categories as $categorie)
										                <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                             @endforeach
                                             </select>
                                           </div>
                                           <div class="form-group col-sm-12 col-lg-12">
                                             <label for="exampleFormControlSelect2">Liste des pays</label>
                                             <select class="form-control contrie" id="" name="contrie_id">
                                             <option value="">séléctionner un pay</option>
												@foreach($contries as $contrie)
										         <option value="{{ $contrie->id }}">{{ $contrie->name }}</option>
                                                @endforeach
                                             </select>
                                          </div>
                                           <div class="form-group col-sm-12 col-lg-12">
                                             <label for="exampleFormControlSelect2">Liste des clubs</label>
                                             <select class="form-control clubs" id="" name="club_id">
                                                 @if($event->club_id!=null)
                                                 <option value="{{ $event->club_id}}">{{ $event->club->name }}</option>
                                                 @else
                                               <option value="">séléctionner un club</option>
                                                 @endif
                                             </select>
                                           </div>
                                           <div class="form-group col-sm-12 col-lg-12">
                                             <label for="exampleFormControlSelect2">Liste des coachs</label>
                                             <select class="form-control coachs" id="" name="user_id">
                                                 @if($event->user_id!=null)
                                                 <option value="{{ $event->user_id}}">{{ $event->user->name }}</option>
                                                 @else
                                               <option value="">séléctionner un club</option>
                                                 @endif
                                             </select>
                                           </div>
                                           <div class="form-group col-sm-12 col-lg-12">
                                             <label for="exampleFormControlSelect2">Niveau</label>
                                             <select class="form-control" id="exampleFormControlSelect2" name="niveau">
                                                 <option value="{{ $event->nivau }}">{{ $event->nivau }}</option>
										         <option value="débutant">débutant</option>
                                                 <option value="moyen">moyen</option>
                                                 <option value="avancé">avancé</option>
                                             </select>
                                           </div>
                                           <div class="form-group col-sm-12 col-lg-12">
                                             <label for="fname">Description</label>
                                             <textarea class="form-control" name="description" id="fname" >{{ $event->description }}</textarea>
											            <span class="text-danger">@error('description'){{ $message }} @enderror</span>
                                           </div>
                                          <div class="form-group col-sm-12 col-lg-12">
                                             <label for="fname">Date de l'évènement</label>
                                             <input type="date" class="form-control" name="date" id="fname" value="{{ $event->date }}">
											            <span class="text-danger">@error('date'){{ $message }} @enderror</span>
                                          </div>
                                          <div class="form-group col-sm-12 col-lg-12">
                                             <label for="fname">Heure de l'évènement</label>
                                             <input type="time" class="form-control" name="time" id="fname" value="{{ $event->time }}">
											            <span class="text-danger">@error('time'){{ $message }} @enderror</span>
                                          </div>
                                          <div class="form-group col-sm-12 col-lg-12">
                                             <label for="fname">Endroit</label>
                                             <input type="text" class="form-control" name="place" id="fname" placeholder="Bizeret" value="{{ $event->place }}" >
											            <span class="text-danger">@error('place'){{ $message }} @enderror</span>
                                          </div>
                                          <div class="form-group col-sm-6 col-lg-6">
                                             <label for="fname">Latitude</label>
                                             <input type="number" class="form-control" name="lat" id="fname" placeholder="37.2811363" step="any" value="{{ $event->lat }}">
											           <span class="text-danger">@error('lat'){{ $message }} @enderror</span>
                                          </div>
                                          <div class="form-group col-sm-6 col-lg-6">
                                             <label for="fname">Longitude</label>
                                             <input type="number" class="form-control" name="lang" id="fname" placeholder="9.8264848" step="any" value="{{ $event->lang }}">
											           <span class="text-danger">@error('lang'){{ $message }} @enderror</span>
                                          </div>
                                          <div class="form-group col-sm-12 col-lg-12">
                                             <label for="fname">kilometrage</label>
                                             <input type="number" class="form-control" name="kilometrage" id="fname" placeholder="4km" value="{{ $event->kilometrage }}">
											            <span class="text-danger">@error('kilometrage'){{ $message }} @enderror</span>
                                          </div>
                                          <div class="form-group col-sm-12 col-lg-12">
                                            <div class="custom-file">
                                               <input type="file" class="custom-file-input" id="evt_image" name="image">
                                               <label class="custom-file-label" for="customFile">Chosire une image (png,jpg,jpeg)</label>
                                               <input type="hidden" name="imageUpdate" value="{{ $event->image }}"/>
                                             </div>
                                             <span class="text-danger">@error('imageUpdate'){{ $message }} @enderror</span>
                                          </div>
                                          <div class="row justify-content-center">
                                             @if($event->image == null)
                                               <img src="{{ url('/') }}/soft/images/placeholder.png" id="evt-img-tag" width="200px"/>
                                             @else
                                                <img src="{{url('/')}}/{{$event->image}}" id="evt-img-tag" width="200px"/>
                                             @endif
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
