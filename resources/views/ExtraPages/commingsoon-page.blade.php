@include('partials._body_style')
<div class="wrapper">
    <div class="iq-comingsoon pt-5">
       <div class="container-fluid">
          <div class="row justify-content-center">
             <div class="col-sm-8 text-center">
                <div class="iq-comingsoon-info">
                   <a href="#">
                   <img src={{asset("assets/images/logo-full2.png")}} class="img-fluid w-25" alt="">
                   </a>
                   <h2 class="mt-4 mb-1">Stay tunned, we're launching very soon</h2>
                   <p>We are working very hard to give you the best experience possible!</p>
                   <ul class="countdown" data-date="Feb 02 2022 20:20:22">
                      <li><span data-days>0</span>Days</li>
                      <li><span data-hours>0</span>Hours</li>
                      <li><span data-minutes>0</span>Minutes</li>
                      <li><span data-seconds>0</span>Seconds</li>
                   </ul>
                </div>
             </div>
          </div>
          <div class="row justify-content-center">
             <div class="col-lg-4">
                <form class="iq-comingsoon-form mt-5">
                   <div class="form-group">
                      <input type="email" class="form-control mb-0" id="exampleInputEmail1"  placeholder="Enter email address">
                      <button type="submit" class="btn btn-primary">Subscribe</button>
                   </div>
                </form>
             </div>
          </div>
       </div>
    </div>
 </div>


