@extends('Admin::layouts.app')

@section('title')
    @lang('Admin::titles.users.add')
@endsection

@section('heading')
    @lang('Admin::titles.users.add')
@append

@section('content')
    <div class="box">
        <div class="box-header">
            Preencha os campos e clique no botão salvar
        </div>
        <div class="box-body">
            {!! Form::open(['route' => ['api.admin.users.add'],'method' => 'post', 'role' => 'form']) !!}
            <div class="form-group has-feedback {{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name">@lang('Admin::forms.users.name.title')</label>
                <input type="text"
                       class="form-control"
                       id="name"
                       name="name"
                       value="{{ old('name') }}"
                       placeholder="@lang('Admin::forms.users.name.placeholder')">

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback {{ $errors->has('last_name') ? ' has-error' : '' }}">
                <label for="last_name">@lang('Admin::forms.users.last_name.title')</label>
                <input type="text"
                       class="form-control"
                       id="last_name"
                       name="last_name"
                       value="{{ old('last_name') }}"
                       placeholder="@lang('Admin::forms.users.last_name.placeholder')">

                @if ($errors->has('last_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email">@lang('Admin::forms.users.email.title')</label>
                <input type="email"
                       class="form-control"
                       id="email"
                       name="email"
                       value="{{ old('email') }}"
                       placeholder="@lang('Admin::forms.users.email.placeholder')">

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback {{ $errors->has('role') ? ' has-error' : '' }}">
                <label for="role">@lang('Admin::forms.users.role.title')</label>
                <select class="form-control select2"
                        data-placeholder="Select a State"
                        style="width: 100%;"
                        id="role"
                        name="role">
                    @foreach($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }} - {{ $role->description }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password">@lang('Admin::forms.users.password.title')</label>
                <input type="password"
                       class="form-control"
                       id="password"
                       name="password"
                       placeholder="@lang('Admin::forms.users.password.placeholder')">

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label for="password_confirmation">@lang('Admin::forms.users.password_confirmation.title')</label>
                <input type="password"
                       class="form-control"
                       id="password_confirmation"
                       name="password_confirmation"
                       placeholder="@lang('Admin::forms.users.password_confirmation.placeholder')">

                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>

            <p class="pull-right">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </p>


            {!! Form::close() !!}
        </div>
    </div>
@endsection