@inject('request', 'Illuminate\Http\Request')
@extends('layouts.front1')

@section('container')
    <style>
        .orderDataPage p{
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
        <div class="row" style="padding: 5% 5%">
            <h2 style="text-align: center; color: green;">@lang('global.payment.order_msg3')</h2>
            <div class="col-xs-2"></div>
            <div class="col-xs-8 orderDataPage" style="background: lightblue; padding: 5% 5%;">
                <p>@lang('global.package.t_title'): {{ $order_data['tTitle'] }}</p>
                <p>@lang('global.package.t_counts'): {{ $order_data['orderCounts'] }}</p>
                <p>@lang('global.payment.total_price'): {{ $order_data['totalPrice'] }} &euro;</p>
                <button type="button" class="btn btn-success" onclick="setPayment()">@lang('global.payment.pay_now') {{ $order_data['totalPrice'] }} &euro;</button>
            </div>
            <div class="col-xs-2"></div>
        </div>
    </div>

    <form style="display: none;">
        <input name="pay_user_id" value="{{$order_data['userId']}}">
        <input name="pay_p_id" value="{{$order_data['pId']}}">
        <input name="pay_t_index" value="{{$order_data['tIndex']}}">
        <input name="pay_t_count" value="{{$order_data['orderCounts']}}">
    </form>

    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" name="frmPayPal1">
        <input type="hidden" name="business" value="firstGao@hotmail.com">
        <input type="hidden" name="cmd" value="_xclick">
        <input type="hidden" name="item_name" value="Tomorrowland Payment">
        <input type="hidden" name="item_number" value="123">
        <input type="hidden" name="notify_url" value="">
        <input type="hidden" name="credits" value="510">
        <input type="hidden" name="userid" value="1">
        <input type="hidden" id="package-amount" name="amount" placeholder="amount" value="{{ $order_data['totalPrice'] }}">
        <input type="hidden" name="cpp_header_image" value="{{url('backend/images/logo.png')}}">
        <input type="hidden" name="no_shipping" value="1">
        <input type="hidden" name="currency_code" value="USD">
        <input type="hidden" name="handling" value="0">
        <input type="hidden" id="package-cancel" name="cancel_return" value="{{url('/tomorrowland')}}">
        <input type="hidden" name="return" id="package-success" value="{{url('tomorrowland/payment_success')}}">
        <input type="submit" id="package-pay-btn" name="submit" style="display: none">
    </form>
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
    <script>
        function setPayment(){
            $("#package-pay-btn").click();
        }
    </script>
@endsection