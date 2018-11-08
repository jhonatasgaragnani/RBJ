@extends('Admin::layouts.app')

@section('title')
    @lang('Admin::titles.days.edit', ['name'=>$day['name']])
@endsection

@section('heading')
    @lang('Admin::titles.days.edit', ['name'=>$day['name']])
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Edite os campos e clique em salvar</h3>
        </div>
        <div class="box-body">
            {!! Form::open(['route'=>['api.admin.radio.schedules.day', $day], 'method' => 'post']) !!}
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="form-group has-feedback">
                        <label for="active">Programa</label>

                        <select name="schedule" class="form-control select2" data-placeholder="Selecione um programa"
                                style="width: 100%">
                            @foreach($schedules as $schedule)
                                <option value="{{$schedule->id}}">{{ $schedule->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-12">
                    <div class="bootstrap-timepicker">
                        <div class="form-group">
                            <label>Inicio:</label>

                            <div class="input-group">
                                <input type="text" class="form-control timepick" name="starts_at" id="starts_at">
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                    </div>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-12">
                    <div class="bootstrap-timepicker">
                        <div class="form-group">
                            <label>Fim:</label>

                            <div class="input-group">
                                <input type="text" class="form-control timepick" name="ends_at" id="ends_at">
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                    </div>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-12">
                    <div class="form-group">
                        <label style="display:block">&nbsp;</label>
                        <button type="submit"
                                style="display: block"
                                class="btn btn-primary">Adicionar
                        </button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}

            <br>

            <table class="table table-striped table-hover table-bordered data-table dt-responsive">
                <thead>
                <tr>
                    <th>Inicio</th>
                    <th>Fim</th>
                    <th>Nome</th>
                    <th>Locutor</th>
                    <th>Miniatura</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($day->schedules as $schedule)
                    <tr>
                        <td>{{ $schedule->pivot->starts_at }}</td>
                        <td>{{ $schedule->pivot->ends_at }}</td>
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
                                   href="{{ route('admin.radio.days.edit.schedule', ['day'=> $day,'schedule' => $schedule]) }}">
                                    <span class="fa fa-edit"></span>
                                </a>
                            @endcan
                            @can('delete-schedules')
                                <a class="btn btn-sm btn-danger"
                                   data-toggle="tooltip"
                                   data-placement="top"
                                   title="Remover"
                                   href="#deletar-{{ $schedule->getKey() }}"
                                   onclick="$('#delete-{{$schedule->getKey()}}').submit()">
                                    <span class="fa fa-trash"></span>
                                </a>
                                <form id="delete-{{$schedule->getKey()}}"
                                      action="{{ route('api.admin.radio.schedules.day.remove', ['schedule' => $schedule, 'day' => $day]) }}"
                                      method="post">
                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Inicio</th>
                    <th>Fim</th>
                    <th>Nome</th>
                    <th>Locutor</th>
                    <th>Miniatura</th>
                    <th>Ações</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.timepick').timepicker({
            showSeconds: false,
            showMeridian: false,
            showInputs: false
        })
    </script>
@append