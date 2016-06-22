<?php

namespace App\Listeners\Travel;

use App\Events\Travel\TravelsWasUpdated;
use App\Models\Destination;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateDestinationListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  TravelsWasUpdated  $event
     * @return void
     */
    public function handle(TravelsWasUpdated $event)
    {
        $travels = $event->travels;
        $destinationId = $travels['destination_id'];
        $endDate = $travels['end_date']; //游记结束时间
        $lastDate = Destination::where('id', $destinationId)->value('latest');
        if (strtotime($endDate) - strtotime($lastDate) >= 0) {
            Destination::where('id', $destinationId)->update(['latest' => date('Y-m-d H:i:s', strtotime($endDate))]);
        }
    }
}
