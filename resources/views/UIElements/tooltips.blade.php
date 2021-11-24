@extends('layouts.master')

@section('content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12 col-lg-6">
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title">Tooltips</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                   <p>Images in Bootstrap are made responsive with <code>.img-fluid</code>. <code>max-width: 100%;</code> and <code>height: auto;</code> are applied to the image so that it scales with the parent element.</p>
                   <button type="button" class="btn btn-secondary mt-3" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                   Tooltip on top
                   </button>
                   <button type="button" class="btn btn-secondary mt-3" data-toggle="tooltip" data-placement="right" title="Tooltip on right">
                   Tooltip on right
                   </button>
                   <button type="button" class="btn btn-secondary mt-3" data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">
                   Tooltip on bottom
                   </button>
                   <button type="button" class="btn btn-secondary mt-3" data-toggle="tooltip" data-placement="left" title="Tooltip on left">
                   Tooltip on left
                   </button>
                </div>
             </div>
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title">Disabled elements</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                   <p>Elements with the <code>disabled</code> attribute aren’t interactive, meaning users cannot focus, hover, or click them to trigger a tooltip (or popover). As a workaround, you’ll want to trigger the tooltip from a wrapper <code>&lt;div&gt;</code> or <code>&lt;span&gt;</code>, ideally made keyboard-focusable using <code>tabindex="0"</code>, and override the <code>pointer-events</code> on the disabled element.</p>
                   <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Disabled tooltip">
                   <button class="btn btn-primary" style="pointer-events: none;" type="button" disabled>Disabled button</button>
                   </span>
                </div>
             </div>
          </div>
          <div class="col-sm-12 col-lg-6">
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title">Tooltips</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                   <p>Images in Bootstrap are made responsive with <code>.img-fluid</code>. <code>max-width: 100%;</code> and <code>height: auto;</code> are applied to the image so that it scales with the parent element.</p>
                   <button type="button" class="btn btn-primary mt-3" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                   Tooltip on top
                   </button>
                   <button type="button" class="btn btn-success mt-3" data-toggle="tooltip" data-placement="right" title="Tooltip on right">
                   Tooltip on right
                   </button>
                   <button type="button" class="btn btn-danger mt-3" data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">
                   Tooltip on bottom
                   </button>
                   <button type="button" class="btn btn-info mt-3" data-toggle="tooltip" data-placement="left" title="Tooltip on left">
                   Tooltip on left
                   </button>
                </div>
             </div>
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title">Tooltips</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                   <p>Images in Bootstrap are made responsive with <code>.img-fluid</code>. <code>max-width: 100%;</code> and <code>height: auto;</code> are applied to the image so that it scales with the parent element.</p>
                   <button type="button" class="btn iq-bg-primary mt-3" data-toggle="tooltip" data-placement="top" title="Tooltip on top">
                   Tooltip on top
                   </button>
                   <button type="button" class="btn iq-bg-success mt-3" data-toggle="tooltip" data-placement="right" title="Tooltip on right">
                   Tooltip on right
                   </button>
                   <button type="button" class="btn iq-bg-danger mt-3" data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom">
                   Tooltip on bottom
                   </button>
                   <button type="button" class="btn iq-bg-info mt-3" data-toggle="tooltip" data-placement="left" title="Tooltip on left">
                   Tooltip on left
                   </button>
                </div>
             </div>
             
          </div>
          <div class="col-lg-12">
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title">Disabled elements</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                   <p>Elements with the <code>disabled</code> attribute aren’t interactive, meaning users cannot focus, hover, or click them to trigger.</p>
                   <!-- HTML to write -->
                   <a href="#" data-toggle="tooltip" title="Some tooltip text!">Hover over me</a>
                   <!-- Generated markup by the plugin -->
                   <div class="tooltip bs-tooltip-top" role="tooltip">
                      <div class="arrow"></div>
                      <div class="tooltip-inner">
                         Some tooltip text!
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
@endsection
