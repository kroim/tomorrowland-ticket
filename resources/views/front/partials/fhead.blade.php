
<head>

    <!-- Basic Page Needs
    ================================================== -->
    <title>Tomorrowland</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="icon" href="{{ url('backend/images/icon.png') }}" type="image/x-icon">
    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{ url('backend/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('backend/css/colors/main.css') }}" id="colors">
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <style>
        .alert {
            padding: 20px;
            background-color: rgba(255, 5, 10, 0.85);
            color: white;
            opacity: 1;
            transition: opacity 0.6s;
            margin-bottom: 0;
            font-size: calc(2.5vh);
            border-radius: 15px;
        }
        .alert.success {background-color: #4CAF50;}
        .alert.info {background-color: #2196F3;}
        .alert.warning {background-color: #ff9800;}
        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }
        .closebtn:hover {
            color: black;
        }
        .notification {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            text-align: center;
            z-index: 9999;
            margin-bottom: 0;
            padding: 10px 25px;
        }
    </style>
</head>