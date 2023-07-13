<style>
    .header-right{
        color: black;
        padding: 0 2%;
    }
    .header-right:hover{
        color: red;
        text-decoration: none;
    }
    #locale_select:hover{
        background-color: lightpink;
        border-radius: 5px;
    }
    #locale_select{
        background: transparent;
        box-shadow: none;
        color: black;
    }
</style>
<!-- Header -->
<div id="header" style="background: dodgerblue">
    <div class="container">
        <!-- Left Side Content -->
        <div class="left-side">

            <!-- Logo -->
            <div id="logo" style="margin-right: 0">
                <a href="/"><img src="{{ url('backend/images/logo.png') }}" alt=""></a>
            </div>

            <!-- Mobile Navigation -->
            <div class="menu-responsive">
                <i class="fa fa-reorder menu-trigger"></i>
            </div>

            <!-- Main Navigation -->
            <nav id="navigation" class="style-1">
                <ul id="responsive">
                    <li><a href="/">@lang('global.header.home')</a></li>
                    <li><a href="{{ url('/tomorrowland') }}">@lang('global.header.tomorrowland')</a></li>
                    <li><a href="{{ url('/contact_us') }}">@lang('global.header.contact_us')</a></li>
                </ul>
            </nav>
            <div class="clearfix"></div>
            <!-- Main Navigation / End -->
        </div>
        <!-- Left Side Content / End -->

        <!-- Right Side Content / End -->
        <div class="right-side">
            <div class="header-widget">
                <a href="{{ url('register') }}" class="header-right"><i class="sl sl-icon-login"></i> Sign Up</a>
                <a href="{{ url('account') }}" class="header-right"><i class="sl sl-icon-user"></i> My Account</a>
                <div class="header-lang" style="display: inline-block;">
                    <select id="locale_select" onchange="select_lang()" style="border:none;width:auto;margin: 0; padding: 0;display: inline-block;">
                        <option value="en" @if(\App::getLocale() == 'en') selected @endif><span><i class="sl sl-icon-user"></i></span>ENGLISH</option>
                        <option value="it" @if(\App::getLocale() == 'it') selected @endif>ITALIAN</option>
                    </select>
                </div>
            </div>
        <!-- Right Side Content / End -->
    </div>
</div>
</div>
<!-- Header / End -->
<div class="clearfix"></div>
<!-- Header Container / End -->
<form id="locale_form" method="post" action="{{ url('/changelocale') }}" accept-charset="UTF-8" style="display: none">
    <input type="text" name="_token" value="{{ csrf_token() }}">
    <input type="text" name="locale" id="locale">
</form>
<script>
    function select_lang(){
        $("#locale").val($("#locale_select").val());
        $("#locale")[0].form.submit();
    }
</script>