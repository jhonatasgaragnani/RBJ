<?php

namespace App\Observers;

use App\Message;
use App\Events\MessageSent;

class MessageObserver 
{
    public function created(Message $message) {
        event(new MessageSent($message));
    }
}