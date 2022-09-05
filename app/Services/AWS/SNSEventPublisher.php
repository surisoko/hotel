<?php

namespace App\Services\AWS;

use Aws\Sns\SnsClient;
use Illuminate\Config\Repository;

class SNSEventPublisher implements EventPublisher
{
    public function __construct(private SnsClient $client, private Repository $config)
    {
    }

    public function publish(string $subject, array $payload)
    {
        return $this->client->publish([
            'Message' => json_encode($payload),
            'Subject' => $subject,
            'TargetArn' => $this->config->get("events.topic"),
            'MessageAttributes' => [
                'Publisher' => [
                    'DataType' => 'String',
                    'StringValue' => $this->config->get('app.name'),
                ],
                'Event' => [
                    'DataType' => 'String',
                    'StringValue' => $subject,
                ],
            ],
        ]);
    }
}
