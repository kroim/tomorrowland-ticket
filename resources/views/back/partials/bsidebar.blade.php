
<!-- Navigation
	================================================== -->
<!-- Responsive Navigation Trigger -->
<a href="{{url('/account')}}" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> @lang('global.dashboard.dashboard') @lang('global.dashboard.navigation')</a>
<div class="dashboard-nav">
    <div class="dashboard-nav-inner">
        <ul data-submenu-title="@lang('global.sidebar.main')">
            <li><a href="{{ url('/account') }}"><i class="sl sl-icon-home"></i> @lang('global.dashboard.dashboard')</a></li>
        </ul>
        @can('users_manage')
        <ul data-submenu-title="@lang('global.sidebar.listing')">
            <li><a href="{{ url('/account/packages') }}"><i class="sl sl-icon-envolope-letter"></i> @lang('global.sidebar.packages')</a></li>
            <li><a href="{{ url('/account/packages/add') }}"><i class="sl sl-icon-plus"></i> @lang('global.sidebar.add_packages')</a></li>
            {{--<li><a href="#"><i class="sl sl-icon-diamond"></i> @lang('global.sidebar.tickets')</a></li>--}}
            {{--<li><a href="#"><i class="sl sl-icon-film"></i> @lang('global.sidebar.notes')</a></li>--}}
        </ul>
        @endcan
        <ul data-submenu-title="Account">
            <li><a href="{{ url('/account/profile') }}"><i class="sl sl-icon-user"></i> @lang('global.sidebar.my_account')</a></li>
            <li><a href="#" onclick="$('#logout').submit();"><i class="sl sl-icon-power"></i> @lang('global.account.logout')</a></li>
        </ul>

    </div>
</div>
<!-- Navigation / End -->