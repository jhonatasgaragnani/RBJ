@extends('Admin::layouts.app')

@section('title')
    @lang('Admin::titles.schedules.edit')
@endsection

@section('heading')
    @lang('Admin::titles.schedules.edit')
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Edite as informações e clique em salvar</h3>
        </div>
        <div class="box-body">
            {!! Form::open(['route'=>['api.admin.radio.schedules.edit.schedule.update', $day, $schedule], 'method' => 'put']) !!}
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="form-group has-feedback">
                        <label for="active">Programa</label>
                        <input type="text" class="form-control" readonly value="{{ $schedule->name }}">
                        <input type="hidden" name="schedule" value="{{ $schedule->id }}">
                    </div>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-12">
                    <div class="bootstrap-timepicker">
                        <div class="form-group">
                            <label>Inicio:</label>

                            <div class="input-group">
                                <input type="text" class="form-control timepick" name="starts_at" id="starts_at" value="{{ old('starts_at', $schedule->pivot->starts_at) }}">
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
                                <input type="text" class="form-control timepick" name="ends_at" id="ends_at" value="{{ old('ends_at' , $schedule->pivot->ends_at) }}">
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
                                class="btn btn-primary">Atualizar
                        </button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
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