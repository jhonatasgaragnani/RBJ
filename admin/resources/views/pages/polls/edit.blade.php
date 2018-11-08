@extends('Admin::layouts.app')

@section('title')
    @lang('Admin::titles.polls.edit', ['name'=>$poll['name']])
@endsection

@section('heading')
    @lang('Admin::titles.polls.edit', ['name'=>$poll['name']])
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Edite os campos e clique no botão atualizar</h3>
        </div>
        <div class="box-body">
            {!! Form::open(['route' => ['api.admin.radio.polls.update', $poll], 'method' => 'put']) !!}
            <div class="form-group has-feedback {{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name">@lang('Admin::forms.polls.name.title')</label>
                <input id="name"
                       name="name"
                       type="text"
                       class="form-control"
                       value="{{ old('name', $poll['name']) }}">
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('question') ? ' has-error' : '' }}">
                <label for="question">@lang('Admin::forms.polls.question.title')</label>
                <input type="text"
                       id="question"
                       name="question"
                       class="form-control"
                       value="{{ old('question', $poll['question']) }}">
                @if ($errors->has('question'))
                    <span class="help-block">
                        <strong>{{ $errors->first('question') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback {{ $errors->has('active') ? ' has-error' : '' }}">
                <label for="active">@lang('Admin::forms.posts.active.title')</label>

                <select class="select2 form-control" name="active" id="active" style="width: 100%">
                    <option disabled {{ old('active', $poll['active']) == 1 ? '' : 'selected' }}>@lang('Admin::forms.posts.active.placeholder')</option>
                    @foreach([[1,'Ativo'], [0, 'Inativo']] as $type)
                        <option value="{{ $type['0'] }}" {{ old('active', $poll['active']) != '' && old('active', $poll['active']) == $type[0] ? 'selected' : '' }}>{{ $type[1] }}</option>
                    @endforeach
                </select>

                @if ($errors->has('active'))
                    <span class="help-block">
                        <strong>{{ $errors->first('active') }}</strong>
                    </span>
                @endif
            </div>

            <poll-options :poll="{{ $poll }}"></poll-options>

            <p class="text-right">
                <a href="{{ route('admin.radio.polls') }}" class="btn btn-danger">Cancelar</a>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </p>
            {!! Form::close() !!}
        </div>
    </div>
@endsection