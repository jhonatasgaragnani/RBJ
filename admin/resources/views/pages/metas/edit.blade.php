@extends('Admin::layouts.app')

@section('title')
    @lang('Admin::titles.metas.edit', ['name' => $page['name']])
@endsection

@section('heading')
    @lang('Admin::titles.metas.edit', ['name' => $page['name']])
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Edit as informações e clique em atualizar</h3>
        </div>
        <div class="box-body">
            <page-edit :page="{{ $page }}"></page-edit>
        </div>
    </div>
@endsection