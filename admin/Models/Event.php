<?php

namespace Admin\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'type_id',
        'active',
        'title',
        'body',
        'image',
        'thumb',
        'happen_at',
        'meta_description',
        'meta_title',
        'meta_keywords',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'happen_at'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}