@inject('request', 'Illuminate\Http\Request')
@extends('layouts.back1')
<link rel="stylesheet" href="{{ url('table/font-awesome/4.5.0/css/font-awesome.min.css') }}" />
<link rel="stylesheet" href="{{ url('table/css/ace.min.css') }}" class="ace-main-stylesheet" id="main-ace-style" />
<style>
    @media (max-width: 1365px) {
        #logo a img{
            height:auto!important;
        }
        .dashboard #logo a, .dashboard #logo{
            height:auto!important;
        }
    }
    #dynamic-table td{
        word-break: break-all;
    }
</style>
@section('bcontent')
    <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>@lang('global.dashboard.dashboard')</h2>
            </div>
        </div>
    </div>

    <!-- Notice -->
    <div class="row">
        <div class="col-md-12">
            <div class="notification success closeable margin-bottom-30">
                <p>Your <strong>Orders</strong> have been approved!</p>
                <a class="close" href="#"></a>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="row">

        <!-- Item -->
        <div class="col-lg-4 col-md-4">
            <div class="dashboard-stat color-1">
                <div class="dashboard-stat-content"><h4>{{ $visitor_count }}</h4> <span>@lang('global.dashboard.total_visitors')</span></div>
                <div class="dashboard-stat-icon"><i class="im im-icon-Map2"></i></div>
            </div>
        </div>


        <!-- Item -->
        <div class="col-lg-4 col-md-4">
            <div class="dashboard-stat color-3">
                <div class="dashboard-stat-content"><h4>{{ $user_count }}</h4> <span>@lang('global.dashboard.total_users')</span></div>
                <div class="dashboard-stat-icon"><i class="im im-icon-Add-UserStar"></i></div>
            </div>
        </div>

        <!-- Item -->
        <div class="col-lg-4 col-md-4">
            <div class="dashboard-stat color-4">
                <div class="dashboard-stat-content"><h4>{{ $order_count }}</h4> <span>@lang('global.dashboard.total_orders')</span></div>
                <div class="dashboard-stat-icon"><i class="im im-icon-Heart"></i></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="clearfix">
                <div class="pull-right tableTools-container"></div>
            </div>
            <!-- div.dataTables_borderWrap -->
            <div>
                <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ticket</th>
                        <th>Price</th>
                        <th>QRCode</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr id="p_tr_{{ $order->id }}">

                            <td>{{ $order->code }}</td>
                            <td>{{ $order->order_ticket }}</td>
                            <td>{{ $order->order_price }} &euro;</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{url($order->qr_img)}}" download><i class="ace-icon fa fa-download bigger-130"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('footer')
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

    <!-- page specific plugin scripts -->
    <script src="{{ url('table/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('table/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('table/js/jquery.dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ url('table/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('table/js/buttons.flash.min.js') }}"></script>
    <script src="{{ url('table/js/buttons.html5.min.js') }}"></script>
    <script src="{{ url('table/js/buttons.print.min.js') }}"></script>
    <script src="{{ url('table/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ url('table/js/dataTables.select.min.js') }}"></script>
    <script>
        jQuery(function($) {
            //initiate dataTables plugin
            var myTable =
                $('#dynamic-table')
                //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
                    .DataTable( {
                        bAutoWidth: false,
                        "aoColumns": [
                            null, null, null,
                            { "bSortable": false }
                        ],
                        "aaSorting": [],
                        select: {
                            style: 'multi'
                        }
                    } );

        });
    </script>
@stop