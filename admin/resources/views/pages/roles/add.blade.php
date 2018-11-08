@extends('Admin::layouts.app')

@section('title')
    @lang('Admin::titles.roles.add')
@endsection

@section('heading')
    @lang('Admin::titles.roles.add')
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">
                Preencha os campos e clique no botão salvar
            </h3>
        </div>
        <div class="box-body">
            {!! Form::open(['route' =>  'api.admin.users.roles.add', 'method' => 'post']) !!}
            <div class="form-group has-feedback {{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name">@lang('Admin::forms.roles.name.title')</label>
                <input type="text"
                       class="form-control"
                       id="name"
                       name="name"
                       value="{{ old('name') }}"
                       placeholder="@lang('Admin::forms.roles.name.placeholder')">

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('description') ? ' has-error' : '' }}">
                <label for="description">@lang('Admin::forms.roles.description.title')</label>
                <input type="text"
                       class="form-control"
                       id="description"
                       name="description"
                       value="{{ old('name') }}"
                       placeholder="@lang('Admin::forms.roles.description.placeholder')">

                @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback">
                <label>@lang('Admin::forms.roles.permissions.title')</label>

                @foreach($permissions->sortBy(function($item, $Key) {
                    return __('Admin::modules.' . strtolower(explode('-', $item['name'])[1]));
                })->groupBy(function($item, $key) {
                    return explode('-', $item['name'])[1];
                })->chunk(1) as $permissionChunk)
                    <div class="row">
                        @foreach($permissionChunk as $groupName => $groupKeys)
                            <div class="col-md-12">
                                <h3>@lang('Admin::modules.' . strtolower($groupName))</h3>

                                <table class="table table-hover table-striped table-bordered data-table dt-responsive">
                                    <thead>
                                    <tr>
                                        <th data-priority="1">Ativo</th>
                                        <th>ID</th>
                                        <th data-priority="2">Nome Formatado</th>
                                        <th>Nome</th>
                                        <th>Descrição</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($groupKeys as $permission)
                                        <tr>
                                            <td>
                                                <input type="checkbox"
                                                       name="permissions[]"
                                                       id="{{ $permission['id'] }}"
                                                       value="{{ $permission['id'] }}">
                                            </td>
                                            <td>{{ $permission->id }}</td>
                                            <td>{{ title_case(str_replace('-', ' ', $permission->name)) }}</td>
                                            <td>{{ $permission->name }}</td>
                                            <td>{{ $permission->description }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Ativo</th>
                                        <th>ID</th>
                                        <th>Nome Formatado</th>
                                        <th>Nome</th>
                                        <th>Descrição</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        @endforeach
                    </div>
                @endforeach

            </div>

            <p class="pull-right">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </p>
            {!! Form::close() !!}
        </div>
    </div>
@endsection