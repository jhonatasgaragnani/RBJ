<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Top extends Model
{
    protected $fillable = [
        'artist',
        'title',
        'music',
        'position'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}