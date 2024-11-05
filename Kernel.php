<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        // other middleware...
        \App\Http\Middleware\Cors::class, // Add your CORS middleware
    ];

    protected $middlewareGroups = [
        'web' => [
            // other middleware...
        ],

        'api' => [
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    protected $routeMiddleware = [
        // other middleware...
    ];
}
