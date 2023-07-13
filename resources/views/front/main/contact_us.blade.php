@inject('request', 'Illuminate\Http\Request')
@extends('layouts.front1')

@section('container')
    <!-- Content
================================================== -->

    <!-- Map Container -->
    <div class="contact-map margin-bottom-60">

        <!-- Google Maps -->
        <div id="singleListingMap-container">
            <div id="singleListingMap" data-latitude="48.139146" data-longitude="11.584028" data-map-icon="im im-icon-Map2"></div>
            <a href="#" id="streetView">Street View</a>
        </div>
        <!-- Google Maps / End -->

        <!-- Office -->
        <div class="address-box-container">
            <div class="address-container" data-background-image="{{ url('frontend/images/our-office.jpg') }}">
                <div class="office-address">
                    <h3>AK GAY Ltd.</h3>
                    <ul>
                        <li>Headquarter, Maximilianstr 35a</li>
                        <li>80539 München in Germany</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Office / End -->

    </div>
    <div class="clearfix"></div>
    <!-- Map Container / End -->


    <!-- Container / Start -->
    <div class="container" style="padding-bottom: 5%;">

        <div class="row">

            <!-- Contact Details -->
            <div class="col-md-4">

                <h4 class="headline margin-bottom-30">Find Us There</h4>

                <!-- Contact Details -->
                <div class="sidebar-textbox">

                    <ul class="contact-details">
                        {{--<li><i class="im im-icon-Phone-2"></i> <strong>Phone:</strong> <span> (123) 123-456 </span></li>--}}
                        <li><i class="im im-icon-Hand-TouchSmartphone"></i>
                            <strong>WhatsApp:</strong> <span><a href="https://www.whatsapp.com/">0049 15145535122 </a></span></li>
                        <li><i class="im im-icon-Envelope"></i> <strong>E-Mail:</strong> <span><a>akbiglietti@gmail.com</a></span></li>
                    </ul>
                </div>

            </div>

            <!-- Contact Form -->
            <div class="col-md-8">
                <h2 style="padding-bottom: 5%; text-align: center;">Contact Form</h2>
                @isset($confirm_message)
                <h4 style="text-align: center; color: cornflowerblue">{{$confirm_message}}</h4>
                @endisset
                <form action="{{ url('contact_us/contact_form') }}" method="post">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-5">
                            <input type="text" class="form-control" placeholder="Your Name" name="contact_name" required/>
                        </div>
                        <div class="col-md-7">
                            <input type="email" class="form-control" placeholder="Email" name="contact_email" required/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12"><input type="text" class="form-control" name="contact_subject" placeholder="Subject" required/></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <textarea class="form-control" name="contact_message" placeholder="Messages" required></textarea>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 2%;">
                        <div class="col-md-12">
                            <input type="submit" name="contact_submit" value="Send Message">
                        </div>
                    </div>
                </form>
            </div>
            <!-- Contact Form / End -->

        </div>

    </div>
    <!-- Container / End -->

@endsection

@section('ffooter')
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
@endsection