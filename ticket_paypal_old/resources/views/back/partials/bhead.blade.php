
<title>Dashboard</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<link rel="icon" href="{{ url('backend/images/icon.png') }}" type="image/x-icon">

<link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('backend/css/colors/main.css') }}" id="colors">
<link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
<style>
    .pagination{
        text-align: right;
    }
    /*.modal-backdrop{*/
        /*z-index: auto;*/
    /*}*/
    .modal-dialog{
        margin: 200px auto;
    }
    .dashboard-content{
        z-index: inherit;
    }
    .dashboard-nav ul li a{
        text-decoration: none;
    }
</style>

<script src="{{ url('backend/scripts/jquery-2.2.0.min.js') }}"></script>
<script src="{{ url('js/bootstrap.min.js') }}"></script>
{{--<script src="{{ url('table/js/bootstrap.min.js') }}"></script>--}}