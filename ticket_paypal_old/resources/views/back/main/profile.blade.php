@inject('request', 'Illuminate\Http\Request')
@extends('layouts.back1')

@section('bcontent')
    <!-- Titlebar -->
    <style>
        .edit-profile-photo img{
            height: 240px;
            width: auto;
        }
    </style>
    <div id="titlebar">
        <div class="row">
            <div class="col-md-12">
                <h2>@lang('global.account.account')</h2>
            </div>
        </div>
    </div>
    @isset($updated_user)
        <!-- Notice -->
        <div class="row">
            <div class="col-md-12">
                <div class="notification success closeable margin-bottom-30">
                    <p>Your account is updated <strong>Successfully!</strong></p>
                    <a class="close" href="#"></a>
                </div>
            </div>
        </div>
    @endisset

    <div class="row">
        <!-- Profile -->
        <div class="col-lg-6 col-md-12">
            <div class="dashboard-list-box margin-top-0">
                <h4 class="gray">@lang('global.account.profile_details')</h4>
                <div class="dashboard-list-box-static">
                    <!-- Avatar -->
                    <form method="post" action="{{ url('/account/profile') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="edit-profile-photo">
                        @if(Auth::user()->photo == "" || Auth::user()->photo == null)
                            <img src="{{ url('uploads/profile/default-profile.png') }}" alt="" id="profile_img">
                        @else
                            <img src="{{ url(Auth::user()->photo) }}" alt="" id="profile_img">
                        @endif
                        <div class="change-photo-btn">
                            <div class="photoUpload">
                                <span><i class="fa fa-upload"></i> @lang('global.account.upload_photo')</span>
                                <input accept="image/*" type="file" class="upload" name="profile_image" onchange="load_profile(event)"/>
                            </div>
                        </div>
                    </div>
                    <!-- Details -->
                    <div class="my-profile">
                        <label>@lang('global.account.username')</label>
                        <input value="{{ Auth::user()->name }}" type="text" name="reset_name">
                        <label>@lang('global.account.email')</label>
                        <input value="{{ Auth::user()->email }}" type="email" name="reset_email">
                        @isset($existing_user)
                            <p style="color: red">{{ $existing_user }}</p>
                        @endisset
                        <label>@lang('global.account.phone')</label>
                        <input value="{{ Auth::user()->phone }}" type="text" name="reset_phone">
                        <label>@lang('global.account.address')</label>
                        <input value="{{ Auth::user()->address }}" type="text" name="reset_address">
                    </div>
                    <button class="button margin-top-15" name="save_profile">@lang('global.app_save') @lang('global.account.change')</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Change Password -->
        <div class="col-lg-6 col-md-12">
            <div class="dashboard-list-box margin-top-0">
                <h4 class="gray">@lang('global.account.change') @lang('global.account.password')</h4>
                <div class="dashboard-list-box-static">
                    <!-- Change Password -->
                    <div class="my-profile">
                        <form action="{{ url('/account/reset_pwd') }}" method="post">
                            {{ csrf_field() }}
                            @isset($success_change)
                                <p style="color: green">{{ $success_change }}</p>
                            @endisset
                            <label class="margin-top-0">@lang('global.account.current') @lang('global.account.password')</label>
                            <input type="password" id="old_pwd" name="old_pwd" required>
                            @isset($oldpwd)
                                <p style="color: red;">Password is not correct.</p>
                            @endisset
                            <label>@lang('global.account.new') @lang('global.account.password')</label>
                            <input type="password" id="new_pwd" name="new_pwd" minlength="6" required>
                            <label>@lang('global.account.confirm') @lang('global.account.new') @lang('global.account.password')</label>
                            <input type="password" id="confirm_pwd" name="confirm_pwd" minlength="6" required>
                            <p id="match_err" style="color: red; display: none;">Password is not matched.</p>
                            <button type="button" class="button margin-top-15" onclick="reset_password_btn()"> @lang('global.account.change') @lang('global.account.password')</button>
                            <input type="submit" id="reset_pwd_sub" name="reset_pwd_sub" value="reset" style="display: none;">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

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
    <script>
        function reset_password_btn(){
            var old_p = $("#old_pwd").val();
            var new_p = $("#new_pwd").val();
            var confirm_p = $("#confirm_pwd").val();
            if(old_p == ""||new_p == ""||confirm_p == "") $("#reset_pwd_sub").click();
            if(new_p == confirm_p){
                $("#match_err").hide();
                if(new_p.length > 5){
                    $("#reset_pwd_sub").click();
                }
            }else{
                $("#match_err").show();
            }
        }
        function load_profile(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('profile_img');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
            console.log(event.target.files[0]);
        }
    </script>
@stop