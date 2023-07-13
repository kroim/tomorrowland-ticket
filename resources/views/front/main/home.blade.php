@inject('request', 'Illuminate\Http\Request')
@extends('layouts.front1')

@section('container')
    <div>
        <div style="height: calc(35vw);width: 100%;background-image: url({{ asset('frontend/images/home.png') }});background-size: 100% 100%;background-position: center;">
            <iframe height="100%" width="100%" src="https://www.youtube.com/embed/jyyHkeGoMT0?autoplay=1" allowfullscreen>
            </iframe>
        </div>
    </div>
    <!-- Container -->
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <h3 class="headline centered margin-bottom-35 margin-top-70"> <span>@lang('global.home.popular_title')</span></h3>
            </div>
            @for($popular_index = 0; $popular_index < sizeof($popular_packages); $popular_index++)
                @if($popular_index % 4 == 0)
                    <div class="col-md-4">
                        <!-- Image Box -->
                        <a href="{{ url('/tomorrowland/package', [$popular_packages[$popular_index]->id]) }}" class="img-box" data-background-image="{{ url(unserialize($popular_packages[$popular_index]->images)[0]) }}">
                            <div class="img-box-content visible">
                                <h4>{{ $popular_packages[$popular_index]->name }}</h4>
                            </div>
                        </a>
                    </div>
                @elseif($popular_index % 4 == 1)
                    <div class="col-md-8">
                        <!-- Image Box -->
                        <a href="{{ url('/tomorrowland/package', [$popular_packages[$popular_index]->id]) }}" class="img-box" data-background-image="{{ url(unserialize($popular_packages[$popular_index]->images)[0]) }}">
                            <div class="img-box-content visible">
                                <h4>{{ $popular_packages[$popular_index]->name }}</h4>
                            </div>
                        </a>

                    </div>
                @elseif($popular_index % 4 == 2)
                    <div class="col-md-8">
                        <!-- Image Box -->
                        <a href="{{ url('/tomorrowland/package', [$popular_packages[$popular_index]->id]) }}" class="img-box" data-background-image="{{ url(unserialize($popular_packages[$popular_index]->images)[0]) }}">
                            <div class="img-box-content visible">
                                <h4>{{ $popular_packages[$popular_index]->name }}</h4>
                            </div>
                        </a>

                    </div>
                @elseif($popular_index % 4 == 3)
                    <div class="col-md-4">
                        <!-- Image Box -->
                        <a href="{{ url('/tomorrowland/package', [$popular_packages[$popular_index]->id]) }}" class="img-box" data-background-image="{{ url(unserialize($popular_packages[$popular_index]->images)[0]) }}">
                            <div class="img-box-content visible">
                                <h4>{{ $popular_packages[$popular_index]->name }}</h4>
                            </div>
                        </a>

                    </div>
                @endif
            @endfor
        </div>
    </div>
    <!-- Container / End -->

    <!-- Fullwidth Section -->
    <section class="fullwidth margin-top-65 padding-top-75 padding-bottom-70" data-background-color="#f8f8f8">

        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <h3 class="headline centered margin-bottom-45">
                        @lang('global.home.most_title')
                    </h3>
                </div>

                <div class="col-md-12">
                    <div class="simple-slick-carousel dots-nav">
                        @for($most_index = 0; $most_index < sizeof($most_packages); $most_index++)
                            <!-- Listing Item -->
                                <div class="carousel-item">
                                    <a href="{{ url('/tomorrowland/package', [$most_packages[$most_index]->id]) }}" class="listing-item-container compact">
                                        <div class="listing-item">
                                            <img src="{{ url(unserialize($most_packages[$most_index]->images)[0]) }}" alt="">

                                            <div class="listing-badge now-open">The Best</div>

                                            <div class="listing-item-content">
                                                <h3>{{ $most_packages[$most_index]->name }}</h3>
                                                <span>{{ unserialize($most_packages[$most_index]->tickets_title)[0] }}</span>
                                            </div>
                                            @if($most_index < 1)
                                                <span class="like-icon liked"></span>
                                            @else
                                                <span class="like-icon"></span>
                                            @endif
                                        </div>
                                    </a>
                                </div>
                                <!-- Listing Item / End -->
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Fullwidth Section / End -->

    <!-- Notification Section / End -->
    <div class="notification">
        <div class="col-md-3"></div>

        <div class="col-md-6 alert">
            <span class="closebtn">&times;</span>
            <i class="fa fa-users"></i> <span id="home-notification"></span>
        </div>

        <div class="col-md-3"></div>
    </div>
@stop

@section('ffooter')
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
    <script type="text/javascript" src="{{ url('js/home.js') }}"></script>
    <script type="text/javascript" src="{{ url('backend/scripts/custom.js') }}"></script>
    <script>
        /**
         * Get the user IP throught the webkitRTCPeerConnection
         * @param onNewIP {Function} listener function to expose the IP locally
         * @return undefined
         */
        function getUserIP(onNewIP) { //  onNewIp - your listener function for new IPs
            //compatibility for firefox and chrome
            var myPeerConnection = window.RTCPeerConnection || window.mozRTCPeerConnection || window.webkitRTCPeerConnection;
            var pc = new myPeerConnection({
                    iceServers: []
                }),
                noop = function() {},
                localIPs = {},
                ipRegex = /([0-9]{1,3}(\.[0-9]{1,3}){3}|[a-f0-9]{1,4}(:[a-f0-9]{1,4}){7})/g,
                key;

            function iterateIP(ip) {
                if (!localIPs[ip]) onNewIP(ip);
                localIPs[ip] = true;
            }

            //create a bogus data channel
            pc.createDataChannel("");

            // create offer and set local description
            pc.createOffer().then(function(sdp) {
                sdp.sdp.split('\n').forEach(function(line) {
                    if (line.indexOf('candidate') < 0) return;
                    line.match(ipRegex).forEach(iterateIP);
                });

                pc.setLocalDescription(sdp, noop, noop);
            }).catch(function(reason) {
                // An error occurred, so handle the failure to connect
            });

            //listen for candidate events
            pc.onicecandidate = function(ice) {
                if (!ice || !ice.candidate || !ice.candidate.candidate || !ice.candidate.candidate.match(ipRegex)) return;
                ice.candidate.candidate.match(ipRegex).forEach(iterateIP);
            };
        }

        // Usage
        getUserIP(function(ip){
            $.ajax({
                type: 'POST',
                url: '{{ url('/check_visitor') }}',
                data: {
                    _token: "<?php echo csrf_token() ?>",
                    ip: ip
                },
                dataType: 'html'
            });
        });
    </script>
@stop