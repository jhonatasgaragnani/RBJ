<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $fillable = [
        'name'
    ];

    public function schedules() {
        return $this->belongsToMany(Schedule::class)->withPivot(['starts_at', 'ends_at']);
    }
}