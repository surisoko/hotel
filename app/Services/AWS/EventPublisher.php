<?php

namespace App\Services\AWS;

interface EventPublisher
{
    public function publish(string $subject, array $payload);
}
