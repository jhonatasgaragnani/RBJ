<?php

namespace Admin\Providers;

use Admin\Contracts\ConfigurationManager;
use Illuminate\Support\ServiceProvider;

class ConfigurationServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ConfigurationManager::class, function() {
           return new \Admin\Binds\ConfigurationManager();
        });
    }
}