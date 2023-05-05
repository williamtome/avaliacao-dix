<?php

namespace App\Providers;

use App\Events\CreateProductInNewBling;
use App\Events\UpdateProduct;
use App\Events\UpdateQuantity;
use App\Listeners\CreateProductInNewBlingListener;
use App\Listeners\UpdateProductDataInNewBlingListener;
use App\Listeners\UpdateQuantityProductInNewBlingListener;
use App\Listeners\UpdateQuantityProductInOldBlingListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        UpdateQuantity::class => [
            UpdateQuantityProductInNewBlingListener::class,
            UpdateQuantityProductInOldBlingListener::class,
        ],

        CreateProductInNewBling::class => [
            CreateProductInNewBlingListener::class,
        ],

        UpdateProduct::class => [
            UpdateProductDataInNewBlingListener::class
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

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
