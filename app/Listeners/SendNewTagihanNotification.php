<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Tagihan;
use App\Models\User;
use App\Notifications\NewTagihanNotification;
use Illuminate\Support\Facades\Notification;

class SendNewTagihanNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    // public $tagihan;
    public function __construct()
    {
        //
        // dd("masuk listener");
        // $this->tagihan = $tagihan;
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
        $user_id = $event->tagihan->id_user;
        $newTagihan = User::where('id', $user_id)->get();
        // dd($event->tagihan);

        Notification::send($newTagihan, new NewTagihanNotification($event->tagihan));
    }
}
