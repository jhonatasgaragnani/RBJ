@extends('Admin::layouts.app')

@section('title')
    @lang('Admin::titles.videos.browse')
@endsection

@section('heading')
    @lang('Admin::titles.videos.browse')
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Todos os videos</h3>

            @can('add-videos')
                <p class="pull-right">
                    <a href="{{ route('admin.blog.videos.add') }}" class="btn btn-success">Adicionar video</a>
                </p>
            @endcan
        </div>
        <div class="box-body">
            <table class="table table-striped table-hover table-bordered data-table dt-responsive">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Miniatura</td>
                    <td>Author</td>
                    <td>Titulo</td>
                    <td>Descrição</td>
                    <td>Ações</td>
                </tr>
                </thead>
                <tbody>
                @foreach($videos as $video)
                    <tr>
                        <td>{{ $video['id'] }}</td>
                        <td>
                            <img src="{{ $video['thumb'] }}"
                                 style="max-width: 50px; max-height: 50px;"
                                 alt="{{ $video['title'] }}">
                        </td>
                        <td>
                            <a href="{{ route('admin.users.read', ['user' => $video['author']]) }}">
                                {{ str_limit($video['author']['full_name'], 30) }}
                            </a></td>
                        <td>{{ str_limit($video['title'], 50) }}</td>
                        <td>{{ str_limit($video['description'], 50) }}</td>
                        <td>
                            @can('edit-videos')
                                <a class="btn btn-sm btn-primary"
                                   data-toggle="tooltip"
                                   data-placement="top"
                                   title="Editar"
                                   href="{{ route('admin.blog.videos.edit', compact('video')) }}">
                                    <span class="fa fa-edit"></span>
                                </a>
                            @endcan
                            @can('delete-videos')
                                <a class="btn btn-sm btn-danger"
                                   data-toggle="tooltip"
                                   data-placement="top"
                                   title="Deletar"
                                   href="#remove/{{$video['id']}}"
                                   onclick="$('#delete-{{$video['id']}}').submit(); return false;">
                                    <span class="fa fa-trash"></span>

                                    {!! Form::open([
                                    'route' => ['admin.blog.videos.delete', $video['id']],
                                    'id' => 'delete-'. $video['id'],
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
                    <td>ID</td>
                    <td>Miniatura</td>
                    <td>Author</td>
                    <td>Titulo</td>
                    <td>Descrição</td>
                    <td>Ações</td>
                </tr>
                </tfoot>
            </table>
            {{ $videos->links() }}
        </div>
    </div>
@endsection
