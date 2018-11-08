@extends('Admin::layouts.app')

@section('title')
    @lang('Admin::titles.schedules.browse')
@endsection

@section('heading')
    @lang('Admin::titles.schedules.browse')
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Todos os programas</h3>

            @can('add-schedules')
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('admin.radio.schedules.add') }}">Adicionar programa</a>
                </div>
            @endcan
        </div>
        <div class="box-body">
            <table class="table table-striped table-hover table-bordered data-table dt-responsive">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Locutor</th>
                    <th>Miniatura</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($schedules as $schedule)
                    <tr>
                        <td>{{ str_limit($schedule['id'], 50) }}</td>
                        <td>{{ str_limit($schedule['name'], 50) }}</td>
                        <td>{{ str_limit($schedule['speaker'], 50) }}</td>
                        <td>
                            <a href="{{ $schedule['thumb'] }}"
                               data-toggle="ekko-light"
                               data-gallery="photos"
                               data-title="{{ $schedule['title'] }}">
                                <img src="{{ get_thumb($schedule['thumb']) ?? $schedule['thumb'] }}"
                                     class="img-responsive img-thumbnail"
                                     style="max-width: 50px; max-height: 50px"
                                     alt="{{ $schedule['title'] }}">
                            </a>
                        </td>
                        <td>
                            @can('edit-schedules')
                                <a class="btn btn-sm btn-primary"
                                   data-toggle="tooltip"
                                   data-placement="top"
                                   title="Editar"
                                   href="{{ route('admin.radio.schedules.edit', ['schedule' => $schedule]) }}">
                                    <span class="fa fa-edit"></span>
                                </a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Locutor</th>
                    <th>Miniatura</th>
                    <th>Ações</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Programação diaria</h3>
        </div>

        <div class="box-body">
            <table class="table table-striped table-hover table-bordered data-table dt-responsive">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Programas</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($days as $day)
                <tr>
                    <td>{{ $day['id'] }}</td>
                    <td>{{ $day['name'] }}</td>
                    <td>{{ $day['schedules']->count() }}</td>
                    <td>
                        @can('edit-schedules')
                            <a class="btn btn-sm btn-primary"
                               data-toggle="tooltip"
                               data-placement="top"
                               title="Editar"
                                href="{{ route('admin.radio.days.edit', compact('day')) }}">
                                <span class="fa fa-edit"></span>
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
                    <th>Programas</th>
                    <th>Ações</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection