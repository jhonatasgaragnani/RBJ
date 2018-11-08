<?php


/*
|-----------------------------------------------------------------------------------------------------------------------
|  Frontend routes
|-----------------------------------------------------------------------------------------------------------------------
|
*/

$homeView = function ($data = null) {
    return function () use ($data) {

        if (!\Illuminate\Support\Facades\Cache::has('schedules')) {
            \Illuminate\Support\Facades\Cache::put('schedules', \Admin\Models\Day::with('schedules')->get(), \Carbon\Carbon::now()->addHours(24));
        }

        $metas = \Admin\Models\Meta::with('page')->get()->groupBy('page.name');
        $config = \Admin\Models\Configuration::get();

        $schedules = \Illuminate\Support\Facades\Cache::get('schedules');

        if (!is_null(request()->route()->getName())) {
            $pageMetas = $metas[request()->route()->getName()];
        } else {
            $pageMetas = collect([
                ['name' => 'title', 'content' => 'Titulo Padrão']
            ]);
        }
        return view('home', ['data' => [
            'metas' => $metas,
            'config' => $config,
            'page_metas' => $pageMetas,
            'schedules' => $schedules
        ], 'view' => $data]);
    };
};

$namedRoute = function (string $path, string $name, $data = null) use ($homeView) {
    Route::get($path, $homeView($data))->name($name);
};

$namedRoute('/', 'Home');

$namedRoute('/about', 'About');

$namedRoute('/schedule', 'Schedule');
$namedRoute('/schedule/{child}', 'Schedule.Child');

$namedRoute('/news', 'News');
$namedRoute('/news/{child}', 'News.Child');

$namedRoute('/interviews', 'Interviews');
$namedRoute('/interviews/{child}', 'Interviews.Child');

$namedRoute('/posts', 'Posts');
$namedRoute('/posts/{child}', 'Posts.Child');

$namedRoute('/gallery', 'Gallery');

$namedRoute('/videos', 'Videos');

$namedRoute('/team', 'Team');

$namedRoute('/events', 'Events');
$namedRoute('/events/{event}', 'Events.Child');

$namedRoute('/chat', 'Chat');

$namedRoute('/partners', 'Partners');

Route::get('/phpinfo', function() {
	phpinfo();
});

Route::get('/{all}', $homeView())->where(['all' => '.*']);
