
<style>
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
    <div id="header" class="not-sticky">
        <div class="container">

            <!-- Left Side Content -->
            <div class="left-side">

                <!-- Logo -->
                <div id="logo" style="background-color: white">
                    <a href="/"><img src="{{ url('backend/images/logo.png') }}" alt="" style="max-height:none;width: 100%;height: 100%;"></a>
                    <a href="/" class="dashboard-logo"><img src="{{ url('backend/images/logo.png') }}" alt="" style="max-height:none;width: 100%;height: 100%;"></a>
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
                <!-- Header Widget -->
                <div class="header-widget">
                    <!-- User Menu -->
                    <div class="user-menu">
                        <div class="user-name"><span>
                                @if(Auth::user()->photo == "" || Auth::user()->photo == null)
                                    <img src="{{ url('uploads/profile/default-profile.png') }}" alt="">
                                @else
                                    <img src="{{ url(Auth::user()->photo) }}" alt="">
                                @endif
                            </span><p style="display: inline-block;">{{Auth::user()->name}}</p></div>
                        <ul>
                            <li><a href="#" onclick="$('#logout').submit();">
                                    <i class="sl sl-icon-power"></i> @lang('global.account.logout')</a></li>
                        </ul>
                    </div>
                    <div style="display: inline-block;">
                        <select id="locale_select" onchange="select_lang()" style="border:none;width:auto;margin: 0; padding: 0;display: inline-block;">
                            <option value="en" @if(\App::getLocale() == 'en') selected @endif><span><i class="sl sl-icon-user"></i></span>@lang('global.lang.english')</option>
                            <option value="it" @if(\App::getLocale() == 'it') selected @endif>@lang('global.lang.italian')</option>
                        </select>
                    </div>
                </div>
                <!-- Header Widget / End -->
            </div>
            <!-- Right Side Content / End -->

        </div>
    </div>
    <!-- Header / End -->
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
