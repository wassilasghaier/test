@extends('admin.index')
@section('content')
            <div class="container-fluid"> 
                <div class="row">
	               <div class="col-lg-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Liste des demandes d'adhésion</h4>
                           </div>
                           <div class="iq-card-header-toolbar d-flex align-items-center">
						   <span class="table-add float-right mb-3 mr-2">
                           </span>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div class="table-responsive">
						            <table class="table mb-0 table-borderless">
                                 <thead>
                                    <tr>
									   <th scope="col">Prénom</th>
                                       <th scope="col">Nom</th>
                                       <th scope="col">Uuid</th>
                                       <th scope="col">Télèphone</th>
                                       <th scope="col">Cin</th>
                                       <th scope="col">Club</th>
                                       <th scope="col">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
								    @foreach ($demandes as $demande)
                                 <tr>
                                    <td>{{$loop->index + 1 }}</td>
                                    <td>{{$demande->firstname}}</td>
                                    <td>{{$demande->lastname}}</td>
                                    @if($demande->uuid != null)
                                    <td>{{$demande->uuid}}</td>
                                    @else
                                    <td>---</td>
                                    @endif
                                    <td>{{$demande->phone}}</td>
                                    <td>{{$demande->cin}}</td>
                                    <td>{{$demande->club->name}}</td>
                                    <td>
                                       <div class="flex align-items-center list-user-action">
                                        <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{url('/admin/demandes/'.$demande->id.'/affect')}}" ><i class="ri-pencil-line"></i></a>
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

				