@extends('Admin::layouts.app')

@section('title')
    @lang('Admin::titles.posts.edit')
@endsection

@section('heading')
    @lang('Admin::titles.posts.edit')
@endsection

@section('content')
    {!! Form::open(['route'=>[ 'api.admin.blog.posts.edit', $post], 'method' => 'put']) !!}
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs pull-right">
            <li class="active"><a href="#post" data-toggle="tab">Postagem</a></li>
            <li><a href="#meta" data-toggle="tab">Meta</a></li>
            <li class="pull-left header">
                <i class="fa fa-file"></i> Preencha os campos e clique em atualizar
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="post">
                <div class="form-group has-feedback {{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title">@lang('Admin::forms.posts.title.title')</label>
                    <input type="text"
                           class="form-control"
                           id="title"
                           name="title"
                           value="{{ old('title', $post['title']) }}"
                           placeholder="@lang('Admin::forms.posts.title.placeholder')">

                    @if ($errors->has('title'))
                        <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('active') ? ' has-error' : '' }}">
                    <label for="active">@lang('Admin::forms.posts.active.title')</label>

                    <select class="select2 form-control" name="active" id="active" style="width: 100%">
                        <option disabled {{ old('active', $post['active']) == 1 ? 'selected' : '' }}>@lang('Admin::forms.posts.active.placeholder')</option>
                        @foreach([[1,'Ativo'], [0, 'Inativo']] as $type)
                            <option value="{{ $type['0'] }}" {{ old('active', $post['active']) != '' && old('active', $post['active']) == $type[0] ? 'selected' : '' }}>{{ $type[1] }}</option>
                        @endforeach
                    </select>

                    @if ($errors->has('active'))
                        <span class="help-block">
                        <strong>{{ $errors->first('active') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('type') ? ' has-error' : '' }}">
                    <label for="type">@lang('Admin::forms.posts.type.title')</label>

                    <select class="select2 form-control" name="type" id="type" style="width: 100%">
                        <option disabled {{ old('type', $post['type']['id']) ? '' : 'selected' }}>@lang('Admin::forms.posts.type.placeholder')</option>
                        @foreach($types as $type)
                            <option value="{{ $type['id'] }}" {{ old('type', $post['type']['id']) == $type['id'] ? 'selected' : '' }}>{{ $type['name'] }}</option>
                        @endforeach
                    </select>

                    @if ($errors->has('type'))
                        <span class="help-block">
                        <strong>{{ $errors->first('type') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('image') ? ' has-error' : '' }}">
                    <label for="image">@lang('Admin::forms.posts.image.title')</label>
                    <div class="input-group">
                        <span class="input-group-btn">
                            <a data-input="image" data-preview="holder" class="btn btn-primary lfm-image">
                                <i class="fa fa-picture-o"></i> Selecionar
                            </a>
                        </span>
                        <input id="image" value="{{ old('image', $post['image']) }}" readonly class="form-control lfm-image" type="text"
                               name="image" data-input="image" data-preview="holder">
                    </div>
                    <img id="holder" src="{{ old('image', $post['image']) }}"
                         style="margin: 15px auto; max-height:150px; display: block"
                         class="img-responsive img-thumbnail">

                    @if ($errors->has('image'))
                        <span class="help-block">
                        <strong>{{ $errors->first('image') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="body">@lang('Admin::forms.posts.body.title')</label>
                    <textarea name="body" id="body"
                              class="tinymce-editor">{{ old('body', $post['body']) }}</textarea>
                </div>

                <p class="text-right">
                    <a href="{{ route('admin.blog.posts') }}" class="btn btn-danger">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </p>
            </div>
            <div class="tab-pane" id="meta">
                <div class="form-group has-feedback {{ $errors->has('meta_title') ? ' has-error' : '' }}">
                    <label for="meta_title">@lang('Admin::forms.posts.meta_title.title')</label>
                    <input type="text"
                           class="form-control"
                           id="meta_title"
                           name="meta_title"
                           value="{{ old('meta_title', $post['meta_title']) }}"
                           placeholder="@lang('Admin::forms.posts.meta_title.placeholder')">

                    @if ($errors->has('meta_title'))
                        <span class="help-block">
                        <strong>{{ $errors->first('meta_title') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('meta_description') ? ' has-error' : '' }}">
                    <label for="meta_description">@lang('Admin::forms.posts.meta_description.title')</label>
                    <textarea name="meta_description"
                              id="meta_description"
                              class="form-control"
                              placeholder="@lang('Admin::forms.posts.meta_description.placeholder')">{{ old('meta_description', $post['meta_description']) }}</textarea>

                    @if ($errors->has('meta_description'))
                        <span class="help-block">
                        <strong>{{ $errors->first('meta_description') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('meta_keywords') ? ' has-error' : '' }}">
                    <label for="meta_keywords">@lang('Admin::forms.posts.meta_keywords.title')</label>
                    <textarea name="meta_keywords"
                              id="meta_keywords"
                              class="form-control"
                              placeholder="@lang('Admin::forms.posts.meta_keywords.placeholder')">{{ old('meta_keywords', $post['meta_keywords']) }}</textarea>

                    @if ($errors->has('meta_keywords'))
                        <span class="help-block">
                        <strong>{{ $errors->first('meta_keywords') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection