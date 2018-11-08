<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    protected $fillable = [
        'page_id',
        'name',
        'content'
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}