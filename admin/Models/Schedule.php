<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'speaker',
        'name',
        'description',
        'image',
        'thumb'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function days()
    {
        return $this->belongsToMany(Day::class);
    }
}