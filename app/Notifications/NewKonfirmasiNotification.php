<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewKonfirmasiNotification extends Notification
{
    use Queueable;
    public $tagihan;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public function __construct($tagihan)
    {
        //
        $this->tagihan = $tagihan;
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
            'keterangan' => $this->tagihan->keterangan,
            'jumlah' => $this->tagihan->jumlah,
            'status_tagihan' => $this->tagihan->status_tagihan,
            'tgl_tagihan' => $this->tagihan->tgl_tagihan,
            'notifikasi'=> 'Terkonfirmasi',
        ];
    }
}
