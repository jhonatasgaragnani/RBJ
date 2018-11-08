@extends('Admin::layouts.app')

@section('title')
    @lang('Admin::titles.users.read', ['name' => $user['full_name']])
@endsection

@section('heading')
    @lang('Admin::titles.users.read', ['name' => $user['full_name']])
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img src="{{ $user['avatar'] }}"
                         alt="{{ $user['full_name'] }} Profile"
                         class="profile-user-img img-responsive img-circle">

                    <h3 class="profile-username text-center">{{ $user['full_name'] }}</h3>
                    <p class="text-muted text-center">{{ $user['roles']->first()->name }}</p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Posts</b> <a class="pull-right">{{ $user->posts->count() }}</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Sobre</h3>
                </div>
                <div class="box-body">
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Nome</b> <a class="pull-right">{{ $user['full_name'] }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Virou membro</b> <a class="pull-right">{{ $user['created_at']->diffForHumans() }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#posts" data-toggle="tab">Posts</a>
                    </li>
                    <li>
                        <a href="#photos" data-toggle="tab">Fotos</a>
                    </li>
                    <li>
                        <a href="#videos" data-toggle="tab">Videos</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="posts">
                        <ul class="timeline">
                            @foreach($posts->groupBy(function($item) {
                                return $item['created_at']->toDateString();
                            }) as $postGroup => $postItems)
                                <li class="time-label">
                                <span class="bg-red">
                                    {{ \Carbon\Carbon::parse($postGroup)->format('d/m/Y') }}
                                </span>
                                </li>
                                @foreach($postItems as $post)
                                    <li>
                                        <i class="fa fa-file bg-blue"> </i>

                                        <div class="timeline-item">
                                            <span class="time">{{ $post['created_at']->diffForHumans() }}</span>

                                            <div class="timeline-header">{{ $post['title'] }}</div>

                                            <div class="timeline-body">
                                                {!! str_limit($post['body'], 300) !!}
                                            </div>

                                            <div class="timeline-footer">
                                                <a href="{{ route('admin.blog.posts.read', ['post' => $post]) }}"
                                                   class="btn btn-primary">Ler mais</a>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            @endforeach
                        </ul>

                        <p class="text-center">
                            {{ $posts->links() }}
                        </p>
                    </div>
                    <div class="tab-pane" id="photos">
                        Algum conteudo
                    </div>
                    <div class="tab-pane" id="videos">
                        Algum conteudo
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection