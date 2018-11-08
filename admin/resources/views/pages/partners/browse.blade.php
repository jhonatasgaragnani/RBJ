@extends('Admin::layouts.app')

@section('title')
    @lang('Admin::titles.partners.browse')
@endsection

@section('heading')
    @lang('Admin::titles.partners.browse')
@endsection

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Todos os parceiros</h3>
        </div>
        <div class="box-body">
            @can('add-partners')
                <div class="pull-right">
                    <a href="{{ route('admin.radio.partners.add') }}" class="btn btn-success">Adicionar Parceiro</a>
                </div>
            @endcan

            <table class="table table-striped table-hover table-bordered data-table dt-responsive">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Site</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($partners as $partner)
                    <tr>
                        <td>{{ $partner['id'] }}</td>
                        <td>{{ $partner['name'] }}</td>
                        <td>
                            <a href="{{ $partner['site'] ?? '#' }}" target="_blank">{{ $partner['site'] ?? '#' }}</a>
                        </td>
                        <td>
                            @can('edit-partners')
                                <a class="btn btn-sm btn-primary"
                                   data-toggle="tooltip"
                                   data-placement="top"
                                   title="Editar"
                                   href="{{ route('admin.radio.partners.edit', $partner) }}">
                                    <span class="fa fa-edit"></span>
                                </a>
                            @endcan
                            @can('delete-partners')
                                <a class="btn btn-sm btn-danger"
                                   data-toggle="tooltip"
                                   data-placement="top"
                                   title="Deletar"
                                   href="#remove/{{$partner['id']}}"
                                   onclick="$('#delete-{{$partner['id']}}').submit(); return false;">
                                    <span class="fa fa-trash"></span>

                                    {!! Form::open([
                                    'route' => ['api.admin.radio.partners.remove', $partner],
                                    'id' => 'delete-'. $partner['id'],
                                    'method' => 'delete']) !!}

                                    {!! Form::close() !!}
                                </a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Site</th>
                    <th>Ações</th>
                </tr>
                </tfoot>
            </table>

            {{ $partners->links() }}
        </div>
    </div>
@endsection