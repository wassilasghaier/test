@extends('layouts.master')

@section('content')

<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
            <div class="col-sm-12">
                <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                    <div class="iq-card-body profile-page p-0">
                        <div class="profile-header">
                            <div class="cover-container">
                                <img src="{{ asset('assets/images/page-img/profile-bg.jpg') }}" alt="profile-bg" class="rounded img-fluid w-100"> 
                                <ul class="header-nav d-flex flex-wrap justify-end p-0 m-0">
                                <li><a href="javascript:void();"><i class="ri-pencil-line"></i></a></li>
                                <li><a href="javascript:void();"><i class="ri-settings-4-line"></i></a></li>
                                </ul>
                            </div>
                            <div class="profile-info p-4">
                                <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="user-detail pl-5">
                                        <div class="d-flex flex-wrap align-items-center">
                                            <div class="profile-img pr-4">
                                            <img src="{{ asset('assets/images/user/11.png') }}" alt="profile-img" class="avatar-130 img-fluid" />
                                            </div>
                                            <div class="profile-detail d-flex align-items-center">
                                            <h3>Nik Jone</h3>
                                            <p class="m-0 pl-3"> - Web designer</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <ul class="nav nav-pills d-flex align-items-end float-right profile-feed-items p-0 m-0">
                                        <li>
                                            <a class="nav-link active" data-toggle="pill" href="#profile-feed">feed</a>
                                        </li>
                                        <li>
                                            <a class="nav-link" data-toggle="pill" href="#profile-activity">Activity</a>
                                        </li>
                                        <li>
                                            <a class="nav-link" data-toggle="pill" href="#profile-friends">friends</a>
                                        </li>
                                        <li>
                                            <a class="nav-link" data-toggle="pill" href="#profile-profile">profile</a>
                                        </li>
                                    </ul>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-lg-3 profile-left">
                        <div class="iq-card iq-card-block iq-card-stretch">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                <h4 class="card-title">News</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <ul class="m-0 p-0">
                                <li class="d-flex mb-2">
                                    <div class="news-icon"><i class="ri-chat-4-fill"></i></div>
                                    <p class="news-detail mb-0">there is a meetup in your city on fryday at 19:00. <a href="#">see details</a></p>
                                </li>
                                <li class="d-flex">
                                    <div class="news-icon mb-0"><i class="ri-chat-4-fill"></i></div>
                                    <p class="news-detail mb-0">20% off coupon on selected items at pharmaprix </p>
                                </li>
                                </ul>
                            </div>
                        </div>
                        <div class="iq-card iq-card-block iq-card-stretch">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                <h4 class="card-title">Gallery</h4>
                                </div>
                                <div class="iq-card-header-toolbar d-flex align-items-center">
                                    <p class="m-0">132 pics</p>
                                </div>
                            </div>
                            <div class="iq-card-body p-0">
                                <ul class="profile-img-gallary d-flex flex-wrap p-0 m-0">
                                <li class="col-md-4 col-6 pl-1 pr-0 pb-1"><a href="javascript:void();"><img src="{{ asset('assets/images/page-img/g1.jpg') }}" alt="gallary-image" class="img-fluid" /></a></li>
                                <li class="col-md-4 col-6 pl-1 pr-0 pb-1"><a href="javascript:void();"><img src="{{ asset('assets/images/page-img/g2.jpg') }}" alt="gallary-image" class="img-fluid" /></a></li>
                                <li class="col-md-4 col-6 pl-1 pr-0 pb-1"><a href="javascript:void();"><img src="{{ asset('assets/images/page-img/g3.jpg') }}" alt="gallary-image" class="img-fluid" /></a></li>
                                <li class="col-md-4 col-6 pl-1 pr-0 pb-1"><a href="javascript:void();"><img src="{{ asset('assets/images/page-img/g4.jpg') }}" alt="gallary-image" class="img-fluid" /></a></li>
                                <li class="col-md-4 col-6 pl-1 pr-0 pb-1"><a href="javascript:void();"><img src="{{ asset('assets/images/page-img/g5.jpg') }}" alt="gallary-image" class="img-fluid" /></a></li>
                                <li class="col-md-4 col-6 pl-1 pr-0 pb-1"><a href="javascript:void();"><img src="{{ asset('assets/images/page-img/g6.jpg') }}" alt="gallary-image" class="img-fluid" /></a></li>
                                <li class="col-md-4 col-6 pl-1 pr-0 pb-0"><a href="javascript:void();"><img src="{{ asset('assets/images/page-img/g7.jpg') }}" alt="gallary-image" class="img-fluid" /></a></li>
                                <li class="col-md-4 col-6 pl-1 pr-0 pb-0"><a href="javascript:void();"><img src="{{ asset('assets/images/page-img/g8.jpg') }}" alt="gallary-image" class="img-fluid" /></a></li>
                                <li class="col-md-4 col-6 pl-1 pr-0 pb-0"><a href="javascript:void();"><img src="{{ asset('assets/images/page-img/g9.jpg') }}" alt="gallary-image" class="img-fluid" /></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="iq-card iq-card-block iq-card-stretch">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                <h4 class="card-title">Twitter Feeds</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <div class="twit-feed">
                                <div class="media-support-header mb-2">
                                    <div class="media-support-user-img mr-3">
                                        <img class="rounded-circle img-fluid" src="{{ asset('assets/images/user/01.jpg') }}" alt="">
                                    </div>
                                    <div class="media-support-info">
                                        <h6 class="mb-0"><a href="#" class="">Anna Sthesia</a></h6>
                                        <p>@anna59 <span><i class="ri-check-fill"></i> </span></p>
                                    </div>
                                </div>
                                <div class="media-support-body">
                                    <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                    <div class="d-flex flex-wrap">
                                        <a href="#" class="twit-meta-tag pr-2">#Html</a>
                                        <a href="#" class="twit-meta-tag pr-2">#Bootstrap</a>
                                    </div>
                                    <div class="twit-date"><a href="#"> 07 Jan 2020 </a></div>
                                </div>
                                </div>
                                <hr class="mt-4 mb-4">
                                <div class="twit-feed">
                                <div class="media-support-header mb-2">
                                    <div class="media-support-user-img mr-3">
                                        <img class="rounded-circle img-fluid" src="{{ asset('assets/images/user/02.jpg') }}" alt="">
                                    </div>
                                    <div class="media-support-info">
                                        <h6 class="mb-0"><a href="#" class="">Paige Turner</a></h6>
                                        <p>@paige30 <span><i class="ri-check-fill"></i> </span></p>
                                    </div>
                                </div>
                                <div class="media-support-body">
                                    <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                    <div class="d-flex flex-wrap">
                                        <a href="#" class="twit-meta-tag pr-2">#Js</a>
                                        <a href="#" class="twit-meta-tag pr-2">#Bootstrap</a>
                                    </div>
                                    <div class="twit-date"><a href="#"> 07 Jan 2020 </a></div>
                                </div>
                                </div>
                                <hr class="mt-4 mb-4">
                                <div class="twit-feed">
                                <div class="media-support-header">
                                    <div class="media-support-user-img mr-3">
                                        <img class="rounded-circle img-fluid" src="{{ asset('assets/images/user/03.jpg') }}" alt="">
                                    </div>
                                    <div class="media-support-info mt-2">
                                        <h5 class="mb-0"><a href="#" class="">Greta Life</a></h5>
                                        <p>@greta07 <span><i class="ri-check-fill"></i> </span></p>
                                    </div>
                                </div>
                                <div class="media-support-body">
                                    <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                    <div class="d-flex flex-wrap">
                                        <a href="#" class="twit-meta-tag pr-2">#Html</a>
                                        <a href="#" class="twit-meta-tag pr-2">#CSS</a>
                                    </div>
                                    <div class="twit-date"><a href="#"> 07 Jan 2020 </a></div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 profile-center">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="profile-feed" role="tabpanel">
                                <div class="iq-card iq-card-block iq-card-stretch">
                                <div class="iq-card-body p-0">
                                    <div class="user-post-data p-3">
                                        <div class="d-flex flex-wrap">
                                            <div class="media-support-user-img mr-3">
                                            <img class="rounded-circle img-fluid" src="{{ asset('assets/images/user/01.jpg') }}" alt="">
                                            </div>
                                            <div class="media-support-info mt-2">
                                            <h5 class="mb-0"><a href="#" class="">Anna Sthesia</a></h5>
                                            <p class="mb-0 text-primary">colleages</p>
                                            </div>
                                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                            <div class="dropdown">
                                                <span class="dropdown-toggle text-primary" id="dropdownMenuButton40" data-toggle="dropdown">
                                                    <a href="#" class="text-secondary">29 mins <i class="ri-more-2-line ml-3"></i></a>
                                                </span>
                                                <div class="dropdown-menu dropdown-menu-right p-0">
                                                    <a class="dropdown-item" href="#"><i class="ri-user-unfollow-line mr-2"></i>Unfollow</a>
                                                    <a class="dropdown-item" href="#"><i class="ri-share-forward-line mr-2"></i></i>Share</a>
                                                    <a class="dropdown-item" href="#"><i class="ri-file-copy-line mr-2"></i>Copy Link</a>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="user-post">
                                        <a href="javascript:void();"><img src="{{ asset('assets/images/page-img/p1.jpg') }}" alt="post-image" class="img-fluid" /></a>
                                    </div>
                                    <div class="comment-area p-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center feather-icon mr-3">
                                                <a href="javascript:void();"><i class="ri-heart-line"></i></a>
                                                <span class="ml-1">140</span>
                                            </div>
                                            <div class="d-flex align-items-center message-icon">
                                                <a href="javascript:void();"><i class="ri-chat-4-line"></i></a>
                                                <span class="ml-1">140</span>
                                            </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                            <div class="iq-media-group">
                                                <a href="#" class="iq-media">
                                                <img class="img-fluid avatar-40 rounded-circle" src="{{ asset('assets/images/user/05.jpg') }}" alt="">
                                                </a>
                                                <a href="#" class="iq-media">
                                                <img class="img-fluid avatar-40 rounded-circle" src="{{ asset('assets/images/user/06.jpg') }}" alt="">
                                                </a>
                                                <a href="#" class="iq-media">
                                                <img class="img-fluid avatar-40 rounded-circle" src="{{ asset('assets/images/user/07.jpg') }}" alt="">
                                                </a>
                                                <a href="#" class="iq-media">
                                                <img class="img-fluid avatar-40 rounded-circle" src="{{ asset('assets/images/user/08.jpg') }}" alt="">
                                                </a>
                                                <a href="#" class="iq-media">
                                                <img class="img-fluid avatar-40 rounded-circle" src="{{ asset('assets/images/user/09.jpg') }}" alt="">
                                                </a>
                                            </div>
                                            <span class="ml-2">+140 more</span>
                                            </div>
                                        </div>
                                        <hr>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nulla dolor, ornare at commodo non, feugiat non nisi. Phasellus faucibus mollis pharetra. Proin blandit ac massa sed rhoncus</p>
                                        <hr>
                                        <ul class="post-comments p-0 m-0">
                                            <li class="mb-2">
                                            <div class="d-flex flex-wrap">
                                                <div class="user-img">
                                                    <img src="{{ asset('assets/images/user/02.jpg') }}" alt="userimg" class="avatar-35 rounded-circle img-fluid">
                                                </div>
                                                <div class="comment-data-block ml-3">
                                                    <h6>Monty Carlo</h6>
                                                    <p class="mb-0">Lorem ipsum dolor sit amet</p>
                                                    <div class="d-flex flex-wrap align-items-center comment-activity">
                                                        <a href="javascript:void();">like</a>
                                                        <a href="javascript:void();">reply</a>
                                                        <a href="javascript:void();">translate</a>
                                                        <span> 5 minit </span>
                                                    </div>
                                                </div>
                                            </div>
                                            </li>
                                            <li>
                                            <div class="d-flex flex-wrap">
                                                <div class="user-img">
                                                    <img src="{{ asset('assets/images/user/03.jpg') }}" alt="userimg" class="avatar-35 rounded-circle img-fluid">
                                                </div>
                                                <div class="comment-data-block ml-3">
                                                    <h6>Paul Molive</h6>
                                                    <p class="mb-0">Lorem ipsum dolor sit amet</p>
                                                    <div class="d-flex flex-wrap align-items-center comment-activity">
                                                        <a href="javascript:void();">like</a>
                                                        <a href="javascript:void();">reply</a>
                                                        <a href="javascript:void();">translate</a>
                                                        <span> 5 minit </span>
                                                    </div>
                                                </div>
                                            </div>
                                            </li>
                                        </ul>
                                        <form class="comment-text d-flex align-items-center mt-3" action="javascript:void(0);">
                                            <input type="text" class="form-control rounded" placeholder="Lovely!">
                                            <div class="comment-attagement d-flex">
                                                <a href="javascript:void();"><i class="ri-user-smile-line mr-2"></i></a>
                                                <a href="javascript:void();"><i class="ri-camera-line mr-2"></i></a>
                                            </div>
                                        </form>
                                    </div>                              
                                </div>
                                </div>
                                <div class="iq-card iq-card-block iq-card-stretch">
                                <div class="iq-card-body p-0">
                                    <div class="user-post-data p-3">
                                        <div class="d-flex flex-wrap">
                                            <div class="media-support-user-img mr-3">
                                            <img class="rounded-circle img-fluid" src="{{ asset('assets/images/user/02.jpg') }}" alt="">
                                            </div>
                                            <div class="media-support-info mt-2">
                                            <h5 class="mb-0"><a href="#" class="">jenny issad</a></h5>
                                            <p class="mb-0 text-primary">colleages</p>
                                            </div>
                                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                            <div class="dropdown">
                                                <span class="dropdown-toggle text-primary" id="dropdownMenuButton40" data-toggle="dropdown">
                                                    <a href="#" class="text-secondary">1 hr <i class="ri-more-2-line ml-3"></i></a>
                                                </span>
                                                <div class="dropdown-menu dropdown-menu-right p-0">
                                                    <a class="dropdown-item" href="#"><i class="ri-user-unfollow-line mr-2"></i>Unfollow</a>
                                                    <a class="dropdown-item" href="#"><i class="ri-share-forward-line mr-2"></i></i>Share</a>
                                                    <a class="dropdown-item" href="#"><i class="ri-file-copy-line mr-2"></i>Copy Link</a>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="mt-0">
                                        <p class="p-3 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi nulla dolor, ornare at commodo non, feugiat non nisi. Phasellus faucibus mollis pharetra. Proin blandit ac massa sed rhoncus</p>
                                        
                                    <div class="comment-area p-3"><hr class="mt-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center feather-icon mr-3">
                                                <a id="clickme" href="javascript:void();"><i class="ri-heart-line"></i></a>
                                                <span class="ml-1">140</span>
                                            </div>
                                            <div class="d-flex align-items-center message-icon">
                                                <a href="javascript:void();"><i class="ri-chat-4-line"></i></a>
                                                <span class="ml-1">140</span>
                                            </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                            <div class="iq-media-group">
                                                <a href="#" class="iq-media">
                                                <img class="img-fluid avatar-40 rounded-circle" src="{{ asset('assets/images/user/05.jpg') }}" alt="">
                                                </a>
                                                <a href="#" class="iq-media">
                                                <img class="img-fluid avatar-40 rounded-circle" src="{{ asset('assets/images/user/06.jpg') }}" alt="">
                                                </a>
                                                <a href="#" class="iq-media">
                                                <img class="img-fluid avatar-40 rounded-circle" src="{{ asset('assets/images/user/07.jpg') }}" alt="">
                                                </a>
                                                <a href="#" class="iq-media">
                                                <img class="img-fluid avatar-40 rounded-circle" src="{{ asset('assets/images/user/08.jpg') }}" alt="">
                                                </a>
                                                <a href="#" class="iq-media">
                                                <img class="img-fluid avatar-40 rounded-circle" src="{{ asset('assets/images/user/09.jpg') }}" alt="">
                                                </a>
                                            </div>
                                            <span class="ml-2">+140 more</span>
                                            </div>
                                        </div>
                                        <form class="comment-text d-flex align-items-center mt-3" action="javascript:void(0);">
                                            <input type="text" class="form-control rounded" placeholder="Lovely!">
                                            <div class="comment-attagement d-flex">
                                                <a href="javascript:void();"><i class="ri-user-smile-line mr-2"></i></a>
                                                <a href="javascript:void();"><i class="ri-camera-line mr-2"></i></a>
                                            </div>
                                        </form>
                                    </div>                              
                                </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile-activity" role="tabpanel">
                                <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                                <div class="iq-card-header d-flex justify-content-between">
                                    <div class="iq-header-title">
                                        <h4 class="card-title">Activity timeline</h4>
                                    </div>
                                    <div class="iq-card-header-toolbar d-flex align-items-center">
                                        <div class="dropdown">
                                            <span class="dropdown-toggle text-primary" id="dropdownMenuButton5" data-toggle="dropdown">
                                            View All
                                            </span>
                                            <div class="dropdown-menu dropdown-menu-right p-0">                                         
                                            <a class="dropdown-item" href="#"><i class="ri-user-unfollow-line mr-2"></i>View</a>
                                            <a class="dropdown-item" href="#"><i class="ri-close-circle-line mr-2"></i>Delete</a>
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
                                            <h6 class="float-left mb-1">Client Login</h6>
                                            <small class="float-right mt-1">24 November 2019</small>
                                            <div class="d-inline-block w-100">
                                            <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="timeline-dots border-success"></div>
                                            <h6 class="float-left mb-1">Scheduled Maintenance</h6>
                                            <small class="float-right mt-1">23 November 2019</small>
                                            <div class="d-inline-block w-100">
                                            <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="timeline-dots border-danger"></div>
                                            <h6 class="float-left mb-1">Dev Meetup</h6>
                                            <small class="float-right mt-1">20 November 2019</small>
                                            <div class="d-inline-block w-100">
                                            <p>Bonbon macaroon jelly beans <a href="#">gummi bears</a>gummi bears jelly lollipop apple</p>
                                            <div class="iq-media-group">
                                                <a href="#" class="iq-media">
                                                <img class="img-fluid avatar-40 rounded-circle" src="{{ asset('assets/images/user/05.jpg') }}" alt="">
                                                </a>
                                                <a href="#" class="iq-media">
                                                <img class="img-fluid avatar-40 rounded-circle" src="{{ asset('assets/images/user/06.jpg') }}" alt="">
                                                </a>
                                                <a href="#" class="iq-media">
                                                <img class="img-fluid avatar-40 rounded-circle" src="{{ asset('assets/images/user/07.jpg') }}" alt="">
                                                </a>
                                                <a href="#" class="iq-media">
                                                <img class="img-fluid avatar-40 rounded-circle" src="{{ asset('assets/images/user/08.jpg') }}" alt="">
                                                </a>
                                                <a href="#" class="iq-media">
                                                <img class="img-fluid avatar-40 rounded-circle" src="{{ asset('assets/images/user/09.jpg') }}" alt="">
                                                </a>
                                                <a href="#" class="iq-media">
                                                <img class="img-fluid avatar-40 rounded-circle" src="{{ asset('assets/images/user/10.jpg') }}" alt="">
                                                </a>
                                            </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="timeline-dots border-primary"></div>
                                            <h6 class="float-left mb-1">Client Call</h6>
                                            <small class="float-right mt-1">19 November 2019</small>
                                            <div class="d-inline-block w-100">
                                            <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="timeline-dots border-warning"></div>
                                            <h6 class="float-left mb-1">Mega event</h6>
                                            <small class="float-right mt-1">15 November 2019</small>
                                            <div class="d-inline-block w-100">
                                            <p>Bonbon macaroon jelly beans gummi bears jelly lollipop apple</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile-friends" role="tabpanel">
                                <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                                <div class="iq-card-header d-flex justify-content-between">
                                    <div class="iq-header-title">
                                        <h4 class="card-title">Friends</h4>
                                    </div>
                                </div>
                                <div class="iq-card-body">
                                    <ul class="suggestions-lists m-0 p-0">
                                        <li class="d-flex mb-4 align-items-center">
                                            <div class="user-img img-fluid"><img src="{{ asset('assets/images/user/01.jpg') }}" alt="story-img" class="rounded-circle avatar-40"></div>
                                            <div class="media-support-info ml-3">
                                            <h6>Paul Molive</h6>
                                            <p class="mb-0">Web Designer</p>
                                            </div>
                                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                            <div class="dropdown">
                                                <span class="dropdown-toggle text-primary" id="dropdownMenuButton40" data-toggle="dropdown">
                                                    <i class="ri-more-2-line"></i>
                                                </span>
                                                <div class="dropdown-menu dropdown-menu-right p-0">
                                                    <a class="dropdown-item" href="#"><i class="ri-user-unfollow-line mr-2"></i>Unfollow</a>
                                                    <a class="dropdown-item" href="#"><i class="ri-close-circle-line mr-2"></i>Unfriend</a>
                                                    <a class="dropdown-item" href="#"><i class="ri-lock-line mr-2"></i>block</a>
                                                </div>
                                            </div>
                                            </div>
                                        </li>
                                        <li class="d-flex mb-4 align-items-center">
                                            <div class="user-img img-fluid"><img src="{{ asset('assets/images/user/01.jpg') }}" alt="story-img" class="rounded-circle avatar-40"></div>
                                            <div class="media-support-info ml-3">
                                            <h6>Paul Molive</h6>
                                            <p class="mb-0">trainee</p>
                                            </div>
                                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                            <div class="dropdown">
                                                <span class="dropdown-toggle text-primary" id="dropdownMenuButton41" data-toggle="dropdown">
                                                <i class="ri-more-2-line"></i>
                                                </span>
                                                <div class="dropdown-menu dropdown-menu-right p-0">
                                                    <a class="dropdown-item" href="#"><i class="ri-user-unfollow-line mr-2"></i>Unfollow</a>
                                                    <a class="dropdown-item" href="#"><i class="ri-close-circle-line mr-2"></i>Unfriend</a>
                                                    <a class="dropdown-item" href="#"><i class="ri-lock-line mr-2"></i>block</a>
                                                </div>
                                            </div>
                                            </div>
                                        </li>
                                        <li class="d-flex mb-4 align-items-center">
                                            <div class="user-img img-fluid"><img src="{{ asset('assets/images/user/02.jpg') }}" alt="story-img" class="rounded-circle avatar-40"></div>
                                            <div class="media-support-info ml-3">
                                            <h6>Anna Mull</h6>
                                            <p class="mb-0">Web Developer</p>
                                            </div>
                                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                            <div class="dropdown">
                                                <span class="dropdown-toggle text-primary" id="dropdownMenuButton42" data-toggle="dropdown">
                                                <i class="ri-more-2-line"></i>
                                                </span>
                                                <div class="dropdown-menu dropdown-menu-right p-0">
                                                    <a class="dropdown-item" href="#"><i class="ri-user-unfollow-line mr-2"></i>Unfollow</a>
                                                    <a class="dropdown-item" href="#"><i class="ri-close-circle-line mr-2"></i>Unfriend</a>
                                                    <a class="dropdown-item" href="#"><i class="ri-lock-line mr-2"></i>block</a>
                                                </div>
                                            </div>
                                            </div>
                                        </li>
                                        <li class="d-flex mb-4 align-items-center">
                                            <div class="user-img img-fluid"><img src="{{ asset('assets/images/user/03.jpg') }}" alt="story-img" class="rounded-circle avatar-40"></div>
                                            <div class="media-support-info ml-3">
                                            <h6>Paige Turner</h6>
                                            <p class="mb-0">trainee</p>
                                            </div>
                                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                            <div class="dropdown">
                                                <span class="dropdown-toggle text-primary" id="dropdownMenuButton43" data-toggle="dropdown">
                                                <i class="ri-more-2-line"></i>
                                                </span>
                                                <div class="dropdown-menu dropdown-menu-right p-0">
                                                    <a class="dropdown-item" href="#"><i class="ri-user-unfollow-line mr-2"></i>Unfollow</a>
                                                    <a class="dropdown-item" href="#"><i class="ri-close-circle-line mr-2"></i>Unfriend</a>
                                                    <a class="dropdown-item" href="#"><i class="ri-lock-line mr-2"></i>block</a>
                                                </div>
                                            </div>
                                            </div>
                                        </li>
                                        <li class="d-flex mb-4 align-items-center">
                                            <div class="user-img img-fluid"><img src="{{ asset('assets/images/user/04.jpg') }}" alt="story-img" class="rounded-circle avatar-40"></div>
                                            <div class="media-support-info ml-3">
                                            <h6>Barb Ackue</h6>
                                            <p class="mb-0">Web Designer</p>
                                            </div>
                                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                            <div class="dropdown">
                                                <span class="dropdown-toggle text-primary" id="dropdownMenuButton44" data-toggle="dropdown">
                                                <i class="ri-more-2-line"></i>
                                                </span>
                                                <div class="dropdown-menu dropdown-menu-right p-0">
                                                    <a class="dropdown-item" href="#"><i class="ri-user-unfollow-line mr-2"></i>Unfollow</a>
                                                    <a class="dropdown-item" href="#"><i class="ri-close-circle-line mr-2"></i>Unfriend</a>
                                                    <a class="dropdown-item" href="#"><i class="ri-lock-line mr-2"></i>block</a>
                                                </div>
                                            </div>
                                            </div>
                                        </li>
                                        <li class="d-flex mb-4 align-items-center">
                                            <div class="user-img img-fluid"><img src="{{ asset('assets/images/user/05.jpg') }}" alt="story-img" class="rounded-circle avatar-40"></div>
                                            <div class="media-support-info ml-3">
                                            <h6>Greta Life</h6>
                                            <p class="mb-0">Tester</p>
                                            </div>
                                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                            <div class="dropdown">
                                                <span class="dropdown-toggle text-primary" id="dropdownMenuButton45" data-toggle="dropdown">
                                                <i class="ri-more-2-line"></i>
                                                </span>
                                                <div class="dropdown-menu dropdown-menu-right p-0">
                                                    <a class="dropdown-item" href="#"><i class="ri-user-unfollow-line mr-2"></i>Unfollow</a>
                                                    <a class="dropdown-item" href="#"><i class="ri-close-circle-line mr-2"></i>Unfriend</a>
                                                    <a class="dropdown-item" href="#"><i class="ri-lock-line mr-2"></i>block</a>
                                                </div>
                                            </div>
                                            </div>
                                        </li>
                                        <li class="d-flex mb-4 align-items-center">
                                            <div class="user-img img-fluid"><img src="{{ asset('assets/images/user/05.jpg') }}" alt="story-img" class="rounded-circle avatar-40"></div>
                                            <div class="media-support-info ml-3">
                                            <h6>Ira Membrit</h6>
                                            <p class="mb-0">Android Developer</p>
                                            </div>
                                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                            <div class="dropdown">
                                                <span class="dropdown-toggle text-primary" id="dropdownMenuButton46" data-toggle="dropdown">
                                                <i class="ri-more-2-line"></i>
                                                </span>
                                                <div class="dropdown-menu dropdown-menu-right p-0">
                                                    <a class="dropdown-item" href="#"><i class="ri-user-unfollow-line mr-2"></i>Unfollow</a>
                                                    <a class="dropdown-item" href="#"><i class="ri-close-circle-line mr-2"></i>Unfriend</a>
                                                    <a class="dropdown-item" href="#"><i class="ri-lock-line mr-2"></i>block</a>
                                                </div>
                                            </div>
                                            </div>
                                        </li>
                                        <li class="d-flex mb-4 align-items-center">
                                            <div class="user-img img-fluid"><img src="{{ asset('assets/images/user/07.jpg') }}" alt="story-img" class="rounded-circle avatar-40"></div>
                                            <div class="media-support-info ml-3">
                                            <h6>Pete Sariya</h6>
                                            <p class="mb-0">Web Designer</p>
                                            </div>
                                            <div class="iq-card-header-toolbar d-flex align-items-center">
                                            <div class="dropdown">
                                                <span class="dropdown-toggle text-primary" id="dropdownMenuButton47" data-toggle="dropdown">
                                                <i class="ri-more-2-line"></i>
                                                </span>
                                                <div class="dropdown-menu dropdown-menu-right p-0">
                                                    <a class="dropdown-item" href="#"><i class="ri-user-unfollow-line mr-2"></i>Unfollow</a>
                                                    <a class="dropdown-item" href="#"><i class="ri-close-circle-line mr-2"></i>Unfriend</a>
                                                    <a class="dropdown-item" href="#"><i class="ri-lock-line mr-2"></i>block</a>
                                                </div>
                                            </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <a href="javascript:void();" class="btn btn-primary d-block"><i class="ri-add-line"></i> Load More</a>
                                </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile-profile" role="tabpanel">
                                <div class="iq-card iq-card-block iq-card-stretch">
                                <div class="iq-card-header d-flex justify-content-between">
                                    <div class="iq-header-title">
                                        <h4 class="card-title">Profile</h4>
                                    </div>
                                </div>
                                <div class="iq-card-body">
                                    <div class="user-detail text-center">
                                        <div class="user-profile">
                                            <img src="{{ asset('assets/images/user/11.png') }}" alt="profile-img" class="avatar-130 img-fluid">
                                        </div>
                                        <div class="profile-detail mt-3">
                                            <h3 class="d-inline-block">Nik Jone</h3>
                                            <p class="d-inline-block pl-3"> - Web designer</p>
                                            <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="iq-card iq-card-block iq-card-stretch">
                                <div class="iq-card-header d-flex justify-content-between">
                                    <div class="iq-header-title">
                                        <h4 class="card-title">About User</h4>
                                    </div>
                                </div>
                                <div class="iq-card-body">
                                    <div class="user-bio">
                                        <p>Tart I love sugar plum I love oat cake. Sweet roll caramels I love jujubes. Topping cake wafer.</p>
                                    </div>
                                    <div class="mt-2">
                                    <h6>Joined:</h6>
                                    <p>November 15, 2012</p>
                                    </div>
                                    <div class="mt-2">
                                    <h6>Lives:</h6>
                                    <p>United States of America</p>
                                    </div>
                                    <div class="mt-2">
                                    <h6>Email:</h6>
                                    <p><a href="mailto:nikjone@gmail.com"> nikjone@gmail.com</a></p>
                                    </div>
                                    <div class="mt-2">
                                    <h6>Url:</h6>
                                    <p><a href="https://getbootstrap.com/docs/4.0/getting-started/introduction/" target="_blank"> www.bootstrap.com </a></p>
                                    </div>
                                    <div class="mt-2">
                                    <h6>Contact:</h6>
                                    <p><a href="tel:001 4544 565 456">(001) 4544 565 456</a></p>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 profile-right">
                        <div class="iq-card iq-card-block iq-card-stretch">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                <h4 class="card-title">About</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <div class="about-info m-0 p-0">
                                <div class="row">
                                    <div class="col-12"><p>Lorem ipsum dolor sit amet, contur adipiscing elit.</p></div>
                                    <div class="col-3">Email:</div>
                                    <div class="col-9"><a href="mailto:nikjone@demoo.com"> nikjone@demoo.com </a></div>
                                    <div class="col-3">Phone:</div>
                                    <div class="col-9"><a href="tel:001 2351 256 12">001 2351 256 12</a></div>
                                    <div class="col-3">Location:</div>
                                    <div class="col-9">USA</div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="iq-card iq-card-block iq-card-stretch">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                <h4 class="card-title">stories</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <ul class="media-story m-0 p-0">
                                <li class="d-flex mb-4 align-items-center active">
                                    <img src="{{ asset('assets/images/page-img/s1.jpg') }}" alt="story-img" class="rounded-circle img-fluid" />
                                    <div class="stories-data ml-3">
                                        <h5>Web Design</h5>
                                        <p class="mb-0">1 hour ago</p>
                                    </div>
                                </li>
                                <li class="d-flex mb-4 align-items-center">
                                    <img src="{{ asset('assets/images/page-img/s2.jpg') }}" alt="story-img" class="rounded-circle img-fluid" />
                                    <div class="stories-data ml-3">
                                        <h5>App Design</h5>
                                        <p class="mb-0">4 hour ago</p>
                                    </div>
                                </li>
                                <li class="d-flex align-items-center">
                                    <img src="{{ asset('assets/images/page-img/s3.jpg') }}" alt="story-img" class="rounded-circle img-fluid" />
                                    <div class="stories-data ml-3">
                                        <h5>Abstract Design</h5>
                                        <p class="mb-0">9 hour ago</p>
                                    </div>
                                </li>
                                </ul>
                            </div>
                        </div>
                        <div class="iq-card iq-card-block iq-card-stretch">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                <h4 class="card-title">Suggestions</h4>
                                </div>
                                <div class="iq-card-header-toolbar d-flex align-items-center">
                                <a href="#"><i class="ri-more-fill"></i></a>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <ul class="suggestions-lists m-0 p-0">
                                <li class="d-flex mb-4 align-items-center">
                                    <div class="user-img img-fluid"><img src="{{ asset('assets/images/user/01.jpg') }}" alt="story-img" class="rounded-circle avatar-40" /></div>
                                    <div class="media-support-info ml-3">
                                        <h6>Paul Molive</h6>
                                        <p class="mb-0">4 mutual friends</p>
                                    </div>
                                    <div class="add-suggestion"><a href="javascript:void();"><i class="ri-user-add-line"></i></a></div>
                                </li>
                                <li class="d-flex mb-4 align-items-center">
                                    <div class="user-img img-fluid"><img src="{{ asset('assets/images/user/01.jpg') }}" alt="story-img" class="rounded-circle avatar-40" /></div>
                                    <div class="media-support-info ml-3">
                                        <h6>Paul Molive</h6>
                                        <p class="mb-0">4 mutual friends</p>
                                    </div>
                                    <div class="add-suggestion"><a href="javascript:void();"><i class="ri-user-add-line"></i></a></div>
                                </li>
                                <li class="d-flex mb-4 align-items-center">
                                    <div class="user-img img-fluid"><img src="{{ asset('assets/images/user/02.jpg') }}" alt="story-img" class="rounded-circle avatar-40" /></div>
                                    <div class="media-support-info ml-3">
                                        <h6>Anna Mull</h6>
                                        <p class="mb-0">6 mutual friends</p>
                                    </div>
                                    <div class="add-suggestion"><a href="javascript:void();"><i class="ri-user-add-line"></i></a></div>
                                </li>
                                <li class="d-flex mb-4 align-items-center">
                                    <div class="user-img img-fluid"><img src="{{ asset('assets/images/user/03.jpg') }}" alt="story-img" class="rounded-circle avatar-40" /></div>
                                    <div class="media-support-info ml-3">
                                        <h6>Paige Turner</h6>
                                        <p class="mb-0">8 mutual friends</p>
                                    </div>
                                    <div class="add-suggestion"><a href="javascript:void();"><i class="ri-user-add-line"></i></a></div>
                                </li>
                                <li class="d-flex mb-4 align-items-center">
                                    <div class="user-img img-fluid"><img src="{{ asset('assets/images/user/04.jpg') }}" alt="story-img" class="rounded-circle avatar-40" /></div>
                                    <div class="media-support-info ml-3">
                                        <h6>Barb Ackue</h6>
                                        <p class="mb-0">1 mutual friends</p>
                                    </div>
                                    <div class="add-suggestion"><a href="javascript:void();"><i class="ri-user-add-line"></i></a></div>
                                </li>
                                <li class="d-flex mb-4 align-items-center">
                                    <div class="user-img img-fluid"><img src="{{ asset('assets/images/user/05.jpg') }}" alt="story-img" class="rounded-circle avatar-40" /></div>
                                    <div class="media-support-info ml-3">
                                        <h6>Greta Life</h6>
                                        <p class="mb-0">3 mutual friends</p>
                                    </div>
                                    <div class="add-suggestion"><a href="javascript:void();"><i class="ri-user-add-line"></i></a></div>
                                </li>
                                <li class="d-flex mb-4 align-items-center">
                                    <div class="user-img img-fluid"><img src="{{ asset('assets/images/user/05.jpg') }}" alt="story-img" class="rounded-circle avatar-40" /></div>
                                    <div class="media-support-info ml-3">
                                        <h6>Ira Membrit</h6>
                                        <p class="mb-0">12 mutual friends</p>
                                    </div>
                                    <div class="add-suggestion"><a href="javascript:void();"><i class="ri-user-add-line"></i></a></div>
                                </li>
                                <li class="d-flex mb-4 align-items-center">
                                    <div class="user-img img-fluid"><img src="{{ asset('assets/images/user/07.jpg') }}" alt="story-img" class="rounded-circle avatar-40" /></div>
                                    <div class="media-support-info ml-3">
                                        <h6>Pete Sariya</h6>
                                        <p class="mb-0">2 mutual friends</p>
                                    </div>
                                    <div class="add-suggestion"><a href="javascript:void();"><i class="ri-user-add-line"></i></a></div>
                                </li>
                                </ul>
                                <a href="javascript:void();" class="btn btn-primary d-block"><i class="ri-add-line"></i> Load More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       </div>
    </div>
</div>

@endsection