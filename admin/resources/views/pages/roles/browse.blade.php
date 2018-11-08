@extends('Admin::layouts.app')

@section('title')
    @lang('Admin::titles.roles.browse')
@endsection

@section('heading')
    @lang('Admin::titles.roles.browse')
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Todos os cargos</h3>

            @can('add-roles')
                <div class="pull-right">
                    <a href="{{ route('admin.users.roles.add') }}" class="btn btn-success">Adicionar cargo</a>
                </div>
            @endcan
        </div>
        <div class="box-body">
            <table class="table table-hover table-striped table-bordered data-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->description }}</td>
                        <td>
                            @can('edit-roles')
                                <a class="btn btn-sm btn-primary"
                                   data-toggle="tooltip"
                                   data-placement="top"
                                   title="Editar"
                                   href="{{ route('admin.users.roles.edit', ['role' => $role]) }}">
                                    <span class="fa fa-edit"></span>
                                </a>
                            @endcan
                            @can('read-roles')
                                <a class="btn btn-sm btn-warning"
                                   data-toggle="tooltip"
                                   data-placement="top"
                                   title="Ver"
                                   href="{{ route('admin.users.roles.read', compact('role')) }}">
                                    <span class="fa fa-eye"></span>
                                </a>
                            @endcan
                            @can('delete-roles')
                                <a class="btn btn-sm btn-danger"
                                   data-toggle="tooltip"
                                   data-placement="top"
                                   title="Deletar"
                                   href="#remove/{{$role['id']}}"
                                   onclick="$('#delete-{{$role['id']}}').submit(); return false;">
                                    <span class="fa fa-trash"></span>

                                    {!! Form::open([
                                    'route' => ['admin.users.roles.delete', $role['id']],
                                    'id' => 'delete-'. $role['id'],
                                    'method' => 'delete']) !!}

                                    {!! Form::close() !!}
                                </a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
                </tfoot>

            </table>
        </div>
    </div>
@endsection