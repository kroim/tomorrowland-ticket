@inject('request', 'Illuminate\Http\Request')
@extends('layouts.front1')

@section('container')
    <style>
        .overview p{
            word-break: break-all;
        }
    </style>
    <div>
        <div style="height: calc(20vw);width: 100%;background-image: url({{ asset('frontend/images/tomorrowland.jpg') }});background-size: 100%;background-position: center;">
            <div style="padding-top: calc(10vw);">
                <p style="font-family: 'Times New Roman'; font-weight: bold; font-size: calc(5vw); color: red; text-align: center;">
                    TOMORROWLAND
                </p>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                @isset($order)
                    <h3 style="color: orangered; text-align: center">@lang('global.payment.order_msg1')</h3>
                    <h4 style="text-align: center; margin-top: 5%;">@lang('global.payment.order_msg2')</h4>
                    <div class="overview" style="margin: 2% 5%;padding: 5% 5%;background: lightgreen;border-radius: 10px;">
                        <div style="text-align: center"><img src="{{url($order->qr_img)}}"></div>
                        <div class="row">
                            <div class="col-md-4 col-xs-4"><p>@lang('global.payment.order_id')</p></div>
                            <div class="col-md-8 col-xs-8"><p>{{$order->code}}</p></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-xs-4"><p>@lang('global.payment.total_price')</p></div>
                            <div class="col-md-8 col-xs-8"><p>{{$order->order_price}} &euro;</p></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-xs-4"><p>@lang('global.payment.buyer_name')</p></div>
                            <div class="col-md-8 col-xs-8"><p>{{Auth::user()->name}}</p></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-xs-4"><p>@lang('global.account.email')</p></div>
                            <div class="col-md-8 col-xs-8"><p>{{Auth::user()->email}}</p></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-xs-4"><p>@lang('global.account.phone')</p></div>
                            <div class="col-md-8 col-xs-8"><p>{{Auth::user()->phone}}</p></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-xs-4"><p>@lang('global.account.address')</p></div>
                            <div class="col-md-8 col-xs-8"><p>{{Auth::user()->address}}</p></div>
                        </div>
                    </div>
                @endisset
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
    <?php
//    session()->forget('success');
//    session()->forget('error');
//    session()->forget('order_data');
    ?>
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
    <script type="text/javascript" src="{{ url('backend/scripts/custom.js') }}"></script>
@endsection