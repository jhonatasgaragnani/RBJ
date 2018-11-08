<?php

namespace Admin\Models;

use Illuminate\Database\Eloquent\Model;

class PollOption extends Model
{
    protected $fillable = [
        'poll_id',
        'name',
        'votes'
    ];

    public function poll()
    {
        return $this->belongsTo(Poll::class);
    }

    public function vote()
    {
        $this->votes = $this->votes + 1;

        $this->save();
    }
}
