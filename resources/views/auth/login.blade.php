@extends('Admin::layouts.simple')

@section('body_classes', 'login-page hold-transition')

@section('content')
    <div class="login-box">

        <div class="login-logo">
            <a href="/"><b>{{ config('app.name', 'XFind') }}</b></a>
        </div>

        <div class="login-box-body">
            <p class="login-box-msg">@lang('messages.login.main')</p>

            {!! Form::open(['route' => 'login', 'method' => 'post']) !!}
            <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email"
                       name="email"
                       class="form-control"
                       placeholder="Email"
                       value="{{ old('email') }}">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password"
                       name="password"
                       class="form-control"
                       placeholder="Password"
                       value="{{ old('password') }}">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="row">
                <div class="col-xs-8">
                    <input type="checkbox"
                           name="remember"
                           id="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">
                        @lang('messages.login.remember')
                    </label>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit"
                            class="btn btn-primary btn-block btn-flat">
                        @lang('messages.login.login_button')
                    </button>
                </div>
                <!-- /.col -->
            </div>
            {!! Form::close() !!}
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
@endsection
