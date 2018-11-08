<?php

namespace Admin\Contracts;

interface ConfigurationManager
{
    public function get($key, $default);

    public function set($key, $value);
}