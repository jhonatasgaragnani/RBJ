<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = [
      'name', 'site', 'thumb'
    ];
}