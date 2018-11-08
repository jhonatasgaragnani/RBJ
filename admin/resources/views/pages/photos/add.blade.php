@extends('Admin::layouts.app')

@section('title')
    @lang('Admin::titles.photos.add')
@endsection

@section('heading')
    @lang('Admin::titles.photos.add')
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">
                Preencha os campos e clique no botão salvar
            </h3>
        </div>
        <div class="box-body">
            {!! Form::open(['route' => 'api.admin.blog.photos.add', 'method' => 'post']) !!}

            <div class="form-group has-feedback {{ $errors->has('title') ? ' has-error' : '' }}">
                <label for="title">@lang('Admin::forms.photos.title.title')</label>
                <input type="text"
                       class="form-control"
                       id="title"
                       name="title"
                       value="{{ old('title') }}"
                       placeholder="@lang('Admin::forms.photos.title.placeholder')">

                @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('description') ? ' has-error' : '' }}">
                <label for="description">@lang('Admin::forms.photos.description.title')</label>
                <input type="text"
                       class="form-control"
                       id="description"
                       name="description"
                       value="{{ old('description') }}"
                       placeholder="@lang('Admin::forms.photos.description.placeholder')">

                @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('alt') ? ' has-error' : '' }}">
                <label for="alt">@lang('Admin::forms.photos.alt.title')</label>
                <input type="text"
                       class="form-control"
                       id="alt"
                       name="alt"
                       value="{{ old('alt') }}"
                       placeholder="@lang('Admin::forms.photos.alt.placeholder')">

                @if ($errors->has('alt'))
                    <span class="help-block">
                        <strong>{{ $errors->first('alt') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('image') ? ' has-error' : '' }}">
                <label for="image">@lang('Admin::forms.photos.image.title')</label>
                <div class="input-group">
                        <span class="input-group-btn">
                            <a data-input="image" data-preview="holder" class="btn btn-primary lfm-image">
                                <i class="fa fa-picture-o"></i> @lang('Admin::forms.photos.image.placeholder')
                            </a>
                        </span>
                    <input id="image" value="{{ old('image') }}" readonly class="form-control lfm-image" type="text"
                           name="image" data-input="image" data-preview="holder">
                </div>
                <img id="holder" src="{{ old('image') }}"
                     style="margin: 15px auto; max-height:400px; display: block"
                     class="img-responsive img-thumbnail">

                @if ($errors->has('image'))
                    <span class="help-block">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                @endif
            </div>

            <p class="pull-right">
                <a href="{{ route('admin.blog.photos') }}" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </p>
            {!! Form::close() !!}
        </div>
    </div>
@endsection