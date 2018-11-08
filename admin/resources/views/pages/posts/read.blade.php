@extends('Admin::layouts.app')

@section('title')
    @lang('Admin::titles.posts.read')
@endsection

@section('heading')
    @lang('Admin::titles.posts.read')
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">
                <span><b>{{ $post['type']['name'] }}:</b></span>
                {{ $post['title'] }}
            </h3>
            <p class="pull-right">
                <span><b>Autor:</b></span>
                <a href="{{ route('admin.users.read', $post['author']) }}">
                    {{ $post['author']['full_name'] }}
                </a>
            </p>
        </div>
        <div class="box-body">
            <div class="box box-primary">
                <div class="box-body">
                    {!! $post['body'] !!}
                </div>
            </div>
        </div>
    </div>
@endsection