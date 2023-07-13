@inject('request', 'Illuminate\Http\Request')
@extends('layouts.front1')

@section('container')
    <style>
        .ticket-div input[type=submit], .ticket-div button{
            width: auto;
            border-radius: 3px;
            height: auto;
            padding: 1% 5%;
            background-color: green;
        }
        .ticket-div input[type=submit]:hover, .ticket-div button:hover{
            background-color: rgba(0, 181, 0, 0.69);
        }
        .pricing-list-container ul{
            margin-bottom: 0;
        }
    </style>
    <div class="listing-slider mfp-gallery-container margin-bottom-0">
        @php $images = unserialize($package->images) @endphp
        @for($image_index = 0; $image_index < sizeof($images); $image_index++)
            <a href="{{url($images[$image_index])}}" data-background-image="{{url($images[$image_index])}}" class="item mfp-gallery"></a>
        @endfor
    </div>

    <!-- Content
================================================== -->
    <div class="container" style="padding-bottom: 5%;">
        <div class="row sticky-wrapper">
            <div class="col-lg-8 col-md-8 padding-right-30">
                <!-- Titlebar -->
                <div id="titlebar" class="listing-titlebar">
                    <div class="listing-titlebar-title">
                        <h2 style="color: green; font-weight: bold">{{ $package->name }}</h2>
                    </div>
                </div>

                <!-- Overview -->
                <div id="listing-overview" class="listing-section">
                    <!-- Description -->
                    <p>{{ $package->main_description }}</p>
                    <!-- Title Info -->
                    <h3 class="listing-desc-headline">{{ $package->sub_title }}</h3>
                    <p>{{ $package->sub_description }}</p>
                    <!-- Includes -->
                    @php $includes = unserialize($package->includes) @endphp
                    @if(sizeof($includes) == 1 && $includes[0] == null)
                        <div></div>
                    @elseif(sizeof($includes) == 0)
                        <div></div>
                    @else
                        <h3 class="listing-desc-headline">{{ $package->name }} @lang('global.app_notes'): </h3>
                        <ul class="list-1 margin-top-0">
                            @for($include_index = 0; $include_index < sizeof($includes); $include_index++)
                                @if($includes[$include_index] == null) @continue @endif
                                <li>{{ $includes[$include_index] }}</li>
                            @endfor
                        </ul>
                    @endif
                    <!-- Notes -->
                    @php $notes = unserialize($package->notes) @endphp
                    @if(sizeof($notes) == 1 && $notes[0] == null)
                        <div></div>
                    @elseif(sizeof($notes) == 0)
                        <div></div>
                    @else
                        <h3 class="listing-desc-headline">@lang('global.app_notes'): </h3>
                        <ul class="list-2 margin-top-0">
                            @for($note_index = 0; $note_index < sizeof($notes); $note_index++)
                                @if($notes[$note_index] == null) @continue @endif
                                <li>{{ $notes[$note_index] }}</li>
                            @endfor
                        </ul>
                    @endif
                </div>

                <!-- Food Menu -->
                <div id="listing-pricing-list" class="listing-section">
                    <h3 class="listing-desc-headline margin-top-70 margin-bottom-30">@lang('global.app_tickets')</h3>
                        <div class="pricing-list-container">
                        @php
                            $tickets_name = unserialize($package->tickets_title);
                            $tickets_description = unserialize($package->tickets_description);
                            $tickets_price = unserialize($package->tickets_price);
                        @endphp
                        @for($ticket_index = 0; $ticket_index < sizeof($tickets_name); $ticket_index++)
                            <h4>{{ $tickets_name[$ticket_index] }}</h4>
                            <ul><li>
                                    <p>{{ $tickets_description[$ticket_index] }}</p>
                                    <span style="color: orangered">&#128;{{ $tickets_price[$ticket_index] }}</span>
                                </li></ul>
                            <div class="ticket-div" style="text-align: right">
                                <form action="{{ url('/tomorrowland/order') }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="p_id" value="{{ $package->id }}">
                                    <input type="hidden" name="t_id" value="{{ $ticket_index }}">
                                    <input type="submit" name="start_order" value="BUY !" class="btn btn-success">
                                </form>
                            </div>
                        @endfor
                        </div>
                </div>
                <!-- Food Menu / End -->
            </div>

            <!-- Sidebar
            ================================================== -->
            <div class="col-lg-4 col-md-4 margin-top-75 sticky">

                <!-- Contact -->
                <div class="boxed-widget margin-top-35">
                    <h3><i class="sl sl-icon-pin"></i> Contact</h3>
                    <ul class="listing-details-sidebar">
                        <li><i class="sl sl-icon-screen-smartphone"></i> <a href="#">0049 15145535122</a></li>
                        <li><i class="fa fa-envelope-o"></i><a>akbiglietti@gmail.com </a></li>
                    </ul>

                    <a href="{{ url('/contact_us') }}" class="send-message-to-owner button"><i class="sl sl-icon-envelope-open"></i> Send Message</a>
                </div>
                <!-- Contact / End-->


                <!-- Opening Hours -->
                <div class="boxed-widget opening-hours margin-top-35">
                    <div class="listing-badge now-open">Now Open</div>
                    <h3><i class="sl sl-icon-clock"></i> @lang('global.app_services')</h3>
                    <ul class="list-4">
                        @php $details = unserialize($package->tickets_detail)  @endphp
                        @for($detail_index = 0; $detail_index < sizeof($details); $detail_index++)
                            <li>{{ $details[$detail_index] }}</li>
                        @endfor
                    </ul>
                    <div></div>
                    <ul>
                        <li style="color: darkred;">@php echo str_replace("\n", "<br>", $package->tickets_time) @endphp</li>
                    </ul>
                </div>
                <!-- Opening Hours / End -->
            </div>
            <!-- Sidebar / End -->
        </div>
    </div>

    <!-- Notification Section / End -->
    <div class="notification">
        <div class="col-md-3"></div>

        <div class="col-md-6 alert warning">
            <span class="closebtn">&times;</span>
            <i class="fa fa-warning"></i> <span id="package-notification"></span>
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

