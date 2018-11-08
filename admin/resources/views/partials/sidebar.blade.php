<!-- =============================================== -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ $auth->avatar }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ $auth->full_name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            @if(Gate::check('browse-questions') ||
                Gate::check('browse-tops') ||
                Gate::check('browse-schedules') ||
                Gate::check('browse-videos') ||
                Gate::check('browse-events') ||
                Gate::check('browse-photos'))
                @component('Admin::components.menu.header')
                    CMS
                @endcomponent

                @if(Gate::check('browse-videos') ||
                Gate::check('browse-photos'))
                    @component('Admin::components.menu.tree', ['icon' => 'th-large', 'start' => 'blog'])
                        @slot('title')
                            Blog
                        @endslot
                        @can('browse-posts')
                            @component('Admin::components.menu.item', ['target' => route('admin.blog.posts'), 'icon' => 'file'])
                                Posts
                            @endcomponent
                        @endcan
                        @can('browse-photos')
                            @component('Admin::components.menu.item', ['target' => route('admin.blog.photos'), 'icon' => 'picture-o'])
                                Fotos
                            @endcomponent
                        @endcan
                        @can('browse-videos')
                            @component('Admin::components.menu.item', ['target' => route('admin.blog.videos'), 'icon' => 'video-camera'])
                                Videos
                            @endcomponent
                        @endcan
                        @can('browse-events')
                            @component('Admin::components.menu.item', ['target' => route('admin.blog.events'), 'icon' => 'map-marker'])
                                Eventos
                            @endcomponent
                        @endcan
                    @endcomponent
                @endif

                @if(Gate::check('browse-questions') ||
                Gate::check('browse-tops') ||
                Gate::check('browse-schedules') ||
                Gate::check('browse-polls') ||
                Gate::check('browse-teams') ||
                Gate::check('browse-partners'))
                    @component('Admin::components.menu.tree', ['icon' => 'music', 'start' => 'radio'])
                        @slot('title')
                            Radio
                        @endslot
                        @can('browse-teams')
                            @component('Admin::components.menu.item', ['target' => route('admin.radio.partners'), 'icon' => 'users'])
                                Parceiros
                            @endcomponent
                        @endcan
                        @can('browse-tops')
                            @component('Admin::components.menu.item', ['target' => route('admin.radio.tops'), 'icon' => 'heart'])
                                Melhores Músicas
                            @endcomponent
                        @endcan
                        @can('browse-schedules')
                            @component('Admin::components.menu.item', ['target' => route('admin.radio.schedule'), 'icon' => 'clock-o'])
                                Programação
                            @endcomponent
                        @endcan
                        @can('browse-polls')
                            @component('Admin::components.menu.item', ['target' => route('admin.radio.polls'), 'icon' => 'paperclip'])
                                Enquetes
                            @endcomponent
                        @endcan
                        @can('browse-teams')
                            @component('Admin::components.menu.item', ['target' => route('admin.radio.teams'), 'icon' => 'users'])
                                Membros da Equipe
                            @endcomponent
                        @endcan
                    @endcomponent
                @endif
            @endif

            @if(Gate::check('browse-configurations') ||
            Gate::check('browse-metas') ||
            Gate::check('browse-users') ||
            Gate::check('browse-roles') ||
            Gate::check('browse-permissions') ||
            Gate::check('browse-files'))

                {{-- Manager --}}
                @component('Admin::components.menu.header')
                    Avançado
                @endcomponent

                @if(Gate::check('browse-users') || Gate::check('browse-roles') || Gate::check('browse-permissions'))
                    @component('Admin::components.menu.tree', ['icon' => 'dashboard', 'start' => 'users'])
                        @slot('title')
                            Gerenciar
                        @endslot
                        @can('browse-users')
                            @component('Admin::components.menu.item', ['target' => route('admin.users.show'), 'icon' => 'user'])
                                Usuários
                            @endcomponent
                        @endcan
                        @can('browse-roles')
                            @component('Admin::components.menu.item', ['target' => route('admin.users.roles'), 'icon' => 'tasks'])
                                Cargos
                            @endcomponent
                        @endcan
                        @can('browse-permissions')
                            @component('Admin::components.menu.item', ['target' => route('admin.users.permissions'), 'icon' => 'key'])
                                Permissões
                            @endcomponent
                        @endcan
                        @can('browse-files')
                            @component('Admin::components.menu.item', ['target' => route('admin.blog.files'), 'icon' => 'file'])
                                Arquivos
                            @endcomponent
                        @endcan

                    @endcomponent
                @endif

                @if(Gate::check('browse-configurations') || Gate::check('browse-metas'))
                    @component('Admin::components.menu.tree', ['icon' => 'cogs', 'start' => 'settings'])
                        @slot('title')
                            Configurações
                        @endslot
                        @can('browse-configurations')
                            @component('Admin::components.menu.item', ['target' => route('admin.settings.general'), 'icon' => 'cog'])
                                Gerais
                            @endcomponent
                        @endcan
                        @can('browse-metas')
                            @component('Admin::components.menu.item', ['target' => route('admin.settings.meta'), 'icon' => 'info'])
                                Meta
                            @endcomponent
                        @endcan
                    @endcomponent
                @endif
            @endif
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<!-- =============================================== -->
