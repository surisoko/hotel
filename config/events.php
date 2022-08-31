<?php

return [
    'topic' => env('AWS_PUBLISHER_TOPIC'),
    'region' => env('AWS_PUBLISHER_REGION'),
    'version' => env('AWS_PUBLISHER_VERSION', 'latest'),
    'credentials' => [
        'key' => env('AWS_PUBLISHER_KEY'),
        'secret' => env('AWS_PUBLISHER_SECRET'),
    ]
];
