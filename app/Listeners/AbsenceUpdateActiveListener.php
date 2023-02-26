<?php

namespace App\Listeners;

use App\Models\Absence;
use DateTime;
use App\Events\AbsenceUpdateActiveEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AbsenceUpdateActiveListener
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
     * @param  \App\Events\AbsenceUpdateActiveEvent  $event
     * @return void
     */
    public function handle(AbsenceUpdateActiveEvent $event)
    {
        $date = (new DateTime())->modify('-3 hour')->format('Y-m-d H:i:s');
        Absence::where('endDate','<', $date)
                ->update([
                    'active' => false
                ]);
    }
}
