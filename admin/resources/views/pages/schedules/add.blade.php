@extends('Admin::layouts.app')

@section('title')
    @lang('Admin::titles.schedules.add')
@endsection

@section('heading')
    @lang('Admin::titles.schedules.add')
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Preencha os campos e clique em salvar</h3>
        </div>
        <div class="box-body">
            {!! Form::open(['route' =>  'api.admin.radio.schedules.add', 'method' => 'post' ]) !!}
            <div class="form-group has-feedback {{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name">@lang('Admin::forms.schedules.name.title')</label>
                <input type="text"
                       class="form-control"
                       id="name"
                       name="name"
                       value="{{ old('name') }}"
                       placeholder="@lang('Admin::forms.schedules.name.placeholder')">

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback {{ $errors->has('speaker') ? ' has-error' : '' }}">
                <label for="speaker">@lang('Admin::forms.schedules.speaker.title')</label>
                <input type="text"
                       class="form-control"
                       id="speaker"
                       name="speaker"
                       value="{{ old('speaker') }}"
                       placeholder="@lang('Admin::forms.schedules.speaker.placeholder')">

                @if ($errors->has('speaker'))
                    <span class="help-block">
                        <strong>{{ $errors->first('speaker') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback {{ $errors->has('image') ? ' has-error' : '' }}">
                <label for="image">@lang('Admin::forms.schedules.image.title')</label>
                <div class="input-group">
                        <span class="input-group-btn">
                            <a data-input="image" data-preview="image-holder" class="btn btn-primary lfm-image">
                                <i class="fa fa-picture-o"></i> Selecionar
                            </a>
                        </span>
                    <input id="image"
                           value="{{ old('image') }}"
                           readonly
                           placeholder="@lang('Admin::forms.schedules.image.placeholder')"
                           class="form-control lfm-image"
                           type="text"
                           name="image"
                           data-input="image"
                           data-preview="image-holder">
                </div>
                <img id="image-holder" src="{{ old('image') }}"
                     style="margin: 15px auto; max-height:300px; display: block"
                     class="img-responsive img-thumbnail">

                @if ($errors->has('image'))
                    <span class="help-block">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback {{ $errors->has('thumb') ? ' has-error' : '' }}">
                <label for="thumb">@lang('Admin::forms.schedules.thumb.title')</label>
                <div class="input-group">
                        <span class="input-group-btn">
                            <a data-input="thumb" data-preview="thumb-holder" class="btn btn-primary lfm-image">
                                <i class="fa fa-picture-o"></i> Selecionar
                            </a>
                        </span>
                    <input id="thumb"
                           value="{{ old('thumb') }}"
                           readonly
                           placeholder="@lang('Admin::forms.schedules.thumb.placeholder')"
                           class="form-control lfm-image"
                           type="text"
                           name="thumb"
                           data-input="thumb"
                           data-preview="thumb-holder">
                </div>
                <img id="thumb-holder"
                     src="{{ old('thumb') }}"
                     style="margin: 15px auto; max-height:150px; display: block"
                     class="img-responsive img-thumbnail">

                @if ($errors->has('thumb'))
                    <span class="help-block">
                        <strong>{{ $errors->first('thumb') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback {{ $errors->has('description') ? ' has-error' : '' }}">
                <label for="description">@lang('Admin::forms.schedules.description.title')</label>
                <textarea
                        class="form-control tinymce-editor"
                        name="description"
                        id="description"
                        style="max-width: 100%"
                        placeholder="@lang('Admin::forms.schedules.description.placeholder')">
                    {{ old('description') }}
                </textarea>

                @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>

            <p class="text-right">
                <a href="{{ route('admin.radio.schedule') }}" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </p>
            {!! Form::close() !!}
        </div>
    </div>
@endsection