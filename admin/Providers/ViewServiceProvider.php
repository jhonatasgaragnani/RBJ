<?php

namespace Admin\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Admin\Composers\AdminComposer;

class ViewServiceProvider extends ServiceProvider
{
    public function boot() {
        View::composer(
            'Admin::layouts.app', AdminComposer::class
        );
    }
}