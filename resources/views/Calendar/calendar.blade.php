@extends('layouts.master')

@section('content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row row-eq-height">
          <div class="col-md-3">
             <div class="iq-card calender-small">
                <div class="iq-card-body">
                   <input type="hidden" class="displayCalendar d-none">
                </div>
             </div>
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title ">Classification</h4>
                   </div>

                   <div class="iq-card-header-toolbar d-flex align-items-center">
                      <a href="#"><i class="fa fa-plus  mr-0" aria-hidden="true"></i></a>
                   </div>
                </div>
                <div class="iq-card-body">
                   <ul class="m-0 p-0 job-classification">
                      <li class=""><i class="ri-check-line bg-danger"></i>Meeting</li>
                      <li class=""><i class="ri-check-line bg-success"></i>Business travel</li>
                      <li class=""><i class="ri-check-line bg-warning"></i>Personal Work</li>
                      <li class=""><i class="ri-check-line bg-info"></i>Team Project</li>
                   </ul>
                </div>
             </div>
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title">Today's Schedule</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                   <ul class="m-0 p-0 today-schedule">
                      <li class="d-flex">
                         <div class="schedule-icon"><i class="ri-checkbox-blank-circle-fill text-primary"></i></div>
                         <div class="schedule-text"> <span>Web Design</span>
                         <span>09:00 to 12:00</span></div>
                      </li>
                      <li class="d-flex">
                         <div class="schedule-icon"><i class="ri-checkbox-blank-circle-fill text-success"></i></div>
                         <div class="schedule-text"> <span>Participate in Design</span>
                         <span>09:00 to 12:00</span></div>
                      </li>
                   </ul>
                </div>
             </div>
          </div>
          <div class="col-md-9">
             <div class="iq-card">
             <div class="iq-card-header d-flex justify-content-between">
                <div class="iq-header-title">
                   <h4 class="card-title">Book Appointment</h4>
                </div>
                <div class="iq-card-header-toolbar d-flex align-items-center">
                   <a href="#" class="btn btn-primary"><i class="ri-add-line mr-2"></i>Book Appointment</a>
                </div>
             </div>
             <div class="iq-card-body">
                <div id='calendar1'></div>
             </div>
          </div>
          </div>
       </div>
    </div>
 </div>

@endsection
