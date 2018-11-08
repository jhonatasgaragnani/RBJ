@extends('Admin::layouts.app')

@section('title')
    @lang('Admin::titles.photos.browse')
@endsection

@section('heading')
    @lang('Admin::titles.photos.browse')
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Todas as imagens</h3>
            @can('add-photos')
                <p class="pull-right">
                    <a href="{{ route('admin.blog.photos.add') }}" class="btn btn-success">Adicionar imagem</a>
                </p>
            @endcan
        </div>
        <div class="box-body">
            <table class="table table-striped table-hover table-bordered data-table dt-responsive">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Miniatura</th>
                    <th>Autor</th>
                    <th>Titulo</th>
                    <th>Descripção</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($photos as $photo)
                    <tr>
                        <td>{{ $photo['id'] }}</td>
                        <td style="text-align: center">
                            <a href="{{ $photo['image'] }}"
                               data-toggle="ekko-light"
                               data-gallery="photos"
                                data-title="{{ $photo['title'] }}">
                                <img src="{{ $photo['thumb'] }}"
                                     class="img-responsive img-thumbnail"
                                     style="max-width: 50px; max-height: 50px"
                                     alt="{{ $photo['title'] }}">
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.users.read', ['user' => $photo['author']]) }}">
                                {{ str_limit($photo['author']['full_name'], 30) }}
                            </a>
                        </td>
                        <td>{{ str_limit($photo['title'], 100) }}</td>
                        <td>{{ str_limit( $photo['description'], 50)  }}</td>
                        <td>
                            @can('edit-photos')
                                <a class="btn btn-sm btn-primary"
                                   data-toggle="tooltip"
                                   data-placement="top"
                                   title="Editar"
                                   href="{{ route('admin.blog.photos.edit', ['photo' => $photo]) }}">
                                    <span class="fa fa-edit"></span>
                                </a>
                            @endcan
                            @can('delete-photos')
                                <a class="btn btn-sm btn-danger"
                                   data-toggle="tooltip"
                                   data-placement="top"
                                   title="Deletar"
                                   href="#remove/{{$photo['id']}}"
                                   onclick="$('#delete-{{$photo['id']}}').submit(); return false;">
                                    <span class="fa fa-trash"></span>

                                    {!! Form::open([
                                    'route' => ['admin.blog.photos.delete', $photo['id']],
                                    'id' => 'delete-'. $photo['id'],
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
                    <th>Miniatura</th>
                    <th>Autor</th>
                    <th>Titulo</th>
                    <th>Descripção</th>
                    <th>Ações</th>
                </tr>
                </tfoot>
            </table>
            {{ $photos->links() }}
        </div>
    </div>
@endsection