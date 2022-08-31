<?php

namespace App\Events;

use App\Services\PublishEvent\ShouldPublish;
use Illuminate\Foundation\Events\Dispatchable;

class BookingCreated implements ShouldPublish
{
    use Dispatchable;

    private int $occurredOn;

    public function __construct(
        private string $hotelId,
        private string $userEmail
    )
    {
        $this->occurredOn = time();
    }

    public function toPublisher(): array
    {
        return [
            'hotel_uuid' => $this->hotelId,
            'user' => $this->userEmail,
        ];
    }

    public function occurredOn(): int
    {
        return $this->occurredOn;
    }
}
