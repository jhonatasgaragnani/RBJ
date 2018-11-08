@extends('Admin::layouts.app')

@section('title')
    @lang('Admin::titles.settings.browse')
@endsection

@section('heading')
    @lang('Admin::titles.settings.browse')
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">
                Essas são todas as configurações do site
            </h3>
        </div>
        <div class="box-body">
            <configuration :configurations="{{ $configurations }}"></configuration>
        </div>
    </div>
@endsection