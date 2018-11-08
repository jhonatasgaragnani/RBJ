@extends('Admin::layouts.app')

@section('title')
    @lang('Admin::titles.users.browse')
@endsection

@section('heading')
    @lang('Admin::titles.users.browse')
@append

@section('content')
    @if($users->count() > 0)
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Todos os Usuários</h3>
                @can('add-users')
                    <div class="pull-right">
                        <a href="{{ route('admin.users.add') }}" class="btn btn-success">
                            Adicionar usuário
                        </a>
                    </div>
                @endcan
            </div>
            <div class="box-body">
                <table class="table table-hover table-striped table-bordered data-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Sobrenome</th>
                        <th>Cargos</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td>{!! $user->roles()->get(['name'])->implode('name', ', ') !!}</td>
                            <td>
                                @can('edit-users')

                                    <a class="btn btn-sm btn-primary"
                                       data-toggle="tooltip"
                                       data-placement="top"
                                       title="Editar"
                                       href="{{ route('admin.users.edit', ['user' => $user]) }}">
                                        <span class="fa fa-edit"></span>
                                    </a>
                                @endcan

                                @can('delete-users')
                                    <a class="btn btn-sm btn-danger"
                                       data-toggle="tooltip"
                                       data-placement="top"
                                       title="Deletar"
                                       href="#remove/{{$user['id']}}"
                                       onclick="$('#delete-{{$user['id']}}').submit(); return false;">
                                        <span class="fa fa-trash"></span>

                                        {!! Form::open([
                                        'route' => ['admin.users.delete', $user['id']],
                                        'id' => 'delete-'. $user['id'],
                                        'method' => 'delete']) !!}

                                        {!! Form::close() !!}
                                    </a>

                                @endcan

                                @can('read-users')
                                    <a class="btn btn-sm btn-warning"
                                       data-toggle="tooltip"
                                       data-placement="top"
                                       title="Ver"
                                       href="{{ route('admin.users.read', compact('user')) }}">
                                        <span class="fa fa-eye"></span>
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
                        <th>Sobrenome</th>
                        <th>Cargos</th>
                        <th>Ações</th>
                    </tr>
                    </tfoot>

                </table>
            </div>
        </div>
    @else
        <div class="callout callout-danger">
            <h4>Crie alguns usuários!</h4>

            <p>Não há usuários para mostrar, crie alguns para começar.
            @can('add-users')
                <div class="pull-right">
                    <a href="{{ route('admin.users.add') }}" class="btn btn-success">
                        Adicionar usuário
                    </a>
                </div>
            @endcan
            <div class="clearfix"></div>
            </p>
        </div>
    @endif

    <script>

    </script>
@append