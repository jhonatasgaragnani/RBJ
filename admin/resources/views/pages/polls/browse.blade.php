@extends('Admin::layouts.app')

@section('title')
    @lang('Admin::titles.polls.browse')
@endsection

@section('heading')
    @lang('Admin::titles.polls.browse')
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Todas as Enquetes</h3>
        </div>
        <div class="box-body">
            <poll-browser :polls="{{ $polls }}"
                          :canedit="{{auth()->user()->hasPermission('edit-polls') ? 'true' : 'false'}}"
                          :candelete="{{auth()->user()->hasPermission('delete-polls') ? 'true' : 'false'}}"></poll-browser>
        </div>
    </div>
@endsection