@extends('layouts.master')

@section('content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12 col-lg-6">
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title">Simple Column Chart</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                   <div id="am-simple-chart" style="height: 500px;"></div>
                </div>
             </div>
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title"> Layered Column Chart</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                   <div id="am-layeredcolumn-chart" style="height: 500px;"></div>
                </div>
             </div>
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title"> Bar and line chart mix</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                   <div id="am-barline-chart" style="height: 500px;"></div>
                </div>
             </div>
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title"> Line Chart with Scroll and Zoom</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                   <div id="am-linescrollzomm-chart" style="height: 500px;"></div>
                </div>
             </div>
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title"> Radar Chart</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                   <div id="am-radar-chart" style="height: 500px;"></div>
                </div>
             </div>
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title"> Polar Chart</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                   <div id="am-polar-chart" style="height: 500px;"></div>
                </div>
             </div>
          </div>
          <div class="col-sm-12 col-lg-6">
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title">Column and Line Mix Chart</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                   <div id="am-columnlinr-chart" style="height: 500px;"></div>
                </div>
             </div>
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title"> Stacked Column Chart</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                   <div id="am-stackedcolumn-chart" style="height: 500px;"></div>
                </div>
             </div>
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title"> Date Based Data</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                   <div id="am-datedata-chart" style="height: 500px;"></div>
                </div>
             </div>
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title"> zoomable on Value Axis</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                   <div id="am-zoomable-chart" style="height: 500px;"></div>
                </div>
             </div>
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title"> Polar Scatter</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                   <div id="am-polarscatter-chart" style="height: 500px;"></div>
                </div>
             </div>
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title"> 3D Pie Chart</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                   <div id="am-3dpie-chart" style="height: 500px;"></div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>


@endsection
