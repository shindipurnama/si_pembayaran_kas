<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
use App\Notifications\NewKonfirmasiNotification;
use Illuminate\Support\Facades\Notification;

class SendNewKonfirmasiNotification
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
        // $user_id = $event->tagihan->id_user;
        $user_id = $event->konfirmasi->id_user;
        $newKonfirmasi = User::where('id', $user_id)->get();

        Notification::send($newKonfirmasi, new NewKonfirmasiNotification($event->konfirmasi));
    }
}
