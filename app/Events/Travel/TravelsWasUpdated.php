<?php

namespace App\Events\Travel;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TravelsWasUpdated extends Event
{
    use SerializesModels;

    public $travels; //具体的一篇游记

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($travels)
    {
        $this->travels = $travels;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
