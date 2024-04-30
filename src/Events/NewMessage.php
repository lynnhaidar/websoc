<?php

namespace Lynnhaidar\Websoc\Events;

use Lynnhaidar\Websoc\Models\Movie;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class NewMessage implements ShouldBroadcast
{
    use SerializesModels;

    public $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function broadcastOn()
    {
        return new Channel('chatChannel');
    }
}
