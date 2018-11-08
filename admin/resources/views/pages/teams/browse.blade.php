@extends('Admin::layouts.app')

@section('title')
    @lang('Admin::titles.teams.browse')
@endsection

@section('heading')
    @lang('Admin::titles.teams.browse')
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Todos os membros da equipe</h3>
        </div>
        <div class="box-body">
            @can('add-teams')
                <div class="pull-right">
                    <a href="{{ route('admin.radio.teams.add') }}" class="btn btn-success">Adicionar Membro</a>
                </div>
            @endcan

            <table class="table table-striped table-hover table-bordered data-table dt-responsive">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Cargo</th>
                    <th>Imagem</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($teams as $team)
                    <tr>
                        <td>{{ $team['id'] }}</td>
                        <td>{{ $team['name'] }}</td>
                        <td>{{ $team['role'] }}</td>
                        <td>
                            <a href="{{ $team['image'] }}"
                               data-toggle="ekko-light"
                               data-gallery="photos"
                               data-title="{{ $team['name'] }}">
                                <img src="{{ $team['thumb'] }}"
                                     class="img-responsive img-thumbnail"
                                     style="max-width: 50px; max-height: 50px"
                                     alt="{{ $team['name'] }}">
                            </a>
                        </td>
                        <td>
                            @can('edit-teams')
                                <a class="btn btn-sm btn-primary"
                                   data-toggle="tooltip"
                                   data-placement="top"
                                   title="Editar"
                                   href="{{ route('admin.radio.teams.edit', $team) }}">
                                    <span class="fa fa-edit"></span>
                                </a>
                            @endcan
                            @can('delete-teams')
                                <a class="btn btn-sm btn-danger"
                                   data-toggle="tooltip"
                                   data-placement="top"
                                   title="Deletar"
                                   href="#remove/{{$team['id']}}"
                                   onclick="$('#delete-{{$team['id']}}').submit(); return false;">
                                    <span class="fa fa-trash"></span>

                                    {!! Form::open([
                                    'route' => ['api.admin.radio.teams.remove', $team],
                                    'id' => 'delete-'. $team['id'],
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
                    <th>Cargo</th>
                    <th>Imagem</th>
                    <th>Ações</th>
                </tr>
                </tfoot>
            </table>

            {{ $teams->links() }}
        </div>
    </div>
@endsection