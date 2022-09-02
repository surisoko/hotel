<?php

namespace App\Services\PublishEvent;

use App\Services\AWS\EventPublisher;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PublishEvent implements ShouldQueue
{
    use InteractsWithQueue;

    private $client;

    public function __construct(EventPublisher $client)
    {
        $this->client = $client;
    }

    public function handle(ShouldPublish $event)
    {
        $this->client->publish(
            class_basename($event),
            $event->toPublisher()
        );
    }
}
