
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


            <div class="col-md-6" style="padding: 2% 3%">
                <h2 style="font-family: Arial">Welcome!</h2>
                <p>@lang('global.package.p_name'): <span style="font-weight: bold">{{ $p_name }}</span></p>
                <p>@lang('global.package.t_title'): <span style="font-weight: bold">{{ $t_title }}</span></p>
                <p>@lang('global.package.t_desc'): <span style="font-weight: bold">{{ $t_desc }}</span></p>
                <p>@lang('global.package.t_price'): <span style="font-weight: bold">{{ $t_price }} &euro;</span></p>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-5" style="background: lightgreen;padding: 2% 3%;">
                <h3 style="text-align: center;">Your Order</h3>
                <h4>Price: <span id="total_price" style="color: orangered">0 &euro;</span></h4>
                <h5 id="user_check" style="text-align: center;color: red"></h5>
                <form action="{{ url('/tomorrowland/payment') }}" method="post">
                    {{ csrf_field() }}
                    <input id="order_p_id" name="order_p_id" value="{{ $p_id }}" style="display: none;">
                    <input id="order_t_index" name="order_t_index" value="{{ $t_index }}" style="display: none;">
                    <input id="order_p_name" name="order_p_name" value="{{$p_name}}" style="display: none;">
                    <input id="order_t_title" name="order_t_title" value="{{$t_title}}" style="display: none;">
                    @if(Auth::check())
                        <input id="order_userId" name="order_userId" value="{{ Auth::user()->id }}" style="display: none;">
                        <input id="order_name" name="order_name" value="{{ Auth::user()->name }}" style="display: none;">
                        <input id="order_email" name="order_email" value="{{ Auth::user()->email }}" style="display: none;">
                        <input id="order_phone" name="order_phone" value="{{ Auth::user()->phone }}" style="display: none;">
                        <input id="order_address" name="order_address" value="{{ Auth::user()->address }}" style="display: none;">
                        <input id="order_price" name="order_price" value="{{ $t_price }}" style="display: none;">
                        <input class="form-control" type="number" placeholder="Ticket Number" id="order_counts_no" name="order_counts" min="1" max="30" step="1" onchange="set_ticketsNum(event)" required>
                        <input type="submit" name="order_submit" id="order_submit" value="Order" style="display: none;">
                        <input type="button" class="btn btn-success" value="Order" onclick="order_click()">
                    @else
                        <input id="order_userId_no" name="order_userId" style="display: none;">
                        <input class="form-control" type="text" id="order_name_no" name="order_name" placeholder="User Name" required>
                        <input class="form-control" type="email" id="order_email_no" name="order_email" placeholder="Email" required>
                        <input class="form-control" type="text" id="order_phone_no" name="order_phone" placeholder="Phone Number" required>
                        <input class="form-control" type="text" id="order_address_no" name="order_address" placeholder="Address" required>
                        <input class="form-control" type="password" id="order_password_no" name="order_password" placeholder="Password" required>
                        <input id="order_price" name="order_price" value="{{ $t_price }}" style="display: none;">
                        <input class="form-control" type="number" placeholder="Ticket Number" id="order_counts_no" name="order_counts" min="1" max="30" step="1" onchange="set_ticketsNum(event)" required>
                        <input type="submit" name="order_submit" id="order_submit_no" value="Order" style="display: none;">
                        <input type="button" class="btn btn-success" value="Order" onclick="pre_order()">
                    @endif
                </form>
            </div>
        </div>
        <div class="row" style="padding: 1% 10% 1% 10%;">
            <h2 style="color: #de1767;">Service Fee, Payment Cost</h2>
            <p>You can get money from <span style="color: orange">DISCOUNT</span></p>
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
                            <p>You have to complete your profile.</p>
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
        function pre_order(){
            if ($("#order_name_no").val() == "" || $("#order_email_no").val() == "" || $("#order_phone_no").val() == "" || $("#order_address_no").val() == "" || $("#order_password_no").val() == "" || $("#order_counts_no").val() == ""){
                $("#order_submit_no").click();
            }else if(parseInt($("#order_counts_no").val()) > 30){
                $("#order_submit_no").click();
            }
            else{
                var userName = $("#order_name_no").val();
                var userEmail = $("#order_email_no").val();
                var userPhone = $("#order_phone_no").val();
                var userAddress = $("#order_address_no").val();
                var userPassword = $("#order_password_no").val();
                $.ajax({
                    type: 'POST',
                    url: '{{url('/tomorrowland/payment/pre_order')}}',
                    data:{
                        _token: "<?php echo csrf_token() ?>",
                        pre_order: "pre_order",
                        name: userName,
                        email: userEmail,
                        phone: userPhone,
                        address: userAddress,
                        password: userPassword
                    },
                    dataType: 'html',
                    success: function(response){
                        var res = JSON.parse(response);
                        if(res['success'] == true){
                            $("#order_userId_no").val(res['id']);
                            $("#order_submit_no").click();
                        }else if(res['success'] == false){
                            $("#user_check").html("This user already exist.<br> You have to login.")
                        }
                    }
                });
            }
        }
        function set_ticketsNum(e){
            var total_price = 0;
            var price = parseInt("{{$t_price}}");
            var num = parseInt(e.target.value);
            if(isNaN(num)){
                total_price = 0;
            }else{
                total_price = Math.round(num*price)
            }
            $("#total_price").html(total_price+" &euro;");
        }
    </script>
@endsection