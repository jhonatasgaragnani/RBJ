@extends('Admin::layouts.app')

@section('title')
    @lang('Admin::titles.general.files')
@endsection

@section('heading')
    <span class="fa fa-file margin-r-5"></span> @lang('Admin::titles.general.files')
@append

@section('content')
    <iframe src="/admin/filemanager" style="width: 100%; height: 80vh;" frameborder="0"></iframe>
@append