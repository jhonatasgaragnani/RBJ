<?php

namespace Admin\Providers;

use Admin\Models\Configuration;
use Admin\Models\Event;
use Admin\Models\Page;
use Admin\Models\Partner;
use Admin\Models\Photo;
use Admin\Models\Poll;
use Admin\Models\Post;
use Admin\Models\Team;
use Admin\Models\Top;
use Admin\Models\Video;
use Admin\Observers\ModelObserver;
use Admin\Observers\PageObserver;
use App\Message;
use Illuminate\Support\ServiceProvider;

class PageServiceProvider extends ServiceProvider
{
    public function boot() {
        Page::observe(PageObserver::class);
        Configuration::observe(ModelObserver::class);
        Partner::observe(ModelObserver::class);
        Post::observe(ModelObserver::class);
        Photo::observe(ModelObserver::class);
        Video::observe(ModelObserver::class);
        Team::observe(ModelObserver::class);
        Event::observe(ModelObserver::class);
        Message::observe(ModelObserver::class);
        Top::observe(ModelObserver::class);
        Partner::observe(ModelObserver::class);
    }

    public function register() {

    }
}