<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Aacotroneo\Saml2\Events\Saml2LoginEvent;
use App\Listeners\SSOLoginListener;
use Aacotroneo\Saml2\Events\Saml2LogoutEvent;
use App\Listeners\SSOLogoutListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\SomeEvent' => [
            'App\Listeners\EventListener',
        ],
        Saml2LoginEvent::class => [
            SSOLoginListener::class
        ],
        Saml2LogoutEvent::class => [
            SSOLogoutListener::class
        ]
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
