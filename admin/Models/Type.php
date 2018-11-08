<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'name',
        'slug'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}