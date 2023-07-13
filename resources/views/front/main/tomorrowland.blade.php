@inject('request', 'Illuminate\Http\Request')
@extends('layouts.front1')

@section('container')
    <div>
        <div style="height: calc(20vw);width: 100%;background-image: url({{ asset('frontend/images/tomorrowland.jpg') }});background-size: 100%;background-position: center;">
            <div style="padding-top: calc(10vw);">
                <p style="font-family: 'Times New Roman'; font-weight: bold; font-size: calc(5vw); color: red; text-align: center;">
                    TOMORROWLAND
                </p>
            </div>
        </div>
        {{--<iframe height="100%" width="100%" src="https://www.youtube.com/embed/w9IT7Hwh8Zo"></iframe>--}}
    </div>
    <div class="container" style="padding: 2% 0 3% 0;">
        <div class="row">
            @foreach($packages as $package)
                <!-- Listing Item -->
                    <div class="col-lg-12 col-md-12">
                        <div class="listing-item-container list-layout">
                            <a href="{{ url('tomorrowland/package', [$package->id]) }}" class="listing-item">
                                <!-- Image -->
                                <div class="listing-item-image">
                                    <img src="{{ url(unserialize($package->images)[0]) }}" alt="">
                                </div>

                                <!-- Content -->
                                <div class="listing-item-content">
                                    @if($loop->index < 1)
                                        <div class="listing-badge now-open">The Best</div>
                                    @endif
                                    <div class="listing-item-inner">
                                        <h2 style="color: orange">{{ $package->name }}</h2>
                                        <span>{{ $package->main_description }}</span>
                                    </div>
                                    @if($loop->index < 1)
                                        <span class="like-icon liked"></span>
                                        @else
                                            <span class="like-icon"></span>
                                        @endif
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Listing Item / End -->
            @endforeach
        </div>
    </div>

    <!-- Notification Section / End -->
    <div class="notification">
        <div class="col-md-3"></div>

        <div class="col-md-6 alert">
            <span class="closebtn">&times;</span>
            <i class="fa fa-users"></i> <span id="home-notification"></span>
        </div>

        <div class="col-md-3"></div>
    </div>
@endsection

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
@endsection