@extends('layouts.auth')

@section('content')
    <link rel="stylesheet" href="{{ url('backend/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('backend/css/colors/main.css') }}" id="colors">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <!-- Login -->
            <div id="sign-in-dialog" class="zoom-anim-dialog">
            <div class="sign-in-form style-1">
                <div class="tabs-container alt">
                    <h2>@lang('global.account.login')</h2>
                    <div class="tab-content" id="tab1">
                        <form method="post" class="login" role="form" action="{{ url('login') }}">
                            {{ csrf_field() }}
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were problems with input:
                                    <br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <p class="form-row form-row-wide">
                                <label for="username">@lang('global.account.email'):
                                    <i class="im im-icon-Mail"></i>
                                    <input type="email" class="input-text" name="email" value="{{ old('email') }}" required/>
                                </label>
                            </p>

                            <p class="form-row form-row-wide">
                                <label for="password">@lang('global.account.password'):
                                    <i class="im im-icon-Lock-2"></i>
                                    <input class="input-text" type="password" name="password" id="password" required/>
                                </label>
                                <span class="lost_password">
                                                <a href="{{ route('auth.password.reset') }}" >@lang('global.account.pass_question')</a>
                                            </span>
                            </p>

                            <div class="form-row">
                                <input type="submit" class="button border margin-top-5" name="@lang('global.account.login')" value="Login" />
                                <div class="checkboxes margin-top-10">
                                    <input id="remember-me" type="checkbox" name="remember">
                                    <label for="remember-me">@lang('global.account.remember_me')</label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div style="text-align: right">
                        <label>@lang('global.account.message1') <a href="{{ url('register') }}" style="color: blue">@lang('global.account.register') @lang('global.account.now')</a></label>
                        <a href="/" style="color: green"><b>@lang('global.account.go_home')</b></a>
                    </div>
                </div>
            </div>
            </div>
            <!--
            <div class="panel panel-default">
                <div class="panel-heading">{{ ucfirst(config('app.name')) }} Login</div>
                <div class="panel-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were problems with input:
                            <br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="form-horizontal"
                          role="form"
                          method="POST"
                          action="{{ url('login') }}">
                        <input type="hidden"
                               name="_token"
                               value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input type="email"
                                       class="form-control"
                                       name="email"
                                       value="{{ old('email') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password"
                                       class="form-control"
                                       name="password">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a href="{{ route('auth.password.reset') }}">Forgot your password?</a>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <label>
                                    <input type="checkbox"
                                           name="remember"> Remember me
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit"
                                        class="btn btn-primary"
                                        style="margin-right: 15px;">
                                    Login
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            -->
        </div>
    </div>
@endsection
