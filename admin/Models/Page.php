<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];

    public function metas()
    {
        return $this->hasMany(Meta::class);
    }
}
