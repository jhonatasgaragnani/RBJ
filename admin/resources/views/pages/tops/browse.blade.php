@extends('Admin::layouts.app')

@section('title')
    @lang('Admin::titles.tops.browse')
@endsection

@section('heading')
    @lang('Admin::titles.tops.browse')
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Todas as melhores músicas</h3>
        </div>
        <div class="box-body">
            <tops :musics="{{ $tops }}" :editable="{{ Auth::user()->hasPermission('edit-tops') ? 'true' : 'false'}}"></tops>
        </div>
    </div>
@endsection