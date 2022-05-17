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
                                       <h4 class="card-title">Mettre à jour {{ $page->name }}</h4>
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
                                    <form method="POST" action="{{ url('/admin/pages/'.$page->id) }}" enctype="multipart/form-data">
                                       <input type="hidden" name="_method" value="PUT">
							                  {{ csrf_field() }}
                                            <div class="row justify-content-center">
                                                <div class="form-group col-sm-12 col-lg-12">
                                                    <label for="fname">Titre</label>
                                                     <input type="text" class="form-control" name="name" id="fname" placeholder="Nom" value="{{ $page->name }}" required = "required" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))'>
											                   <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                                                </div>
										            
                                                <div class="form-group col-sm-12 col-lg-12">
                                                   <label for="fname">Description</label>
                                                   <textarea class="form-control" name="description" id="summernote" required = "required">{{ $page->description }}</textarea>
											                  <span class="text-danger">@error('description'){{ $message }} @enderror</span>
                                                </div>
                                                <div class="form-group col-sm-12 col-lg-12">
                                                    <div class="custom-file">
                                                     <input type="file" class="custom-file-input" id="evt_image" name="image">
                                                      <label class="custom-file-label" for="customFile">Chosire une image (png,jpg,jpeg)</label>
                                                    </div>
                                                 <span class="text-danger">@error('image'){{ $message }} @enderror</span>
                                                </div>
                                                <div class="row justify-content-center">
                                                  @if($page->image == null)
                                                    <img src="{{ url('/') }}/soft/images/placeholder.png" id="evt-img-tag" width="200px"/>
                                                  @else
                                                     <img src="{{url('/')}}/{{$page->image}}" id="evt-img-tag" width="200px"/>
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
