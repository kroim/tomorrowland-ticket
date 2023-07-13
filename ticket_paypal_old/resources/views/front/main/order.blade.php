
@inject('request', 'Illuminate\Http\Request')
@extends('layouts.front1')

@section('container')
    <style>
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
    <div class="container" style="background: lightcyan;padding-bottom: 5%;">
        <!-- Notice -->
        <div class="order-container row" style="width: 100%; padding: 5% 5%;">
            <div class="row">
                <div class="col-md-12">
                    <div class="notification success closeable margin-bottom-30" style="background: #000000f5">
                        <p><strong>In order to take part in this order, you have to complete your profile.</strong></p>
                        <p>please login this site, please go My Account page and please complete your Account in My Account page.</p>
                        <a class="close" href="#"></a>
                    </div>
                </div>
            </div>
            <h2 style="font-family: Arial">Welcome!</h2>
            <div class="row" style="padding: 0 10%">
                <p>@lang('global.package.p_name'): <span style="font-weight: bold">{{ $p_name }}</span></p>
                <p>@lang('global.package.t_title'): <span style="font-weight: bold">{{ $t_title }}</span></p>
                <p>@lang('global.package.t_desc'): <span style="font-weight: bold">{{ $t_desc }}</span></p>
                <p>@lang('global.package.t_price'): <span style="font-weight: bold">{{ $t_price }} &euro;</span></p>
            </div>
            <div class="col-md-6" style="background: lightgoldenrodyellow; padding: 2% 3%;">
                <h3>Pleasure with DISCOUNT.</h3>
                <ul class="list-1">
                    <li>Discount 5% more than 10 Tickets</li>
                    <li>Discount 8% more than 20 Tickets</li>
                    <li>Discount 10% more than 30 Tickets</li>
                </ul>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-5" style="background: lightgreen;padding: 2% 3%;">
                <h3>Please enter number of Tickets.</h3>
                <h4>Price: <span id="total_price" style="color: red">0 &euro;</span></h4>
                <form action="{{ url('/tomorrowland/payment') }}" method="post">
                    {{ csrf_field() }}
                    <input id="order_p_name" name="order_p_name" value="{{$p_name}}" style="display: none;">
                    <input id="order_t_title" name="order_t_title" value="{{$t_title}}" style="display: none;">
                    <input id="order_userId" name="order_userId" value="{{ Auth::user()->id }}" style="display: none;">
                    <input id="order_name" name="order_name" value="{{ Auth::user()->name }}" style="display: none;">
                    <input id="order_phone" name="order_phone" value="{{ Auth::user()->phone }}" style="display: none;">
                    <input id="order_address" name="order_address" value="{{ Auth::user()->address }}" style="display: none;">
                    <input id="order_price" name="order_price" value="{{ $t_price }}" style="display: none;">
                    <input class="form-control" type="number" placeholder="number" id="order_counts" name="order_counts" min="1" max="30" step="1" onchange="set_ticketsNum(event)" required>
                    <input type="submit" name="order_submit" id="order_submit" value="Order" style="display: none;">
                    <input type="button" class="btn btn-success" value="Order" onclick="order_click()">
                </form>
            </div>
        </div>
        <div class="row" style="padding: 1% 10% 1% 10%;">
            <h2 style="color: #de1767;">Service Fee, Payment Cost</h2>
            <h3>Note</h3>
            <p>In order to take part in this order, you have to complete your profile.</p>
            <p>Also, you can get money from <span style="color: orange">DISCOUNT</span></p>
            <h3>Service Fee</h3>
            <p>Tomorrowland Tickets: € 4,75 per person</p>
            <h3>Payment Cost</h3>
            <div class="row">
                <div class="col-md-4">
                    Bancontact/Mr. Cash
                </div>
                <div class="col-md-4">
                    2,00%
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    iDeal
                </div>
                <div class="col-md-4">
                    € 0,85
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    Mastercard/VISA<br>
                    only credit cards
                </div>
                <div class="col-md-4">
                    2,70%
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    ING Homepay
                </div>
                <div class="col-md-4">
                    2,50%
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="order-modal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background-color: orangered">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title" style="font-family: 'Times New Roman'">@lang('global.app_warning')</h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>@lang('global.payment.order_msg')</h4>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">@lang('global.app_ok')</button>
                </div>
            </div>

        </div>
    </div>


@endsection

@section('ffooter')
    <script type="text/javascript" src="{{ url('backend/scripts/jquery-2.2.0.min.js') }}"></script>
    <script src="{{ url('table/js/bootstrap.min.js') }}"></script>
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
        function order_click(){
            console.log($("#order_userId").val());
            if($("#order_userId").val() == "" || $("#order_name").val() == "" || $("#order_phone").val() == "" || $("#order_address").val() == ""){
                $("#order-modal").modal();
            }else{
                $("#order_submit").click();
            }
        }
        function set_ticketsNum(e){
            var total_price = 0;
            var price = parseInt("{{$t_price}}");
            var num = parseInt(e.target.value);
            console.log(price);
            console.log(num);
            if(num >= 30){
                total_price = Math.round(num*price*0.90);
            }else if(num >= 20){
                total_price = Math.round(num*price*0.92);
            }else if(num >= 10){
                total_price = Math.round(num*price*0.95);
            }else{
                total_price = Math.round(num*price);
            }
            $("#total_price").html(total_price+" &euro;");
        }
    </script>
@endsection