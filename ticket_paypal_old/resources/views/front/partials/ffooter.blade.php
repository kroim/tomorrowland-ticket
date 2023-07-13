
<!-- Footer
    ================================================== -->
<div id="footer" class="dark">
    <!-- Main -->
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-6">
                <img class="footer-logo" src="{{ url('backend/images/logo.png') }}" alt="">
                <br><br>
                <p></p>
            </div>

            <div class="col-md-4 col-sm-6 ">
                <h4>Helpful Links</h4>
                <ul class="footer-links">
                    <li><a href="{{url('/login')}}">Login</a></li>
                    <li><a href="{{url('/register')}}">Sign Up</a></li>
                    <li><a href="{{url('/account')}}">My Account</a></li>
                </ul>

                <ul class="footer-links">
                    <li><a href="/">@lang('global.header.home')</a></li>
                    <li><a href="{{ url('/tomorrowland') }}">@lang('global.header.tomorrowland')</a></li>
                    <li><a href="{{ url('/contact_us') }}">@lang('global.header.contact_us')</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>

            <div class="col-md-3  col-sm-12">
                <h4>Contact Us</h4>
                <div class="text-widget">
                    <span>Headquarter, Maximilianstr 35a</span> <br>
                    WhatsApp: <span>0049 15145535122  </span><br>
                    E-Mail:<span> <a href="{{ url('/contact_us') }}">tomorrowland45800@outlook.com</a> </span><br>
                </div>

            </div>

        </div>

        <!-- Copyright -->
        <div class="row">
            <div class="col-md-12">
                <div class="copyrights">© 2018 Tickets. All Rights Reserved.</div>
            </div>
        </div>

    </div>

</div>
<!-- Footer / End -->


<!-- Back To Top Button -->
<div id="backtotop"><a href="#"></a></div>



<!-- Scripts
================================================== -->
<script type="text/javascript" src="{{ url('backend/scripts/jquery-2.2.0.min.js') }}"></script>
<script type="text/javascript" src="{{ url('backend/scripts/jpanelmenu.min.js') }}"></script>
<script type="text/javascript" src="{{ url('backend/scripts/chosen.min.js') }}"></script>
<script type="text/javascript" src="{{ url('backend/scripts/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ url('backend/scripts/rangeslider.min.js') }}"></script>
<script type="text/javascript" src="{{ url('backend/scripts/magnific-popup.min.js') }}"></script>
<script type="text/javascript" src="{{ url('backend/scripts/waypoints.min.js') }}"></script>
<script type="text/javascript" src="{{ url('backend/scripts/counterup.min.js') }}"></script>
<script type="text/javascript" src="{{ url('backend/scripts/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ url('backend/scripts/tooltips.min.js') }}"></script>
<script type="text/javascript" src="{{ url('backend/scripts/custom.js') }}"></script>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
<script type="text/javascript" src="{{ url('backend/scripts/infobox.min.js') }}"></script>
<script type="text/javascript" src="{{ url('backend/scripts/markerclusterer.js') }}"></script>
<script type="text/javascript" src="{{ url('backend/scripts/maps.js') }}"></script>