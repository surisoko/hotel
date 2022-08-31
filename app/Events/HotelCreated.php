<?php

namespace App\Events;

use App\Services\PublishEvent\ShouldPublish;
use Illuminate\Foundation\Events\Dispatchable;

class HotelCreated implements ShouldPublish
{
    use Dispatchable;

    private int $occurredOn;

    public function __construct()
    {
        $this->occurredOn = time();
    }

    public function toPublisher(): array
    {
        return [
            'hotel_uuid' => '123123',
            'user' => 'pepito',
        ];
    }

    public function occurredOn(): int
    {
        return $this->occurredOn;
    }
}
