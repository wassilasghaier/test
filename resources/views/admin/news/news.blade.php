@extends('admin.index')
@section('content')
            <div class="container-fluid"> 
                <div class="row">
	               <div class="col-lg-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Liste des Actualités</h4>
                           </div>
                           <div class="iq-card-header-toolbar d-flex align-items-center">
						   <span class="table-add float-right mb-3 mr-2">
                              <a href="{{url('/admin/news/create')}}" class="btn btn-sm iq-bg-success"><i
                                 class="ri-add-fill"><span class="pl-1">Ajouter Nouveau</span></i>
                               </a>
                           </span>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div class="table-responsive">
						            <table class="table mb-0 table-borderless">
                                 <thead>
                                    <tr>
                                       <th scope="col">No.</th>
									   <th scope="col">Image</th>
                                       <th scope="col">titre</th>
                                       <th scope="col">description</th>
                                       <th scope="col">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
								 @foreach ($news as $new)
                                 <tr>
									
                                    <td>{{$loop->index + 1 }}</td>
                                    <td><img src="{{ url('/') }}/{{$new->image}}" style="width:200px"></td>
                                    <td>{{$new->name}}</td>
                                    <td>{{\Illuminate\Support\Str::limit($new->description, $limit = 10, $end = '...') }}</td>
                                    <td>
                                       <div class="flex align-items-center list-user-action">
                                        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Modifier" href="{{url('/admin/news/'.$new->id.'/edit')}}" ><i class="ri-pencil-line"></i></a>
                                        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Supprimer" href="{{url('/admin/news/delete/'.$new->id)}}"><i class="ri-delete-bin-line"></i></a>
                                       </div>
                                    </td>
                                  </tr>
								 @endforeach
                              </tbody>
                           </div>
                        </div>
                     </div>
                  </div>
	            </div>
            </div>
@endsection

				