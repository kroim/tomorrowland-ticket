<!DOCTYPE html>
<html lang="en">

<head>
    @include('back.partials.bhead')
</head>


<body>

<div id="wrapper">
    <!-- Header Container
    ================================================== -->
    <header id="header-container" class="fixed fullwidth dashboard">
        @include('back.partials.bheader')
    </header>
    <div class="clearfix"></div>
    <!-- Header Container / End -->

    <!-- Sidebar -->
    <div id="dashboard">
        @include('back.partials.bsidebar')

        <div class="dashboard-content">
            @yield('bcontent')
        </div>
    </div>
</div>
{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">Logout</button>
{!! Form::close() !!}
<footer>
    @yield('footer')
    {{--@include('back.partials.bfooter')--}}
</footer>
</body>
</html>