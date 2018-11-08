<?php

namespace Admin\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
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
        'meta_description',
        'meta_title',
        'meta_keywords',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function type() {
        return $this->belongsTo(Type::class, 'type_id');
    }
}