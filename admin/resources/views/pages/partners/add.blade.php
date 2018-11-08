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
            {!! Form::open(['route' => 'api.admin.radio.partners.add']) !!}

            <div class="form-group has-feedback {{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name">@lang('Admin::forms.partners.name.title')</label>
                <input type="text"
                       class="form-control"
                       id="name"
                       name="name"
                       value="{{ old('name') }}"
                       placeholder="@lang('Admin::forms.partners.name.placeholder')">

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback {{ $errors->has('site') ? ' has-error' : '' }}">
                <label for="site">@lang('Admin::forms.partners.site.title')</label>
                <input type="text"
                       class="form-control"
                       id="site"
                       name="site"
                       value="{{ old('site') }}"
                       placeholder="@lang('Admin::forms.partners.site.placeholder')">

                @if ($errors->has('site'))
                    <span class="help-block">
                        <strong>{{ $errors->first('site') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback {{ $errors->has('thumb') ? ' has-error' : '' }}">
                <label for="thumb">@lang('Admin::forms.partners.thumb.title')</label>
                <div class="input-group">
                        <span class="input-group-btn">
                            <a data-input="thumb" data-preview="holder" class="btn btn-primary lfm-image">
                                <i class="fa fa-picture-o"></i> Selecionar
                            </a>
                        </span>
                    <input id="thumb" value="{{ old('thumb') }}" readonly class="form-control lfm-image" type="text"
                           name="thumb" data-input="thumb" data-preview="holder">
                </div>
                <img id="holder" src="{{ old('thumb') }}"
                     style="margin: 15px auto; max-height:150px; display: block"
                     class="img-responsive img-thumbnail">

                @if ($errors->has('thumb'))
                    <span class="help-block">
                        <strong>{{ $errors->first('thumb') }}</strong>
                    </span>
                @endif
            </div>

            <p class="text-right">
                <a href="{{ route('admin.radio.partners') }}" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </p>
            {!! Form::close() !!}
        </div>
    </div>
@endsection