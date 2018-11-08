<?php

namespace Admin\Binds;

use \Admin\Contracts\ConfigurationManager as ConfigurationContract;
use Admin\Models\Configuration;

class ConfigurationManager implements ConfigurationContract
{

    public function get($key, $default = null)
    {
        $configuration = Configuration::where('key', $key);

        if (!$configuration->exists()) {
            if ($default != null) return $default;
            return '';
        }

        return $configuration->first()->value;
    }

    public function set($key, $value)
    {
        $configuration = Configuration::firstOrNew(['key' => $key]);

        $configuration->value = $value;
        $configuration->save();

        return $configuration->value;
    }
}