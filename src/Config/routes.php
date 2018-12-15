<?php

namespace App\Config;

use App\Controllers\Shapes;
use App\Service\Http\Request;

return [
    RouteConfigKeys::GROUP_ROUTES => [
        [
            RouteConfigKeys::GROUP_BASE => '/area',
            RouteConfigKeys::GROUP_ITEMS => [
                [
                    RouteConfigKeys::ROUTE => '/circle/{radius:(?:\d+|\d*\.\d+)}',
                    RouteConfigKeys::HTTP_METHOD => Request::METHOD_GET,
                    RouteConfigKeys::CONTROLLER => Shapes::class,
                    RouteConfigKeys::CONTROLLER_ACTION => 'circle'
                ],
                [
                    RouteConfigKeys::ROUTE => '/square',
                    RouteConfigKeys::HTTP_METHOD => Request::METHOD_GET,
                    RouteConfigKeys::CONTROLLER => Shapes::class,
                    RouteConfigKeys::CONTROLLER_ACTION => 'square'
                ],
                [
                RouteConfigKeys::ROUTE => '/rectangle',
                RouteConfigKeys::HTTP_METHOD => Request::METHOD_POST,
                RouteConfigKeys::CONTROLLER => Shapes::class,
                RouteConfigKeys::CONTROLLER_ACTION => 'rectangle'
            ]
            ]
        ]
    ]
];