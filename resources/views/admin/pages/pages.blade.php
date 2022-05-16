@extends('admin.index')
@section('content')
            <div class="container-fluid"> 
                <div class="row">
	               <div class="col-lg-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Liste des pages</h4>
                           </div>
                           <div class="iq-card-header-toolbar d-flex align-items-center">
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div class="table-responsive">
						            <table class="table mb-0 table-borderless">
                                 <thead>
                                    <tr>
									   <th scope="col">Image</th>
                                       <th scope="col">titre</th>
                                       <th scope="col">description</th>
                                       <th scope="col">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
								 @foreach ($pages as $page)
                                 <tr>
                                    <td><img src="{{ url('/') }}/{{$page->image}}" style="width:200px"></td>
                                    <td>{{$page->name}}</td>
                                    <td>{{\Illuminate\Support\Str::limit($page->description, $limit = 10, $end = '...') }}</td>
                                    <td>
                                       <div class="flex align-items-center list-user-action">
                                        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Modifier" href="{{url('/admin/pages/'.$page->id.'/edit')}}" ><i class="ri-pencil-line"></i></a>
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

				