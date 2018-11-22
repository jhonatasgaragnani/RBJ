<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $data['page_metas']->where('name', 'title')->first()['content'] }} - {{ $data['config']->where('key', 'suffix')->first()['value'] }}</title>
    @if(request()->route()->getName() === 'Events.Child')
        @include('layouts.event')
    @elseif(request()->route()->getName() === 'Posts.Child' ||
    request()->route()->getName() === 'Interviews.Child' ||
    request()->route()->getName() === 'News.Child')
        @include('layouts.post')
    @elseif(request()->route()->getName() === 'Schedule.Child')
        @include('layouts.schedule')
    @endif
    @if (count($data['page_metas']) > 0)
        @foreach($data['page_metas'] as $meta)
            <meta name="{{ $meta['name'] }}" content="{{ $meta['content'] }}" data-vmid="{{ $meta['name'] }}" data-vue-meta="true">
    @endforeach
    @endif
    <!-- Styles -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet"
          type="text/css">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script>
        window.PageName = '{{ request()->route()->getName() }}';
        window.ServerData = {!!  json_encode($data) !!};
        window.ViewData = {!! json_encode($view) !!};
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-116316904-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-116316904-1');
    </script>
</head>
<body>
<div id="app">
    @yield('content')
</div>

<!-- Scripts -->
<script>
    var $buoop = {vs:{i:11,f:-8,o:-8,s:7,c:-8},unsecure:true,api:4};
    function $buo_f(){
        var e = document.createElement("script");
        e.src = "//browser-update.org/update.min.js";
        document.body.appendChild(e);
    };
    try {document.addEventListener("DOMContentLoaded", $buo_f,false)}
    catch(e){window.attachEvent("onload", $buo_f)}
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.3/socket.io.js"></script>
<script src="{{ asset('js/manifest.js') }}"></script>
<script src="{{ asset('js/vendor.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/0.js') }}"></script>
<script src="{{ asset('js/1.js') }}"></script>
</body>
</html>
