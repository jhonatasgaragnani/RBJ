<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
      'name', 'role', 'image', 'thumb'
    ];
}