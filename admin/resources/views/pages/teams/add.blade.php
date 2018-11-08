@extends('Admin::layouts.app')

@section('title')
    @lang('Admin::titles.teams.add')
@endsection

@section('heading')
    @lang('Admin::titles.teams.add')
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Preencha os campos e clique em salvar</h3>
        </div>
        <div class="box-body">
            {!! Form::open(['route' => 'api.admin.radio.teams.add']) !!}

            <div class="form-group has-feedback {{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name">@lang('Admin::forms.teams.name.title')</label>
                <input type="text"
                       class="form-control"
                       id="name"
                       name="name"
                       value="{{ old('name') }}"
                       placeholder="@lang('Admin::forms.teams.name.placeholder')">

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback {{ $errors->has('role') ? ' has-error' : '' }}">
                <label for="role">@lang('Admin::forms.teams.role.title')</label>
                <input type="text"
                       class="form-control"
                       id="role"
                       name="role"
                       value="{{ old('role') }}"
                       placeholder="@lang('Admin::forms.teams.role.placeholder')">

                @if ($errors->has('role'))
                    <span class="help-block">
                        <strong>{{ $errors->first('role') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback {{ $errors->has('image') ? ' has-error' : '' }}">
                <label for="image">@lang('Admin::forms.teams.image.title')</label>
                <div class="input-group">
                        <span class="input-group-btn">
                            <a data-input="image" data-preview="holder" class="btn btn-primary lfm-image">
                                <i class="fa fa-picture-o"></i> Selecionar
                            </a>
                        </span>
                    <input id="image" value="{{ old('image') }}" readonly class="form-control lfm-image" type="text"
                           name="image" data-input="image" data-preview="holder">
                </div>
                <img id="holder" src="{{ old('image') }}"
                     style="margin: 15px auto; max-height:150px; display: block"
                     class="img-responsive img-thumbnail">

                @if ($errors->has('image'))
                    <span class="help-block">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                @endif
            </div>

            <p class="text-right">
                <a href="{{ route('admin.radio.teams') }}" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </p>
            {!! Form::close() !!}
        </div>
    </div>
@endsection