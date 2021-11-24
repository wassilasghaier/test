@extends('admin.index')

@section('content')
<div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
                  <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Liste Des demmande de paiement</h4>
                           </div>
                        </div>
						@foreach (['danger', 'warning', 'success', 'info'] as $message)
                                       @if(Session::has($message))
                                        <div class="alert alert-{{ $message }}">
							              <p>{{ Session::get($message) }}</p>
							            </div>
                                      @endif
                        @endforeach
                        <div class="iq-card-body">
                         <div id="table" class="table-editable">
                           <table class="table table-bordered table-responsive-md table-striped text-center">
                             <thead>
                               <tr>
							   <th>#</th>
							   <th>Utilisateur</th>
					           <th>pack</th>
                               <th>statut</th>
                               <th>date</th>
                               </tr>
                             </thead>
                             <tbody>
							
							 @foreach ($paiments as $paiment)
				           <tr>
					     <td contenteditable="false">{{$paiment->id}}</td>
					     <td contenteditable="false">{{$paiment->user->name}}</td>
					     <td contenteditable="false">{{$paiment->pack->name}}</td>
                         <td contenteditable="false"><div class="badge badge-pill badge-success text-white">Payer</div></td>
                         <td contenteditable="false">{{$paiment->created_at}}</td>
				       </tr>
                    @endforeach
                             </tbody>
                           </table>
                         </div>                    
                     </div>
                  </div>
            </div>
         </div>
         
      </div>
   </div>
@endsection