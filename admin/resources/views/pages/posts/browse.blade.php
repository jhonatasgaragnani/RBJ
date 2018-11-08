@extends('Admin::layouts.app')

@section('title')
    @lang('Admin::titles.posts.browse')
@endsection

@section('heading')
    @lang('Admin::titles.posts.browse')
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Todas as postagens</h3>

            @can('add-posts')
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('admin.blog.posts.add') }}">Adicionar postagem</a>
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
                    <th>Tipo</th>
                    <th>Titulo</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post['id'] }}</td>
                        <td>{{ $post['active'] ? 'Sim' : 'Não' }}</td>
                        <td>
                            <a href="{{ route('admin.users.read', ['user' => $post['author']]) }}">{{ $post['author']['full_name'] }}</a>
                        </td>
                        <td>{{ $post['type']['name'] }}</td>
                        <td>{{ $post['title'] }}</td>
                        <td>
                            @can('edit-posts')
                                <a class="btn btn-sm btn-primary"
                                   data-toggle="tooltip"
                                   data-placement="top"
                                   title="Editar"
                                   href="{{ route('admin.blog.posts.edit', ['post' => $post]) }}">
                                    <span class="fa fa-edit"></span>
                                </a>
                            @endcan
                            @can('read-posts')
                                <a class="btn btn-sm btn-warning"
                                   data-toggle="tooltip"
                                   data-placement="top"
                                   title="Ver"
                                   href="{{ route('admin.blog.posts.read', compact('post')) }}">
                                    <span class="fa fa-eye"></span>
                                </a>
                            @endcan
                            @can('delete-posts')
                                <a class="btn btn-sm btn-danger"
                                   data-toggle="tooltip"
                                   data-placement="top"
                                   title="Deletar"
                                   href="#remove/{{$post['id']}}"
                                   onclick="$('#delete-{{$post['id']}}').submit(); return false;">
                                    <span class="fa fa-trash"></span>

                                    {!! Form::open([
                                    'route' => ['admin.blog.posts.delete', $post['id']],
                                    'id' => 'delete-'. $post['id'],
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
                    <th>Autor</th>
                    <th>Tipo</th>
                    <th>Titulo</th>
                    <th>Ações</th>
                </tr>
                </tfoot>
            </table>
            {!! $posts->links() !!}
        </div>
    </div>
@endsection