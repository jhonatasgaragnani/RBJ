@extends('Admin::layouts.app')

@section('title')
    @lang('Admin::titles.general.dashboard')
@endsection

@section('heading')
    @lang('Admin::titles.general.dashboard')
@append

@section('content')
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            @component('Admin::components.dashboard.minibox', [
                'target'    =>  route('admin.users.show'),
                'icon'  =>  'user',
                'bg'    =>  'aqua'
            ])
                @slot('title')
                    {{ $users }}
                @endslot

                {{ $users > 1 ? 'Usuários' : 'Usuário' }}
            @endcomponent
        </div>
        <div class="col-lg-3 col-xs-6">
            @component('Admin::components.dashboard.minibox', [
                'target'    =>  '/admin/blog/posts',
                'icon'  =>  'file',
                'bg'    =>  'yellow'
            ])
                @slot('title')
                    {{ $posts }}
                @endslot

                {{ $posts > 1 ? 'Postagens' : 'Postagem' }}

                @slot('targetMessage')
                    Confira mais detalhes
                @endslot
            @endcomponent
        </div>
        <div class="col-lg-3 col-xs-6">
            @component('Admin::components.dashboard.minibox', [
                'target'    =>  '/admin/blog/photos',
                'icon'  =>  'picture-o',
                'bg'    =>  'green'
            ])
                @slot('title')
                    {{ $photos }}
                @endslot

                {{ $photos > 1 ? 'Fotos' : 'Foto' }}

                @slot('targetMessage')
                    Confira mais detalhes
                @endslot
            @endcomponent
        </div>
        <div class="col-lg-3 col-xs-6">
            @component('Admin::components.dashboard.minibox', [
                'target'    =>  '/admin/blog/videos',
                'icon'  =>  'video-camera',
            ])
                @slot('title')
                    {{ $videos }}
                @endslot

                {{ $videos > 1 ? 'Videos' : 'Video' }}
            @endcomponent
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            @component('Admin::components.dashboard.minibox', [
                'target'    =>  route('admin.radio.teams'),
                'icon'  =>  'users',
                'bg'    =>  'gray'
            ])
                @slot('title')
                    {{ $teams }}
                @endslot

                {{ $teams > 1 ? 'Membros da equipe' : 'Membro da equipe' }}
            @endcomponent
        </div>
        <div class="col-lg-3 col-xs-6">
            @component('Admin::components.dashboard.minibox', [
                'target'    =>  route('admin.blog.events'),
                'icon'  =>  'map-marker',
                'bg'    =>  'purple'
            ])
                @slot('title')
                    {{ $events }}
                @endslot

                {{ $events > 1 ? 'Eventos' : 'Evento' }}

                @slot('targetMessage')
                    Confira mais detalhes
                @endslot
            @endcomponent
        </div>
        <div class="col-lg-3 col-xs-6">
            @component('Admin::components.dashboard.minibox', [
                'target'    =>  route('admin.radio.polls'),
                'icon'  =>  'paperclip',
                'bg'    =>  'fuchsia'
            ])
                @slot('title')
                    {{ $polls }}
                @endslot

                {{ $polls > 1 ? 'Enquetes' : 'Enquete' }}

                @slot('targetMessage')
                    Confira mais detalhes
                @endslot
            @endcomponent
        </div>
        <div class="col-lg-3 col-xs-6">
            @component('Admin::components.dashboard.minibox', [
                'target'    =>  route('admin.radio.schedule'),
                'icon'  =>  'tasks',
                'bg' => 'orange-active'
            ])
                @slot('title')
                    {{ $schedules }}
                @endslot

                {{ $schedules > 1 ? 'Programas' : 'Programa' }}
            @endcomponent
        </div>
    </div>
@append