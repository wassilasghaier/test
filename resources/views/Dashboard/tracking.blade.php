@extends('layouts.master')

@section('content')
<div id="content-page" class="content-page">
    <div class="container-fluid map-main-content">
       <div class="row">
          <div class="col-lg-4">
             <div class="iq-card ">
                <div class="iq-card-body">
                   <div class="row align-items-center">
                      <div class="col-lg-6 text-center">
                         <img src="{{asset("assets/images/page-img/scoter.png") }}" alt="scoter.png" class="img-fluid dash-tracking-icon">
                      </div>
                      <div class="col-lg-6">
                         <h3 class="mb-0">Scooter<small class="d-block font-size-16 text-secondary">Total 652</small></h3>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-lg-4">
             <div class="iq-card ">
                <div class="iq-card-body">
                   <div class="row align-items-center">
                      <div class="col-lg-6 text-center">
                         <img src={{asset("assets/images/page-img/car.png")}} alt="car.png" class="img-fluid dash-tracking-icon">
                      </div>
                      <div class="col-lg-6">
                         <h3 class="mb-0">Car<small class="d-block font-size-16 text-secondary">Total 129</small></h3>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-lg-4">
             <div class="iq-card ">
                <div class="iq-card-body" >
                   <div class="row align-items-center">
                      <div class="col-lg-6 text-center">
                         <img src={{asset("assets/images/page-img/truck.png")}} alt="truck.png" class="img-fluid dash-tracking-icon transformX-min-1">
                      </div>
                      <div class="col-lg-6">
                         <h3 class="mb-0">Truck<small class="d-block font-size-16 text-secondary">Total 2459</small></h3>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <div class="row">
          <div class="col-lg-12">
             <div id="map" class="full-map"></div>
          </div>
       </div>
       <div class="row row-eq-height mt-4 track-row">
          <!-- Content Top Banner Start -->
          <div class="col-lg-12">
             <div class="iq-card">
                <div class="card-body">
                   <div class="row">
                      <div class="col-lg-12 d-flex justify-content-md-between">
                         <div>
                            <div class="btn-group ml-2 bg-white" role="group" aria-label="Basic example">
                               <button type="button" class="btn btn-outline-primary active px-5">All</button>
                               <button type="button" class="btn btn-outline-primary px-4">On Time</button>
                               <button type="button" class="btn btn-outline-primary px-4">Delayed</button>
                            </div>
                         </div>
                         <div >
                            <input type="text" class="form-control" placeholder="Search">
                         </div>
                      </div>
                   </div>
                   <div class="row">
                      <div class="col-lg-12 mt-4 track">
                         <div class="iq-card map-profile-card shadow-none">
                            <div class="iq-card-body">
                               <div class="media mb-3">
                                  <img class="avatar-40 rounded-circle" src={{asset("assets/images/user/1.jpg")}} alt="">
                                  <div class="media-body ml-3">
                                     <h5 class="mb-0"><b>D-NO-1</b></h5>
                                     <p class="badge badge-primary font-weight-normal mb-0">ON TIME</p>
                                  </div>
                               </div>
                               <div class="media mb-3">
                                  <img class="avatar-30 align-self-start" src={{asset("assets/images/page-img/tag_blue.svg")}} alt="">
                                  <div class="media-body ml-3">
                                     <h6 class="mb-0">Flipkart</h6>
                                     <p class="mb-0"><small>10 Items</small></p>
                                  </div>
                               </div>
                               <div class="media mb-3">
                                  <img class="avatar-30 align-self-start" src={{asset("assets/images/page-img/tag_red.svg")}} alt="">
                                  <div class="media-body ml-3">
                                     <h6 class="mb-0">Zomato</h6>
                                     <p class="mb-0"><small>2 Items</small></p>
                                  </div>
                               </div>
                               <div class="media mb-3">
                                  <img class="avatar-30" src={{asset("assets/images/page-img/man.svg")}} alt="">
                                  <div class="media-body ml-3 align-self-center">
                                     <h6 class="mb-0 text-primary">Warehouse</h6>
                                  </div>
                               </div>
                               <div class="media">
                                  <i class="ri-time-line font-size-24"></i>
                                  <div class="media-body ml-3 align-self-center">
                                     <h6 class="mb-0">Delivered in <b class="text-danger">2HR</b></h6>
                                  </div>
                               </div>
                            </div>
                         </div>
                         <div class="iq-card map-profile-card">
                            <div class="iq-card-body">
                               <div class="row">
                                  <div class="col-5">
                                     <div class="media mb-3">
                                        <img class="avatar-40 rounded-circle" src={{asset("assets/images/user/1.jpg")}} alt="">
                                        <div class="media-body ml-3">
                                           <h5 class="mb-0"><b>D-NO-1</b></h5>
                                           <p class="badge badge-primary font-weight-normal mb-0">ON TIME</p>
                                        </div>
                                     </div>
                                     <div class="media mb-3">
                                        <img class="avatar-30 align-self-start" src={{asset("assets/images/page-img/tag_blue.svg")}} alt="">
                                        <div class="media-body ml-3">
                                           <h6 class="mb-0">Flipkart</h6>
                                           <p class="mb-0"><small>10 Items</small></p>
                                        </div>
                                     </div>
                                     <div class="media mb-3">
                                        <img class="avatar-30 align-self-start" src={{asset("assets/images/page-img/tag_red.svg")}} alt="">
                                        <div class="media-body ml-3">
                                           <h6 class="mb-0">Zomato</h6>
                                           <p class="mb-0"><small>2 Items</small></p>
                                        </div>
                                     </div>
                                     <div class="media mb-3">
                                        <img class="avatar-30" src={{asset("assets/images/page-img/man.svg")}} alt="">
                                        <div class="media-body ml-3 align-self-center">
                                           <h6 class="mb-0 text-primary">Warehouse</h6>
                                        </div>
                                     </div>
                                     <div class="media">
                                        <i class="ri-time-line font-size-24"></i>
                                        <div class="media-body ml-3 align-self-center">
                                           <h6 class="mb-0">Delivered in <b class="text-danger">2HR</b></h6>
                                        </div>
                                     </div>
                                  </div>
                                  <div class="col-7 border-left">
                                     <h5 class="mb-0">Product delivered by John</h5>
                                     <table>
                                        <tr>
                                           <td >
                                              <div class="media mt-4">
                                                 <div class="media-body">
                                                    <h6 class="mb-0">Order 23578</h6>
                                                    <p class="mb-0">Iphone 64GB by Amazon</p>
                                                 </div>
                                              </div>
                                           </td>
                                           <td  class="pl-3">
                                              <p class="mb-0">07:55</p>
                                           </td>
                                           <td class="pl-3">
                                              <span class="text-success">Delivared</span>
                                           </td>
                                        </tr>
                                        <tr>
                                           <td >
                                              <div class="media mt-3">
                                                 <div class="media-body">
                                                    <h6 class="mb-0">Order 23578</h6>
                                                    <p class="mb-0 line-height">Pizza hut cheese burst regular by swiggy</p>
                                                 </div>
                                              </div>
                                           </td>
                                           <td  class="pl-3">
                                              <p class="mb-0">07:55</p>
                                           </td>
                                           <td class="pl-3">
                                              <span class="text-danger">Return</span>
                                           </td>
                                        </tr>
                                        <tr>
                                           <td >
                                              <div class="media mt-3">
                                                 <div class="media-body">
                                                    <h6 class="mb-0">Order 23578</h6>
                                                    <p class="mb-0 line-height">Thunder Ice Creem by swiggy</p>
                                                 </div>
                                              </div>
                                           </td>
                                           <td  class="pl-3">
                                              <p class="mb-0">07:55</p>
                                           </td>
                                           <td class="pl-3">
                                              <span class="text-warning">Pending</span>
                                           </td>
                                        </tr>
                                     </table>
                                  </div>
                               </div>
                            </div>
                         </div>
                         <div class="iq-card map-profile-card shadow-none">
                            <div class="iq-card-body">
                               <div class="media mb-3">
                                  <div class="">
                                     <img class="avatar-40 rounded-circle" src={{asset("assets/images/user/1.jpg")}} alt="">
                                  </div>
                                  <div class="media-body ml-3">
                                     <h5 class="mb-0"><b>D-NO-3</b></h5>
                                     <p class="badge badge-danger font-weight-normal mb-0">Delayed</p>
                                  </div>
                               </div>
                               <div class="media mb-3">
                                  <img class="avatar-30 align-self-start" src={{asset("assets/images/page-img/tag_blue.svg")}} alt="">
                                  <div class="media-body ml-3">
                                     <h6 class="mb-0">Flipkart</h6>
                                     <p class="mb-0"><small>10 Items</small></p>
                                  </div>
                               </div>
                               <div class="media mb-3">
                                  <img class="avatar-30 align-self-start" src={{asset("assets/images/page-img/tag_red.svg")}} alt="">
                                  <div class="media-body ml-3">
                                     <h6 class="mb-0">Zomato</h6>
                                     <p class="mb-0"><small>2 Items</small></p>
                                  </div>
                               </div>
                               <div class="media mb-3">
                                  <img class="avatar-30" src={{asset("assets/images/page-img/man.svg")}} alt="">
                                  <div class="media-body ml-3 align-self-center">
                                     <h6 class="mb-0 text-primary">Warehouse</h6>
                                  </div>
                               </div>
                               <div class="media">
                                  <i class="ri-time-line font-size-24"></i>
                                  <div class="media-body ml-3 align-self-center">
                                     <h6 class="mb-0">Delivered in <b class="text-danger">2HR</b></h6>
                                  </div>
                               </div>
                            </div>
                         </div>
                         <div class="iq-card map-profile-card shadow-none">
                            <div class="iq-card-body">
                               <div class="media mb-3">
                                  <div class="">
                                     <img class="avatar-40 rounded-circle" src={{asset("assets/images/user/1.jpg")}} alt="">
                                  </div>
                                  <div class="media-body ml-3">
                                     <h5 class="mb-0"><b>D-NO-4</b></h5>
                                     <p class="badge badge-primary font-weight-normal mb-0">ON TIME</p>
                                  </div>
                               </div>
                               <div class="media mb-3">
                                  <img class="avatar-30 align-self-start" src={{asset("assets/images/page-img/tag_blue.svg")}} alt="">
                                  <div class="media-body ml-3">
                                     <h6 class="mb-0">Flipkart</h6>
                                     <p class="mb-0"><small>10 Items</small></p>
                                  </div>
                               </div>
                               <div class="media mb-3">
                                  <img class="avatar-30 align-self-start" src={{asset("assets/images/page-img/tag_red.svg")}} alt="">
                                  <div class="media-body ml-3">
                                     <h6 class="mb-0">Zomato</h6>
                                     <p class="mb-0"><small>2 Items</small></p>
                                  </div>
                               </div>
                               <div class="media mb-3">
                                  <img class="avatar-30" src={{asset("assets/images/page-img/man.svg")}} alt="">
                                  <div class="media-body ml-3 align-self-center">
                                     <h6 class="mb-0 text-primary">Warehouse</h6>
                                  </div>
                               </div>
                               <div class="media">
                                  <i class="ri-time-line font-size-24"></i>
                                  <div class="media-body ml-3 align-self-center">
                                     <h6 class="mb-0">Delivered in <b class="text-danger">2HR</b></h6>
                                  </div>
                               </div>
                            </div>
                         </div>
                         <div class="iq-card map-profile-card shadow-none">
                            <div class="iq-card-body">
                               <div class="media mb-3">
                                  <div class="">
                                     <img class="avatar-40 rounded-circle" src={{asset("assets/images/user/1.jpg")}} alt="">
                                  </div>
                                  <div class="media-body ml-3">
                                     <h5 class="mb-0"><b>D-NO-5</b></h5>
                                     <p class="badge badge-danger font-weight-normal mb-0">Delayed</p>
                                  </div>
                               </div>
                               <div class="media mb-3">
                                  <img class="avatar-30 align-self-start" src={{asset("assets/images/page-img/tag_blue.svg")}} alt="">
                                  <div class="media-body ml-3">
                                     <h6 class="mb-0">Flipkart</h6>
                                     <p class="mb-0"><small>10 Items</small></p>
                                  </div>
                               </div>
                               <div class="media mb-3">
                                  <img class="avatar-30 align-self-start" src={{asset("assets/images/page-img/tag_red.svg")}} alt="">
                                  <div class="media-body ml-3">
                                     <h6 class="mb-0">Zomato</h6>
                                     <p class="mb-0"><small>2 Items</small></p>
                                  </div>
                               </div>
                               <div class="media mb-3">
                                  <img class="avatar-30" src={{asset("assets/images/page-img/man.svg")}} alt="">
                                  <div class="media-body ml-3 align-self-center">
                                     <h6 class="mb-0 text-primary">Warehouse</h6>
                                  </div>
                               </div>
                               <div class="media">
                                  <i class="ri-time-line font-size-24"></i>
                                  <div class="media-body ml-3 align-self-center">
                                     <h6 class="mb-0">Delivered in <b class="text-danger">2HR</b></h6>
                                  </div>
                               </div>
                            </div>
                         </div>
                         <div class="iq-card map-profile-card shadow-none">
                            <div class="iq-card-body">
                               <div class="media mb-3">
                                  <div class="">
                                     <img class="avatar-40 rounded-circle" src={{asset("assets/images/user/1.jpg")}} alt="">
                                  </div>
                                  <div class="media-body ml-3">
                                     <h5 class="mb-0"><b>D-NO-6</b></h5>
                                     <p class="badge badge-primary font-weight-normal mb-0">ON TIME</p>
                                  </div>
                               </div>
                               <div class="media mb-3">
                                  <img class="avatar-30 align-self-start" src={{asset("assets/images/page-img/tag_blue.svg")}} alt="">
                                  <div class="media-body ml-3">
                                     <h6 class="mb-0">Flipkart</h6>
                                     <p class="mb-0"><small>10 Items</small></p>
                                  </div>
                               </div>
                               <div class="media mb-3">
                                  <img class="avatar-30 align-self-start" src={{asset("assets/images/page-img/tag_red.svg")}} alt="">
                                  <div class="media-body ml-3">
                                     <h6 class="mb-0">Zomato</h6>
                                     <p class="mb-0"><small>2 Items</small></p>
                                  </div>
                               </div>
                               <div class="media mb-3">
                                  <img class="avatar-30" src={{asset("assets/images/page-img/man.svg")}} alt="">
                                  <div class="media-body ml-3 align-self-center">
                                     <h6 class="mb-0 text-primary">Warehouse</h6>
                                  </div>
                               </div>
                               <div class="media">
                                  <i class="ri-time-line font-size-24"></i>
                                  <div class="media-body ml-3 align-self-center">
                                     <h6 class="mb-0">Delivered in <b class="text-danger">2HR</b></h6>
                                  </div>
                               </div>
                            </div>
                         </div>
                         <div class="iq-card map-profile-card shadow-none">
                            <div class="iq-card-body">
                               <div class="media mb-3">
                                  <div class="">
                                     <img class="avatar-40 rounded-circle" src={{asset("assets/images/user/1.jpg")}} alt="">
                                  </div>
                                  <div class="media-body ml-3">
                                     <h5 class="mb-0"><b>D-NO-7</b></h5>
                                     <p class="badge badge-primary font-weight-normal mb-0">ON TIME</p>
                                  </div>
                               </div>
                               <div class="media mb-3">
                                  <img class="avatar-30 align-self-start" src={{asset("assets/images/page-img/tag_blue.svg")}} alt="">
                                  <div class="media-body ml-3">
                                     <h6 class="mb-0">Flipkart</h6>
                                     <p class="mb-0"><small>10 Items</small></p>
                                  </div>
                               </div>
                               <div class="media mb-3">
                                  <img class="avatar-30 align-self-start" src={{asset("assets/images/page-img/tag_red.svg")}} alt="">
                                  <div class="media-body ml-3">
                                     <h6 class="mb-0">Zomato</h6>
                                     <p class="mb-0"><small>2 Items</small></p>
                                  </div>
                               </div>
                               <div class="media mb-3">
                                  <img class="avatar-30" src={{asset("assets/images/page-img/man.svg")}} alt="">
                                  <div class="media-body ml-3 align-self-center">
                                     <h6 class="mb-0 text-primary">Warehouse</h6>
                                  </div>
                               </div>
                               <div class="media">
                                  <i class="ri-time-line font-size-24"></i>
                                  <div class="media-body ml-3 align-self-center">
                                     <h6 class="mb-0">Delivered in <b class="text-danger">2HR</b></h6>
                                  </div>
                               </div>
                            </div>
                         </div>
                         <div class="iq-card map-profile-card shadow-none">
                            <div class="iq-card-body">
                               <div class="media mb-3">
                                  <div class="">
                                     <img class="avatar-40 rounded-circle" src={{asset("assets/images/user/1.jpg")}} alt="">
                                  </div>
                                  <div class="media-body ml-3">
                                     <h5 class="mb-0"><b>D-NO-8</b></h5>
                                     <p class="badge badge-primary font-weight-normal mb-0">ON TIME</p>
                                  </div>
                               </div>
                               <div class="media mb-3">
                                  <img class="avatar-30 align-self-start" src={{asset("assets/images/page-img/tag_blue.svg")}} alt="">
                                  <div class="media-body ml-3">
                                     <h6 class="mb-0">Flipkart</h6>
                                     <p class="mb-0"><small>10 Items</small></p>
                                  </div>
                               </div>
                               <div class="media mb-3">
                                  <img class="avatar-30 align-self-start" src={{asset("assets/images/page-img/tag_red.svg")}} alt="">
                                  <div class="media-body ml-3">
                                     <h6 class="mb-0">Zomato</h6>
                                     <p class="mb-0"><small>2 Items</small></p>
                                  </div>
                               </div>
                               <div class="media mb-3">
                                  <img class="avatar-30" src={{asset("assets/images/page-img/man.svg")}} alt="">
                                  <div class="media-body ml-3 align-self-center">
                                     <h6 class="mb-0 text-primary">Warehouse</h6>
                                  </div>
                               </div>
                               <div class="media">
                                  <i class="ri-time-line font-size-24"></i>
                                  <div class="media-body ml-3 align-self-center">
                                     <h6 class="mb-0">Delivered in <b class="text-danger">2HR</b></h6>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-lg-8">
             <div class="row">
                <div class="col-lg-6">
                   <div class="iq-card wow fadeInUp" data-wow-delay="0.8s">
                      <div class="iq-card-header d-flex justify-content-between">
                         <div class="iq-header-title">
                            <h4 class="card-title">Active Users</h4>
                         </div>
                         <div class="iq-card-header-toolbar d-flex align-items-center">
                            <div class="dropdown">
                               <span class="dropdown-toggle text-primary" id="dropdownMenuButton3" data-toggle="dropdown">
                               <i class="ri-more-2-fill"></i>
                               </span>
                               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton3">
                                  <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                  <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                  <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                  <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                  <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="iq-card-body">
                         <div class="row">
                            <div class="col-lg-12">
                               <div class="iq-details">
                                  <span class="title text-dark">New Customers</span>
                                  <div class="percentage float-right text-primary">85 <span>%</span></div>
                                  <div class="iq-progress-bar-linear d-inline-block w-100">
                                     <div class="iq-progress-bar">
                                        <span class="bg-primary" data-percent="85"></span>
                                     </div>
                                  </div>
                               </div>
                               <div class="iq-details mt-4">
                                  <span class="title text-dark">New Customers</span>
                                  <div class="percentage float-right text-warning">85 <span>%</span></div>
                                  <div class="iq-progress-bar-linear d-inline-block w-100">
                                     <div class="iq-progress-bar">
                                        <span class="bg-warning" data-percent="85"></span>
                                     </div>
                                  </div>
                               </div>
                               <div class="iq-details mt-4">
                                  <span class="title text-dark">New Customers</span>
                                  <div class="percentage float-right text-success">85 <span>%</span></div>
                                  <div class="iq-progress-bar-linear d-inline-block w-100">
                                     <div class="iq-progress-bar">
                                        <span class="bg-success" data-percent="85"></span>
                                     </div>
                                  </div>
                               </div>
                               <div class="iq-details mt-4">
                                  <span class="title text-dark">New Customers</span>
                                  <div class="percentage float-right text-danger">85 <span>%</span></div>
                                  <div class="iq-progress-bar-linear d-inline-block w-100">
                                     <div class="iq-progress-bar">
                                        <span class="bg-danger" data-percent="85"></span>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div id="chart-8"></div>
                   </div>
                </div>
                <div class="col-lg-6">
                   <div class="iq-card ">
                      <div class="iq-card-header d-flex justify-content-between">
                         <div class="iq-header-title">
                            <h4 class="card-title">Customer Satisfactions</h4>
                         </div>
                      </div>
                      <div class="iq-card-body">
                         <h2>3,897<span class="text-success font-size-14 ml-3 mr-3"><i class="ri-arrow-up-fill mr-2"></i>+3.3%</span><small class="text-secondary font-size-14">Generated by clients</small>
                         </h2>
                         <div class="progress mt-3">
                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="40"
                               aria-valuemin="0" aria-valuemax="100" style="width:40%">
                            </div>
                            <div class="progress-bar bg-blue" role="progressbar" aria-valuenow="20"
                               aria-valuemin="0" aria-valuemax="100" style="width:20%">
                            </div>
                            <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="10"
                               aria-valuemin="0" aria-valuemax="100" style="width:10%">
                            </div>
                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="40"
                               aria-valuemin="0" aria-valuemax="100" style="width:40%">
                            </div>
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="20"
                               aria-valuemin="0" aria-valuemax="100" style="width:20%">
                            </div>
                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="10"
                               aria-valuemin="0" aria-valuemax="100" style="width:10%">
                            </div>
                         </div>
                         <div class="table-responsive mt-4">
                            <table class="table mb-0 table-borderless">
                               <tbody>
                                  <tr>
                                     <td>
                                        <div class="iq-profile-avatar status-online mt-4"> </div>
                                     </td>
                                     <td>
                                        <h4>Excellent</h4>
                                     </td>
                                     <td><span class="text-muted">2400</span></td>
                                     <td>60%</td>
                                  </tr>
                                  <tr>
                                     <td>
                                        <div class="iq-profile-avatar status-blue mt-4"> </div>
                                     </td>
                                     <td>
                                        <h4>Very Good</h4>
                                     </td>
                                     <td><span class="text-muted">1200</span></td>
                                     <td>30%</td>
                                  </tr>
                                  <tr>
                                     <td>
                                        <div class="iq-profile-avatar status-primary mt-4"> </div>
                                     </td>
                                     <td>
                                        <h4>Good</h4>
                                     </td>
                                     <td><span class="text-muted">240</span></td>
                                     <td>6%</td>
                                  </tr>
                                  <tr>
                                     <td>
                                        <div class="iq-profile-avatar status-info mt-4"> </div>
                                     </td>
                                     <td>
                                        <h4>Fair</h4>
                                     </td>
                                     <td><span class="text-muted">80</span></td>
                                     <td>2%</td>
                                  </tr>
                                  <tr>
                                     <td>
                                        <div class="iq-profile-avatar status-away mt-4"> </div>
                                     </td>
                                     <td>
                                        <h4>Poor</h4>
                                     </td>
                                     <td><span class="text-muted">40</span></td>
                                     <td>1%</td>
                                  </tr>
                                  <tr>
                                     <td>
                                        <div class="iq-profile-avatar status-danger mt-4"> </div>
                                     </td>
                                     <td>
                                        <h4>Very Poor</h4>
                                     </td>
                                     <td><span class="text-muted">40</span></td>
                                     <td>1%</td>
                                  </tr>
                               </tbody>
                            </table>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="col-lg-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Delivery History</h4>
                        </div>
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                           <div class="dropdown">
                              <span class="dropdown-toggle text-primary" id="dropdownMenuButton5" data-toggle="dropdown">
                              <i class="ri-more-2-fill"></i>
                              </span>
                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                 <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                 <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                 <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                 <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                 <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="table-responsive">
                           <table class="table mb-0 table-borderless">
                              <thead>
                                 <tr>
                                    <th scope="col">Delivery No.</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Delivery</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Progress</th>

                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td>#0879985</td>
                                    <td>26/12/2019</td>
                                    <td>30/12/2019</td>
                                    <td>
                                       <div class="badge badge-pill badge-success">Moving</div>
                                    </td>
                                    <td>Victoria 8007 Australia</td>
                                    <td>
                                       <div class="iq-progress-bar">
                                          <span class="bg-success" data-percent="90"></span>
                                       </div>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>#0879984</td>
                                    <td>23/12/2019</td>
                                    <td>27/12/2019</td>
                                    <td>
                                       <div class="badge badge-pill badge-warning text-white">Pending</div>
                                    </td>
                                    <td>Athens 2745 Greece</td>
                                    <td>
                                       <div class="iq-progress-bar">
                                          <span class="bg-warning" data-percent="70"></span>
                                       </div>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>#0879983</td>
                                    <td>18/12/2019</td>
                                    <td>21/12/2019</td>
                                    <td>
                                       <div class="badge badge-pill badge-danger">Canceled</div>
                                    </td>
                                    <td>Victoria 8007 Australia</td>
                                    <td>
                                       <div class="iq-progress-bar">
                                          <span class="bg-danger" data-percent="48"></span>
                                       </div>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>#0879982</td>
                                    <td>14/12/2019</td>
                                    <td>20/12/2019</td>
                                    <td>
                                       <div class="badge badge-pill badge-info">Working</div>
                                    </td>
                                    <td>Delhi 0014 India</td>
                                    <td>
                                       <div class="iq-progress-bar">
                                          <span class="bg-info" data-percent="90"></span>
                                       </div>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>#0879981</td>
                                    <td>10/12/2019</td>
                                    <td>18/12/2019</td>
                                    <td>
                                       <div class="badge badge-pill badge-success">Moving</div>
                                    </td>
                                    <td>Alabama 2741 USA</td>
                                    <td>
                                       <div class="iq-progress-bar">
                                          <span class="bg-success" data-percent="45"></span>
                                       </div>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>#0879985</td>
                                    <td>26/12/2019</td>
                                    <td>30/12/2019</td>
                                    <td>
                                       <div class="badge badge-pill badge-success">Moving</div>
                                    </td>
                                    <td>Victoria 8007 Australia</td>
                                    <td>
                                       <div class="iq-progress-bar">
                                          <span class="bg-success" data-percent="90"></span>
                                       </div>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>#0879984</td>
                                    <td>23/12/2019</td>
                                    <td>27/12/2019</td>
                                    <td>
                                       <div class="badge badge-pill badge-warning text-white">Pending</div>
                                    </td>
                                    <td>Athens 2745 Greece</td>
                                    <td>
                                       <div class="iq-progress-bar">
                                          <span class="bg-warning" data-percent="70"></span>
                                       </div>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>#0879983</td>
                                    <td>18/12/2019</td>
                                    <td>21/12/2019</td>
                                    <td>
                                       <div class="badge badge-pill badge-danger">Canceled</div>
                                    </td>
                                    <td>Victoria 8007 Australia</td>
                                    <td>
                                       <div class="iq-progress-bar">
                                          <span class="bg-danger" data-percent="48"></span>
                                       </div>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>#0879982</td>
                                    <td>14/12/2019</td>
                                    <td>20/12/2019</td>
                                    <td>
                                       <div class="badge badge-pill badge-info">Working</div>
                                    </td>
                                    <td>Delhi 0014 India</td>
                                    <td>
                                       <div class="iq-progress-bar">
                                          <span class="bg-info" data-percent="90"></span>
                                       </div>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>#0879981</td>
                                    <td>10/12/2019</td>
                                    <td>18/12/2019</td>
                                    <td>
                                       <div class="badge badge-pill badge-success">Moving</div>
                                    </td>
                                    <td>Alabama 2741 USA</td>
                                    <td>
                                       <div class="iq-progress-bar">
                                          <span class="bg-success" data-percent="45"></span>
                                       </div>
                                    </td>
                                 </tr>

                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>

                </div>
             </div>
          </div>
          <div class="col-lg-4">
             <div class="iq-card ">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title">Tasks</h4>
                   </div>
                   <div class="iq-card-header-toolbar d-flex align-items-center">
                      <ul class="nav nav-pills" id="myTab" role="tablist">
                         <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
                         </li>
                         <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                         </li>
                         <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                         </li>
                      </ul>
                   </div>
                </div>
                <div class="iq-card-body">
                   <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                         <div class="d-flex tasks-card" role="alert">
                            <div class="custom-control custom-checkbox">
                               <input type="checkbox" class="custom-control-input" id="customCheck11">
                               <label class="custom-control-label" for="customCheck11">You should check in some of below.</label>
                            </div>
                            <button type="button" class="close ml-auto" data-dismiss="alert" aria-label="Close">
                            <i class="ri-close-line"></i>
                            </button>
                         </div>
                         <div class="d-flex tasks-card" role="alert">
                            <div class="custom-control custom-checkbox">
                               <input type="checkbox" class="custom-control-input" id="customCheck10">
                               <label class="custom-control-label" for="customCheck10">Get the address of customer</label>
                            </div>
                            <button type="button" class="close ml-auto" data-dismiss="alert" aria-label="Close">
                            <i class="ri-close-line"></i>
                            </button>
                         </div>
                         <div class="d-flex tasks-card" role="alert">
                            <div class="custom-control custom-checkbox">
                               <input type="checkbox" class="custom-control-input" id="customCheck12">
                               <label class="custom-control-label" for="customCheck12">Contact Vendor for parcel</label>
                            </div>
                            <button type="button" class="close ml-auto" data-dismiss="alert" aria-label="Close">
                            <i class="ri-close-line"></i>
                            </button>
                         </div>
                         <div class="d-flex tasks-card" role="alert">
                            <div class="custom-control custom-checkbox">
                               <input type="checkbox" class="custom-control-input" id="customCheck13">
                               <label class="custom-control-label" for="customCheck13">Refule delivery truck</label>
                            </div>
                            <button type="button" class="close ml-auto" data-dismiss="alert" aria-label="Close">
                            <i class="ri-close-line"></i>
                            </button>
                         </div>
                         <div class="d-flex tasks-card" role="alert">
                            <div class="custom-control custom-checkbox">
                               <input type="checkbox" class="custom-control-input" id="customCheck14">
                               <label class="custom-control-label" for="customCheck14">Pick up for order no. 334</label>
                            </div>
                            <button type="button" class="close ml-auto" data-dismiss="alert" aria-label="Close">
                            <i class="ri-close-line"></i>
                            </button>
                         </div>
                         <div class="d-flex tasks-card" role="alert">
                            <div class="custom-control custom-checkbox">
                               <input type="checkbox" class="custom-control-input" id="customCheck15">
                               <label class="custom-control-label" for="customCheck15">Pay taxes for every bill</label>
                            </div>
                            <button type="button" class="close ml-auto" data-dismiss="alert" aria-label="Close">
                            <i class="ri-close-line"></i>
                            </button>
                         </div>
                         <div class="d-flex tasks-card" role="alert">
                            <div class="custom-control custom-checkbox">
                               <input type="checkbox" class="custom-control-input" id="customCheck16">
                               <label class="custom-control-label" for="customCheck16">I am designers & I have no life</label>
                            </div>
                            <button type="button" class="close ml-auto" data-dismiss="alert" aria-label="Close">
                            <i class="ri-close-line"></i>
                            </button>
                         </div>
                         <div class="d-flex tasks-card" role="alert">
                            <div class="custom-control custom-checkbox">
                               <input type="checkbox" class="custom-control-input" id="customCheck17">
                               <label class="custom-control-label" for="customCheck17">This is a good product. Buy it :) </label>
                            </div>
                            <button type="button" class="close ml-auto" data-dismiss="alert" aria-label="Close">
                            <i class="ri-close-line"></i>
                            </button>
                         </div>
                      </div>
                      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                         <div class="d-flex tasks-card" role="alert">
                            <div class="custom-control custom-checkbox">
                               <input type="checkbox" class="custom-control-input" id="customCheck18">
                               <label class="custom-control-label" for="customCheck18">You should check in on some of  below.</label>
                            </div>
                            <button type="button" class="close ml-auto" data-dismiss="alert" aria-label="Close">
                            <i class="ri-close-line"></i>
                            </button>
                         </div>
                         <div class="d-flex tasks-card" role="alert">
                            <div class="custom-control custom-checkbox">
                               <input type="checkbox" class="custom-control-input" id="customCheck19">
                               <label class="custom-control-label" for="customCheck19">You should check in on some of  below.</label>
                            </div>
                            <button type="button" class="close ml-auto" data-dismiss="alert" aria-label="Close">
                            <i class="ri-close-line"></i>
                            </button>
                         </div>
                      </div>
                      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                         <div class="d-flex tasks-card" role="alert">
                            <div class="custom-control custom-checkbox">
                               <input type="checkbox" class="custom-control-input" id="customCheck110">
                               <label class="custom-control-label" for="customCheck110">You should check in on some of  below.</label>
                            </div>
                            <button type="button" class="close ml-auto" data-dismiss="alert" aria-label="Close">
                            <i class="ri-close-line"></i>
                            </button>
                         </div>
                         <div class="d-flex tasks-card" role="alert">
                            <div class="custom-control custom-checkbox">
                               <input type="checkbox" class="custom-control-input" id="customCheck111">
                               <label class="custom-control-label" for="customCheck111">You should check in on some of  below.</label>
                            </div>
                            <button type="button" class="close ml-auto" data-dismiss="alert" aria-label="Close">
                            <i class="ri-close-line"></i>
                            </button>
                         </div>
                         <div class="d-flex tasks-card" role="alert">
                            <div class="custom-control custom-checkbox">
                               <input type="checkbox" class="custom-control-input" id="customCheck112">
                               <label class="custom-control-label" for="customCheck112">You should check in on some of  below.</label>
                            </div>
                            <button type="button" class="close ml-auto" data-dismiss="alert" aria-label="Close">
                            <i class="ri-close-line"></i>
                            </button>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title">Recent Activities</h4>
                   </div>
                   <div class="iq-card-header-toolbar d-flex align-items-center">
                      <div class="dropdown">
                         <span class="dropdown-toggle text-primary" id="dropdownMenuButton2" data-toggle="dropdown">
                         View All
                         </span>
                         <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton2">
                            <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                            <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                            <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                            <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                            <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="iq-card-body">
                   <ul class="iq-timeline">
                      <li>
                         <div class="timeline-dots"></div>
                         <h6 class="float-left mb-1">Client Meeting</h6>
                         <small class="float-right mt-1">19 November 2019</small>
                         <div class="d-inline-block w-100">
                            <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple</p>
                         </div>
                      </li>
                      <li>
                         <div class="timeline-dots border-success"></div>
                         <h6 class="float-left mb-1">Client Meeting</h6>
                         <small class="float-right mt-1">19 November 2019</small>
                         <div class="d-inline-block w-100">
                            <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple</p>
                         </div>
                      </li>
                      <li>
                         <div class="timeline-dots border-danger"></div>
                         <h6 class="float-left mb-1">Client Meeting</h6>
                         <small class="float-right mt-1">19 November 2019</small>
                         <div class="d-inline-block w-100">
                            <p>Bonbon macaroon jelly beans <a href="#">gummi bears</a>gummi bears jelly lollipop apple</p>
                            <div class="iq-media-group">
                               <a href="#" class="iq-media">
                               <img class="img-fluid avatar-40 rounded-circle" src={{asset("assets/images/user/05.jpg")}} alt="">
                               </a>
                               <a href="#" class="iq-media">
                               <img class="img-fluid avatar-40 rounded-circle" src={{asset("assets/images/user/06.jpg")}} alt="">
                               </a>
                               <a href="#" class="iq-media">
                               <img class="img-fluid avatar-40 rounded-circle" src={{asset("assets/images/user/07.jpg")}} alt="">
                               </a>
                               <a href="#" class="iq-media">
                               <img class="img-fluid avatar-40 rounded-circle" src={{asset("assets/images/user/08.jpg")}} alt="">
                               </a>
                               <a href="#" class="iq-media">
                               <img class="img-fluid avatar-40 rounded-circle" src={{asset("assets/images/user/09.jpg")}} alt="">
                               </a>
                               <a href="#" class="iq-media">
                               <img class="img-fluid avatar-40 rounded-circle" src={{asset("assets/images/user/10.jpg")}} alt="">
                               </a>
                            </div>
                         </div>
                      </li>
                      <li>
                         <div class="timeline-dots border-primary"></div>
                         <h6 class="float-left mb-1">Client Meeting</h6>
                         <small class="float-right mt-1">19 November 2019</small>
                         <div class="d-inline-block w-100">
                            <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple</p>
                         </div>
                      </li>
                      <li>
                         <div class="timeline-dots border-warning"></div>
                         <h6 class="float-left mb-1">Client Meeting</h6>
                         <small class="float-right mt-1">19 November 2019</small>
                         <div class="d-inline-block w-100">
                            <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple</p>
                         </div>
                      </li>
                   </ul>
                </div>
             </div>
          </div>
          <!-- Content Top Banner End -->
       </div>
    </div>
 </div>

@endsection
