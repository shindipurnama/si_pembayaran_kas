<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Listeners\SendNewTagihanNotification;
use App\Listeners\SendNewBayarNotification;
use App\Listeners\SendNewKonfirmasiNotification;
use App\Events\NewTagihan;
use App\Events\NewUserBayar;
use App\Events\NewKonfirmasi;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        NewTagihan::class => [
            SendNewTagihanNotification::class,
        ],
        NewUserBayar::class => [
            SendNewBayarNotification::class,
        ],
        NewKonfirmasi::class => [
            SendNewKonfirmasiNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
