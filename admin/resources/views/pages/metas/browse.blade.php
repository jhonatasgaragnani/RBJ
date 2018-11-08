@extends('Admin::layouts.app')

@section('title')
    @lang('Admin::titles.metas.browse')
@endsection

@section('heading')
    @lang('Admin::titles.metas.browse')
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Crie e edita as informações metas das páginas</h3>
        </div>
        <div class="box-body">
            <pages-manager :pages="{{ $pages }}" :canedit="{{ auth()->user()->hasPermission('edit-metas') ? 'true' : 'false' }}" :candelete="{{ auth()->user()->hasPermission('delete-metas') ? 'true' : 'false' }}"></pages-manager>
        </div>
    </div>
@endsection