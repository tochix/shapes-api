<?php declare(strict_types=1);

namespace App\Config;

use App\Config\Exceptions\ConfigFileNotFoundException;
use App\Config\Exceptions\InvalidConfigException;
use Generator;

class RoutesConfig extends Config implements RoutesConfigInterface
{
    const CONFIG_NAME = 'Routes';
    /**
     * @var string[]
     */
    private $routes;

    /**
     * @return Generator|RouteGroupItem[]
     * @throws ConfigFileNotFoundException
     * @throws InvalidConfigException
     */
    public function createRouteGroupItems(): Generator
    {
        $routes = $this->getRoutes();

        if (!\is_array($routes) || !array_key_exists(RouteConfigKeys::GROUP_ROUTES, $routes)) {
            throw InvalidConfigException::create(static::CONFIG_NAME);
        }

        foreach ($routes[RouteConfigKeys::GROUP_ROUTES] as $groupRoute) {
            yield from $this->createRouteGroupItemsForGroup($groupRoute);
        }
    }

    /**
     * @param string[] $groupRoute
     * @return Generator|RouteGroupItem[]
     * @throws InvalidConfigException
     */
    private function createRouteGroupItemsForGroup(array $groupRoute)
    {
        if (!array_key_exists(RouteConfigKeys::GROUP_BASE, $groupRoute)) {
            throw InvalidConfigException::create(static::CONFIG_NAME);
        }

        if (!array_key_exists(RouteConfigKeys::GROUP_ITEMS, $groupRoute)) {
            throw InvalidConfigException::create(static::CONFIG_NAME);
        }

        $base = $groupRoute[RouteConfigKeys::GROUP_BASE];

        foreach ($groupRoute[RouteConfigKeys::GROUP_ITEMS] as $groupRouteItem) {
            $this->checkGroupRouteItemKeys($groupRouteItem);

            $route = $groupRouteItem[RouteConfigKeys::ROUTE];
            $httpMethod = $groupRouteItem[RouteConfigKeys::HTTP_METHOD];
            $controller = $groupRouteItem[RouteConfigKeys::CONTROLLER];
            $controllerAction = $groupRouteItem[RouteConfigKeys::CONTROLLER_ACTION];

            yield $this->createRouteGroupItem(
                $base,
                $route,
                $httpMethod,
                $controller,
                $controllerAction
            );
        }
    }

    /**
     * @return string[]
     * @throws ConfigFileNotFoundException
     */
    private function getRoutes(): array
    {
        if (null === $this->routes) {
            $this->routes = $this->readInConfigFile($this->getConfigFilePath());
        }

        return $this->routes;
    }

    /**
     * @return string
     */
    private function getConfigFilePath(): string
    {
        return __DIR__ . DIRECTORY_SEPARATOR . 'routes.php';
    }

    /**
     * @param string $base
     * @param string $route
     * @param string $httpMethod
     * @param string $controller
     * @param string $controllerAction
     * @return RouteGroupItem
     */
    private function createRouteGroupItem(
        string $base,
        string $route,
        string $httpMethod,
        string $controller,
        string $controllerAction
    ): RouteGroupItem
    {
        return new RouteGroupItem($base, $route, $httpMethod, $controller, $controllerAction);
    }

    /**
     * @param string[] $groupRouteItem
     * @throws InvalidConfigException
     */
    private function checkGroupRouteItemKeys(array $groupRouteItem)
    {
        if (!array_key_exists(RouteConfigKeys::ROUTE, $groupRouteItem)) {
            throw InvalidConfigException::create(static::CONFIG_NAME);
        }

        if (!array_key_exists(RouteConfigKeys::HTTP_METHOD, $groupRouteItem)) {
            throw InvalidConfigException::create(static::CONFIG_NAME);
        }

        if (!array_key_exists(RouteConfigKeys::CONTROLLER, $groupRouteItem)) {
            throw InvalidConfigException::create(static::CONFIG_NAME);
        }

        if (!array_key_exists(RouteConfigKeys::CONTROLLER_ACTION, $groupRouteItem)) {
            throw InvalidConfigException::create(static::CONFIG_NAME);
        }
    }
}