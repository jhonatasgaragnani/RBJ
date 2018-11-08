@extends('Admin::layouts.app')

@section('title')
    @lang('Admin::titles.tops.edit')
@endsection

@section('heading')
    @lang('Admin::titles.tops.edit')
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Edite os campos e clique em atualizar</h3>
        </div>
        <div class="box-body">
            {!! Form::open(['route' =>  ['api.admin.radio.tops.edit', $top], 'method' => 'put']) !!}
            <div class="form-group has-feedback {{ $errors->has('artist') ? ' has-error' : '' }}">
                <label for="artist">@lang('Admin::forms.tops.artist.title')</label>
                <input type="text"
                       class="form-control"
                       id="artist"
                       name="artist"
                       value="{{ old('artist', $top['artist']) }}"
                       placeholder="@lang('Admin::forms.tops.artist.placeholder')">

                @if ($errors->has('artist'))
                    <span class="help-block">
                        <strong>{{ $errors->first('artist') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback {{ $errors->has('title') ? ' has-error' : '' }}">
                <label for="title">@lang('Admin::forms.tops.title.title')</label>
                <input type="text"
                       class="form-control"
                       id="title"
                       name="title"
                       value="{{ old('title', $top['title']) }}"
                       placeholder="@lang('Admin::forms.tops.title.placeholder')">

                @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>

            <youtube-preview classes="{{ $errors->has('music') ? ' has-error' : '' }}"
                             title="@lang('Admin::forms.tops.music.title')"
                             placeholder="@lang('Admin::forms.tops.music.placeholder')"
                             src="{{ old('music', $top['music']) }}">
                @if ($errors->has('music'))
                    <span class="help-block">
                        <strong>{{ $errors->first('music') }}</strong>
                    </span>
                @endif
            </youtube-preview>

            <p class="pull-right">
                <a href="{{ route('admin.radio.tops') }}" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </p>
            {!! Form::close() !!}
        </div>
    </div>
@endsection