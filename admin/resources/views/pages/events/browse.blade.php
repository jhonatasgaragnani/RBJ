@extends('Admin::layouts.app')

@section('title')
    @lang('Admin::titles.events.browse')
@endsection

@section('heading')
    @lang('Admin::titles.events.browse')
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Todas todos os eventos</h3>

            @can('add-events')
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('admin.blog.events.add') }}">Adicionar evento</a>
                </div>
            @endcan
        </div>
        <div class="box-body">
            <table class="table table-striped table-hover table-bordered data-table dt-responsive">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Ativo</th>
                    <th>Autor</th>
                    <th>Titulo</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>{{ $event['id'] }}</td>
                        <td>{{ $event['active'] ? 'Sim' : 'Não' }}</td>
                        <td>
                            <a href="{{ route('admin.users.read', ['user' => $event['author']]) }}">{{ $event['author']['full_name'] }}</a>
                        </td>
                        <td>{{ $event['title'] }}</td>
                        <td>
                            @can('edit-events')
                                <a class="btn btn-sm btn-primary"
                                   data-toggle="tooltip"
                                   data-placement="top"
                                   title="Editar"
                                   href="{{ route('admin.blog.events.edit', ['event' => $event]) }}">
                                    <span class="fa fa-edit"></span>
                                </a>
                            @endcan
                            @can('delete-events')
                                <a class="btn btn-sm btn-danger"
                                   data-toggle="tooltip"
                                   data-placement="top"
                                   title="Deletar"
                                   href="#remove/{{$event['id']}}"
                                   onclick="$('#delete-{{$event['id']}}').submit(); return false;">
                                    <span class="fa fa-trash"></span>

                                    {!! Form::open([
                                    'route' => ['admin.blog.events.delete', $event['id']],
                                    'id' => 'delete-'. $event['id'],
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
                    <th>Ativo</th>
                    <th>Tipo</th>
                    <th>Titulo</th>
                    <th>Ações</th>
                </tr>
                </tfoot>
            </table>
            {!! $events->links() !!}
        </div>
    </div>
@endsection