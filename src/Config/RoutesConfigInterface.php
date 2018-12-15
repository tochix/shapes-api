<?php declare(strict_types=1);

namespace App\Config;

use App\Config\Exceptions\ConfigFileNotFoundException;
use App\Config\Exceptions\InvalidConfigException;
use Generator;

interface RoutesConfigInterface
{
    /**
     * @return Generator|RouteGroupItem[]
     * @throws ConfigFileNotFoundException
     * @throws InvalidConfigException
     */
    public function createRouteGroupItems(): Generator;
}