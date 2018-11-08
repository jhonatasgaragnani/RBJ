<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    protected $fillable = [
        'name',
        'question',
        'active'
    ];

    public function options()
    {
        return $this->hasMany(PollOption::class);
    }
}
