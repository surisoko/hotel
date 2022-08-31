<?php

namespace App\Providers;

use App\Services\AWS\EventPublisher;
use App\Services\AWS\SNSEventPublisher;
use App\Services\PublishEvent\PublishEvent;
use App\Services\PublishEvent\ShouldPublish;
use Aws\Sns\SnsClient;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    public function boot(): void
    {
        parent::boot();

        $this->registerEventPublisher();
    }

    private function registerEventPublisher(): void
    {
        $this->app->bind(EventPublisher::class, SNSEventPublisher::class);
        $this->app->bind(SnsClient::class, function () {
            return new SnsClient([
                'region' => config("events.region"),
                'version' => config("events.version"),
                'credentials' => config("events.credentials"),
                'scheme' => 'http'
            ]);
        });

        Event::listen(ShouldPublish::class, PublishEvent::class);
    }
}
