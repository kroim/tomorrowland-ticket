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
    .dataTables_paginate.paging_simple_numbers ul li.disabled,.dataTables_paginate.paging_simple_numbers ul li.disabled a{
        cursor:not-allowed;
        background: transparent;
    }
    .dataTables_paginate.paging_simple_numbers ul .paginate_button.previous,
    .dataTables_paginate.paging_simple_numbers ul .paginate_button.next
    {
        background: white;
    }
    .dataTables_paginate.paging_simple_numbers ul .paginate_button.active{
        background: #6FAED9;
    }
</style>
@section('bcontent')
    <!-- Titlebar -->
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>@lang('global.sidebar.packages')</h2>
                <!-- Breadcrumbs -->
                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="#">@lang('global.dashboard.dashboard')</a></li>
                        <li>@lang('global.sidebar.packages')</li>
                    </ul>
                </nav>
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

                        <th>PackageID</th>
                        <th>Package Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($packages as $package)
                        <tr id="p_tr_{{ $package->id }}">

                            <td>{{ $package->id }}</td>
                            <td>{{ $package->name }}</td>
                            <td>
                                <div class="action-buttons">
                                    <button onclick='edit_package({{ $package->id }})'>
                                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                                    </button>
                                    <button onclick='delete_package({{ $package->id}},"{{  $package->name }}")'>
                                        <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete-package-modal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background-color: rgba(255,143,0,0.62); border-bottom-color: blue;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title" style="font-family: 'Times New Roman'">@lang('global.app_delete') @lang('global.package.package')</h3>
                </div>
                <form method="post" action="{{ url('account/packages/delete') }}">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Are you sure to delete this category?</h4>
                                <h5 id="delete_package_content"></h5>
                                <input id="dm_package_id" name="dm_package_id" style="display: none">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info" name="dm_package_submit" value="dm_package_submit">@lang('global.app_delete')</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">@lang('global.app_cancel')</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <form action="{{ url('account/packages/edit') }}" method="post" style="display: none">
        {{ csrf_field() }}
        <input type="text" id="ep_id" name="id">
        <input type="submit" id="ep_submit" name="get_sub" value="get_sub">
    </form>
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
        function edit_package(id){
            console.log(id);
            $("#ep_id").val(id);
            $("#ep_submit").click();
        }
        function delete_package(id, name){
            console.log(id);
            console.log(name);
            $("#dm_package_id").val(id);
            $("#delete_package_content").html("Name: "+name);
//            $("#delete_package_btn").click();
            $('#delete-package-modal').modal();
        }
    jQuery(function($) {
        //initiate dataTables plugin
        var myTable =
            $('#dynamic-table')
            //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
                .DataTable( {
                    bAutoWidth: false,
                    "aoColumns": [
                        null, null,
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