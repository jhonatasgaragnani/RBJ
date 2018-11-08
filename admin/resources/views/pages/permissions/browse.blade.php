@extends('Admin::layouts.app')

@section('title')
    @lang('Admin::titles.permissions.browse')
@endsection

@section('heading')
    @lang('Admin::titles.permissions.browse')
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Todas as permissões</h3>
        </div>
        <div class="box-body">
            <table class="table table-hover table-striped table-bordered data-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Slug</th>
                    <th>Descrição</th>
                    <th>Criado em</th>
                </tr>
                </thead>
                <tbody>
                @foreach($permissions as $permission)
                    <tr>
                        <td>{{ $permission['id'] }}</td>
                        <td>{{ __('Admin::permissions.' . $permission['name']) }}</td>
                        <td>{{ $permission['name'] }}</td>
                        <td>{{ $permission['description'] }}</td>
                        <td>{{ $permission['created_at']->format('d-m-Y') }}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Slug</th>
                    <th>Descrição</th>
                    <th>Criado em</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection