<?php

namespace App\Containers\AppSection\RazorpaySubscription\Providers;

use App\Ship\Parents\Providers\MainProvider;
use App\Containers\AppSection\RazorpaySubscription\Contracts\IRazorpayService ;

use App\Containers\AppSection\RazorpaySubscription\Services\RazorpayService ;

/**
 * Class MainServiceProvider.
 *
 * The Main Service Provider of this container, it will be automatically registered in the framework.
 */
class MainServiceProvider extends MainProvider
{

    /**
     * Container Service Providers.
     *
     * @var array
     */
    public $serviceProviders = [
        // InternalServiceProviderExample::class,
    ];

    /**
     * Container Aliases
     *
     * @var  array
     */
    public $aliases = [
        // 'Foo' => Bar::class,
    ];

    /**
     * Register anything in the container.
     */
    public function register(): void
    {
        parent::register();

         $this->app->bind(IRazorpayService::class, RazorpayService::class);
        // ...
    }
}
