@extends('layouts.auth')

@section('content')
    <link rel="stylesheet" href="{{ url('backend/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('backend/css/colors/main.css') }}" id="colors">
    <div id="sign-in-dialog" class="zoom-anim-dialog">
        <div class="sign-in-form style-1">
            <div class="tabs-container alt">
                <h2>@lang('global.account.register')</h2>
                <!-- Register -->
                <div class="tab-content" id="tab2">
                    <form class="register" role="form" method="POST" action="{{ url('/register') }}">
                        {{csrf_field()}}
                        <p class="form-row form-row-wide{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="username2">@lang('global.account.username'):
                                <i class="im im-icon-Male"></i>
                                <input type="text" class="input-text" name="name" id="name" value="{{ old('name') }}" required autofocus />
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </label>
                        </p>

                        <p class="form-row form-row-wide{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="email2">@lang('global.account.email') @lang('global.account.address'):
                                <i class="im im-icon-Mail"></i>
                                <input type="email" class="input-text" name="email" id="email" value="{{ old('email') }}" required />
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </label>
                        </p>

                        <p class="form-row form-row-wide{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="password1">@lang('global.account.password'):
                                <i class="im im-icon-Lock-2"></i>
                                <input class="input-text" type="password" name="password" id="password" required/>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </label>
                        </p>

                        <p class="form-row form-row-wide{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="password2">@lang('global.account.repeat') @lang('global.account.password'):
                                <i class="im im-icon-Lock-2"></i>
                                <input class="input-text" type="password" name="password_confirmation" id="password-confirm" required/>
                            </label>
                        </p>

                        <input type="submit" class="button border fw margin-top-10" name="register" value="@lang('global.account.register')" />
                    </form>
                </div>
                <div style="text-align: right">
                    <label>@lang('global.account.message2') <a href="{{ url('login') }}" style="color: blue">@lang('global.account.login') @lang('global.account.now')</a></label>
                    <a href="/" style="color: green"><b>@lang('global.account.go_home')</b></a>
                </div>
            </div>
        </div>
    </div>
@endsection
