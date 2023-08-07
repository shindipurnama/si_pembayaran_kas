<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewUserBayarNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $bayar;
    public function __construct($bayar)
    {
        //
        $this->bayar = $bayar;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }
   
    public function toArray($notifiable)
    {
        return [
            //
            'id_tagihan' => $this->bayar->id_tagihan,
            'total_bayar' => $this->bayar->jumlah,
            'status_bayar' => $this->bayar->status_bayar,
            'tgl_bayar' => $this->bayar->tgl_bayar,
        ];
    }
}
