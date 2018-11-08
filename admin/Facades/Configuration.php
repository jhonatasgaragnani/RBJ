<?php

namespace Admin\Facades;

use Admin\Contracts\ConfigurationManager;
use Illuminate\Support\Facades\Facade;

class Configuration extends Facade
{
    protected static function getFacadeAccessor()
    {
        return ConfigurationManager::class;
    }
}