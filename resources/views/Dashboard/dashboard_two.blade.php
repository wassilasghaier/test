@extends('layouts.master')

@section('content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row row-eq-height">
          <!-- Content Top Banner Start -->
          <div class="col-md-12 col-lg-8">
             <div class="iq-card bg-primary sb-top-banner-card">
                <div class="iq-card-body pt-5 pb-5">
                   <div class="row">
                      <div class="col-md-6 align-self-center">
                         <h2 class="text-white">Congratulations Nik</h2>
                         <p class="text-white">Lorem Ipsum is simply dummy text of the printing and typesetting industry. remaining essentially unchanged.</p>
                         <button type="button" class="btn iq-bg-primary">Read More</button>
                      </div>
                      <div class="col-md-6 position-relative">
                         <div class="an-img-two">
                            <div class="bodymovin" data-bm-path={{asset("assets/images/small/data1.json")}} data-bm-renderer="svg" data-bm-loop="true"></div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-md-12 col-lg-4">
             <div class="iq-card">
                <div class="iq-card-body">
                   <div class="row">
                      <div class="col-lg-12">
                         <span class="text-success float-right">+3.3%<i class="ri-arrow-up-fill"></i></span>
                         <span class="font-size-14">New Signups</span>
                         <h3>3,897</h3>
                         <div class="iq-progress-bar-linear d-inline-block w-100 float-left mt-3">
                            <div class="iq-progress-bar">
                               <span class="bg-primary" data-percent="90"></span>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             <div class="iq-card">
                <div class="iq-card-body">
                   <div class="row">
                      <div class="col-lg-12">
                         <span class="text-danger float-right">+3.3%<i class="ri-arrow-down-fill"></i></span>
                         <span class="font-size-14">Weekly Production</span>
                         <h3>1,874 </h3>
                         <div class="iq-progress-bar-linear d-inline-block w-100 float-left mt-3">
                            <div class="iq-progress-bar">
                               <span class="bg-danger" data-percent="90"></span>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
          <!-- Content Top Banner End -->
          <div class="col-md-12">
             <div class="row">
                <div class="col-md-12 col-lg-4">
                   <div class="iq-card">
                      <div class="iq-card-header d-flex justify-content-between">
                         <div class="iq-header-title">
                            <h4 class="card-title">Payment Options</h4>
                         </div>
                         <div class="iq-card-header-toolbar d-flex align-items-center">
                            <div class="dropdown">
                               <span class="dropdown-toggle dropdown-bg iq-bg-success" id="dropdownMenuButton1" data-toggle="dropdown">
                               View All<i class="ri-arrow-down-s-line ml-1 text-success"></i>
                               </span>
                               <div class="dropdown-menu dropdown-menu-right shadow-none" aria-labelledby="dropdownMenuButton">
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
                         <div class="owl-carousel"  data-autoplay="true" data-loop="true" data-nav="false" data-dots="true" data-items="1" data-items-laptop="1" data-items-tab="1" data-items-mobile="1" data-items-mobile-sm="1" data-margin="30">
                            <div class="item">
                               <img src={{asset("assets/images/booking/03.png")}} class="img-fluid" alt="">
                            </div>
                            <div class="item">
                               <img src={{asset("assets/images/booking/03.png")}} class="img-fluid" alt="">
                            </div>
                            <div class="item">
                               <img src={{asset("assets/images/booking/03.png")}} class="img-fluid" alt="">
                            </div>
                         </div>
                         <div class="pay-options">
                            <h4 class="mb-3">Enabled Payment Options</h4>
                            <div class="d-flex tasks-card" role="alert">
                               <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="customCheck11">
                                  <label class="custom-control-label" for="customCheck11">Debit Card & Credit Card.</label>
                               </div>
                            </div>
                            <div class="d-flex tasks-card border-bottom-0 mb-0 pb-0" role="alert">
                               <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input" id="customCheck1">
                                  <label class="custom-control-label" for="customCheck1">Rayzer Pay & Paypal.</label>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="col-md-12 col-lg-8">
                   <div class="iq-card overflow-hidden wow fadeInUp" data-wow-delay="0.6s">
                      <div class="iq-card-header d-flex justify-content-between">
                         <div class="iq-header-title">
                            <h4 class="card-title">Overall Performance</h4>
                         </div>
                         <div class="iq-card-header-toolbar d-flex align-items-center">
                            <ul class="nav nav-pills">
                               <li class="nav-item">
                                  <a href="#" class="nav-link active">All Time</a>
                               </li>
                               <li class="nav-item">
                                  <a href="#" class="nav-link">This Year</a>
                               </li>
                               <li class="nav-item">
                                  <a href="#" class="nav-link">This Week</a>
                               </li>
                               <li class="nav-item">
                                  <a href="#" class="nav-link">Today</a>
                               </li>
                            </ul>
                         </div>
                      </div>
                      <div class="iq-card-body p-0">

                         <div id="chart-11"></div>
                      </div>
                   </div>
                </div>
             </div>
             <div class="row">
                <div class="col-md-12 col-lg-4">
                   <div class="row">
                      <div class="col-md-12">
                         <div class="iq-card">
                            <div class="iq-card-body p-0">
                               <div class="row">
                                  <div class="col-lg-4">
                                     <div class="p-3">
                                        <span class="text-secondary font-size-16">Servers</span>
                                        <h3>1,125</h3>
                                        <span class="text-success mt-3 d-inline-block w-100"><i class="ri-arrow-up-fill mr-1"></i>+3.3%</span>
                                     </div>
                                  </div>
                                  <div class="col-lg-8 align-self-center">
                                     <div id="chart-7"></div>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                      <div class="col-md-12">
                         <div class="iq-card">
                            <div class="iq-card-body p-0">
                               <div class="row">
                                  <div class="col-lg-4">
                                     <div class="p-3">
                                        <span class="text-secondary font-size-16">Utilization</span>
                                        <h3>3,897</h3>
                                        <span class="text-danger mt-3 d-inline-block w-100"><i class="ri-arrow-down-fill mr-1"></i>+10%</span>
                                     </div>
                                  </div>
                                  <div class="col-lg-8 align-self-center">
                                     <div id="chart-8"></div>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
                <div class="col-lg-4 col-md-6">
                   <div class="iq-card wow fadeInUp" data-wow-delay="0.6s">
                      <div class="iq-card-header d-flex justify-content-between">
                         <div class="iq-header-title">
                            <h4 class="card-title">Load Distribution</h4>
                         </div>
                         <div class="iq-card-header-toolbar d-flex align-items-center">
                            <div class="dropdown">
                               <span class="dropdown-toggle text-primary" id="dropdownMenuButton3" data-toggle="dropdown">
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
                         <div id="Dash1DonetChart"></div>
                      </div>
                   </div>
                </div>

                <div class="col-lg-4 col-md-6">
                   <div class="iq-card wow fadeInUp overflow-hidden" data-wow-delay="0.6s">
                      <div class="iq-card-header d-flex justify-content-between">
                         <div class="iq-header-title">
                            <h4 class="card-title">Daily Update Level</h4>
                         </div>
                         <div class="iq-card-header-toolbar d-flex align-items-center">
                            <div class="dropdown">
                               <span class="dropdown-toggle dropdown-bg iq-bg-secondary" id="dropdownMenuButton2" data-toggle="dropdown">
                               See all <i class="ri-arrow-down-s-line ml-1 text-secondary"></i>
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
                      <div class="iq-card-body p-0">
                         <div id="Dash1MultiBarChart"></div>
                      </div>
                   </div>
                </div>

             </div>
             <div class="row">
                <div class="col-lg-3 col-md-6">
                   <div class="iq-card dash-hover-gradient">
                      <div class="iq-card-header d-flex justify-content-between border-0">
                         <div class="mb-0 font-size-32 text-dark"><i class="ri-home-4-line font-weight-light"></i></div>
                         <div class="iq-card-header-toolbar d-flex align-items-center">
                            <div class="dropdown">
                               <span class="dropdown-toggle" id="d-28" data-toggle="dropdown">
                               <i class="ri-more-2-fill "></i>
                               </span>
                               <div class="dropdown-menu dropdown-menu-right shadow-none" aria-labelledby="dropdownMenuButton">
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
                         <h3>Sales</h3>
                         <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                      </div>
                      <div class="card-action font-size-14 p-3">
                         <span class="float-right">Tommorow</span>
                         <i class="ri-timer-2-line"></i> 2:30pm
                      </div>
                   </div>
                </div>
                <div class="col-lg-3 col-md-6">
                   <div class="iq-card dash-hover-gradient">
                      <div class="iq-card-header d-flex justify-content-between border-0">
                         <div class="mb-0 font-size-32 text-dark"><i class="ri-timer-line font-weight-light"></i></div>
                         <div class="iq-card-header-toolbar d-flex align-items-center">
                            <div class="dropdown">
                               <span class="dropdown-toggle" id="d-29" data-toggle="dropdown">
                               <i class="ri-more-2-fill "></i>
                               </span>
                               <div class="dropdown-menu dropdown-menu-right shadow-none" aria-labelledby="dropdownMenuButton">
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
                         <h3>Support</h3>
                         <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                      </div>
                      <div class="card-action font-size-14 p-3">
                         <span class="float-right">Tommorow</span>
                         <i class="ri-timer-2-line"></i> 2:30pm
                      </div>
                   </div>
                </div>
                <div class="col-lg-3 col-md-6">
                   <div class="iq-card dash-hover-gradient">
                      <div class="iq-card-header d-flex justify-content-between border-0">
                          <div class="mb-0 font-size-32 text-dark"><i class="ri-account-box-line font-weight-light"></i></div>
                         <div class="iq-card-header-toolbar d-flex align-items-center">
                            <div class="dropdown">
                               <span class="dropdown-toggle" id="d-27" data-toggle="dropdown">
                               <i class="ri-more-2-fill "></i>
                               </span>
                               <div class="dropdown-menu dropdown-menu-right shadow-none" aria-labelledby="dropdownMenuButton">
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
                         <h3>Account</h3>
                         <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                      </div>
                      <div class="card-action font-size-14 p-3">
                         <span class="float-right">Tommorow</span>
                         <i class="ri-timer-2-line"></i> 2:30pm
                      </div>
                   </div>
                </div>
                <div class="col-lg-3 col-md-6">
                   <div class="iq-card dash-hover-blank d-flex align-items-center">
                      <div class="iq-card-body text-center">
                         <h5 class="">Add New Project</h5>
                      </div>
                   </div>
                </div>
             </div>
             <div class="row">
                  <div class="col-lg-12">
                      <div class="iq-card">
                         <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                               <h4 class="card-title">Server History</h4>
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
                                        <th scope="col">Server ID</th>
                                        <th scope="col">Up Since</th>
                                        <th scope="col">Last Reboot</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Host</th>
                                        <th scope="col">Utilization</th>

                                     </tr>
                                  </thead>
                                  <tbody>
                                     <tr>
                                        <td>#0879985</td>
                                        <td>26/12/2019</td>
                                        <td>30/12/2019</td>
                                        <td>
                                           <div class="badge badge-pill badge-success">Running</div>
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
                                           <div class="badge badge-pill badge-warning text-white">Starting</div>
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
                                           <div class="badge badge-pill badge-danger">Stopped</div>
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
                                           <div class="badge badge-pill badge-info">Maintenance</div>
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
                                           <div class="badge badge-pill badge-success">Running</div>
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
       </div>
    </div>
 </div>

@endsection
