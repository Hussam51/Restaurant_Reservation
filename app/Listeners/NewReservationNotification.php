<?php

namespace App\Listeners;

use App\Events\NewReservation;
use App\Models\User;
use App\Notifications\NewReservation as NotificationsNewReservation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class NewReservationNotification
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
     * @param  \App\Events\NewReservation  $event
     * @return void
     */
    public function handle(NewReservation $event)
    {
       Notification::send(User::first(),new NotificationsNewReservation($event->reservation));
    }
}
