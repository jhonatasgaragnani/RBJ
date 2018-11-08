@extends('Admin::layouts.app')

@section('title')
    @lang('Admin::titles.videos.add')
@endsection

@section('heading')
    @lang('Admin::titles.videos.add')
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Preencha os campos e clique em salvar</h3>
        </div>
        <div class="box-body">
            {!! Form::open(['route' =>  'api.admin.blog.videos.add', 'method' => 'post']) !!}
            <div class="form-group has-feedback {{ $errors->has('title') ? ' has-error' : '' }}">
                <label for="title">@lang('Admin::forms.videos.title.title')</label>
                <input type="text"
                       class="form-control"
                       id="title"
                       name="title"
                       value="{{ old('title') }}"
                       placeholder="@lang('Admin::forms.videos.title.placeholder')">

                @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback {{ $errors->has('description') ? ' has-error' : '' }}">
                <label for="description">@lang('Admin::forms.videos.description.title')</label>
                <input type="text"
                       class="form-control"
                       id="description"
                       name="description"
                       value="{{ old('description') }}"
                       placeholder="@lang('Admin::forms.videos.description.placeholder')">

                @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback {{ $errors->has('thumb') ? ' has-error' : '' }}">
                <label for="image">@lang('Admin::forms.videos.thumb.title')</label>
                <div class="input-group">
                        <span class="input-group-btn">
                            <a data-input="thumb" data-preview="holder" class="btn btn-primary lfm-image">
                                <i class="fa fa-picture-o"></i> @lang('Admin::forms.videos.thumb.placeholder')
                            </a>
                        </span>
                    <input id="thumb" value="{{ old('thumb') }}" readonly class="form-control lfm-image" type="text"
                           name="thumb" data-input="thumb" data-preview="holder">
                </div>
                <img id="holder" src="{{ old('thumb') }}"
                     style="margin: 15px auto; max-height:400px; display: block"
                     class="img-responsive img-thumbnail">

                @if ($errors->has('thumb'))
                    <span class="help-block">
                        <strong>{{ $errors->first('thumb') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback {{ $errors->has('video') ? ' has-error' : '' }}">
                <label for="video">@lang('Admin::forms.videos.video.title')</label>
                <p>
                    <textarea name="video" id="video"
                              class="tinymce-editor">{{ old('video', __('Admin::forms.videos.video.placeholder')) }}</textarea>
                </p>
                @if ($errors->has('video'))
                    <span class="help-block">
                                    <strong>{{ $errors->first('video') }}</strong>
                                </span>
                @endif
            </div>

            <p class="pull-right">
                <a href="{{ route('admin.blog.videos') }}" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </p>


            {!! Form::close() !!}
        </div>
    </div>
@endsection