<?php

declare(strict_types=1);

return [
    /*
    |--------------------------------------------------------------------------
    | RoadRunner Logger Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure the RoadRunner logger settings.
    |
    */
    
    'rr' => [
        'driver' => 'rr',
        'rr_rpc' => env('RR_RPC', 'tcp://127.0.0.1:6001'),
        'level' => env('LOG_LEVEL', 'debug'),
    ],
];
