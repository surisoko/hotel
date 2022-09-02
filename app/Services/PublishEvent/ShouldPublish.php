<?php

namespace App\Services\PublishEvent;

interface ShouldPublish
{
    public function toPublisher(): array;

    public function occurredOn(): int;
}
