<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
use App\Notifications\NewUserBayarNotification;
use Illuminate\Support\Facades\Notification;

class SendNewBayarNotification
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        //
        $newBayar = User::where('role_id', 1)->get();

        Notification::send($newBayar, new NewUserBayarNotification($event->bayar));
    }
}
