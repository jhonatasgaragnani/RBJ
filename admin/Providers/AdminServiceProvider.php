<?php

namespace Admin\Providers;

use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    public function boot() {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'Admin');
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'Admin');
    }

    public function register() {
        $this->app->register(ConfigurationServiceProvider::class);
        $this->app->register(RouteServiceProvider::class);
        $this->app->register(PageServiceProvider::class);
        $this->app->register(ViewServiceProvider::class);
    }
}