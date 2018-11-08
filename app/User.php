<?php

namespace App;

use Admin\Models\Event;
use Admin\Models\News;
use Admin\Models\Photo;
use Admin\Models\Post;
use Admin\Models\Video;
use BRKsDeadPool\Gate\Support\HasRole;
use Laravolt\Avatar\Facade as Avatar;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasRole;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getFullNameAttribute() {
        return $this->name . ' ' . $this->last_name;
    }

    public function getAvatarAttribute() {
        return Avatar::create($this->full_name)->toBase64();
    }

    public function photos() {
        return $this->hasMany(Photo::class);
    }

    public function videos() {
        return $this->hasMany(Video::class);
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
