<!DOCTYPE html>
<html lang="en">

<head>
    @include('front.partials.fhead')
</head>

<body>

<div id="wrapper">
    <!-- Header Container
    ================================================== -->
    <header id="header-container">
        @include('front.partials.fheader')
    </header>
    <div class="clearfix"></div>
    <!-- Header Container / End -->
    @yield('container')
</div>

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
                    E-Mail:<span> <a href="{{ url('/contact_us') }}">akbiglietti@gmail.com</a> </span><br>
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


<footer>
    {{--@include('front.partials.ffooter')--}}
    @yield('ffooter')
</footer>
</body>
</html>