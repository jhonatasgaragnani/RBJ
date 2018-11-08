@extends('Admin::layouts.app')

@section('title')
    @lang('Admin::titles.users.edit', ['name' => $user['name']])
@endsection

@section('heading')
    @lang('Admin::titles.users.edit', ['name' => $user['name']])
@append

@section('content')
    <div class="box">
        <div class="box-header">
            Edite o usuário e clique no botão salvar
        </div>
        <div class="box-body">
            {!! Form::open(['route' => ['api.admin.users.edit', 'user'=> $user],'method' => 'put', 'role' => 'form']) !!}
            <div class="form-group has-feedback {{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name">@lang('Admin::forms.users.name.title')</label>
                <input type="text"
                       class="form-control"
                       id="name"
                       name="name"
                       value="{{ old('name', $user->name) }}"
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
                       value="{{ old('last_name', $user->last_name) }}"
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
                       value="{{ old('email', $user->email) }}"
                       placeholder="@lang('Admin::forms.users.email.placeholder')">

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
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


            <table class="table table-hover table-striped table-bordered data-table dt-responsive">
                <thead>
                <tr>
                    <th>Ativo</th>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>
                            <input type="checkbox"
                                   name="roles[]"
                                   id="{{ $role['id'] }}"
                                   value="{{ $role['id'] }}"
                                    {{ $user->roles->contains($role) ? 'checked' : '' }}>
                        </td>
                        <td>
                            {{ $role['id'] }}
                        </td>
                        <td>
                            {{ $role['name'] }}
                        </td>
                        <td>
                            {{ $role['description'] }}
                        </td>

                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Ativo</th>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                </tr>
                </tfoot>
            </table>
            <div class="form-group {{ $errors->has('permissions') ? 'has-error' : '' }}">
                @if ($errors->has('permissions'))
                    <span class="help-block">
                        <strong>{{ $errors->first('permissions') }}</strong>
                    </span>
                @endif
            </div>

            <p class="pull-right">
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </p>

            {!! Form::close() !!}
        </div>
    </div>
@endsection