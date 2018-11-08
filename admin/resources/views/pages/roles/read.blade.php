@extends('Admin::layouts.app')

@section('title')
    @lang('Admin::titles.roles.read', ['name' => $role['name']])
@endsection

@section('heading')
    @lang('Admin::titles.roles.read', ['name' => $role['name']])
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Cargo de {{ $role['name'] }}</h3>
                </div>
                <div class="box-body">
                    <strong><span class="fa fa-user margin-r-5"></span> Nome</strong>
                    <p class="text-muted">
                        {{ $role['name'] }}
                    </p>
                    <hr>

                    <strong><span class="fa fa-file-text margin-r-5"></span> Descrição</strong>
                    <p class="text-muted">
                        {{ $role['description'] }}
                    </p>
                    <hr>

                    <strong><span class="fa fa-clock-o margin-r-5"></span> Criado</strong>
                    <p class="text-muted">
                        {{ $role['created_at']->diffForHumans() }}
                    </p>
                    <hr>

                    <strong><span class="fa fa-key margin-r-5"></span> Permissões</strong>
                    <p class="text-muted">
                        Possui {{ $role->permissions()->count() }} permissões
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Permissões</h3>
                </div>
                <div class="box-body">
                    @foreach($role
                    ->permissions
                    ->sortBy(function($item, $key) {
                        return __('Admin::modules.' . strtolower(explode('-', $item['name'])[1]));
                    })
                    ->groupBy(function($item, $key) {
                        return explode('-', $item['name'])[1];
                    }) as $groupName => $groupItems)
                        <h4>{{ __('Admin::modules.' . $groupName) }}</h4>

                        <table class="table table-hover table-striped table-bordered data-table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Descrição</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($groupItems as $permission)
                                <tr>
                                    <td>{{ $permission['id'] }}</td>
                                    <td>{{ $permission['name'] }}</td>
                                    <td>{{ $permission['description'] }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Descrição</th>
                            </tr>
                            </tfoot>
                        </table>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection