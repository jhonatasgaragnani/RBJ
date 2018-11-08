<?php

namespace Admin\Observers;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class ModelObserver {
    public function created(Model $model)
    {
        $this->updated($model);
    }

    public function deleted(Model $model)
    {
        $this->updated($model);
    }

    public function updated(Model $model)
    {
        $cacheKey = $model->getTable();

        if ($cacheKey === 'posts') {
            $cacheKey = $model->type->slug;
        }

        if (Cache::has($cacheKey)) {
            Cache::forget($cacheKey);
        }
        if (Cache::has(strtolower($cacheKey).'-latest')) {
            Cache::forget(strtolower($cacheKey).'-latest');
        }

        Log::info($cacheKey);
    }
}