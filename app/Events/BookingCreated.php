<?php

namespace App\Events;

use App\Services\PublishEvent\ShouldPublish;
use Illuminate\Foundation\Events\Dispatchable;

class BookingCreated implements ShouldPublish
{
    use Dispatchable;

    public function __construct(
        private string $hotelId,
        private string $userName,
        private string $userEmail
    )
    {
    }

    public function toPublisher(): array
    {
        return [
            'hotel_uuid' => $this->hotelId,
            'name' => $this->userName,
            'email' => $this->userEmail,
        ];
    }
}
