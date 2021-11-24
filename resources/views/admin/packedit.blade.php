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
                                       <h4 class="card-title">Modifier Pack</h4>
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
								   <form method="POST" action="{{ url('/admin/packs/'.$pack->id) }}">
                                   <input type="hidden" name="_method" value="PUT">
							       {{ csrf_field() }}
                                       <div class="row justify-content-center">
                                          <div class="form-group col-sm-12 col-lg-12">
                                             <label for="fname">Titre</label>
                                             <input type="text" class="form-control" name="name" id="fname" value = "{{$pack->name}}" required = "required" onkeypress='return ((event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode == 32))'>
											 <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                                          </div>
										  <div class="form-group col-sm-12 col-lg-12">
                                             <label for="fname">Période</label>
                                             <input type="text" class="form-control" id="fname"  name="period" value= "{{$pack->period}}" placeholder="Période" required = "required" onkeypress='return ((event.charCode >= 31) || (event.charCode < 48  || event.charCode > 57))'>
											 <span class="text-danger">@error('period'){{ $message }} @enderror</span>
                                          </div>
										  <div class="form-group col-sm-12 col-lg-12">
                                             <label for="fname">Prix</label>
                                             <input type="text" class="form-control"  id="fname" name="price" placeholder="Prix" value= "{{$pack->price}}" required = "required" onkeypress='return ((event.charCode >= 31) || (event.charCode < 48  || event.charCode > 57))'>
											 <span class="text-danger">@error('price'){{ $message }} @enderror</span>
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
